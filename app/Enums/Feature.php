<?php
namespace App\Enums;

enum Feature: string
{
    case IDEA = 'idea';
    case TASK = 'task';
    case CHANGE = 'change';
    case SUPPORT = 'support';
    case DOCUMENT = 'document';
    case DELIVERY = 'delivery';
    case REPORT = 'report';
    case PRODUCT = 'product';
    case RELEASE = 'release';
    case CERTIFICATE = 'certificate';
    
    
    //Packages and user should not be in the feature
    // case PACKAGE = 'package';
    // case USER = 'user';

}
