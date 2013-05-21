<?php 
class ForumController extends Controller{


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
	public function posts($id){
		$this->layout= 'forum';
		$this->loadModel('Replie');
		$data['posts'] = $this->Replie->find(array('fields' => 'rep_title, rep_content, rep_dateC, rep_dateM, use_login, use_id',
														'join' => array(
															'type' => 'LEFT OUTER JOIN',
															'table' => array('subjects', 'users'),
															'condition' => array('rep_id_subjects = sub_id', 'rep_id_author = use_id')),
														'where' => array('sub_id' => $id)));
		$this->set('posts', $data['posts']);
		$this->render('posts');
	}
}