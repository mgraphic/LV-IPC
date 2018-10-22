<?php

namespace App\PolicyBundle\Model\PaymentGateway;

use App\PolicyBundle\Entity\PolicyHolder;

/**
 * Parent processor class to add payment processing functionality
 * 
 */
abstract class Processor
{
    const PAYMENT_TYPE = '';

    protected $paymentAmount;
    protected $policy;

    public function __construct(PolicyHolder $policy)
    {
        $this->policy = $policy;
    }

    abstract public function process();

    abstract protected function authorizePayment();

    public function setPaymentAmount($amount)
    {
        $this->paymentAmount = $amount;
    }
}
