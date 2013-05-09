
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
	<?php debug(Auth::$session['use_login']); ?>
	<?php echo $this->session->flash(); ?>
	<?php $data['pages'] = $this->layoutLoad('Blog', 'page'); ?>
	<?php debug( $data['pages']); ?>
	<?php echo $content_for_layout; ?>


<aside>
	<div>
		<a href="<?php echo BASE_URL.'/auth/inscription'; ?>">Inscription</a><a href="<?php echo BASE_URL.'/auth/connexion'; ?>">Connexion</a>
	</div>


	<?php $data['categories'] = $this->layoutLoad('Blog', 'listCat'); ?>
	<?php debug($data['categories']); ?>

</aside>
</body>
</html>