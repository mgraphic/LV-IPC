<?php

namespace App\PolicyBundle\Model\PaymentGateway\AuthorizeNet;

use App\PolicyBundle\Model\PaymentGateway\Processor;

/**
 * Child processor class to add credit card payment
 * 
 */
class AuthorizeNet extends Processor
{
    const PAYMENT_TYPE = 'Credit Card (CC)';

    public function process()
    {
        // Process payment
    }

    protected function authorizePayment()
    {
        // Authorize payment transaction
    }
}
