<?php
class BlogController extends Controller{
	
	public $helpers = array('Truncate');
	//public $components = array('Auth');

	public $paginate = array('table' => 'Article',
							 'limit' => 2);

	
	/**
	*@return $data['article'] l'article à mettre en page d'accueil
	*@return $data['carrousel'] les 4 photos du carrousel en page d'accueil
	**/
	public function index($page=1){
		//chargement du helper pour afficher un extrait d'article dans la page d'accueil du blog
		

		$this->loadModel('Article');
		$this->layout = 'main';
		$limit = $this->paginate($page, 'Article');
		$data = $this->Article->find(array('fields' => 'art_id, art_title, art_content, art_dateC, cat_name',
									 'where' => array(
									 	'art_slot' => 'blog',
									 	'art_online' => true),
									 'join' => array(
									 	'type' => 'LEFT OUTER JOIN',
									 	'table' => 'categories',
									 	'condition' => 'art_cat_id = cat_id'),
									 'limit' => $limit));
		
		$this->set('article', $data);
		$this->render('index');
	}

	/**
	*@param $id affiche l'intégralité de l'article spécifié par l'id
	**/
	public function voir($id=null){
		
		$this->loadModel('Article');
		$this->layout = 'main';
		if(!$id){
			$this->e404('Il y a une erreur dans votre url');
		}

		$data = $this->Article->find(array('where' => array(
									'art_id' => $id)));
		if(empty($data)){
			$this->e404('La page n\'existe pas ou plus');
		}
		$this->set('article', $data);
		$this->render('voir');


	}



	/** (methode de layout)
	*@return la liste des catégories à afficher
	**/
	public function listCat(){
		$this->loadModel('Categorie');
		$data['categories'] = $this->Categorie->find();
		return $data['categories'];
	}

	/** (methode de layout)
	*@return la liste des liens vers les différentes pages de mon site
	**/
	public function page(){
		$this->loadModel('Page');
		$data['pages'] = $this->Page->find();
		return $data['pages'];
	}

	public function ajaxTest(){
		
		$data = 'hello';
		$this->set('test', $data);
		return $data;
	}	
}