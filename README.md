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
'unique_code' => Kode_Transaksi_Kamu,
'service' => Tipe_Pembayaran_Paydisini,
'amount' => Jumlah_pembayaran,
'note' => Catatan_Kamu,
'ewallet_phone' => Nomor_telpon_customer,
'type_fee' => isi_1_fee_ditanggung_customer_isi_2_fee_ditanggung_merchant,
'return_url' => url_redirect_setelah_pembayaran,
]);
```

`unique_code`, `service`, `amount`, `note`, `ewallet_phone`, `type_fee`, `return_url`

Parameter harus menggunakan array seperti contoh diatas
