dd our new Service Provider to the array of Service Providers in file config/app.php:
```
    'providers' => [
 
        /*
         * Laravel Framework Service Providers...
         */
        Illuminate\Foundation\Providers\ArtisanServiceProvider::class,
        // ... other providers
        Illuminate\View\ViewServiceProvider::class,
        hoaaah\LaravelBreadcrumb\LaravelBreadcrumbServiceProvider::class,
```