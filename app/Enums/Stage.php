<?php
namespace App\Enums;

enum Stage: string
{
    case NEW = 'New';
    case EVALUATE = 'Evaluate';
    case DISCUSS = 'Discuss';
    case FINAL_WORDING = 'Final Wording';
    case ACCEPTED = 'Accepted';
    case REFUSED = 'Refused';
    case DELETED = 'Deleted';

}
