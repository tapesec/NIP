<?php
class BackoffController extends Controller{

	public $helpers = array('Form', 'DateHelper'); //charge les helpers passé dans le tableau

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
			//die('PUT');
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
		//die('POST');
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
	*@param $id l'identifiant de la section à supprimer
	*@return supprime la section et tous les sujets et réponses des sujets associés à la section 
	**/
	public function delSection($id){
		$this->loadModel('Section');
		$this->loadModel('Subject');
		$this->loadModel('Replie');
		if($this->Section->delete(array('sec_id' => $id))){
			if($this->Subject->delete(array('sub_id_sections' => $id))){
			    $s_id = $this->Subject->find(array('fields' => 'sub_id',
													 'where' => array('sub_id_sections' => $id)));
				debug($s_id);
				
				foreach($s_id as $k => $v){
					foreach($v as $kk => $vv){
						debug($vv);
						if(!$this->Replie->delete(array('rep_id_subjects' => $vv))){
						  	$this->session->setFlash('Suppression des réponses impossibles !');
							$this->redirect($this->referer);

						}
					}
				}
				$this->session->setFlash('Suppression bien accomplie !');
				$this->redirect($this->referer);
				
			}else{
				$this->session->setFlash('Suppression des sujets impossibles !');
				$this->redirect($this->referer);
			}
		}else{
			$this->session->setFlash('Suppression de la sectionimpossible !');
			$this->redirect($this->referer);
		}
	}


	/**
	*@return la liste des utilisateurs du site inscris
	**/
	public function listUsers(){
		
		$this->loadModel('User');
		$data['list'] = $this->User->find();
		$this->layout = 'back';
		$this->set('users', $data['list']);
		$this->render('listUsers');
	}


	/**
	*@param $id l'identifiant de l'utilisateur à éditer
	*@return modifie l'utilisateur
	**/
	public function editUser($id){
		$this->loadModel('User');
		
		if($this->request->is('GET')){
			$this->layout = 'back';
			$user_edit = $this->User->find(array('fields' => 'use_id, use_login, use_statut, use_checked',
											 'where' => array('use_id' => $id)));
		}elseif($this->request->is('PUT')){
			if($this->User->update($this->request->data, array('where' => array('use_id' => $id)))){
				$this->session->setFlash('Modification bien effectué !');
				$this->redirect('backoff/listUsers');
			}
			
			//die();
		}
		$this->set('edit', $user_edit);
		$this->render('editUser');

	}

	/**
	*
	*
	**/
	public function listCat($id=null){
		
		
		$this->loadModel('Categorie');
		if($this->request->is('GET')){
			$this->layout = 'back';
			$data['categorie'] = $this->Categorie->find();
			if(isset($id) && !empty($id)){
				$data['edit'] = $this->Categorie->find(array('where' => array('cat_id' => $id)));
				$this->set('categories', array('list' => $data['categorie'], 'edit' => $data['edit']));
			}else{
				$this->set('categories', $data['categorie']);
			}
		}elseif($this->request->is('PUT')){
			
			if($this->Categorie->update($this->request->data, array('where' => array('cat_id' => $id)))){
				$this->session->setFlash('Catégorie bien modifiée !');
				$this->redirect('backoff/listCat');
			}else{
				$this->session->setFlash('Erreur de modification !');
				$this->redirect('backoff/listCat');
			}

		}elseif($this->request->is('POST')){
			if($this->Categorie->save($this->request->data)){
				$this->session->setFlash('Catégorie bien ajouté !');
				$this->redirect($this->referer);
			}else{
				$this->session->setFlash('Erreur de sauvegarde !');
			}
			
		}
		$this->render('listCat');
	}

	/**
	*
	**/
	public function delCat($id){
		$this->loadModel('Categorie');
		if($this->Categorie->delete(array('cat_id' => $id))){
			$this->session->setFlash('Catégorie bien supprimé !');
			$this->redirect($this->referer);
		}else{
			$this->session->setFlash('Impossible de supprimer la catégorie !');
			$this->redirect($this->referer);
		}
	}





	/**
	*@return le nom et l'url pour retourner en page d'accueil (layout)
	**/
	public function home(){
		$this->loadModel('Page');
		$data['home'] = $this->Page->find(array('fields' => 'pag_name, pag_url',
									'where' => array('pag_type' => 'back',
													 'pag_name' => 'Interface administration')));
		return $data['home'];
	}

	/**
	*@param $id l'identifiant du diplome à editer
	**/
	public function diplome($id=null){
		$this->loadModel('Diplome');
		if($this->request->is('GET')){
			$this->layout = 'back';
			$data['diplome'] = $this->Diplome->find();
			if(isset($id) && !empty($id)){
				$data['edit'] = $this->Diplome->find(array('where' => array('dip_id' => $id)));
				$this->set('diplomes', array('list' => $data['diplome'], 'edit' => $data['edit']));
			}else{
				$this->set('diplomes', $data['diplome']);
			}
		}elseif($this->request->is('PUT')){
			
			if($this->Diplome->update($this->request->data, array('where' => array('dip_id' => $id)))){
				$this->session->setFlash('Diplome bien modifiée !', 'success');
				$this->redirect('backoff/diplome');
			}else{
				$this->session->setFlash('Erreur de modification !');
				$this->redirect('backoff/diplome');
			}

		}elseif($this->request->is('POST')){
			if($this->Diplome->save($this->request->data)){
				$this->session->setFlash('Diplome bien ajouté !', 'success');
				$this->redirect($this->referer);
			}else{
				$this->session->setFlash('Erreur de sauvegarde !', 'error');
			}
			
		}
		$this->render('Diplome');
	}

	/**
	*@param $id l'identifiant du diplome à supprimer
	**/
	public function delDiplome($id){
		$this->loadModel('Diplome');
		if($this->Diplome->delete(array('dip_id' => $id))){
			$this->session->setFlash('Diplome bien supprimé !', 'success');
			$this->redirect($this->referer);
		}else{
			$this->session->setFlash('Impossible de supprimer ce diplome !', 'error');
			$this->redirect($this->referer);
		}

	}


	/**
	*@param $id l'identifiant du diplome à editer
	**/
	public function unite($id=null){
		$this->loadModel('Unite');
		if($this->request->is('GET')){
			$this->layout = 'back';
			$data['unite'] = $this->Unite->find();
			if(isset($id) && !empty($id)){
				$data['edit'] = $this->Unite->find(array('where' => array('uni_id' => $id)));
				$this->set('unites', array('list' => $data['unite'], 'edit' => $data['edit']));
			}else{
				$this->set('unites', $data['unite']);
			}
		}elseif($this->request->is('PUT')){
			
			if($this->Unite->update($this->request->data, array('where' => array('uni_id' => $id)))){
				$this->session->setFlash('Unite d\'enseignement bien modifiée !', 'success');
				$this->redirect('backoff/unite');
			}else{
				$this->session->setFlash('Erreur de modification !', 'error');
				$this->redirect('backoff/unite');
			}

		}elseif($this->request->is('POST')){
			if($this->Unite->save($this->request->data)){
				$this->session->setFlash('UV bien ajouté !', 'success');
				$this->redirect($this->referer);
			}else{
				$this->session->setFlash('Erreur de sauvegarde !', 'error');
			}
			
		}
		$this->render('Unite');
	}

	/**
	*@param $id l'identifiant du diplome à supprimer
	**/
	public function delUnite($id){
		$this->loadModel('Unite');
		if($this->Unite->delete(array('uni_id' => $id))){
			$this->session->setFlash('UV bien supprimé !', 'success');
			$this->redirect($this->referer);
		}else{
			$this->session->setFlash('Impossible de supprimer ceT UV !', 'error');
			$this->redirect($this->referer);
		}

	}


	
}