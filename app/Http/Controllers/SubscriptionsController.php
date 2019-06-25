<?php

namespace App\Http\Controllers;

use harmonic\Ezypay\Facades\Ezypay;
use Inertia\Inertia;

class SubscriptionsController extends Controller {
    public function index() {
        $subscriptions = Ezypay::getSubscriptions();
        return Inertia::render('Subscriptions/Index', ['subscriptions' => $subscriptions]);
    }
}
