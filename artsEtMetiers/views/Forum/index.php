<?php //debug($section); ?>
<div class="ariane_lane">
	<span class="lane">Accueil</span>
</div>
<div class="mainforum">
	<table>
		<tr>
			<th>Forums</th>
			<th>Sujets</th>
			<th>Posts</th>
			<th>Derniers messages</th>
		</tr>
	<?php foreach ($section as $k => $v): current($v); ?>
		<tr>
			<td><a href="<?php echo BASE_URL.'/forum/section/'.$v['sec_id']; ?>"><?php echo $v['sec_name']; ?></a></td>
			<td>
				<?php $sub_count = $this->layoutLoad('forum', 'subCount', $v['sec_id'] ); ?>
				<?php echo $sub_count; ?>
			</td>
			<td>
				<?php $rep_count = $this->layoutLoad('forum', 'repCount', $v['sec_id'] ); ?>
				<?php echo $rep_count[0]['rep_count']; ?>
			</td>
			<td>Le 20/04 par Many</td>
		</tr>
	<?php endforeach; ?>
	</table>
<div>