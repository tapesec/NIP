	<?php $this->Form->create('auth/inscription', array('type' => 'POST'));    ?>
	<p>
		<?php $this->Form->input(array('name' => 'use_login', 'type' => 'text', 'label' => 'Login :', 'message' => true)); ?>
	</p>
	<p>
		<?php $this->Form->input(array('name' => 'use_mail', 'type' => 'text', 'label' => 'Mail :', 'message' => true)); ?>

	</p>
	<p>
		<?php $this->Form->input(array('name' => 'use_password1', 'type' => 'password', 'label' => 'Mot de passe :', 'message' => true)); ?>
	</p>
	<p>
		<?php $this->Form->input(array('name' => 'use_password2', 'type' => 'password', 'label' => 'Confirmer :', 'message' => true)); ?>
	</p>
	<p>
		<?php $this->Form->end(array('type' => 'submit', 'value' => 'Go !'));  ?>
	</p>
