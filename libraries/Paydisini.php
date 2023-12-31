<?php

namespace Rudaz\Paydisini;

/**
* Lib codeigniter payment gateway Paydisini
*
* @author   Rud Az <rzombok@gmail.com>
* @see      https://github.com/lyaxpm/paydisini-codeigniter
*/

class Paydisini {

  const URL = 'https://paydisini.co.id/api/';

  protected $apiKey;

  public function config($data) {
    return $this->apiKey = $data['apiKey'];
  }

  public function transaction($params = []) {
    return Paydisini::Request(self::URL, [
      'key' => $this->apiKey,
      'request' => 'new',
      'unique_code' => $params['unique_code'],
      'service' => $params['service'],
      'amount' => $params['amount'],
      'note' => $params['note'],
      'valid_time' => 10800,
      'ewallet_phone' => $params['ewallet_phone'],
      'type_fee' => $params['type_fee'],
      'return_url' => $params['return_url'],
      'signature' => Paydisini::signature($params['unique_code'] . $params['service'] . $params['amount'] . 10800 . 'NewTransaction')
    ]);
  }

  public function statusTransaction($params = []) {
    return Paydisini::Request(self::URL, [
      'key' => $this->apiKey,
      'request' => 'status',
      'unique_code' => $params['unique_code'],
      'signature' => Paydisini::signature($params['unique_code'] . 'StatusTransaction')
    ]);
  }

  public function cancelTransaction($params = []) {
    return Paydisini::Request(self::URL, [
      'key' => $this->apiKey,
      'request' => 'cancel',
      'unique_code' => $params['unique_code'],
      'signature' => Paydisini::signature($params['unique_code'] . 'CancelTransaction')
    ]);
  }

  public function chanel() {
    return Paydisini::Request(self::URL, [
      'key' => $this->apiKey,
      'request' => 'payment_channel',
      'signature' => Paydisini::signature('PaymentChannel')
    ]);
  }

  public function panduanPembayaran($params = []) {
    return Paydisini::Request(self::URL, [
      'key' => $this->apiKey,
      'request' => 'payment_guide',
      'service' => $params['service'],
      'signature' => Paydisini::signature($params['service'] . 'PaymentChannel')
    ]);
  }

  public function callback($params = []) {
    return ['key' => $this->apiKey, 'signature' => Paydisini::signature($params['unique_code'] . $params['status'] . 'CallbackStatus')];
  }

  public function signature($signature) {
    return md5($this->apiKey . $signature);
  }

  public static function Request($url, $body) {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($body));
    curl_setopt($curl, CURLOPT_ENCODING, 'gzip, deflate');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    if (curl_errno($curl)) {
      throw new \Exception('[ERROR] Cannot get server response!');
    } else {
      $response = curl_exec($curl);
      curl_close($curl);
      $response = json_decode($response, true);
      return $response;
    }
  }

}
