<div class="formulaire">
<?php 
if(isset($user)){
	debug(current($user));
	$user = current($user);
}

?>
<h1>Profil</h1>
<p>Renseigner un maximum d'informations peut vous aider à faciliter les échanges entre utilisateurs du site.</p>

<?php $this->img($user['ava_url'], array('alt' => 'avatar')); ?><br>
<?php $this->Form->create('auth/uploadAvatar/'.$user['use_id'], array('type' => 'FILE', 'name' => 'ava_id', 'value' => $user['ava_id'], 'class' => 'formulaire')); ?>
<?php $this->Form->input(array('type' => 'file', 'name' => 'avatar')); ?>
<?php $this->Form->end(array('type' => 'submit', 'value' => 'Uploadez !', 'class' => 'submit'));    ?>



<p>Vous êtes : <?php echo Config::accessShow(Auth::$session['use_statut']); ?></p>		
<?php $this->Form->create('auth/edit/'.$user['use_id'], array('type' => 'POST', 'name' => 'use_id', 'value' => $id = (isset($user['use_id']))? $user['use_id'] : '', 'class' => 'formulaire')); ?>
	
	<?php $this->Form->input(array('name' => 'use_prenom', 'type' => 'text', 'label' => 'Prénom :', 'value' => $value = (isset($user['use_prenom']))? $user['use_prenom'] : '', 'message' => true)); ?>
	
	<?php $this->Form->input(array('name' => 'use_profession', 'type' => 'text', 'label' => 'Profession', 'value' => $value = (isset($user['use_profession']))? $user['use_profession'] : '', 'message' => true)); ?>
	
	<?php $this->Form->input(array('name' => 'use_residence', 'type' => 'text', 'label' => 'Ville', 'value' => $value = (isset($user['use_residence']))? $user['use_residence'] : '', 'message' => true)); ?>

	<?php $this->Form->input(array('name' => 'use_etudes', 'type' => 'text', 'label' => 'Etudes', 'value' => $value = (isset($user['use_etudes']))? $user['use_etudes'] : '', 'message' => true)); ?>

	<h2>Changez le mot de passe :</h2>

	<?php $this->Form->input(array('name' => 'use_password1', 'type' => 'password', 'label' => 'Nouveau mot de passe', 'value' => $value = (isset($user['use_password1']))? $user['use_password1'] : '','message' => true)); ?>

	<?php $this->Form->input(array('name' => 'use_password2', 'type' => 'password', 'label' => 'Confirmer', 'value' => $value = (isset($user['use_password2']))? $user['use_password2'] : '', 'message' => true)); ?>

	<?php $this->Form->end(array('type' => 'submit', 'value' => 'Modifiez', 'class' => 'submit'));    ?>

</div>

