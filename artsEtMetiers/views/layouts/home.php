<!DOCTYPE>
<html>
<head>
	<meta charset="UTF-8">
	<title>le site intranet de la DOPC</title>
	<?php echo $this->link('css', 'bootstrap.min'); ?>
	<?php echo $this->link('markitup/skins/simple', 'style', 'css'); ?>
	<?php echo $this->link('markitup/sets/bbcode', 'style', 'css'); ?>
	<?php echo $this->link('css', 'shCore'); ?>
	<?php echo $this->link('css', 'shThemeDefault'); ?>
	<?php echo $this->link('css', 'layout'); ?>
	<?php echo $this->link('javascript', 'modernizer'); ?>
	<?php echo $this->link('javascript', 'jquery'); ?>
	<?php echo $this->link('markitup', 'jquery.markitup', 'javascript'); ?>
	<?php echo $this->link('markitup/sets/bbcode', 'set', 'javascript'); ?>
	<?php echo $this->link('javascript', 'shCore'); ?>
	<?php echo $this->link('javascript', 'shBrushPhp'); ?>
	<?php echo $this->link('javascript', 'style'); ?>
	<?php echo $this->link('javascript', 'bootstrap.min'); ?>
	<?php //echo $this->link('javascript', 'tinymce/tinymce.min'); ?>
</head>
<body>
	<div class="row-fluid">
		<div class="span12">
				
			<?php $data['pages'] = $this->layoutLoad('Blog', 'page'); ?>
		    <div class="navbar">
			    <div class="navbar-inner">
		    		<a class="brand" href="#"><?php echo ucfirst($this->request->controller); ?></a>
		    		<ul class="nav">
		    			<li class="active"><a href="<?php echo BASE_URL.$data['pages'][3]['pag_url']; ?>"><?php echo $data['pages'][3]['pag_name'] ?>
		    			<?php foreach ($data['pages'] as $k => $v): current($v); ?>
		    				<?php if($v['pag_name'] != 'Accueil') :?>
		    				<?php if($v['pag_name'] == ucfirst($this->request->controller)): ?>
		    					<li class="active"><a  href="<?php echo BASE_URL.$v['pag_url']; ?>"><?php echo $v['pag_name']; ?></a></li>
		    				<?php else: ?>
								<li><a href="<?php echo BASE_URL.$v['pag_url']; ?>"><?php echo $v['pag_name']; ?></a></li>
							<?php endif; ?>
						<?php endif; ?>	
						<?php endforeach; ?>
						<?php if(!empty(Auth::$session) && Auth::$session['use_statut'] == 10): ?>
							<li><a href="<?php echo BASE_URL.'/backoff/index'; ?>">Administration du site</a></li>
						<?php endif; ?>	
		    		</ul>
		    	</div>
			</div>
			<?php echo $this->session->flash(); ?>
		</div>	
	</div>
	<div class="container-fluid">
		
		<div class="row-fluid banner_area">
			<div class="span12 banner">


			</div>	
		</div>
			<div class="row-fluid">
				<div class="span12">
				    <ul class="thumbnails">
    					<li class="span3">
	    					<a href="<?php echo BASE_URL.'/blog/index'; ?>" class="thumbnail">
	    					<?php $this->img('design/img/loupe.png'); ?>
	    				</a>
					    	<div class="caption">
								<h3>Un Blog</h3>
								<p>Retrouvez y l'actualité du CNAM mais aussi des articles relatif à la programmation informatique et plus générlament aux nouvelles technologies</p>
								<p>
								<a class="btn btn-info" href="<?php echo BASE_URL.'/blog/index'; ?>">Lisez !</a>
								</p>
							</div>
    					</li>
    					<li class="span3">
	    					<a href="<?php echo BASE_URL.'/visite/index'; ?>" class="thumbnail">
	    					<?php $this->img('design/img/cv.png'); ?>
	    				</a>
					    	<div class="caption">
								<h3>Votre carte de visite</h3>
								<p>Vous pouvez parametrez tout un tas d'information relatif à votre parcours au CNAM, les matieres suivis les diplômes obtenus, votre milieu professionnel et plein d'autres choses pour vous reconnaitre.</p>
								<p>
								<a class="btn btn-info" href="<?php echo BASE_URL.'/visite/voir'; ?>">Montrez !</a>
								</p>
							</div>
    					</li>
    					<li class="span3">
	    					<a href="<?php echo BASE_URL.'/forum/index'; ?>" class="thumbnail">
	    					<?php $this->img('design/img/forum.png'); ?>
	    				</a>
					    	<div class="caption">
								<h3>Le Forum</h3>
								<p>Formez une vrai communauté des étudiants du CNAM en département informatique, posez vos questions ou répondez à vos camarades. Echangez vos réalisations, retrouvez vous pour progressez plus facilement ensemble.</p>
								<p>
								<a class="btn btn-info" href="<?php echo BASE_URL.'/forum/index'; ?>">Participez !</a>
								</p>
							</div>
    					</li>
    					<li class="span3">
	    					<a href="<?php echo BASE_URL.'/blog/voir'; ?>" class="thumbnail">
	    					<?php $this->img('design/img/test.png'); ?>
	    				</a>
					    	<div class="caption">
								<h3>Testez vous</h3>
								<p>Régulièrement des exercices de programmation serons proposés, repondez-y en donnant la solution la plus élégante possible. <blockquote>"Il y a le bon codeur et le mauvais codeur".</blockquote></p>
								<p>
								<a class="btn btn-info" href="<?php echo BASE_URL.'/blog/voir'; ?>">Essayez !</a>
								</p>
							</div>
    					</li>
    				</ul>
				</div>
			</div>
	</div>
</body>

</html>