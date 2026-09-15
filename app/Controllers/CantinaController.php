<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CantinaModel;
use CodeIgniter\HTTP\ResponseInterface;

class CantinaController extends BaseController
{
    protected $cantinaModel;

    public function __construct() {
        $this->cantinaModel = model('cantinaModel');
    }
    public function index()
    {
        helper(['form']);
        $cantina = service('cantina');
        $cantinaHeroes = $cantina->getOrGenerateOffers(auth()->user()->getPlayer()->id);
        return $this->render('front/cantina/index', ['cantinaHeroes' => $cantinaHeroes]);
    }

    public function refresh() {
        $cantina = service('cantina');
        $cantina->generateOffers(auth()->user()->getPlayer()->id);
        return $this->redirect('/cantina');
    }

    public function recrute($id = null) {

    }
}