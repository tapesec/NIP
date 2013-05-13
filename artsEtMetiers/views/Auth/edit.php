<?php 
if(isset($user)){
	debug(current($user));
	$user = current($user);
}

?>
<h1>Profil</h1>
<p>Renseigner un maximum d'informations peut vous aider à faciliter les échanges entre utilisateurs du site.</p>
<img src=""><br>
<?php $this->Form->create('auth/edit', 'POST'); ?>
<p>
	<?php #code ----- ?>
	<?php $this->Form->end('submit', 'Uploadez !');    ?>
</p>


<?php $this->Form->create('auth/edit/'.$user['use_id'], 'POST', 'use_id', $id = (isset($user['use_id']))? $user['use_id'] : '');    ?>
	<p>
		<?php $this->Form->input('use_prenom', 'text', 'Prénom', $value = (isset($user['use_prenom']))? $user['use_prenom'] : '' ,false, true); ?>
	</p>
	<p>
		<?php $this->Form->input('use_profession', 'text', 'Profession', $value = (isset($user['use_profession']))? $user['use_profession'] : '', false, true); ?>
	</p>
	<p>
		<?php $this->Form->input('use_residence', 'text', 'Ville', $value = (isset($user['use_residence']))? $user['use_residence'] : '', false, true); ?>
	</p>
	<p>
		<?php $this->Form->input('use_etudes', 'text', 'Etudes', $value = (isset($user['use_etudes']))? $user['use_etudes'] : '', false, true); ?>
	</p>
	<h2>Changez le mot de passe :</h2>
	<p>
		<?php $this->Form->input('use_password1', 'password', 'Nouveau mot de passe', $value = (isset($user['use_password1']))? $user['use_password1'] : '', false, true); ?>
	</p>
	<p>
		<?php $this->Form->input('use_password2', 'password', 'Confirmer', $value = (isset($user['use_password2']))? $user['use_password2'] : '', false, true); ?>
	</p>
	<p>
		<?php $this->Form->end('submit', 'Modifiez');    ?>
	</p>


