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
'unique_code' => '123456',
'service' => 2,
'amount' => 100000,
'note' => 'New Transaction',
'ewallet_phone' => '081111111',
'type_fee' => 2,
'return_url' => 'https://url.com'
]);
```

`unique_code`, `service`, `amount`, `note`, `ewallet_phone`, `type_fee`, `return_url`

Masing-masing parameter menggunakan array
