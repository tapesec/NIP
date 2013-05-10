<?php //debug(Auth::$auth['use_login']); ?>

<?php //$auth = ($auth); ?>
<?php //debug(Auth::$session['use_login']); ?>
<?php $this->Form->create('auth/connexion', 'POST');    ?>
	<p>
		<?php $this->Form->input('use_login', 'text', 'Login : ', false, true); ?>
	</p>
	<p>
		<?php $this->Form->input('use_password1', 'password', 'Mot de passe : ',false, true); ?>
	</p>
	<p>
		<?php $this->Form->end('submit', 'connexion');    ?>
	</p>

