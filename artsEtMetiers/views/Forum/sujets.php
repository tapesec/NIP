<?php debug($subjects); ?>

<div class="ariane_lane">
	<span class="lane"><a href="<?php echo BASE_URL.'/forum/index';?>">Accueil</a> >> <?php echo $subjects[0]['sec_name']; ?></span>
	
	<span class="auth">
		<?php if(!empty(Auth::$session['use_checked']) && Auth::$session['use_checked'] == true): ?>
			<a class="add" href="<?php echo BASE_URL.'/forum/addSubject'; ?>">Ajouter un sujet</a>
		<?php else: ?>
			<a class="add" href="<?php echo BASE_URL.'/auth/connexion'; ?>">Connectez vous !</a>
		<?php endif; ?>
	</span>
	
</div>
<div class="mainforum">
	<table>
		<tr>
			<th>Auteur</th>
			<th>Sujets</th>
			<th>Réponses</th>
			<th>dernières réponses</th>
		</tr>
	<?php foreach ($subjects as $k => $v): current($v); ?>
		<tr>
			<?php echo '<td><a href="'.BASE_URL.'/auth/show/'.$v['use_id'].'" >'.$v['use_login'].'</a></td>'; ?>
			<td><a href="<?php echo BASE_URL.'/forum/posts/'.$v['sub_id']; ?>"><?php echo $v['sub_title']; ?></a></td>
			<td>
				<?php $rep_count = $this->layoutLoad('forum', 'repCount2', $v['sub_id'] ); ?>
				<?php echo $rep_count; ?>
			</td>
			<td>Le 20/04 par Many</td>
		</tr>
	<?php endforeach; ?>
	</table>
<div>