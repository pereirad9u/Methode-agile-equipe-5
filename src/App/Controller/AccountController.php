<?php

namespace App\Controller;

use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Cartalyst\Sentinel\Native\Facades\Sentinel;

class AccountController extends Controller
{
    public function home(Request $request, Response $response)
    {
        $user = $this->user();
        $role = Sentinel::findRoleByName('Admin');
        if (!$user->inRole('moe') && !$user->inRole('mo'))
           return $this->redirect($response, 'user.updateRole');

        return $this->view->render($response, 'App/account.twig', ["user"=>$user]);
    }

    public function updateRole(Request $request, Response $response)
    {
        $user = $this->user();
        if ($request->isPost()) {
            if ($request->getParam('role')=='moe' && !$user->inRole('moe'))  {
                $roleAttach = Sentinel::findRoleBySlug('moe');
                $roleDetach = Sentinel::findRoleBySlug('mo');
            }
            elseif($request->getParam('role')=='mo' && !$user->inRole('mo')) {
                $roleAttach = Sentinel::findRoleBySlug('mo');
                $roleDetach = Sentinel::findRoleBySlug('moe');
            }
            if ($roleAttach && $roleDetach){
                $roleDetach->users()->detach($user);
                $roleAttach->users()->attach($user);
                $this->flash('success', 'Votre role est changé');
                return $this->redirect($response, 'user.account');
            }
            $this->flash('danger', 'Votre role n\'a pas changé' );

            return $this->redirect($response, 'user.account');

        }
        return $this->view->render($response, 'App/updateRole.twig', ["user"=>$user]);
    }

    public function updateProfile(Request $request, Response $response)
    {
        $user = $this->user();
        if ($request->isPost()) {
            if ($request->getParam('email')){
                 $user->email = $request->getParam('email');
                 $user->save();
             }
             $this->flash('success', 'Vos informations ont bien été pris en compte');
             return $this->redirect($response, 'user.account');
        }

        $this->flash('danger', 'Un problème est survenu' );
        return $this->view->render($response, 'App/account.twig', ["user"=>$user]);
    }
}
