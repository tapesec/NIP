<?php //debug($v); ?>
<?php $v = current($v); ?>
<h1><?php echo $v['art_title']; ?></h1>
<div class="border">Par <span class="auteur">Many</span>
<?php echo dateHelper::fr($v['art_dateC'], array('delay' => true)); ?>
<span class="auteur"><?php echo $v['cat_name']; ?></span>
<span class="commentaires">2 commentaires</span>
</div>
<p><?php echo $this->Truncate->fragment($v['art_content'], 30); ?></p>

	