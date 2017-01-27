<?php

namespace App\Controller;

use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Model\Entreprise;
use App\Model\AppelOffre;
use App\Model\User;


class AppController extends Controller
{
    public function home(Request $request, Response $response)
    {
      $appelOffres = AppelOffre::all();
      $appelOffresReturn=[];
      foreach ($appelOffres as $key => $appelOffre) {
        $appelOffre=$appelOffre;
        $appelOffre->user = User::where('id',$appelOffre->user_id)->first();
        $appelOffre->entreprise = $appelOffre->user->entreprise()->first();
        $appelOffresReturn[]=$appelOffre;
      }

        return $this->view->render($response, 'App/home.twig',['appelOffres'=>$appelOffresReturn]);
    }
}
