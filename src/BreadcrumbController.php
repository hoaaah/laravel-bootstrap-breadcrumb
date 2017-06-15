<?php

namespace hoaaah\LaravelBreadcrumb;
 
use App\Http\Controllers\Controller;
use Carbon\Carbon;
 
class BreadcrumbController extends Controller
{
 
    public function index($var)
    {
        echo Carbon::now($var)->toDateTimeString();
    }
 
}
