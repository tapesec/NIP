<?php
class BackoffController extends Controller{

	public $helpers = array('Form'); //charge les helpers passé dans le tableau

	/**
	*@return le menu du panneau d'administration du back office
	**/
	public function index(){
		$this->layout='back';
		$this->loadModel('Page');
		$data = $this->Page->find(array('fields' => 'pag_name, pag_url',
								'where' => array('pag_type' => 'back'),
								'order' => 'pag_id ASC'));
		$this->set('menu', $data);
		$this->render('index');
	}

	/**
	*
	**/
	public function listArticle(){
		$this->layout='back';
		$this->loadModel('Article');
		$data = $this->Article->find(array('order' => 'art_id ASC'));
		$this->set('article', $data);
		$this->render('listArticle');
	}

	/**
	*@param $id l'identifiant de l'article à modifier
	*@return une page contenant un outil d'édition de texte
	**/
	public function addArticle($id=null){
		
		$this->loadModel('Article');
		$this->loadModel('Categorie');

		if($this->request->is('GET')){
			$this->layout = 'back';
			if(isset($id) && !empty($id)){
				$data_article = $this->Article->find(array('fields' => 'art_id, art_title, art_content, art_cat_id, art_online, art_slot, art_dateM, art_dateC',
									   'where' => array('art_id' => $id)));
				$listCat = $this->Categorie->find(array('fields' => 'cat_id, cat_name'));
				if(!empty($data_article)){
					$this->set('articles', array($data_article, $listCat));
				}	
			}else{
				$listCat = $this->Categorie->find(array('fields' => 'cat_id, cat_name'));
				$this->set('listCat', $listCat);
			}
		}elseif($this->request->is('PUT')){
			debug($this->request->data);
			$date = new DateTime('NOW', new DateTimeZone('EUROPE/Paris'));
			$this->request->data['art_dateM'] = $date->format('Y-m-d H:i');
			$this->request->data['art_online'] = (isset($this->request->data['art_online']))? $this->request->data['art_online'] : 0;
			if($this->Article->update($this->request->data, array('where' => array(
											'art_id' => $id)))){
				//die();
				$this->session->setFlash('Article bien modifié !');
			}
			$this->redirect('backoff/listArticle');

			
		}elseif($this->request->is('POST')){
			$date = new DateTime('NOW', new DateTimeZone('EUROPE/Paris'));
			$this->request->data['art_dateC'] = $date->format('Y-m-d H:i');
			if($this->Article->save($this->request->data)){
				$this->session->setFlash('Article bien enregistré !');
				$this->redirect('backoff/index');
			}else{
				die('haaaanan');
			}
		}
		$this->render('addArticle');
	}

	
	/**
	*@param $id l'identifiant de l'article à supprimer
	*@return suprrime l'article et redirige vers la liste des articles
	**/
	public function delArticle($id){
		$this->loadModel('Article');
		$this->Article->delete(array('art_id' => $id));
		$this->session->setFlash('Article bien supprimé !');
		$this->redirect($this->referer);
	}


	/**
	*@param $id l'identifiant de la section à editer
	**/
	public function forum($id=null){
		$this->layout = 'back';
		$this->loadModel('Section');
		if($this->request->is('GET')){
			$data['section'] = $this->Section->find();
			if(isset($id) && !empty($id)){
				$data['edit'] = $this->Section->find(array('where' => array('sec_id' => $id)));
				$this->set('sections', array($data['section'], $data['edit']));
			}else{
				$this->set('sections', $data['section']);
			}
		}elseif($this->request->is('PUT')){
			if(empty($this->request->data['sec_online'])){
				$this->request->data['sec_online'] = 0;
			}
			if($this->Section->update($this->request->data, array('where' => array('sec_id' => $id)))){
				$this->session->setFlash('Section bien modifié !');
				$this->redirect($this->referer);
			}else{
				$this->session->setFlash('Erreur de modification !');
				$this->redirect($this->referer);
			}

		}elseif($this->request->is('POST')){
			if($this->Section->save($this->request->data)){
				$this->session->setFlash('Section bien ajouté !');
				$this->redirect($this->referer);
			}else{
				$this->session->setFlash('Erreur de sauvegarde !');
			}
			
		}
		$this->render('forum');
	}


	/**
	*
	**/
	public function listUsers($id=null){
		
		$this->loadModel('User');
		if($this->request->is('GET')){
			$data['users'] = $this->User->find();$this->layout = 'back';
			if(isset($id)){
				$data['edit'] = $this->User->find(array('where' => array('use_id' => $id)));
				$this->set('users', array($data['users'], $data['edit']));
			}else{
				$this->set('users', $data['users']);
			}
		}elseif($this->request->is('PUT')){
			if($this->User->update($this->request->data, array('where' => array('use_id' => $id)))){
				$this->session->setFlash('Membre bien edité');
				$this->redirect($this->referer);
			}else{
				$this->session->setFlash('La modification a échoué');
			}
		}
		$this->render('listUsers');
	}

	/**
	*@return le nom et l'url pour retourner en page d'accueil (layout)
	**/
	public function home(){
		$this->loadModel('Page');
		$data['home'] = $this->Page->find(array('fields' => 'pag_name, pag_url',
									'where' => array('pag_type' => 'back',
													 'pag_name' => 'Accueil backoffice')));
		return $data['home'];
	}


	
}