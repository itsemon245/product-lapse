<?php 
namespace App\Enums;

enum Feature:string {
    case IDEA = 'idea';
    case TASK = 'task';
    case CHANGE = 'change';
    case SUPPORT = 'support';
    case DOCUMENT = 'document';
    case DELIVERY = 'delivery';
    case REPORT = 'report';
    // case PACKAGE = 'package';
    case PRODUCT = 'product';
    case RELEASE = 'release';
    case CERTIFICATE = 'certificate' ;
    case USER = 'user';
    
}

?>