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
</head>
<body>
	<div class="row-fluid">
		<div class="span12">
			<?php $data['pages'] = $this->layoutLoad('Blog', 'page'); ?>
		    <div class="navbar">
			    <div class="navbar-inner">
		    		<a class="brand" href="#"><?php echo  ($this->request->action == 'index')? 'Forum' : ucfirst($this->request->action); ?></a>
		    		<ul class="nav">
		    			<li class=""><a href="<?php echo BASE_URL.$data['pages'][3]['pag_url']; ?>"><?php echo $data['pages'][3]['pag_name'] ?>
		    			<?php foreach ($data['pages'] as $k => $v): current($v); ?>
			    			<?php if($v['pag_name'] != 'Accueil') :?>
			    				<?php if($v['pag_name'] == ucfirst($this->request->controller)): ?>
			    					<li class="active"><a  href="<?php echo BASE_URL.$v['pag_url']; ?>"><?php echo $v['pag_name']; ?></a></li>
			    					<li class="divider-vertical"></li>
			    				<?php else: ?>
									<li><a href="<?php echo BASE_URL.$v['pag_url']; ?>"><?php echo $v['pag_name']; ?></a></li>
									<li class="divider-vertical"></li>
								<?php endif; ?>
							<?php endif; ?>
						<?php endforeach; ?>
						<?php //debug(Auth::$session); ?>
						<?php if(isset(Auth::$session)): ?>
							<?php echo '<li class="dropdown pull-right">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown">
											<strong>'.ucfirst(Auth::$session['use_login']).'</strong>
												<b class="caret"></b>
											</a>
											<ul class="dropdown-menu">
												<li><a href="#">Editer</a></li>
												<li><a href="#">Déconnecter</a></li>
											</ul>
										</li>'; ?>
						<?php endif; ?>
		    		</ul>
		    	</div>
			</div>
			<?php echo $this->session->flash(); ?>
		</div>
	</div>
	<div class="container-fluid">
		
		<div class="row-fluid">

			<div class="span12">
				<?php echo $content_for_layout; ?>
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




