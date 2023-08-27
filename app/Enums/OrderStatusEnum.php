<?php
namespace App\Enums;

enum OrderTypeEnum : string {
    case PENDING = 'pending';
    case PROCESSING  = 'processing';
    case COMPLETED = 'completed';
    case DECLINED = 'declined';
}
