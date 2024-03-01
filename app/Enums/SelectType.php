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
    // case SUBMISSION = 'submission';
    case TICKET = 'ticket';
    case TASK = 'task';

}
