<?php

namespace App\Http\Controllers;

use Telegram\Bot\Api;

class TelegramBotController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $telegram = new Api();
    // $response = $telegram->getMe();
    // $updates = $telegram->getUpdates();
    // return $response->toJson();

    $baseUrl = '';

    return $telegram->setWebhook(['url' => $baseUrl.'/bot/webhook']);
    // return $telegram->getWebhookInfo()->toJson();

    return $updates;
  }

  public function handleWebhook() {
    $telegram = new Api();

    error_log(print_r($telegram->getWebhookUpdate()));
    error_log("a");
  }
}