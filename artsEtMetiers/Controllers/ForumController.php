<?php 
class ForumController extends Controller{

	public $helpers = array('Form', 'DateHelper'); //charge les helpers passé dans le tableau

	/**
	*@return la page d'accueil avec la liste des sections du forum
	**/
	public function index(){
		$this->layout = 'forum';
		$this->loadModel('Section');
		$data['section'] = $this->Section->find(array('where' => array('sec_online' => true)));
		$this->set('section', $data['section']);
		$this->render('index');
	}

	/**
	*
	**/
	public function section($id){
		$this->layout = 'forum';
		$this->loadModel('Subject');
		$data['subject'] = $this->Subject->find(array('fields' => 'sub_id, sub_title, sub_dateC, sec_name, use_id, use_login',
														'join' => array(
									 					'type' => 'LEFT OUTER JOIN',
									 					'table' => array('sections', 'users'),
									 					'condition' => array('sub_id_sections = sec_id', 'sub_id_author = use_id')),
													  'where' => array('sec_id' => $id,
													  				   'sub_online' => true)));
		//debug($data['subject']);
		
		$this->set('subjects', $data['subject']);
		$this->render('sujets');
	}

	/**
	*
	**/
	public function posts($id, $id_edit=null){
		
		$this->loadModel('Subject');
		$this->loadModel('Replie');
		if($this->request->is('GET')){
			$data['posts'] = $this->Subject->find(array('fields' => 'rep_id, rep_title, rep_content, rep_dateC, rep_dateM, rep_id_author, use_login, use_id, sub_title, sub_content, sub_id_author, sub_id, sec_id, sec_name, ava_id, ava_url',
														'join' => array(
															'type' => 'LEFT OUTER JOIN',
															'table' => array('replies', 'users', 'sections', 'avatars'),
															'condition' => array('rep_id_subjects = sub_id', 'rep_id_author = use_id', 'sub_id_sections = sec_id', 'ava_id_user = use_id')),
														'where' => array('sub_id' => $id)));
			if(isset($id_edit) && !empty($id_edit)){
			$data['edit'] = $this->Replie->find(array('fields' => 'rep_id, rep_title, rep_content',
													  'where' => array('rep_id' => $id_edit)));
			$this->set('posts', array('list' => $data['posts'], 'edition' => $data['edit']));
			
			}else{
				$this->set('posts', $data['posts']);
			}
			$this->layout = 'forum';
			$this->render('posts');
		}
		
		if($this->request->is('PUT')){

			$this->request->data['rep_id_editor'] = Auth::$session['use_id'];
			$this->request->data['rep_dateM'] = DateHelper::now();
			if($this->Replie->update($this->request->data, array('where' => array('rep_id' =>$this->request->data['rep_id'])))){
				$this->session->setFlash('Votre réponse a bien été modifié !');
				//$this->layout = 'default';
			}else{
				$this->session->setFlash('Corrigez vos érreurs !');
			}
			$this->redirect('forum/posts/'.$id);
		}elseif($this->request->is('POST')){
			$this->request->data['rep_id_author'] = Auth::$session['use_id'];
			$this->request->data['rep_id_subjects'] = $id;
			$this->request->data['rep_dateC'] = DateHelper::now();
			if($this->Replie->save($this->request->data)){
				//$this->layout = 'default';
				$this->session->setFlash('Votre réponse a bien été posté !');
			}else{
				
				$this->session->setFlash('Corrigez vos érreurs !');
			}
			$this->redirect('forum/posts/'.$id);
		}
		
		
	}
	
	/**
	*@return un formulaire pour rédiger et sauvegarder un nouveau message
	**/
	public function addSubject(){
		$this->loadModel('Subject');
		if($this->request->is('GET')){
			$this->layout = 'forum';
			$this->render('addSubject');
		}elseif($this->request->is('POST')){

		}elseif($this->request->is('PUT')){

		}
	}
	
	
	
	/**
	*@return supprimer une réponse
	**/
	public function delReply($id){
		$this->loadModel('Replie');
		if($this->Replie->delete(array('rep_id' => $id))){
			$this->session->setFlash('Votre message a bien été supprimé !');
			
		}else{
			$this->session->setFlash('Une erreur est survenu');
		}
		$this->redirect($this->referer);
		
	}
	

	/** 
	*@param $id tous les sujet qui ont comme clé étrangere l'id de la section (methode de layout) pour action index
	*@return le nombre de sujet correspondant à la section identifié par l'id fourni en paramètre
	**/
	public function subCount($id){
		$this->loadModel('Subject');
		$count = $this->Subject->count(array('where' => array('sub_id_sections' => $id)));
		return $count;
	}

	/**
	*@param $id l'identifiant de la section pour compter le nombre de réponse affiliée (methode de layout) pour action index
	*@return le nombre de réponses correspondant à la section identifié par l'id fourni en paramètre
	**/
	public function repCount($id){
		$this->loadModel('Subject');
		$count = $this->Subject->find(array('fields' => 'count(rep_id) as rep_count',
														'join' => array(
															'type' => 'LEFT OUTER JOIN',
															'table' => array('replies','sections' ),
															'condition' => array('rep_id_subjects = sub_id', 'sub_id_sections = sec_id')),
														'where' => array('sec_id' => $id)));
		return $count;
	}

	/** 
	*@param $id tous les sujet qui ont comme clé étrangere l'id de la section (methode de layout) pour action section
	*@return le nombre de sujet correspondant à la section identifié par l'id fourni en paramètre
	**/
	public function repCount2($id){
		$this->loadModel('Replie');
		$count = $this->Replie->count(array('where' => array('rep_id_subjects' => $id)));
		return $count;
	}
}