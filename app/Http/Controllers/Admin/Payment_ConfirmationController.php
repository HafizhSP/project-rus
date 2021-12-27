<?php

namespace App\Http\Controllers\Admin;

use App\Models\Deposit;
use Illuminate\Http\Request;
use App\Models\PaymentConfirmation;
use App\Http\Controllers\Controller;

class Payment_ConfirmationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        PaymentConfirmation::where('baca', 0)->update([
            'baca' => 1
        ]);
        $payments = PaymentConfirmation::orderByDesc('id', 'desc')->get();
        return view('admin.pages.billing.payment.payment-confirm', [
            'payments' => $payments
        ]);
    }

    /**
     * Method to Confirm Payment.
     *
     * @return \Illuminate\Http\Response
     */
    public function confirm($id)
    {
        $paymentConfirm = PaymentConfirmation::findOrFail($id);
        $type = $paymentConfirm->type;

        if ($type == "Deposit") {
            $dataDeposit = Deposit::findOrFail($paymentConfirm->invoice_id);
            // Change status Deposit
            if ($dataDeposit->status == 3 || $dataDeposit->status == 1) {
                $dataDeposit->update([
                    'status' => 2,
                ]);
                // Add Balance
                $dataDeposit->user()->update([
                    'balance' => $dataDeposit->user->balance + $dataDeposit->amount,
                ]);
            }
            // Change status Payment Confirmation
            $paymentConfirm->update([
                'status' => "Confirm",
            ]);
        } elseif ($type == "Register") {
            //
        }

        return redirect()->back()->withSuccess("$type dengan Invoice '$paymentConfirm->invoice_id' success for Confirm");
    }

    /**
     * Method to Denied Payment.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function denied($id)
    {
        $paymentConfirm = PaymentConfirmation::findOrFail($id);
        $type = $paymentConfirm->type;

        if ($type == "Deposit") {
            // Change status Payment Confirmation
            $paymentConfirm->update([
                'status' => "Denied",
            ]);
        } elseif ($type == "Register") {
            // Change status Payment Confirmation
            $paymentConfirm->update([
                'status' => "Denied",
            ]);
        }

        return redirect()->back()->withSuccess("$type dengan Invoice '$paymentConfirm->invoice_id' success for Confirm");
    }
}
