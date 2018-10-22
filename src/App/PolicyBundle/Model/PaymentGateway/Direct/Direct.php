<?php

namespace App\PolicyBundle\Model\PaymentGateway\Direct;

use App\PolicyBundle\Model\PaymentGateway\Processor;

/**
 * Child processor class to add cash, check, or money order payment
 * 
 */
class Direct extends Processor
{
    const PAYMENT_TYPE = 'Cash/Check/MO';

    public function process()
    {
        // Process payment
    }

    protected function authorizePayment()
    {
        // Authorize payment transaction
        return true;
    }
}
