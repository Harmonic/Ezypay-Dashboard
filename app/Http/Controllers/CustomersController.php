<?php

namespace App\Http\Controllers;

use harmonic\Ezypay\Facades\Ezypay;
use Inertia\Inertia;
use Illuminate\Http\Request;

class CustomersController extends Controller {
    public function index() {
        //Ezypay::fake();
        $customers = Ezypay::getCustomers(false, null, null, null, null, null, null, null, null, 25, 0);
        //dd($customers);
        return Inertia::render('Customers/Index', ['customers' => $customers]);
    }
}
