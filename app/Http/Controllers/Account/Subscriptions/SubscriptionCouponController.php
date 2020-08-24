<?php

namespace App\Http\Controllers\Account\Subscriptions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rules\ValidCoupon;

class SubscriptionCouponController extends Controller
{
    // public function __construct() {
    //     $this->middleware(['auth', 'subscribed']);
    // }

    public function index()
    {
        return view('account.subscriptions.coupon');
    }

    public function store(Request $request) 
    {
        $this->validate($request, [
            'coupon' => [
                'required',
                new ValidCoupon()
            ]
        ]);

        $request->user()->subscription('default')->updateStripeSubscription([
            'coupon' => $request->coupon
        ]);
        
        return redirect()->route('account.subscriptions');
    }
}
