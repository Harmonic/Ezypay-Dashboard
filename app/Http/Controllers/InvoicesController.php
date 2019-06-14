<?php

namespace App\Http\Controllers;

use harmonic\Ezypay\Facades\Ezypay;
use Inertia\Inertia;
use Illuminate\Http\Request;

class InvoicesController extends Controller {
    public function index() {
        //Ezypay::fake();
        $invoices = Ezypay::getInvoices(false, null, null, null, null, null, null, null, null, 25, 0);
        return Inertia::render('Invoices/Index', ['invoices' => $invoices]);
    }
}
