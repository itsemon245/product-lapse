<?php
namespace App\Enums;

use Illuminate\Support\Str;

enum Feature: string
{
    case IDEA = 'idea';
    case TASK = 'task';
    case CHANGE = 'change';
    case SUPPORT = 'support';
    case DOCUMENT = 'document';
    case DELIVERY = 'delivery'; //Should be hidden in select
    case REPORT = 'report';
    case PRODUCT = 'product';
    case RELEASE = 'release'; //Should be hidden in select
    case CERTIFICATE = 'certificate'; //Should be hidden in select
    



    public static function forSelect()
    {
        $items = collect(Feature::cases())->filter(function($f){
            return !Str::contains($f->value, ['delivery', 'release', 'certificate']);
        });

        return $items;
    }

}
