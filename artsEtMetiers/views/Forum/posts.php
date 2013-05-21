<?php debug($posts); ?>

<a href="<?php  ?>"></a>

<table>
	<?php foreach ($posts as $k => $v): current($v); ?>
		<tr>
			<?php echo '<td>'.$v['rep_title'].'</td>'; ?></tr>
		<tr>		
			<?php echo '<td>zone avatar</td>'; ?>
			<?php echo '<td>'.$v['rep_content'].'</td>'; ?>
		</tr>
	<?php  endforeach; ?>
</table>