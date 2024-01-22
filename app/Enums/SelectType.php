<?php
namespace App\Enums;

enum SelectType: string
{
    case CATEGORY = 'category';
    case STAGE = 'stage';
    case STATUS = 'status';
    case CLASSIFICATION = 'classification';
    case PRIORITY = 'priority';
    case ROLE = 'role';
    case TYPE = 'type';

}

?>