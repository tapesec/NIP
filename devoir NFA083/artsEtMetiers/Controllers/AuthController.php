<?php 

class AuthController extends Controller{

	public $helpers = array('Form', 'DateHelper', 'Truncate'); //charge les helpers passé dans le tableau
	

	/**
	*@return affiche un formulaire d'inscription en cas de requete GET
	*@return insert un nouveau usagé apres vérification courante des données saisies
	**/
	public function inscription(){
		$this->request->data = Sanitize::clean($this->request->data);
		if($this->request->is('POST')){
			$this->loadModel('User');
			$this->loadModel('Avatar');
			$check_user = $this->User->find(array(
										'where' => array(
											'use_login' => $this->request->data['use_login'])));
			if(!empty($check_user)){
				$this->session->setFlash('Ce pseudo est déjà pris !');
				$this->redirect($this->referer);
			}else{
				debug($check_user);
				$this->request->data['use_statut'] = 1;
				$this->request->data['use_checked'] = 1;
				$this->request->data['use_dateI'] = DateHelper::now();
				$this->request->data['use_dateC'] = DateHelper::now();
				if($this->User->save($this->request->data)){
					$use_id = $this->User->find(array('fields' => 'use_id',
											'where' => array('use_login' => $this->request->data['use_login'])));
					Request::$handMade = true;
					$this->Avatar->save(array('ava_url' => 'avatar/default.png', 'ava_id_user' => $use_id[0]['use_id']));

					Request::$handMade = false;
					$this->session->setFlash('Inscription réussi !', 'success');
					$this->redirect('blog/index');
				}else{
					$this->session->setFlash('Veuillez corriger vos erreurs');
					$this->redirect($this->referer);
				}
			}
		}elseif($this->request->is('GET')){
			$this->layout = 'main';
		}
		
	}

	/**
	*@return affiche un formulaire de connexion
	**/
	public function connexion(){
		if($this->request->is('GET')){
			$this->layout = 'main';
			$this->render('connexion');
		}elseif($this->request->is('POST')){
			$this->loadModel('User');
			$check_user = $this->User->find(array('join' => array('type' => 'LEFT OUTER JOIN',
												  				  'table' => 'avatars',
												  				  'condition' => 'use_id = ava_id_user'),
										'where' => array(
											'use_login' => $this->request->data['use_login'],
											'use_checked' => true,
											'use_password1' => $this->request->data['use_password1'])));
			//debug($check_user);
			//die();
				if($check_user){

					Request::$handMade = true;
					if(!$this->User->update(array('use_dateC' => DateHelper::now()), array('where' => array('use_login' => $this->request->data['use_login'])))) {
						$this->session->setFlash('Connexion impossible veuillez retenter ou contacter l\'administrateur');
						$this->redirect($this->referer());
					}
					Request::$handMade = false;
					Auth::load($check_user);
					$this->session->setFlash('BONJOUR '.$this->request->data['use_login'].' !', 'success');
					$this->redirect('blog/index');
				}else{
					$this->session->setFlash('login ou mot de passe incorrect !', 'error');
					$this->redirect($this->referer);
				}
				
		}
	}

	/**
	*@return detruit la super variable de session auth et redirige en page d'accueil
	**/
	public function logout(){
		Auth::destroy();
		$this->session->setFlash('AU REVOIR !', 'success');
		
		$this->redirect('blog/index');
	}


	/**
	*@param $id l'identifiant du profil à éditer
	*return met à jour la base de données si des données sont modifié dans le formulaire
	**/
	public function edit(){
		$this->request->data = Sanitize::clean($this->request->data);
		$this->loadModel('User');
	
		if($this->request->is('GET')){
			
			$user_data = $this->User->find(array('fields' => 'use_id, use_login, use_mail, use_prenom, use_profession,
															 use_residence, use_etudes, use_password1, use_password2,
															  use_dateI, use_dateC, use_statut, ava_id, ava_url, ava_id_user',
													'join' => array('type' => 'LEFT OUTER JOIN',
																	'table' => 'avatars',
																	'condition' => 'use_id = ava_id_user'),
													'where' => array(
													'use_id' => Auth::$session['use_id'])));
			if(!empty($user_data)){
				$this->set('user', $user_data);
			}
			$this->layout = 'main';
			$this->render('edit');	
		}elseif($this->request->is('PUT')){
			//die('ca fonctionne !');
			if($this->User->update($this->request->data, array('where' => array('use_id' => Auth::$session['use_id'])))){
				$this->session->setFlash('Informations mises à jour merci !');
				$this->redirect($this->referer);
			}else{
				$this->session->setFlash('Une erreur est survenu veuillez réessayer ou contacter l\'administrateur');
				$this->redirect($this->referer);
			}
			//die();
			

		}					
	}

	/**
	*
	**/
	public function uploadAvatar($id){
		$this->layout='';
		$this->loadModel('Avatar');
		echo 'request action';
		debug($this->request->data);
		echo 'request file';
		debug($this->request->file);
		echo 'session :';
		debug($_SESSION);
		$avatar = (!empty($this->request->file['avatar']))? $this->request->file['avatar'] : '';
		
		if(preg_match('/[.jpg|.png|.gif]$/', $avatar['name'])
		  && $avatar['size'] <= $this->request->data['max_size']
		  && !$avatar['error']){
			$ext = explode('.', $avatar['name']);
		  	$file = 'avatar'.DS.Auth::$session['use_login'].'.'.end($ext);
			$dest = WEBROOT.DS.'img'.DS;
			if(move_uploaded_file($avatar['tmp_name'], $dest.$file)){
				$this->request->data['ava_url'] = preg_replace('#\\\#', '/', $file);
				debug($this->request->data);

				if($this->Avatar->update($this->request->data, array('where' => array('ava_id_user' => $id)))){
					debug($this->request->data['ava_url']);
					
					Auth::load($this->request->data);
					
					$this->session->setFlash('Avatar bien mis à jour !');
					$this->redirect($this->referer);
				}else{
					$this->session->setFlash('La mise à jour de votre avatar a échoué');
					$this->redirect($this->referer);
				}
			}else{
				die('pas cool');
			}
		}else{
			die('bizare');
		}
		die();
	}
}