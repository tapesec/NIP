<?php
class DemoController extends Controller{
	

	public function index(){

		$data = array(array('cat' => 'sites intranet',
							'non' => 'dspap',
							'url' => 'test url'),
					  array('cat' => 'sites intranet',
					  		'non' => 'dopc',
					  		'url' => 'autres url'),
					   array('cat' => 'sites intranet',
					  		'non' => 'dcpj',
					  		'url' => 'autrs ul'),
					    array('cat' => 'sites d\'urgences',
					  		'non' => 'dcpaf',
					  		'url' => 'autr url'),
					     array('cat' => 'sites d\'urgences',
					  		'non' => 'dostl',
					  		'url' => 'autres url'),
					      array('cat' => 'sites externe',
					  		'non' => 'alcool',
					  		'url' => 'autres url'));
		$this->set('test', $data);
		$this->render('index');
	}

	public function hello($name){
		$this->set('name', $name);
		$this->render('hello');
	}

	public function voir($id){
		$this->loadModel('Article');
		$data = $this->Article->find(array('where' => array('id' => $id)));
		if(!empty($data)){
			$this->set('article', $data);
			$this->render('voir');
		}else{
			$this->e404('Article introuvable');
		}
	}

	public function getList(){
		$this->loadModel('Article');
		new model();
		/*$data = $this->Article->find(array('limit' => ' LIMIT 10'));
		$this->set('liste', $data);
		$this->render('getList');*/
	}
	
	public function	add($request){
		$request =array('title'  => 'Mon premier titre avec la méthode save',
						'content' 	  => 'un premier contenu avec insert',
					    'date_article' => Date('d/m/y'));
		$this->loadModel('Article');
		$this->Article->save($request);
	}
}