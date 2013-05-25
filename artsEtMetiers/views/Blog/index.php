<div class="blog">
<?php //debug($article); ?>

<?php foreach ($article as $k => $v): ?> 
	<h1><?php echo $v['art_title']; ?></h1>
	<div class="border">Par <span class="auteur">Many</span>
	<?php echo dateHelper::fr($v['art_dateC'], array('delay' => true)); ?>
	<span class="auteur"><?php echo $v['cat_name']; ?></span>
	<span class="commentaires">2 commentaires</span>
	</div>
	<p><?php echo $this->Truncate->fragment($v['art_content'], 30); ?></p>
	<p><span class="article_suite"><a href="<?php echo BASE_URL.'/blog/voir/'.$v['art_id']; ?>">Lire la suite &#9658</a></span></p>
	
<?php endforeach; ?> 
<?php echo $this->paginator('blog/index', 'pagination'); ?>
<?php //debug(); ?>
</div>

