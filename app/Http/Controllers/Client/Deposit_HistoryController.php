<?php

namespace App\Http\Controllers\Client;

use App\Models\Deposit;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\PaymentConfirmation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

/**
 * Note Status :
 * 1 = Belum Dibayar
 * 2 = Dibayar
 * 3 = Dibatalkan
 */
class Deposit_HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deposits = Deposit::orderBy('id', 'desc')->get();
        return view('client.pages.deposit.history', [
            'deposits' => $deposits
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $deposit = Deposit::findOrFail($id);

        // Check if exist Konfirmasi Pembayaran
        $detailKonfirmasi = PaymentConfirmation::where('invoice_id', $id)->first();

        // Get 12 hours after order created for exp payment time
        $addHour = $deposit->created_at->addHour(12)->toDateTimeString();
        $expired_payment = date('M d, Y H:i:s', strtotime($addHour));

        // Check Timer Konfirmasi Manual
        $konfirmasi = false;
        $created = new Carbon($deposit->created_at);
        $current = new Carbon();
        $timeKonfirmasi = $current->diffInMinutes($created);
        if ($timeKonfirmasi >= 60) {
            $konfirmasi = true;
        }

        return view('client.pages.deposit.history-detail', [
            'deposit' => $deposit,
            'detailKonfirmasi' => $detailKonfirmasi,
            'expired_payment' => json_encode($expired_payment),
            'konfirmasi' => $konfirmasi,
        ]);
    }

    /**
     * Check Payment Deposit Invoice
     *
     * @return \Illuminate\Http\Response
     */
    public function check($id)
    {
        $deposit = Deposit::findOrFail($id);
        return redirect()->route('deposit-detail', ['id' => $deposit->id])->withSuccess("Payment for Deposit #$deposit->id Successful");
    }

    /**
     * Cancel Deposit Invoice
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function cancel($id)
    {
        $deposit = Deposit::findOrFail($id);
        $deposit->update([
            'status' => 3,
        ]);

        return redirect()->route('deposit-detail', ['id' => $deposit->id])->withSuccess("Deposit #$deposit->id Success for Canceled");
    }

    /**
     * Send Confirmation Manual Deposit
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function confirmation($id, Request $request)
    {
        // Validate
        $this->validate($request, [
            'konfirmasi_pembayaran'    => 'required|string',
            'name'    => 'required|string',
            'date'    => 'required|string',
            'amount'    => 'required|numeric',
            'bukti' => 'required|mimes:png,jpeg,svg|max:1000', // max 1MB
        ]);

        $deposit = Deposit::findOrFail($id);

        // Save image to the folder Storage
        $extension = $request->file('bukti')->getClientOriginalExtension();
        $fileName = 'deposit-' . $deposit->id  . "." . $extension;
        Storage::putFileAs('public/images/payment/confirmation', $request->file('bukti'), $fileName);

        // Detail Data
        $data[0] = Auth::user()->name;
        $data[1] = $deposit->amount;

        PaymentConfirmation::updateOrCreate([
            'invoice_id'    => $deposit->id,
        ], [
            'type'    => 'Deposit',
            'sender'    => $request->name,
            'proof'    => $fileName,
            'nominal'    => $request->amount,
            'data'    => $data,
            'date'    => $request->date,
            'bank_id'    =>  $deposit->bank_id,
            'status' => "Pending"
        ]);

        return redirect()->route('deposit-detail', ['id' => $deposit->id])->withSuccess("Successfully Sent Manual Confirmation");
    }
}
