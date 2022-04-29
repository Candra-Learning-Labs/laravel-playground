<?php

namespace App\Http\Controllers\Checkout;

use App\Http\Services\Checkout\CheckoutService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;

class CheckoutController extends BaseController{

  public function index() {
    return View::make('v1/checkout/checkout');
  }

  public function onSubmit() {
    return View::make('v1/checkout/try-checkout');
  }

  public function create(Request $req) {
    $service = new CheckoutService();

    return $service->createInvoice($req->all());
  }
}