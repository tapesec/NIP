<?php 

class AuthController extends Controller{

	public $helpers = array('Form');
	//public $components = array('Auth');
	

	/**
	*@return affiche un formulaire d'inscription en cas de requete GET
	*@return insert un nouveau usagé apres vérification courante des données saisies
	**/
	public function inscription(){
		
		if($this->request->is('POST')){
			$this->loadModel('User');
			$check_user = $this->User->find(array(
										'where' => array(
											'use_login' => $this->request->data['use_login'])));
			if(!empty($check_user)){
				$this->session->setFlash('Ce pseudo est déjà pris !');
				$this->redirect($this->referer);
			}else{
				debug($check_user);
				if($this->User->save($this->request->data)){
					$this->session->setFlash('Inscription completed !');
					$this->redirect('blog/index');
				}else{
					$this->session->setFlash('Impossible de sauvagarder ce formulaire retentez la manipulation ou contactez le webmaster');
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
		}elseif($this->request->is('POST')){
			$this->loadModel('User');
			$check_user = $this->User->find(array(
										'where' => array(
											'use_login' => $this->request->data['use_login'],
											'checked' => true,
											'use_password1' => $this->request->data['use_password1'])));
			if($check_user){
				Auth::load($check_user);
				$this->redirect('blog/index');
			}
		}
	}
}

?>