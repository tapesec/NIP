<?php 
debug($menu);
?>
<nav>
	<ul>
		<?php foreach($menu as $k => $v): current($v)?>
		<li><a href="<?php echo BASE_URL.$v['pag_url']; ?>"><?php echo $v['pag_name'] ?></a></li>
		<?php endforeach; ?> 
	</ul>
</nav>

