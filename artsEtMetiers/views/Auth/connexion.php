<?php //debug(Auth::$auth['use_login']); ?>

<?php //$auth = ($auth); ?>
<?php //debug(Auth::$session['use_login']); ?>
<?php $this->Form->create('auth/connexion', array('type'=>'POST', 'class' => 'classtest'));    ?>
	<p>
		<?php $this->Form->input(array('name' => 'use_login', 'type' => 'text', 'label' => 'Login :', 'message' => 'true')); ?>
	</p>
	<p>
		<?php $this->Form->input(array('name' => 'use_password1', 'type' => 'password', 'label' => 'Mot de passe :', 'message' => 'true')); ?>
	</p>
	<p>
		<?php $this->Form->end(array('type' => 'submit', 'value' => 'connexion'));    ?>
	</p>

