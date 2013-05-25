
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
		<article>
			

				<?php echo $content_for_layout; ?>

			
		</article>
	
	
		<aside>
			<div class="menu_droite">
				<div class="titre_menu_droite connecte"></div>
				
				

				<?php //echo 'débugage de auth session'; debug(Auth::$session, true); ?>
				<?php if(!empty(Auth::$session['use_checked']) && Auth::$session['use_checked'] == true): ?>
					<?php echo $this->img(Auth::$session['ava_url'], array('class' => 'avatar')); ?>
					<span class="users"><?php echo Auth::$session['use_login']; ?></span>
					<a class="btn yellow" href="<?php echo BASE_URL.'/auth/edit/'.Auth::$session['use_id']; ?>">Editer profil</a><a class="btn yellow" href="<?php echo BASE_URL.'/auth/logout'; ?>">Deconnexion</a>
				
				<?php else: ?>
					<?php echo $this->img('design/img/avatar.png', array('class' => 'avatar')); ?>
					<span class="users">Déconnecté</span>
					<a class="btn yellow" href="<?php echo BASE_URL.'/auth/inscription'; ?>">Inscription</a><a class="btn yellow" href="<?php echo BASE_URL.'/auth/connexion'; ?>">Connexion</a>
				
				<?php endif; ?>
			</div>
			<div class="menu_droite themes">
				<?php $data['categories'] = $this->layoutLoad('Blog', 'listCat'); ?>
				<?php //debug($data['categories']); ?>
				<div class="titre_menu_droite image_titre_themes"></div>
					<ul>
						<?php foreach ($data['categories'] as $k => $v): current($v); ?>
							<li><a href="<?= BASE_URL.'/blog/cat/'.$v['cat_name']; ?>"><?= $v['cat_name']; ?></a></li>	
						<?php endforeach; ?>
					</ul>

				<div class="clear"></div>
			</div>
			<div class="menu_droite">
				<div class="titre_menu_droite forum"></div>
				<p>La fonction require() contrairement à la fonction include soulevera une erreur fatal en cas d’absence du fichier passé en paramètre ...</p>
				<p>J’essaye de faire une div de 500px de large et la positionner en absolute mais ...</p>
			</div>
			<div class="menu_droite">
				<div class="titre_menu_droite testez"></div>
				<?php $this->img('design/img/php.png', array('class' => 'matiere')); ?>
			</div>
		</aside>
		<div class="clear"></div>
	</section>
	<footer>
		<p>Arts et Métiers 2013 </br>Projet de fin de semestre 2013 </br>NFAO83 et NFA021 </br>CNAM Paris centre</p>
	</footer>
</body>

</html>
