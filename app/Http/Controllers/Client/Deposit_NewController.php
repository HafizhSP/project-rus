<?php

namespace App\Http\Controllers\Client;

use App\Models\Bank;
use App\Models\Deposit;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

/**
 * Note Status :
 * 1 = Belum Dibayar
 * 2 = Dibayar
 * 3 = Dibatalkan
 */
class Deposit_NewController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $banks = Bank::all();
        return view('client.pages.deposit.new', [
            'banks' => $banks
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate
        $this->validate($request, [
            'payment'    => 'required|numeric',
            'amount'    => 'required|numeric',
            'g-recaptcha-response' => 'required|captcha',
        ], [
            'g-recaptcha-response.required' => 'The Captcha Field is required!',
            'g-recaptcha-response.captcha' => 'The Captcha Field is required!',
        ]);

        // Kode Unik
        $n = 1;
        for ($i = 0; $i < $n; $i++) {
            $uniq = rand(1, 900);
            $check = Deposit::select('uniq')->where('uniq', $uniq)->where('created_at', '>=', Carbon::now()->subDays(4)->toDateTimeString())->first();
            if ($check) {
                // Ada kode unik yang sama
                $n++;
            }
        }

        // Price
        $amount = $request->amount;
        $price = $amount + $uniq;

        $deposit = Deposit::create([
            'user_id'    => Auth::user()->id,
            'bank_id'    => $request->payment,
            'amount'    => $amount,
            'uniq'    => $uniq,
            'price'    => $price,
            'status'    => 1,
        ]);

        return redirect()->route('deposit-detail', ['id' => $deposit->id])->withSuccess("Segera selesaikan pembayaran sesuai dengan nominal dan waktu yang tersedia");
    }
}
