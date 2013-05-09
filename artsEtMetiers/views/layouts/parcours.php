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
	<?php $data['pages'] = $this->layoutLoad('Blog', 'page'); ?>
	<?php debug( $data['pages']); ?>
	<?php echo $content_for_layout; ?>

	
</body>
</html>

