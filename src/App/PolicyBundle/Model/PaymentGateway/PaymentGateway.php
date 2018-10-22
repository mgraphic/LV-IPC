<?php

namespace App\PolicyBundle\Model\PaymentGateway;

use App\PolicyBundle\Entity\PolicyHolder;
use App\PolicyBundle\Model\PaymentGateway\AuthorizeNet\AuthorizeNet;
use App\PolicyBundle\Model\PaymentGateway\Direct\Direct;
use App\PolicyBundle\Model\PaymentGateway\Paypal\Paypal;

class PaymentGateway
{
    public static function getProcessor($type, PolicyHolder $policy)
    {
        switch (strtolower($type))
        {
            case 'credit-card':
                return new AuthorizeNet($policy);

            case 'cash':
            case 'check':
            case 'money-order':
                return new Direct($policy);

            case 'paypal':
                return new Paypal($policy);
        }
    }
}
