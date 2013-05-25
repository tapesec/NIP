<?php if(isset($articles)){
	debug($articles[1]);
	$listCat = $articles[1];
	$article = current(current($articles));
	debug($article); 
} ?>

<?php echo $this->Form->create('backoff/addArticle/'.$id= (isset($article['art_id']))? $article['art_id'] : false, array('type' => 'POST', 'name' => 'art_id', 'value' =>  $id)); ?>
<p>
	<?php echo $this->Form->input(array('name' => 'art_cat_id', 'type' => 'select', 'label' => 'Catégorie de l\'article', 'value' => $value = (isset($article['art_cat_id']))? $article['art_cat_id'] : '', 'list' => array($listCat))); ?>
</p>
<p>
	<?php echo $this->Form->input(array('name' => 'art_title', 'type' => 'text', 'label' => 'Titre de l\'article', 'value' => $value = (isset($article['art_title']))? $article['art_title'] : '')); ?>
</p>
<p>
	<?php $this->Form->input(array('name' => 'art_content', 'type' => 'textarea','value' => $value = (isset($article['art_content']))? $article['art_content'] : '' ,'message' => true)); ?>
</p>
<p>
	<?php $this->Form->input(array('name' => 'art_slot', 'type' => 'select', 'label' => 'Selectionnez l\'emplacement', 'value' => $value = (isset($article['art_slot']))? $article['art_slot'] : '', 'list' => array('blog' => 'blog', 'accueil' => 'accueil'), 'message' => true)); ?>
</p>
<p>
	<?php $this->Form->input(array('name' => 'art_online', 'type' => 'checkbox', 'label' => 'Mettre en ligne ?', 'value' => $value = (isset($article['art_online']))? $article['art_online'] : '', 'message' => true)); ?>
</p>
<p>
	<?php $this->Form->end(array('type' => 'submit', 'value' => 'Valider')); ?>
</p>

