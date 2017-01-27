<?php

namespace App\Controller;

use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Cartalyst\Sentinel\Native\Facades\Sentinel;
use App\Model\Entreprise;
use App\Model\AppelOffre;
use App\Model\User;

class OffreAppelController extends Controller
{

  public function create(Request $request, Response $response)
  {
    $user = $this->user();

    if ($request->isPost()) {
      if ($request->getParam('nom') && $request->getParam('description')){
        $appeloffre = new AppelOffre();
        $appeloffre->nom = $request->getParam('nom');
        $appeloffre->description = $request->getParam('description');
        $appeloffre->save();
        $user->appelOffres()->save($appeloffre);
      }
      $this->flash('danger', 'Votre role n\'a pas changé' );

      return $this->redirect($response, 'user.account');

    }
    return $this->view->render($response, 'App/createOffre.twig');
  }

  public function show(Request $request, Response $response, $args)
  {
    $user = $this->user();
    $id = $args['ao_id'];
    $appelOffre = AppelOffre::find($id)->first();
    echo "<pre>";
    $userOffre = User::find($appelOffre->id)->first();
    $entreprise = $userOffre->entreprise()->first();
    return $this->view->render($response, 'App/showOffre.twig', ["userOfre"=>$userOffre,"appelOffre" => $appelOffre, 'entreprise' => $entreprise]);
  }

  public function addDocument(Request $request, Response $response)
  {
    $user = $this->user();
    print_r($_FILES);


    foreach ($_FILES as $type=>$value) {
      $structure = $_SERVER['DOCUMENT_ROOT'].'/public/uploads/'. $user->id . '/' . $type;
      if (!is_dir($_SERVER['DOCUMENT_ROOT'].'/public/uploads/'. $user->id . '/' . $type)) {
        if (!mkdir($structure, 0777, true))
        $this->flash('danger', 'probleme de droit' );
      }
      if (move_uploaded_file($_FILES[$type]['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/public/uploads/'. $user->id . '/' . $type . '/' .uniqid().".pdf")) {
        $this->flash('success', 'Le fichier est uploader' );
      }
      else {
        $this->flash('danger', 'Un problème est survenu' );
      }
      return $this->redirect($response, 'user.account');
    }
  }

}
