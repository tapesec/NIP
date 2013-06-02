<?php if(isset($articles)){
	debug($articles[1]);
	$listCat = $articles[1];
	$article = current(current($articles));
	debug($article); 
} ?>

<div class="addArticle">
	<?php echo $this->Form->create('backoff/addArticle/'.$id= (isset($article['art_id']))? $article['art_id'] : false, array('type' => 'POST', 'name' => 'art_id', 'value' =>  $id)); ?>

	<?php echo $this->Form->input(array('name' => 'art_cat_id', 'type' => 'select', 'label' => 'Catégorie de l\'article', 'value' => $value = (isset($article['art_cat_id']))? $article['art_cat_id'] : '', 'list' => array($listCat))); ?>

	<?php echo $this->Form->input(array('name' => 'art_title', 'type' => 'text', 'label' => 'Titre de l\'article', 'value' => $value = (isset($article['art_title']))? $article['art_title'] : '')); ?>

	<?php $this->Form->input(array('name' => 'art_content', 'type' => 'textarea','value' => $value = (isset($article['art_content']))? $article['art_content'] : '' , 'rows' => 15, 'message' => true)); ?>

	<?php $this->Form->input(array('name' => 'art_slot', 'type' => 'select', 'label' => 'Selectionnez l\'emplacement', 'value' => $value = (isset($article['art_slot']))? $article['art_slot'] : '', 'list' => array('blog' => 'blog', 'accueil' => 'accueil'), 'message' => true)); ?>

	<?php $this->Form->input(array('name' => 'art_online', 'type' => 'checkbox', 'label' => 'Mettre en ligne ?', 'value' => $value = (isset($article['art_online']))? $article['art_online'] : '', 'class' => 'checkbox', 'message' => true)); ?>

	<?php $this->Form->end(array('type' => 'submit', 'value' => 'Valider', 'class' => 'btn btn-info submit')); ?>
</div>
<script type="text/javascript">
		tinymce.init({
 		selector: "textarea",
 		plugins: ["code image"],
 		
 		toolbar:  "insertfile styleselect bold italic underline | blockquote bullist code | link image",
 		menu : "none",
 		
	});
</script>

