<?php

namespace App\PolicyBundle\Model\PaymentGateway\Paypal;

use App\PolicyBundle\Model\PaymentGateway\Processor;

/**
 * Child processor class to add credit card payment
 * 
 */
class Paypal extends Processor
{
    const PAYMENT_TYPE = 'PayPal';

    public function process()
    {
        // Process payment
    }

    protected function authorizePayment()
    {
        // Authorize payment transaction
    }
}
