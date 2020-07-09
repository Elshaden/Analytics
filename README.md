# This Package is Work In Progress Not Complete Yet

# Shaden Analytics 1.0

Shaden Analytics is a Event Driven / Web Traffic Analytics library for PHP5.7+ .


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

or via require
`composer require shaden/analytics`


### Laravel   5.4 and less
you need to Register Analytics in your app by adding these lines to the respective arrays found in `config/app.php`:
```
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
To modify the default configuration of Analytics, 
Publish the configuration with
 
`php artisan vendor:publish --provider="Shaden\Analytics\ShadenAnalyticsServiceProvider" --tag="config"
`

#### Migrations
`php artisan vendor:publish --provider="Shaden\Analytics\ShadenAnalyticsServiceProvider" --tag="migrations"`

Then you must run 
`php artisan migrate`


#### To Use

you need to use the event in your code

`use Shaden\Analytics\Events\AnalyticsEvent;`

Call the event By :

`event(new AnalyticsEvent('<any_view_name>',Optional'<App\ModelName>',Optional '< Model used ID>' ));`


#### Que Worker
Make sure   `php artisan que:listen --tries=1` is running in the server.


#### The Result
 ##### coming soon
You should be able to get list of all Views by
page, Model or model id, date, Region , and anything that I can think of.
