<?php

class ParcoursController extends Controller{

	public $helpers = array('Form', 'Truncate', 'DateHelper', 'Markitup');


	/**
	*@param $id l'identifiant de la carte de visite à regarder
	*@return la carte de visite de l'utilisateur connecté
	**/
	public function voir($identifiant=null){
		//si pas d'intentifiant passé en paramètre alors on affichera la page de l'utilisateur connecté
			
		$this->loadModel('User');
		$this->loadModel('Udiplome');
		$this->loadModel('Uunite');
		$id = (isset($identifiant))? $identifiant : Auth::$session['use_id'];
		
		$check = $this->User->find(array('where' => array('use_id' => $id)));
		if(empty($check)){
			$this->e404('Cette page n\'existe pas veuillez suivre les liens de navigation');
		}
		$user = $this->User->find(array('join' => array(
											'type' => 'LEFT OUTER JOIN',
											'table' => array('udiplomes', 'diplomes'),
											'condition' => array('use_id = udi_use_id', 'dip_id = udi_dip_id')),
										'where' => array('use_id' => $id)));
			
		$diplomes = $this->Udiplome->find(array('join' => array(
													'type' => 'LEFT OUTER JOIN',
													'table' => array('diplomes', 'dunites', 'unites'),
													'condition' => array('udi_dip_id = dip_id', 'dun_dip_id = dip_id', 'dun_uni_id = uni_id')),
												'where' => array('udi_use_id' => $id)));


		$unite_get = $this->Uunite->find(array('join' => array(
													'type' => 'LEFT OUTER JOIN',
													'table' => 'unites',
													'condition' => 'uun_uni_id = uni_id'),
												'where' => array('uun_use_id' => $id, 'uun_uni_statut' => true)));
		
		$unite_progress = $this->Uunite->find(array('join' => array(
													'type' => 'LEFT OUTER JOIN',
													'table' => 'unites',
													'condition' => 'uun_uni_id = uni_id'),
												'where' => array('uun_use_id' => $id, 'uun_uni_statut' => false)));

		$this->layout = 'main';
		$this->set('visite', array('user' => $user, 'diplomes' => $diplomes, 'unite_get' => $unite_get, 'unite_progress' => $unite_progress));
		$this->render('voir');
	}

	/**
	*met à jour les informations de la carte de visite de l'utilisateur
	**/
	public function edit(){
		$this->loadModel('Udiplome');
		$this->loadModel('Uunite');
		$this->loadModel('Diplome');
		$this->loadModel('Unite');
		$this->loadModel('User');
		
		$user = $this->Udiplome->find(array('where' => array('udi_use_id' => Auth::$session['use_id'])));
		$user2 = $this->Uunite->find(array('where' => array('uun_use_id' => Auth::$session['use_id'], 'uun_uni_statut' => true)));
		$user3 = $this->Uunite->find(array('where' => array('uun_use_id' => Auth::$session['use_id'], 'uun_uni_statut' => false)));
		$diplome = $this->Diplome->find();
		$unite = $this->Unite->find();
		$obs = $this->User->find(array('fields' => 'use_obs', 'where' => array('use_id' => Auth::$session['use_id'])));
		//$obs = Sanitize::show($obs);
		$this->set('enseignement', array('diplome' => $diplome, 'Unite' => $unite, 'diplome_user' => $user, 'unite_user_success' => $user2, 'unite_user_progress' => $user3, 'obs' => $obs));
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
		
		Request::$handMade = false;
		
		$this->session->setflash('Merci d \'avoir completez vos informations', 'success');
		$this->redirect($this->referer);
	}



	/**
	*@return sauvegarde ou met à jour les UV obtenus par l'utilisateur connecté en fonction des checkboxs des UV du cnam cochés ou non
	**/
	public function addUniteValid($bool){
		debug($bool);
		$bool = ($bool==1)? true : false;
		
		$this->loadModel('Uunite');
		//on récupère tous les diplomes obtenus par l'user
		$listUnite = $this->Uunite->find(array('fields' => 'uun_uni_id',
												   'where' => array('uun_use_id' => Auth::$session['use_id'], 'uun_uni_statut' => $bool),
												   'order' => 'uun_id ASC'));
		
		//conversion du tableau associatif $listdiplome en tableau simple pour pouvoir comparer avec les cases coché ou non dans le formulaire
		foreach ($listUnite as $k => $v) {
			$check[] = $v['uun_uni_id'];
		}
		Request::$handMade = true;
		//si l'utilisateur a obtenu des diplomes ..
		if(!empty($check)){
			/* ..on verifie que des cases été cochés quand le visiteur a validé le formulaire de selection des diplomes dans la page edit
			sinon on transphorme son formulaire en tableau vide pour comparer avec les diplomes stocké en base de données*/
			$this->request->data['uun_uni_id'] = (!isset($this->request->data['uun_uni_id']) || empty($this->request->data['uun_uni_id']))? array() : $this->request->data['uun_uni_id']; 
			// .. on effectue la comparaison dabord dans un sens pour voir si il y a moins de case cohé dans le formulaire des diplomes que de diplome en BDD
			$diff = array_diff($check, $this->request->data['uun_uni_id']);
			//debug($diff);

			// $diff return les ids des diplomes qu'il y a en + dans la bdd
			// .. si il y a plus de diplomes attribué à l'user en BDD que dans son formulaire ..
			if(!empty($diff)){
				foreach ($diff as $k => $v) {
					//on supprime les diplomes en trop
					//debug($v);
					
					$this->Uunite->delete(array('uun_use_id' => Auth::$session['use_id'], 'uun_uni_id' => $v, 'uun_uni_statut' => $bool));
				}
			}
			// on fait la comparaison à présent dans l'autre sens
			$diff = array_diff($this->request->data['uun_uni_id'], $check);
			// $diff renvoie cette fois les diplomes en plus dans le formulaire que ce qu'il possede dans la BDD
			//debug($diff);
			//die();
			if(!empty($diff)){
				//si il y en a on les insere donc en BDD
				foreach ($diff as $k => $v) {
					$this->Uunite->save(array('uun_use_id' => Auth::$session['use_id'], 'uun_uni_id' => $v, 'uun_uni_statut' => $bool));
				}
			}
		}else{
		//si l'utilisateur n'a pas de diplome obtenus en base de données ..	
			if(!empty($this->request->data['uun_uni_id'])){
				// et si des diplomes sont coché dans le formulaire
				$data = $this->request->data['uun_uni_id'];
				foreach ($data as $k => $v) {
					//on les inseres
					$this->Uunite->save(array('uun_use_id' => Auth::$session['use_id'], 'uun_uni_id' => $v, 'uun_uni_statut' => $bool));	
				}
			}
		}
		
		Request::$handMade = false;
		//die();
		$this->session->setflash('Merci d \'avoir completez vos informations', 'success');
		$this->redirect($this->referer);

	}

	/**
	*@return met à jour le message de présentation de l'utilisateur
	**/
	public function addObservation(){
		$this->loadModel('User');
		
		$this->request->data = Sanitize::clean($this->request->data);
		/*debug($this->request->data);
		die();*/

		if($this->User->update($this->request->data, array('where' => array('use_id' => Auth::$session['use_id'])))) {
			$this->session->setflash('Modification bien effectué '.Auth::$session['use_login'], 'success');
			$this->redirect($this->referer);
		}else{
			$this->session->setflash('La modification a échoué');
			$this->redirect($this->referer);
		}
	}







}


?>