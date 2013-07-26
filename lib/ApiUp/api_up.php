<?php 
namespace ApiUp;

class ApiUp {
  public function check ($endpoint) {
    if (!$endpoint) {
      throw new Exception("Error Processing Request", 1);
    }

    $handler = curl_init();
    curl_setopt($handler, CURLOPT_URL, "http://www.example.com/");
    curl_setopt($handler, CURLOPT_TIMEOUT, 1);

    $result = curl_exec($handler);
    curl_close($handler);
  }
}