<?php 
namespace ApiUp;

class ApiUp {
  public static function check ($endpoint = '') {

    // Check if endpoint was passed and make sure it's valid
    if (!$endpoint) {
      throw new \Exception("No endpoint received");
    }

    if (!filter_var($endpoint, FILTER_VALIDATE_URL)) {
      throw new \Exception("Endpoint not a valid url");
    }

    $handler = curl_init();
    curl_setopt($handler, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($handler, CURLOPT_URL, $endpoint);
    curl_setopt($handler, CURLOPT_TIMEOUT, 3);

    $result = curl_exec($handler);
    curl_close($handler);

    return ($result) ? true : false;
  }
}