<?php debug($subjects); ?>

<table>
	<tr>
		<td>Auteur</td>
		<td>Sujets</td>
		<td>Réponses</td>
		<td>dernières réponses</td>
	</tr>
	<?php foreach ($subjects as $k => $v): current($v); ?>
		<tr>
			<?php echo '<td><a href="'.BASE_URL.'/auth/show/'.$v['use_id'].'" >'.$v['use_login'].'</a></td>'; ?>
			<?php echo '<td><a href="'.BASE_URL.'/forum/posts/'.$v['sub_id'].'" >'.$v['sub_title'].'</a></td>'; ?>
			<?php echo '<td>4</td>'; ?>
			<?php echo '<td>Par x le 14/05</td>'; ?>
		</tr>
	<?php endforeach; ?>

</table>