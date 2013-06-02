<?php

class ParcoursController extends Controller{

	public $helpers = array('Form', 'Truncate', 'DateHelper');


	/**
	*@param $id l'identifiant de la carte de visite à regarder
	*@return la carte de visite de l'utilisateur connecté
	**/
	public function voir($id=null){
		
		$this->layout = 'main';
		$this->set('visite');
		$this->render('voir');
	}

	/**
	*@param $id l'identifiant de la carte de visite à configurer
	**/
	public function edit($id){
		$this->loadModel('Diplome');
		$this->loadModel('Unite');
		
		$diplome = $this->Diplome->find();
		$unite = $this->Unite->find();

		$this->set('enseignement', array('diplome' => $diplome, 'Unite' => $unite));
		$this->layout='main';
		$this->render('edit');
	}

	/**
	*@return sauvegarde ou met à jour les diplomes obtenu par l'utilisateur connecté en fonction des checkboxs des diplomes du cnam cochés ou non
	**/
	public function addDiplome(){
		$this->loadModel('Udiplome');
		//on récupère tous les diplomes obtenus par l'user
		$listDiplome = $this->Udiplome->find(array('fields' => 'udi_dip_id',
												   'where' => array('udi_use_id' => Auth::$session['use_id']),
												   'order' => 'udi_id ASC'));
		
		//conversion du tableau associatif $listdiplome en tableau simple pour pouvoir comparer avec les cases coché ou non dans le formulaire
		foreach ($listDiplome as $k => $v) {
			$check[] = $v['udi_dip_id'];
		}
		Request::$handMade = true;
		//si l'utilisateur a obtenu des diplomes ..
		if(!empty($check)){
			/* ..on verifie que des cases été cochés quand le visiteur a validé le formulaire de selection des diplomes dans la page edit
			sinon on transphorme son formulaire en tableau vide pour comparer avec les diplomes stocké en base de données*/
			$this->request->data['udi_dip_id'] = (!isset($this->request->data['udi_dip_id']) || empty($this->request->data['udi_dip_id']))? array() : $this->request->data['udi_dip_id']; 
			// .. on effectue la comparaison dabord dans un sens pour voir si il y a moins de case cohé dans le formulaire des diplomes que de diplome en BDD
			$diff = array_diff($check, $this->request->data['udi_dip_id']);
			//debug($diff);

			// $diff return les ids des diplomes qu'il y a en + dans la bdd
			// .. si il y a plus de diplomes attribué à l'user en BDD que dans son formulaire ..
			if(!empty($diff)){
				foreach ($diff as $k => $v) {
					//on supprime les diplomes en trop
					//debug($v);
					
					$this->Udiplome->delete(array('udi_use_id' => Auth::$session['use_id'], 'udi_dip_id' => $v));
				}
			}
			// on fait la comparaison à présent dans l'autre sens
			$diff = array_diff($this->request->data['udi_dip_id'], $check);
			// $diff renvoie cette fois les diplomes en plus dans le formulaire que ce qu'il possede dans la BDD
			//debug($diff);
			//die();
			if(!empty($diff)){
				//si il y en a on les insere donc en BDD
				foreach ($diff as $k => $v) {
					$this->Udiplome->save(array('udi_use_id' => Auth::$session['use_id'], 'udi_dip_id' => $v));
				}
			}
		}else{
		//si l'utilisateur n'a pas de diplome obtenus en base de données ..	
			if(!empty($this->request->data['udi_dip_id'])){
				// et si des diplomes sont coché dans le formulaire
				$data = $this->request->data['udi_dip_id'];
				foreach ($data as $k => $v) {
					//on les inseres
					$this->Udiplome->save(array('udi_use_id' => Auth::$session['use_id'], 'udi_dip_id' => $v));	
				}
			}
		}
		
		
		//die();
		Request::$handMade = false;
		
		$this->session->setflash('Merci d \'avoir completez vos informations', 'success');
		$this->redirect($this->referer);
	}



	/**
	*
	**/



}


?>