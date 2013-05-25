<?php debug($posts); ?>
<?php if(isset($posts['edition']) && !empty($posts['edition'])){
	$rep = current($posts['edition']);
}else{
	$posts['list'] = $posts;
}
debug($posts['list']);
?>



<div class="ariane_lane">
	<span class="lane"><a href="<?php echo BASE_URL.'/forum/index';?>">Accueil</a> >> <a href="<?php echo BASE_URL.'/forum/section/'.$posts['list'][0]['sec_id']; ?>"><?php echo $posts['list'][0]['sec_name']; ?></a> >> <?php echo $posts['list'][0]['sub_title']; ?></span>
	
	<span class="auth">
		<?php if(empty(Auth::$session['use_checked'])): ?>
			<a class="add" href="<?php echo BASE_URL.'/auth/connexion'; ?>">Connectez vous !</a>
		<?php endif; ?>
	</span>
</div>


<div class="mainforum">
<table>
	<tr>
		<?php echo '<td colspan="2"><h2>'.$posts['list'][0]['sub_title'].'</h2>'; ?>
			<?php if(isset(Auth::$session['use_checked']) && Auth::$session['use_checked'] == true): ?>
				<?php if(Auth::$session['use_id'] == $posts['list'][0]['sub_id_author'] || Auth::$session['use_statut'] >= 2): ?>
				<span class="action"><a href="<?= BASE_URL.'/forum/addSubject/'.$posts['list'][0]['sub_id'];?>">Editer</a><a href="<?= BASE_URL.'/forum/delSubject/'
				.$posts['list'][0]['sub_id'];?>">Supprimer</a></span>
				<?php endif; ?>
			<?php endif; ?>
		<?php echo '</td>'; ?>
	</tr>
	<tr>		
		<?php echo '<td>'; ?>
		<?php $this->img($posts['list'][0]['ava_url'], array('alt' => 'Avatar de '.$posts['list'][0]['use_login'])); ?>
		<br>
		<?php echo $posts['list'][0]['use_login']; ?>
		
		<?php echo '</td>'; ?>
		<?php echo '<td>'.$posts['list'][0]['sub_content'].'</td>'; ?>
	</tr>
<?php if(!empty($posts['list'][0]['rep_content'])): ?>
	<?php foreach ($posts['list'] as $k => $v): current($v); ?>
		<tr>
			<?php echo '<td colspan="2">'; ?>
			<?php echo '<h2>'.$v['rep_title'].'</h2>'; ?>
			<?php if(isset(Auth::$session['use_checked']) && Auth::$session['use_checked'] == true): ?>
				<?php if(Auth::$session['use_id'] == $v['rep_id_author'] || Auth::$session['use_statut'] >= 2): ?>
				<?php echo '<span class="action"><a href="'.BASE_URL.'/forum/posts/'.$posts['list'][0]['sub_id'].'/'.$v['rep_id'].'">Editer</a><a href="'.BASE_URL.'/forum/delReply/'.$v['rep_id'].'">Supprimer</a></span>'; ?>
				<?php endif; ?>
			<?php endif; ?>
			<?php echo '</td>'; ?>
		</tr>
		<tr>		
			<?php echo '<td>'; ?>
			<?php $this->img($v['ava_url'], array('alt' => 'Avatar de '.$v['use_login'])); ?>
			<br>
			<?php echo $v['use_login']; ?>
			<?php echo '</td>'; ?>
			<?php echo '<td>'; ?>
			<?php echo $v['rep_content']; ?>
			<?php if(!empty($v['rep_dateM'])): ?>
			<?php echo '<span>Edité le '.$v['rep_dateM'].'</span>'; ?>
			<?php endif; ?>
			<?php echo '</td>'; ?>

		</tr>
	<?php  endforeach; ?>
<?php endif; ?>

<?php if(isset(Auth::$session['use_checked']) && Auth::$session['use_checked'] == true): ?>
	<tr>
		<?php echo '<td>rien</td>'; ?>
		
		<td>
			
			<?php echo $this->Form->create('forum/posts/'.$posts['list'][0]['sub_id'].'/'.$id = (isset($rep['rep_id']))? $rep['rep_id'] : '', array('type' => 'POST', 'name' => 'rep_id', 'value' => $id)); ?>
		<p>
			<?php echo $this->Form->input(array('name' => 'rep_title', 'type' => 'text', 'label' => 'titre', 'value' => $value = (isset($rep['rep_title']))? $rep['rep_title'] : '', 'message' => true)); ?>
		</p>
		<p>
			<?php echo $this->Form->input(array('name' => 'rep_content', 'type' => 'textarea', 'label' => '', 'value' => $value = (isset($rep['rep_content']))? $rep['rep_content'] : '', 'message' => true)); ?>
		</p>
		<p>
			<?php $this->Form->end(array('type' => 'submit', 'value' => 'Répondre')); ?>
		</p>
		</td>
	</tr>
<?php endif; ?>
</table>
</div>
