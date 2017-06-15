<?php
namespace hoaaah\LaravelBreadcrumb;

class Breadcrumb {
    public function begin(){
        return '
            <ul class="breadcrumb">
                <li><a href="/home">Home</a></li>
                <li class="active">Link Okeh</li>
            </ul>
        ';
    }
}
