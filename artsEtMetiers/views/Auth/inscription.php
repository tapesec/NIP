	<?php $this->Form->create('auth/inscription', 'POST');    ?>
	<p>
		<?php $this->Form->input('use_login', 'text', 'Login : ', false, true); ?>
	</p>
	<p>
		<?php $this->Form->input('use_mail', 'text', 'Mail : ', false, true); ?>

	</p>
	<p>
		<?php $this->Form->input('use_password1', 'password', 'Mot de passe : ',false, true); ?>
	</p>
	<p>
		<?php $this->Form->input('use_password2', 'password', 'Comfirmer : ', false, true); ?>
	</p>
	<p>
		<?php $this->Form->end('submit', 'go!');    ?>
	</p>
