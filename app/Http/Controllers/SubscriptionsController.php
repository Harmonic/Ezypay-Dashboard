<?php

namespace App\Http\Controllers;

use harmonic\Ezypay\Facades\Ezypay;
use Inertia\Inertia;
use Illuminate\Support\Facades\Request;

class SubscriptionsController extends Controller {
    public function index() {
        $filters = Request::all('search', 'trashed');
        $order = Request::all('orderColumn', 'orderDirection');
        $subscriptions = [];
        if ($filters['search'] !== null) {
            //$subscriptions = Ezypay::getSubscriptions('0e88e2b4-965c-4829-a2ae-4db13570c8b3');
            $subscriptions = Ezypay::getSubscriptions($filters['search']);
        }
        return Inertia::render('Subscriptions/Index', [
            'subscriptions' => $subscriptions,
            'filters' => Request::all('search', 'trashed'),
            'order' => Request::all('orderColumn', 'orderDirection'),
        ]);
    }
}
