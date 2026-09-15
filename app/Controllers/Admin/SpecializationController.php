<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Controllers\Specialization;
use App\Models\SpecializationModel;

class SpecializationController extends BaseController
{
    protected $layout = "back";
    private $specialization = null;
    public function __construct() {
        $this->specializationModel = new SpecializationModel();
    }

    public function index()
    {
        helper('form');
        $specializations = $this->specializationModel->findAll();
        return $this->render('admin/specialization/index', ['specializations' => $specializations]);
    }

    public function create() {
        $data = $this->request->getPost();
        $specialization->fill($data);
        $saveOk =$this->specializationModel->save($specialization);
        if ($saveOk) {
            $this->success('Specialisation ajouté');
        } else {
            $this->error('Une erreur est survenue, la specialisation n\'est pas ajoutée');
        }
        return $this->redirect('admin/specialization');
    }

    public function update() {
        $data = $this->request->getPost();
        $specialization = model('SpecializationModel');
        $specialization->fill($data);
        $saveOk = $this->specializationModel->save($specialization);
        if ($saveOk) {
            $this->success('Specialisation modifé');
        } else {
            $this->error('Une erreur est survenue, la specialisation n\est pas modifié.');
        }
        return $this->redirect('admin/specialization');
    }
    public function delete() {
        $id = $this->request->getGet('id');
        if ($this->specializationModel->delete($id)) {
            $this->success('Specialisation supprimé');
        } else {
            $this->error('Erreur lors de la suppression de la specialisation');
        }
        return $this->redirect('admin/specialization');
    }
}
