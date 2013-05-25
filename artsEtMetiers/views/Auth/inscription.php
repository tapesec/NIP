<div class="formulaire">
<h1>Inscription</h1>
<p>L'adresse mail demandé vous servira à recevoir un lien pour confirmer votre inscription. Surveillez votre boite de spam si vous ne le revez pas rapidement.</p>	

	<?php $this->Form->create('auth/inscription', array('type' => 'POST', 'class' => 'inscription'));    ?>
	<p>
		<?php $this->Form->input(array('name' => 'use_login', 'type' => 'text', 'label' => 'Login :', 'message' => array('class' => 'error'))); ?>
	</p>
	<p>
		<?php $this->Form->input(array('name' => 'use_mail', 'type' => 'text', 'label' => 'Mail :', 'message' => array('class' => 'error'))); ?>

	</p>
	<p>
		<?php $this->Form->input(array('name' => 'use_password1', 'type' => 'password', 'label' => 'Mot de passe :', 'message' => array('class' => 'error'))); ?>
	</p>
	<p>
		<?php $this->Form->input(array('name' => 'use_password2', 'type' => 'password', 'label' => 'Confirmer :', 'message' => array('class' => 'error'))); ?>
	</p>
	<p>
		<?php $this->Form->end(array('type' => 'submit', 'value' => 'Je m\'inscris !', 'class' => 'submit'));  ?>
	</p>


