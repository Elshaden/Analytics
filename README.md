# Shaden Analytics 3.1.11

Lavacharts is a Event Driven / Web Traffic Analytics library for PHP5.7+ .


---

## Installing
In your project's main `composer.json` file, add this line to the requirements:
```json
"shaden/analytics": "*"
```

Run Composer to install Analytics:
```bash
$ composer update
```


### Laravel 
Register Analytics in your app by adding these lines to the respective arrays found in `config/app.php`:
```php
<?php
// config/app.php

// ...
'providers' => [
    // ...

     Shaden\Analytics\ShadenAnalyticsServiceProvider::class,
],

// ...
'aliases' => [
    // ...

           'Analytics'=>Shaden\Analytics\Facades\Analytics::class,

]
```
#### Configuration
To modify the default configuration of Lavacharts, datetime formats for datatables or adding your maps api key...
Publish the configuration with 
`php artisan vendor:publish --provider="Shaden\Analytics\ShadenAnalyticsServiceProvider" --tag="config"
`

#### Migrations
`php artisan vendor:publish --provider="Shaden\Analytics\ShadenAnalyticsServiceProvider" --tag="migrations"`

Then you must run 
`php artisan migrate`
