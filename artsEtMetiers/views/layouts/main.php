
<!-- Le template principale du site intranet -->
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
		    			<li class=""><a href="<?php echo BASE_URL.$data['pages'][3]['pag_url']; ?>"><?php echo $data['pages'][3]['pag_name'] ?>
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
		
		<div class="row-fluid">	
			<div class="span8">


					<?php echo $content_for_layout; ?>
			</div>
			<div class="span3 offset1 main_aside">
				<div class="row-fluid">
					<div class="span12">
						<div class="main_aside_user">
							<?php //echo 'débugage de auth session'; debug(Auth::$session, true); ?>
							<?php if(!empty(Auth::$session['use_checked']) && Auth::$session['use_checked'] == true): ?>
								<?php echo $this->img(Auth::$session['ava_url'], array('class' => 'img-polaroid img-avatar auto')); ?>
								<span class="text-success user_statut"><?php echo strtoupper(Auth::$session['use_login']); ?></span>
								<a class="btn btn-info" href="<?php echo BASE_URL.'/auth/edit/'.Auth::$session['use_id']; ?>">Editer profil</a><a class="btn btn-info" href="<?php echo BASE_URL.'/auth/logout'; ?>">Deconnexion</a>
							<?php else: ?>
								<?php echo $this->img('design/img/avatar.png', array('class' => 'img-polaroid img-avatar auto')); ?>
								<span class="text-error user_statut">Déconnecté</span>
								<a class="btn btn-info" href="<?php echo BASE_URL.'/auth/inscription'; ?>">Inscription</a><a class="btn btn-info" href="<?php echo BASE_URL.'/auth/connexion'; ?>">Connexion</a>
							<?php endif; ?>
						</div>
						<div class="main_aside_categories">
							<?php $data['categories'] = $this->layoutLoad('Blog', 'listCat'); ?>
							<?php //debug($data['categories']); ?>
							<ul class="nav nav-list">
								<li class="nav-header">Thèmes</li>
							    <?php foreach ($data['categories'] as $k => $v): current($v); ?>
									<li><a href="<?php echo BASE_URL.'/blog/cat/'.$v['cat_name']; ?>"><?php echo $v['cat_name']; ?></a></li>	
								<?php endforeach; ?>
							</ul>
						</div>
						<div class="main_aside_test">
							<h4>testez vous sur ..</h4>
							<?php $this->img('design/img/php.png', array('class' => 'matiere')); ?>
							<?php $exo_id = $this->layoutLoad('blog', 'findTest'); ?>
							<?php //debug($exo_id); ?>
							<a class="btn btn btn-success" href="<?php echo BASE_URL.'/blog/voir/'.$exo_id['art_id']; ?>">Essayez !</a>
						</div>
						<div>
							<h4>Sur le forum</h4>
							<?php $last = $this->layoutLoad('forum', 'lastReplies'); ?>
							<?php //debug($last); ?>
							<?php foreach ($last as $k => $v): ?> 
								<p><small><?php echo DateHelper::fr($v['rep_dateC'], array('delay' => true)); ?></small><br>
								<a href="<?php echo BASE_URL.'/forum/posts/'.$v['rep_id_subjects']; ?>"><small><em><?php echo $this->Truncate->fragment($v['rep_content'], 10); ?></em></small></a></p>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		</div>		
	</div>
	<script type="text/javascript" >
   		$(document).ready(function() { 
   						
   			mySettings = {
   				nameSpace: "bbcode",
   				markupSet: [
	   				{name:'Bold', key:'B', openWith:'[b]', closeWith:'[/b]'}, 
	     	 		{name:'Italic', key:'I', openWith:'[i]', closeWith:'[/i]'}, 
	      			{name:'Underline', key:'U', openWith:'[u]', closeWith:'[/u]'},
	      			{separator:'---------------' },
	      			{name:'Link', key:'L', openWith:'[url=[![Url]!]]', closeWith:'[/url]', placeHolder:'Your text to link here...'},
	      			{name:'Quotes', openWith:'[quote]', closeWith:'[/quote]'}, 
      				{name:'Code', openWith:'[code]', closeWith:'[/code]'} 
   				]
   			}

     		$(".markitup").markItUp(mySettings);
     		$('#emoticons a').click(function() {
        		emoticon = $(this).attr("title");
        		$.markItUp( { replaceWith:emoticon } );
    		});
    		SyntaxHighlighter.config.stripBrs = true;
    		SyntaxHighlighter.defaults['wrap-lines'] = true;
    		SyntaxHighlighter.all();
  		});
	</script>	
</body>

</html>
