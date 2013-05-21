<?php debug($section); ?>

<table>
	<tr>
		<td>Forums</td>
		<td>Sujets</td>
		<td>Posts</td>
		<td>Derniers messages</td>
	</tr>
<?php foreach ($section as $k => $v): current($v); ?>
	<tr>
		<td><a href="<?php echo BASE_URL.'/forum/section/'.$v['sec_id']; ?>"><?php echo $v['sec_name']; ?></a></td>
		<td>4</td>
		<td>50</td>
		<td>Le 20/04 par Many</td>
	</tr>
<?php endforeach; ?>
</table>