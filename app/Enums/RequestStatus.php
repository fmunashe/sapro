<?php


namespace App\Enums;

use app\Http\Traits\ConstantExport;

/**
 * Author: Farai Zihove
 * Mobile: +263778234258
 * Email: farai@flickerleap.com
 * Date: 6/4/2023
 * Time: 10:43
 */
class RequestStatus extends Enum
{
    const OPEN = 'Open';
    const PROCESSING = 'Processing';
    const IN_REVIEW = 'Client Reviewing';
    const APPROVED = 'Approved';
    const REJECTED = 'Rejected';
    const CLOSED = 'Closed';
    const PROCESSED = 'Processed';
//    use ConstantExport;
}
