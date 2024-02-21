<?php 
namespace App\Enums;

enum OrderStatusEnum: string {
    case DRAFT = 'draft';
    case PENDING = 'pending';
    case COMPLETED = 'completed';
    case FAILED = 'failed';
}

?>