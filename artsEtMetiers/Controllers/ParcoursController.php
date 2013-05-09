<?php

class ParcoursController extends Controller{


	/**
	*
	**/
	public function index(){
		$this->loadModel('Matiere');
		$data['matiere'] = $this->Matiere->find();
		$this->set('matieres', $data['matiere']);
		$this->layout = 'parcours';
		$this->render('index');
	}
}


?>