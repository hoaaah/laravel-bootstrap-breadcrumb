Laravel Bootstrap Breadcrumb Helper
==================================

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
composer require hoaaah/laravel-bootstrap-breadcrumb:^2.0
```

or add

```
"hoaaah/laravel-bootstrap-breadcrumb": "^2.0"
```

to the require section of your `composer.json` file.

# Usage

You can use this helper in your view. It also support blade template. This breadcrumb support Boostrap 4 Breadcrumb, but you can configure so this widget can be used in other template as well.

## Breadcrumb Skeleton

This helper consist of this following code.

```php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;

// ..........

    {!! Breadcrumb::widget([
        'items' => [
            ['label' => 'Link 1'],
            ['url' => route('route.name'), 'label' => 'Link 2'],
            ['label' => $this->title]
        ]
    ]) !!}
```

## Costum Homepage

This helper use `url('\')` as default home Url. You can change your home url with `homeUrl` method. The following code as an example.
```php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;

// ..........

    {!! Breadcrumb::widget([
        'homeUrl' => route('home.dashboard'),
        'homeText' => 'Costumize Home Text',
        'items' => [
            ['label' => 'Link 1'],
            ['url' => route('route.name'), 'label' => 'Link 2'],
            ['label' => $this->title]
        ]
    ]) !!}
```

## Other Method

Method | Explanation | type
-------|------------ | ----
`homeUrl` | **Optional** method. You can override default `homeUrl`. Default value '/' | `string`
`homeText` | **optional** method. You can override default `homeText`. Default value 'Home' | `string`
`tagWrapper` | **optional** method. You can override default breadcrumb tag wrapper. Default value 'ol' | `string`
`tagItemWrapper` | **optional** method. You can override default breadcrumb items tag wrapper. Default value 'li' | `string`
`breadcrumbClass` | **optional** method. You can override default breadcrumb class. Default value 'breadcrumb' | `string`
`breadcrumbItemClass` | **optional** method. You can override default breadcrumb items class. Default value 'breadcrumb-item' | `string`
`items` | **Required** method. Set any items of your breadcrumb. Items render in order of items | `array`
-- `label` | **Required** param. Set label of breadcrumb item | `string`
-- `url` | Set url of your breadcrumb item | `string`


## Creator

This asset wrapper was created by and is maintained by **[hoaaah](http://belajararief.com/)**.

* https://twitter.com/hoaaah
* https://github.com/hoaaah
