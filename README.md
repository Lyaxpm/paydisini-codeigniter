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
