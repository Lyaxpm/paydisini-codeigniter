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
}