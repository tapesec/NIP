<?php //debug($article); ?>

<?php foreach ($article as $k => $v): ?> 
	<h1><?php echo $v['art_title']; ?></h1>
	<p><?php echo $v['cat_name']; ?></p>
	<p><?php echo $this->Truncate->fragment($v['art_content'], 30); ?></p>
	<p><a href="<?php echo BASE_URL.'/blog/voir/'.$v['art_id']; ?>">Lire la suite &#9658</a></p>
	<p><?php echo $v['art_dateC']; ?></p>
<?php endforeach; ?> 
<?php echo $this->paginator('blog/index', 'Article'); ?>
<?php //debug(); ?>

