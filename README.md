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

$this->paydisini->config(['apiKey' => 'Api key mu']);
```

## Membuat Transaksi Baru

```php
$this->paydisini->transaction([
'unique_code' => Kode Transaksi Kamu,
'service' => Tipe Pembayaran Paydisini,
'amount' => Jumlah pembayaran,
'note' => Catatan Kamu,
'ewallet_phone' => Nomor telpon customer,
'type_fee' => 1 fee ditanggung customer 2 fee ditanggung merchant,
'return_url' => url redirect setelah pembayaran,
]);
```

`unique_code`, `service`, `amount`, `note`, `ewallet_phone`, `type_fee`, `return_url`

Parameter harus menggunakan array seperti contoh diatas
