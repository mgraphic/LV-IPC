<?php

namespace App\PolicyBundle\Controller;

use Framework\Component\Controller;
use Framework\Component\Http\Exception\NotFoundHttpException;
use Framework\Component\Security\Core\Exception\AccessDeniedException;

use Doctrine\Entity\EntityException;

use App\CommonBundle\Controller\UserController;
use App\PolicyBundle\Entity\PolicyHolderLookup;
use App\PolicyBundle\Model\PaymentGateway\PaymentGateway;

class CustomerController extends UserController
{
    public function indexAction()
    {
        $this->validateUser();

        $policies = $this->getPolicyLookup()->getPoliciesByUser(
            $this->sess->get('user')->getUserId()
        );

        return $this->rendor('PolicyBundle:Customer:index.html.twig', [
            'policies' => $policies
        ]);
    }

    public function viewPolicyDetailsAction($policyNumber)
    {
        $this->validateUser();

        try
        {
            $policy = $this->getPolicyLookup()->getPolicyByNumber(
                $policyNumber,
                $this->sess->get('user')->getUserId()
            );
        }
        catch (EntityException $e)
        {
            throw new NotFoundHttpException(sprintf('Unable to find policy #: %s', $policyNumber));
        }

        return $this->rendor('PolicyBundle:Customer:policy-details.html.twig', [
            'policy' => $policy
        ]);
    }

    public function makePaymentAction($policyNumber)
    {
        $this->validateUser();

        // View payment options
    }

    public function processPaymentAction($policyNumber)
    {
        $this->validateUser();

        // Process payment action
        try
        {
            $policy = $this->getPolicyLookup()->getPolicyByNumber(
                $policyNumber,
                $this->sess->get('user')->getUserId()
            );
        }
        catch (EntityException $e)
        {
            throw new NotFoundHttpException(sprintf('Unable to find policy #: %s', $policyNumber));
        }
        
        $paymentType = $this->request->post('paymentType');

        $processor = PaymentGateway::getProcessor($paymentType, $policy);

        $paymentAmount = $this->request->post('paymentAmount');

        $processor->setPaymentAmount($paymentAmount);

        if ($processor->authorizePayment())
        {
            $processor->process();
        }
    }

    private function validateUser()
    {
        if (!$this->isCustomer())
        {
            throw new AccessDeniedException;
        }
    }

    private function getPolicyLookup()
    {
        return new PolicyHolderLookup;
    }
}
