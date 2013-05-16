<?php //debug($article); ?>


<table>
	<tr>
		<td>Identifiant</td>
		<td>Titre</td>
		<td>Crée le</td>
		<td>Modifié le</td>
		<td>Action</td>
		<td>Statut</td>
	</tr>
	<?php foreach($article as $k => $v): current($v); ?>
	<tr>
		<td><?php echo $v['art_id']; ?></td>
		<td><?php echo $v['art_title']; ?></td>
		<td><?php echo $v['art_dateC']; ?></td>
		<td><?php echo $v['art_dateM']; ?></td>
		<td><?php echo '<a href="'.BASE_URL.'/backoff/addArticle/'.$v['art_id'].'">Editer</a>'; ?></td>
		<td><?php echo '<a href="'.BASE_URL.'/backoff/delArticle/'.$v['art_id'].'">Supprimer</a>'; ?></td>
		<td><?php echo $v['art_online']; ?></td>	
	</tr>
	<?php endforeach; ?>

</table>