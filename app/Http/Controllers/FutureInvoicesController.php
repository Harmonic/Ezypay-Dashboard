<?php

namespace App\Http\Controllers;

use harmonic\Ezypay\Facades\Ezypay;
use Inertia\Inertia;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Carbon;

class FutureInvoicesController extends Controller {
    public function index($subscription, $customer) {
        //Ezypay::fake();
        $startDate = new Carbon('First day of next month');
        $startDate = $startDate->toDateString();
        $endDate = new Carbon('Last day of next month');
        $endDate = $endDate->toDateString();
        // $filters = Request::all('search', 'trashed');
        $order = Request::all('orderColumn', 'orderDirection');
        $invoices = Ezypay::getFutureInvoices($subscription, $customer, $startDate, $endDate);
        return Inertia::render('FutureInvoices/Index', [
            'invoices' => $invoices,
            'filters' => Request::all('search', 'trashed'),
            'order' => Request::all('orderColumn', 'orderDirection'),
        ]);
    }
}
