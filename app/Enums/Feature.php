<?php
namespace App\Enums;

use Illuminate\Support\Str;

enum Feature: string
{
    case PRODUCT = 'product';//has select done
    case IDEA = 'idea';//has select done
    case TASK = 'task';//has select done
    case CHANGE = 'change';//has select done
    case SUPPORT = 'support'; //done
    case DOCUMENT = 'document'; //done
    case REPORT = 'report'; //done
    case DELIVERY = 'delivery'; //Should be hidden in select
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
