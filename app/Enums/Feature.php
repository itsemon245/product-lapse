<?php 
namespace App\Enums;

enum Feature:string {
    case CHANGE = 'change';
    case DELIVERY = 'delivery';
    case DOCUMENT = 'document';
    case IDEA = 'idea';
    case PACKAGE = 'package';
    case PRODUCT = 'product';
    case RELEASE = 'release';
    case REPORT = 'report';
    case SELECT = 'select';
    case SUPPORT = 'support';
    case TASK = 'task';
    
}

?>