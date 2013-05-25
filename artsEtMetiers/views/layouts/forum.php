
<!-- Le template principale du site intranet -->
<!DOCTYPE>
<html>
<head>
	<meta charset="UTF-8">
	<title>le site intranet de la DOPC</title>
	<?php echo $this->link('css', 'layout'); ?>
	<?php echo $this->link('javascript', 'modernizer'); ?>
	<?php echo $this->link('javascript', 'jquery'); ?>
	<?php echo $this->link('javascript', 'style'); ?>
</head>
<body>
	<?php echo $this->session->flash(); ?>
	<header class="banner"></header>
	<nav class="onglet">
		<ul>
		<?php $data['pages'] = $this->layoutLoad('Blog', 'page'); ?>
		<?php //debug( $data['pages']); ?>
		<?php foreach ($data['pages'] as $k => $v): current($v); ?>
			<li><a href="<?php echo BASE_URL.$v['pag_url']; ?>"><?php echo $v['pag_name']; ?></a></li>
		<?php endforeach; ?>
		</ul>
	</nav>
	<section class="main_content">
		
			

				<?php echo $content_for_layout; ?>

			
		
	</section>
	<footer>
		<p>Arts et Métiers 2013 </br>Projet de fin de semestre 2013 </br>NFAO83 et NFA021 </br>CNAM Paris centre</p>
	</footer>
</body>

</html>




