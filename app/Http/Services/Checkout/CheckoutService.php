<?php

namespace App\Http\Services\Checkout;

class CheckoutService {
  function __construct()
  {
    \Xendit\Xendit::setApiKey(env('API_KEY'));
  }

  public function createInvoice($args) {
    $date = new \DateTime();
    $redirectUrl = '';
    $defParams = [
      'external_id' => 'lar8-checkout-demo-' . $date->getTimestamp(),
      'payer_emai;=l' => 'invoice.demo@xendit.co',
      'description' => 'Laravel Xendit Checkout Demo',
      'failure_redirect_url' => $redirectUrl,
      'success_redidect_url' => $redirectUrl,
    ];


    $data = json_decode(json_encode($args), true);
    $defParams['failure_redirect_url'] = $data['redirect_url'];
    $defParams['success_redirect_url'] = $data['redirect_url'];
    $params = array_merge($defParams, $data);
    $response = [];

    try {
        $response = \Xendit\Invoice::create($params);
    } catch (\Throwable $e) {
        $response['message'] = $e->getMessage();
    }

    logger($response);
    return $response;
  }

}