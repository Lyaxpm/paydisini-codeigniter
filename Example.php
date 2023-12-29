<?php
require('vendor/autoload.php');

class Example {

  function __construct() {
    $this->paydisini = new Rudaz\Paydisini\Paydisini();
    $this->paydisini->config(['apiKey' => 'Api_key']);
  }

  public function index() {

    /*
    * Membuat transaksi baru
    */
    $transaction = $this->paydisini->transaction([
      'unique_code' => '123456',
      'service' => 2,
      'amount' => 100000,
      'note' => 'New Transaction',
      'ewallet_phone' => '081111111',
      'type_fee' => 2,
      'return_url' => 'https://url.com'
    ]);

    /*
    * Memeriksa Status Transaksi
    */

    $status = $this->paydisini->statusTransaction([
      'unique_code' => 'Isi_unique_code_hasil_transaksi_kamu'
    ]);

    /*
    * Membatalkan Transaksi
    */

    $cancel = $this->paydisini->cancelTransaction([
      'unique_code' => 'Isi_unique_code_hasil_transaksi_kamu'
    ]);

    /*
    * Melihat Payment Channel
    */

    $chanel = $this->paydisini->chanel();

    /*
    * Melihat Panduan Pembayaran
    */

    $status = $this->paydisini->panduanPembayaran([
      'service' => 'Service_id_pembayaran_paydisini'
    ]);

  }

  /*
  * Example Callback 
  */

  public function callback() {

    if ($_SERVER['REMOTE_ADDR'] == '154.26.137.133') {
      $key = $_POST['key'];
      $unique_code = $_POST['unique_code'];
      $status = $_POST['status'];
      $signature = $_POST['signature'];
      $sign = md5('YOUR_APIKEY' . $payment_id . 'CallbackStatus');

      // panggil function callback
      $callback = $this->callback([
        'unique_code' => $unique_code,
        'status' => $status
      ]);

      // validasi key
      if ($key == $callback['key']) {

        // validasi callback
        if ($signature != $callback['signature']) {
          $result = array('success' => false);
        } else if ($status == 'Success') {
          //mysqli_query('YOUR QUERY IF PAYMENT SUCCESS');
          $result = array('success' => true);
        } else if ($status == 'Canceled') {
          //mysqli_query('YOUR QUERY IF PAYMENT CANCELED');
          $result = array('success' => true);
        } else {
          $result = array('success' => false);
        }
        header('Content-type: application/json');
        echo json_encode($result);
      } else {
        die('gagal koneksi callback!');
      }
    } else {
      die('gagal koneksi callback!');
    }

  }
  
}
