<?php $data['home'] = $this->layoutLoad('Backoff', 'home'); ?>
<?php $home = current($data['home']); ?>
<!-- Le template du back office -->
<!DOCTYPE>
<html>
<head>
	<meta charset="UTF-8">
	<title>Panneau d'administration du site Arts et métiers</title>
	<?php echo $this->link('css', 'layout'); ?>
	<?php echo $this->link('javascript', 'modernizer'); ?>
	<?php echo $this->link('javascript', 'jquery'); ?>
	<?php echo $this->link('javascript', 'style'); ?>
</head>
<body>
	<?php //echo Auth::$session['use_login']; ?>
	<?php echo $this->session->flash(); ?>
	
	<a href="<?php echo BASE_URL.$home['pag_url']; ?>" ><?php echo 'Retour '.$home['pag_name']; ?></a>
	
	<?php echo $content_for_layout; ?>

</body>
</html>