<?php

namespace App\Http\Controllers;


class ViewController extends Controller
{


    public function paymentView()
    {
        return view('payment');
    }

    public function customerView()
    {
        return view('create_customer');
    }

    public function thankYou()
    {
        return view('thankyou');
    }
}
