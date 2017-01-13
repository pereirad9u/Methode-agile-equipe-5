<?php

namespace App\Controller;

use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;


class AccountController extends Controller
{
    public function home(Request $request, Response $response)
    {
        $user=$this->user();
        return $this->view->render($response, 'App/account.twig', ["user"=>$user]);
    }
}
