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

## How to use

```
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;

// ..........

$breadcrumb = new Breadcrumb(); // class
$breadcrumb->homeUrl = 'home'; // Use this if you want costum homeUrl, default to url('/')
$breadcrumb->begin(); //required to begin breadcrumb
$breadcrumb->add(['label' => 'Link 1']); //breadcrumb with label and without link
$breadcrumb->add(['url' => '/link2', 'label' => 'Link 2']); //breadcrumb with label and link
$breadcrumb->add(['label' => $this->title]); //breadcrumb with label and without link from a variable
$breadcrumb->end(); //required to end breadcrumb
```
