<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe;use Session;use App\Model\StripeTransaction;

class StripePaymentController extends Controller
{

	public function stripeView(Request $req)
	{
		$data = [
            'redirectUrl' => '', //redirect URL will be here
            'price' => 100, // price wil be here
        ];
        return view('stripe.index',compact('data'));
	}

    public function stripePostForm_Submit(Request $req)
    {
        $req->validate([
            '_token' => 'required',
            'stripeToken' => 'required',
            'amount' => 'required',
            'redirectURL' => 'required',
        ]);
        // dd($req->all());
        \Stripe\Stripe::setApiKey('sk_test_4eC39HqLyjWDarjtT1zdp7dc');
        $payment = \Stripe\Charge::create ([
            "amount" => 100 * $req->amount,
            "currency" => "usd",
            "source" => $req->stripeToken,
            "description" => "Test payment from http://switcher.com",
        ]);
        if($payment->status == 'succeeded'){
        	$stripe = new StripeTransaction;
        	$stripe->transactionId = $payment->id;
        	$stripe->balance_transaction = $payment->balance_transaction;
        	$stripe->amount = $payment->amount;
        	$stripe->description = $payment->description;
        	$stripe->payment_method = $payment->payment_method;
        	$stripe->card_type = $payment->payment_method_details->type;
        	$stripe->exp_month = $payment->payment_method_details->card->exp_month;
        	$stripe->exp_year = $payment->payment_method_details->card->exp_year;
        	$stripe->last4 = $payment->payment_method_details->card->last4;
        	$stripe->save();
        	return redirect($req->redirectURL.'?stripeTransactionId='.$stripe->id);
        }
        return back();
    }

    public function thankyouStripePayment(Request $req,$stripeTransactionId)
    {
    	$stripe = StripeTransaction::findOrfail($stripeTransactionId);
    	return view('stripe.thankyou',compact('stripe'));
    }
}
