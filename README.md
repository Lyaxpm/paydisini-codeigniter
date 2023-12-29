# Paydisini library codeigniter

## Instalation

Install package melalui composer:

```console
composer require rudaz/paydisini-codeigniter:dev-main
```

## Set up

Silahkan taruh di bagian function `__construct()`

```php
$this->paydisini = new Rudaz\Paydisini\Paydisini();

$this->paydisini->config(['apiKey' => 'Api_key_kamu']);
```

## Membuat Transaksi Baru

```php
$this->paydisini->transaction([
'unique_code' => 'Kode_Transaksi_Kamu',
'service' => 'Tipe_Pembayaran_Paydisini',
'amount' => 'Jumlah_pembayaran',
'note' => 'Catatan_Kamu',
'ewallet_phone' => 'Nomor_telpon_customer',
'type_fee' => 'Isi_1_fee_ditanggung_customer_isi_2_fee_ditanggung_merchant',
'return_url' => 'Url_redirect_setelah_pembayaran',
]);
```

`unique_code`, `service`, `amount`, `note`, `ewallet_phone`, `type_fee`, `return_url`

Parameter harus menggunakan array seperti contoh diatas

## Memeriksa Status Transaksi

```php
$this->paydisini->statusTransaction([
'unique_code' => 'Isi_unique_code_hasil_transaksi_kamu'
]);
```

Parameter `unique_code` menggunakan array yang berisi kode pembayaran dari transaksi yang kamu buat

## Membatalkan Transaksi

```php
$this->paydisini->cancelTransaction([
'unique_code' => 'Isi_unique_code_hasil_transaksi_kamu'
]);
```

Parameter `unique_code` menggunakan array yang berisi kode pembayaran dari transaksi yang kamu buat

## Melihat Payment Channel

```php
$this->paydisini->chanel();
```

## Melihat Panduan Pembayaran

```php
$this->paydisini->panduanPembayaran([
'service' => 'Service_id_pembayaran_paydisini'
]);
```

Parameter `service` menggunakan array yang berisi service id metode pembayaran dari Paydisini

## Callback

```php
$this->paydisini->callback([
'unique_code' => 'Unique_code_transaction',
'status' => 'Status_transaction'
]);
```

<b>Output atau response yang dihasilkan oleh request diatas adalah:</b>

```php
array(
'key' => 'Berisikan_apiKey_anda',
'signature' => 'Berisikan_signature_otomatis_yang_dibuat_oleh_libary'
);
```


## Tentang author

Halo saya <a href="https://facebook.com/rud.az.9" target="_blank">Rud Az</a>,

Saya bukan siapa-siapa tapi saya mempunyai cita-cita menguasai dunia :v 
oh iya saya juga open jasa integrasi payment gateway ke Paydisini hehe

kalo dokumentasi diatas kurang jelas langsung ke website official <a href="https://paydisini.co.id" target="_blank">Paydisini</a>

## Donasi

bila kalian ingin donsi saya sangat amat berterimakasih

Trakteer : https://trakteer.id/RudAz
