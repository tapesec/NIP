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
	<?php //echo Auth::$session['use_login']; ?>
	<?php echo $this->session->flash(); ?>
	<?php $data['pages'] = $this->layoutLoad('Blog', 'page'); ?>
	<?php debug( $data['pages']); ?>
	<?php foreach ($data['pages'] as $k => $v): current($v); ?>
		<a href="<?php echo BASE_URL.$v['pag_url']; ?>"><?php echo $v['pag_name']; ?></a>
	<?php endforeach; ?>
	<?php echo $content_for_layout; ?>


<aside>
	<?php echo 'débugage de auth session'; debug(Auth::$session, true); ?>
	<?php if(!empty(Auth::$session['use_checked']) && Auth::$session['use_checked'] == true): ?>
	<div>
		<a href="<?php echo BASE_URL.'/auth/edit/'.Auth::$session['use_id']; ?>">Editer profil</a><a href="<?php echo BASE_URL.'/auth/logout'; ?>">Deconnexion</a>
	</div>
	<?php else: ?>
	<div>
		<a href="<?php echo BASE_URL.'/auth/inscription'; ?>">Inscription</a><a href="<?php echo BASE_URL.'/auth/connexion'; ?>">Connexion</a>
	</div>
	<?php endif; ?>