<?php

namespace App\PolicyBundle\Controller;

use Framework\Component\Controller;
use Framework\Component\Http\Exception\NotFoundHttpException;
use Framework\Component\Security\Core\Exception\AccessDeniedException;

use Doctrine\Entity\EntityException;

use App\CommonBundle\Controller\UserController;
use App\PolicyBundle\Entity\PolicyHolderLookup;

class AdminController extends UserController
{
    public function indexAction()
    {
        $this->validateUser();

        return $this->rendor('PolicyBundle:Admin:index.html.twig');
    }

    public function searchAction()
    {
        $this->validateUser();

        $keyword = $this->request->post('keyword');
        $policies = $this->getPolicyLookup()->getSearchByKeyword($keyword);

        return $this->rendor('PolicyBundle:Admin:search-results.html.twig', [
            'policies' => $policies
        ]);
    }

    public function viewPolicyDetailsAction($policyNumber)
    {
        $this->validateUser();

        try
        {
            $policy = $this->getPolicyLookup()->getPolicyByNumber($policyNumber);
        }
        catch (EntityException $e)
        {
            throw new NotFoundHttpException(sprintf('Unable to find policy #: %s', $policyNumber));
        }

        return $this->rendor('PolicyBundle:Admin:policy-details.html.twig', [
            'policy' => $policy
        ]);
    }

    protected function validateUser()
    {
        if (!$this->isAdmin())
        {
            throw new AccessDeniedException;
        }
    }

    protected function getPolicyLookup()
    {
        return new PolicyHolderLookup;
    }
}
