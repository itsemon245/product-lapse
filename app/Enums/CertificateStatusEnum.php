<?php 
namespace App\Enums;

enum CertificateStatusEnum: string {
    case PENDING = 'pending';
    case APPROVED = 'approved';
    case REJECTED = 'rejected';
}

?>