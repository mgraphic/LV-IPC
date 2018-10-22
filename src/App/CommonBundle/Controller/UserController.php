<?php

namespace App\CommonBundle\Controller;

use Doctrine\Entity\EntityException;

use Framework\Component\Controller;

class UserController extends Controller
{
    public function catchAllAction()
    {
        switch (true)
        {
            case ($this->isAdmin()):
                return $this->redirect($this->generateUrl('admin'));

            case ($this->isCustomer()):
                return $this->redirect($this->generateUrl('account'));

            default:
                return $this->rendor('CommonBundle:login-form.html.twig');
        }
    }

    public function loginAction()
    {
        $email = $this->request->post('email');
        $password = $this->request->post('password');

        try
        {
            $user = $this->getUserLookup()->getUserByEmail($email);
            $user->login($password);
            $this->sess->set('user', $user);
        }
        catch (EntityException $e)
        {
            $this->sess->delete('user');
        }

        return $this->catchAllAction();
    }

    private function getUserLookup()
    {
        return new UserLookup;
    }

    private function isAuthenticated()
    {
        if ($this->sess->exists('user') AND $this->sess->get('user')->isAuthenticated())
        {
            return true;
        }

        return false;
    }

    private isAdmin()
    {
        return ($this->isAuthenticated() AND $this->sess->get('user')->isAdmin());
    }

    private isCustomer()
    {
        return ($this->isAuthenticated() AND $this->sess->get('user')->isCustomer());
    }
}
