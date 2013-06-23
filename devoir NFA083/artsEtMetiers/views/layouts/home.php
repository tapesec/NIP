<!DOCTYPE>
<html>
<head>
	<meta charset="UTF-8">
	<title>Bienvenue chez Arts et métiers IT !</title>
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
	<div id="wrap">
	<div class="row-fluid">
		<div class="span12">
				
			<?php $data['pages'] = $this->layoutLoad('Blog', 'page'); ?>
		    <div class="navbar">
			    <div class="navbar-inner">
		    		<a class="brand" href="#"><?php echo ucfirst($this->request->controller); ?></a>
		    		<ul class="nav">
		    			<li class="divider-vertical"></li>
		    			<li class="active"><a href="<?php echo BASE_URL.$data['pages'][3]['pag_url']; ?>"><?php echo $data['pages'][3]['pag_name'] ?></a></li>
		    			<li class="divider-vertical"></li>
		    			<?php foreach ($data['pages'] as $k => $v): current($v); ?>
		    				<?php if($v['pag_name'] != 'Accueil') :?>
		    					<?php if($v['pag_name'] != 'Carte de visite' || isset(Auth::$session)): ?>
				    				<?php if($v['pag_name'] == ucfirst($this->request->controller)): ?>
				    					<li class="active"><a  href="<?php echo BASE_URL.$v['pag_url']; ?>"><?php echo $v['pag_name']; ?></a></li>
				    					<li class="divider-vertical"></li>
				    				<?php else: ?>
										<li><a href="<?php echo BASE_URL.$v['pag_url']; ?>"><?php echo $v['pag_name']; ?></a></li>
										<li class="divider-vertical"></li>
									<?php endif; ?>
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

				<?php $this->img('design/img/banner.jpg'); ?>
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
    					<?php $url = (isset(Auth::$session))?  '/parcours/voir' : '/auth/connexion' ; ?>
    					<li class="span3">
	    					<a href="<?php echo BASE_URL.$url; ?>" class="thumbnail">
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
	    					<?php $this->img('design/img/foruma.png'); ?>
	    				</a>
					    	<div class="caption">
								<h3>Le Forum</h3>
								<p>Formez une vrai communauté des étudiants du CNAM en département informatique, posez vos questions ou répondez à vos camarades. Echangez vos réalisations, retrouvez vous pour progressez plus facilement ensemble.</p>
								<p>
								<a class="btn btn-info" href="<?php echo BASE_URL.'/forum/index'; ?>">Participez !</a>
								</p>
							</div>
    					</li>
    					<?php $exo_id = $this->layoutLoad('blog', 'findTest'); ?>
    					<li class="span3">
	    					<a href="<?php echo BASE_URL.'/blog/voir/'.$exo_id['art_id']; ?>" class="thumbnail">
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
		<footer class="footer">
			<small>
				<div class="row-fluid container ">
					<div class="span2">
						<?php $this->img('design/img/twitter.png', array('class' => 'logo_twitter')); ?>
					</div>
					<div class="span6 offset1">
						<h4><i class="icon-white icon-wrench"></i> Liens utiles</h4>
						<p>Liens du CNAM : <a title="Lien national" href="http://formation-paris.cnam.fr">CNAM</a>,
								   <a title="Centre de Paris" href="http://formation-paris.cnam.fr">CNAM PARIS</a>,
								   <a title="Lien national" href="http://formation-paris.cnam.fr">Laboratoire CEDRIC</a>,
								   <a title="Lien national" href="http://formation-paris.cnam.fr">Département informatique du CNAM</a>.
								   </p>

						<p>Bibliographie .. <a title="Lien national" href="http://formation-paris.cnam.fr">Le site du zéro</a>,
								   <a title="Centre de Paris" href="http://formation-paris.cnam.fr">Développez.com</a>,
								   <a title="Lien national" href="http://formation-paris.cnam.fr">Comment ça marche</a>.
								   </p>

						<p>.. spécifique web : <a title="Lien national" href="http://formation-paris.cnam.fr">Grafikart</a>,
								   <a title="Centre de Paris" href="http://formation-paris.cnam.fr">Alsacréation</a>,
								   <a title="Lien national" href="http://formation-paris.cnam.fr">La ferme du web</a>.
								   </p>
						<div class="text-center hyper">		   
						<a class="btn btn-warning text-center" target="_blank" href="http://emploi-du-temps.cnam.fr/emploidutemps2">Consultez<br>L'HYPERPLANNING</a>		   
						</div>
					</div>
					<div class="span3">
						<div class="row-fluid">
							<div class="span12">
								<address>
									<small>
										<strong>CNAM Paris</strong><br>
										292 Rue Saint-Martin<br>
										75003 Paris<br>
										<abbr title="Numéro de téléphone">Tel : </abbr>01 40 27 20 00
									</small>
								</address>
							</div>
						</div>
						<div class="row-fluid">
							<div class="span 8">
								<address><small>
									<strong>Contact Webmaster</strong><br>
									<abbr title="Adresse mail">@ : </abbr>artsetmetiers@gmail.com
								</small></address>
							</div>
						
							<div class="span4">
								<?php $this->img('design/img/rss2.png'); ?>
							</div>
						</div>
						
					</div>


				</div>
				<div class="row-fluid">
					<div class="span12 text-center">Artsmetier.com - 2013. Site développé à l'occasion du projet de fin d'études NFA021</div>
				</div>
			</small>
		</footer>
	</div>
</body>

</html>