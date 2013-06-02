<?php $data['home'] = $this->layoutLoad('Backoff', 'home'); ?>
<?php $home = current($data['home']); ?>
<!-- Le template du back office -->
<!-- Le template principale du site intranet -->
<!DOCTYPE>
<html>
<head>
	<meta charset="UTF-8">
	<title>le site intranet de la DOPC</title>
	<?php echo $this->link('css', 'bootstrap.min'); ?>
	<?php echo $this->link('css', 'layout'); ?>
	<?php echo $this->link('javascript', 'bootstrap.min'); ?>
	<?php echo $this->link('javascript', 'modernizer'); ?>
	<?php echo $this->link('javascript', 'jquery'); ?>
	<?php echo $this->link('javascript', 'style'); ?>
	<?php echo $this->link('javascript', 'tinymce/tinymce.min'); ?>
</head>
<body>
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span12">
				
				<?php $data['pages'] = $this->layoutLoad('Blog', 'page'); ?>
			    <div class="navbar">
				    <div class="navbar-inner">
			    		<a class="brand" href="#"><?php echo  ($this->request->action == 'index')? 'Blog' : ucfirst($this->request->action); ?></a>
			    		<ul class="nav">
			    			<li><a href="<?php echo BASE_URL.$home['pag_url']; ?>" ><?php echo $home['pag_name']; ?></a></li>
			    			<li><a href="<?php echo BASE_URL.'/blog'; ?>" >Accueil du site</a></li>
							<?php echo '<li class="dropdown pull-right">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown">
											<strong>'.ucfirst(Auth::$session['use_login']).'</strong>
												<b class="caret"></b>
											</a>
											<ul class="dropdown-menu">
												<li>Editer</li>
												<li>Déconnecter</li>
											</ul>
										</li>'; ?>

			    		</ul>
			    	</div>
				</div>
				<?php //echo Auth::$session['use_login']; ?>
				<?php echo $this->session->flash(); ?>

			</div>
		</div>
		<div class="row-fluid">
			<div class="span12">
				<?php echo $content_for_layout; ?>
			</div>
		</div>		
	</div>	
</body>
</html>	