<?php 
namespace App\Enums;

enum PaymentMethodEnum: string {
    case CREDIT_CARD = 'credit card';
    case PAYAPL = 'payapl';
    case GOOGLE_PAY = 'google pay';
    case APPLE_PAY = 'apple pay';
    case BANK_ACCOUNT = 'bank account';
}

?>