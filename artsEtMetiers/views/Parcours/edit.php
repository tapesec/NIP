<?php debug($enseignement); ?>
<div class="row-fluid">
	<div class="span12">
	<h4>Blalal blala</h4>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	consequat.</p>

	<h5>Selectionnez un ou plusieurs diplomes obtenus</h5>
	<p>Attention !, un diplôme obtenus signifie que toutes les Unités d'Enseignements (UE) du diplome ont été validé. Le cas contrainre vous selectionnerez plus bas uniquement les UES obtenus</p>
	</div>
	<div class="row-fluide">
		<div class="span12">	
		<?php $this->Form->create('parcours/addDiplome', array('type' => 'POST', 'name' => 'use_id', 'value' => Auth::$session['use_id'], 'class' => '')); ?>
		</div>
	</div>
	<div class="row-fluide">
		<div class="span4">
		<?php $i=0; ?>
		<?php foreach ($enseignement['diplome'] as $k => $v): ?>
			
			<?php $this->Form->input(array('name' => 'udi_dip_id[]', 'value' => $v['dip_id'], 'type' => 'checkbox', 'label' => $v['dip_name'], 'class' => 'checkbox')); ?>
			<?php $i++; ?>	
			<?php if($i==3): ?>
				</div>
				<div class="span4">
				<?php $i=0; ?>	
			<?php endif; ?>
		<?php endforeach; ?>
		</div>

	</div>
	<div class="row-fluide">
		<div class="span12">	
		<?php $this->Form->end(array('type' => 'submit', 'value' => 'Validez', 'class' => 'btn btn-info submit'));    ?>
		</div>
	</div>
</div>
