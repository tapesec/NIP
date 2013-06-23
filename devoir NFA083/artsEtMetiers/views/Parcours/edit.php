<?php debug($enseignement); ?>
<div class="row-fluid">
	<div class="span12">
		<h4>Panneau de configuration de votre carte de visite</h4>
		<p>Cette page vous permet de montrer aux autres usagers du site les diplômes que vous avez obtenues au CNAM,
		les UV déjà validé ou les cours du soirs que vous suivez en ce momennt</p>
		<p>Lorsque vous surfez sur ce site vous pouvez à tout moment cliquez sur les pseudos des internautes qui interviennent sur ce site
		pour voir apparaitre leur carte de visite et en apprendre plus sur leur activités au CNAM</p><p>Validez une par une chacune des rubriques avant de passer à la suivante,
		n'esitez pas à écrire un petit méssage de présentation en bas de page, décrivez vos objectifs scolaires ou professionnels.</p>
		<p>Ce site peut être consulté à thèrme par des professionnels alors ne soyez pas timide.</p>




	<!-- diplome obtenus -->	
		<h5>Selectionnez un ou plusieurs diplomes obtenus</h5>
		<p>Attention !, un diplôme obtenus signifie que toutes les Unités d'Enseignements (UE) du diplome ont été validé. Le cas contrainre vous selectionnerez plus bas uniquement les UES obtenus</p>
	</div>
	<?php $dip_user = (!empty($enseignement['diplome_user']))? $enseignement['diplome_user'] : array(); ?>
	<div class="row-fluid">
		<div class="span12">	
		<?php $this->Form->create('parcours/addDiplome', array('type' => 'POST', 'name' => 'use_id', 'value' => Auth::$session['use_id'], 'class' => '')); ?>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span4">
		<?php $i=0; ?>
		<?php $checked =''; ?>
		<?php foreach ($enseignement['diplome'] as $k => $v): ?>
			<?php foreach($dip_user as $kk => $vv){
				$checked = ($vv['udi_dip_id'] == $v['dip_id'])? true : false;
				if($checked == true){break;}
			}; ?>
			<?php $this->Form->input(array('name' => 'udi_dip_id[]', 'value' => $v['dip_id'], 'type' => 'checkbox', 'checked' => $checked, 'label' => $v['dip_name'], 'class' => 'checkbox')); ?>
			<?php $i++; ?>	
			<?php if($i==3): ?>
				</div>
				<div class="span4">
				<?php $i=0; ?>	
			<?php endif; ?>
		<?php endforeach; ?>
		</div>

	</div>
	<div class="row-fluid">
		<div class="span12">	
		<?php $this->Form->end(array('type' => 'submit', 'value' => 'Validez', 'class' => 'btn btn-info submit'));    ?>
		</div>
	</div>


<!-- UV obtenus -->
	<?php $uni_user_success = (!empty($enseignement['unite_user_success']))? $enseignement['unite_user_success'] : array(); ?>

	<div class="row-fluide">
		<div class="span12">
			<h5>Selectionnez des Unités d'enseignements validés</h5>
			<p>Séléctionnez uniquemement ici des UV n'ayant pas encore permis l'obtention d'un diplome</p>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span12">	
		<?php $this->Form->create('parcours/addUniteValid/1', array('type' => 'POST', 'name' => 'use_id', 'value' => Auth::$session['use_id'], 'class' => '')); ?>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span4">
		<?php $i=0; ?>
		<?php $checked =''; ?>
		<?php foreach ($enseignement['Unite'] as $k => $v): ?>
			<?php foreach($uni_user_success as $kk => $vv){
				$checked = ($vv['uun_uni_id'] == $v['uni_id'])? true : false;
				if($checked == true){break;}
			}; ?>
			<?php $this->Form->input(array('name' => 'uun_uni_id[]', 'value' => $v['uni_id'], 'type' => 'checkbox', 'checked' => $checked, 'label' => $v['uni_name'], 'class' => 'checkbox')); ?>
			<?php $i++; ?>	
			<?php if($i==3): ?>
				</div>
				<div class="span4">
				<?php $i=0; ?>	
			<?php endif; ?>
		<?php endforeach; ?>
		</div>

	</div>
	<div class="row-fluid">
		<div class="span12">	
		<?php $this->Form->end(array('type' => 'submit', 'value' => 'Validez', 'class' => 'btn btn-info submit'));    ?>
		</div>
	</div>


	<!-- UV en cours d'obtention -->
	<?php $uni_user_progress = (!empty($enseignement['unite_user_progress']))? $enseignement['unite_user_progress'] : array(); ?>

	<div class="row-fluide">
		<div class="span12">
			<h5>Selectionnez des Unités d'enseignements en cours d'obtention..</h5>
			<p>Séléctionnez des UV dans lesquels vous etes inscris mais que vous n'avez pas encore obtenus</p>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span12">	
		<?php $this->Form->create('parcours/addUniteValid/0', array('type' => 'POST', 'name' => 'use_id', 'value' => Auth::$session['use_id'], 'class' => '')); ?>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span4">
		<?php $i=0; ?>
		<?php $checked =''; ?>
		<?php foreach ($enseignement['Unite'] as $k => $v): ?>
			<?php foreach($uni_user_progress as $kk => $vv){
				$checked = ($vv['uun_uni_id'] == $v['uni_id'])? true : false;
				if($checked == true){break;}
			}; ?>
			<?php $this->Form->input(array('name' => 'uun_uni_id[]', 'value' => $v['uni_id'], 'type' => 'checkbox', 'checked' => $checked, 'label' => $v['uni_name'], 'class' => 'checkbox')); ?>
			<?php $i++; ?>	
			<?php if($i==3): ?>
				</div>
				<div class="span4">
				<?php $i=0; ?>	
			<?php endif; ?>
		<?php endforeach; ?>
		</div>

	</div>
	<div class="row-fluid">
		<div class="span12">	
		<?php $this->Form->end(array('type' => 'submit', 'value' => 'Validez', 'class' => 'btn btn-info submit'));    ?>
		</div>
	</div>

	<div class="row-fluid">
		<div class="span12">
			<h5>Présentation, objectifs, informations suplémentaires..</h5>
			<div id="emoticons" class="emoticons_area">
    			<a href="#" onclick="return false;" title=":p"><?php $this->img('design/emoticons/tongue.png');?></a>
				<a href="#" onclick="return false;" title=":("><?php $this->img('design/emoticons/unhappy.png');?></a>
				<a href="#" onclick="return false;" title=":D"><?php $this->img('design/emoticons/wink.png');?></a>
				<a href="#" onclick="return false;" title=">:("><?php $this->img('design/emoticons/hangry.png');?></a>
				<a href="#" onclick="return false;" title=":)"><?php $this->img('design/emoticons/smile.png');?></a>
			</div>
				<?php echo $this->Form->create('parcours/addObservation', array('type' => 'POST', 'name' => 'use_id', 'value' => '')); ?>
				
				<?php echo $this->Form->input(array('name' => 'use_obs', 'type' => 'textarea', 'rows' => 10, 'value' => $enseignement['obs'][0]['use_obs'], 'class' => 'markitup')); ?>

				<?php echo $this->Form->input(array('type' => 'submit', 'value' => 'Envoyer', 'class' => 'btn btn-info submit'));?>
		</div>

	</div>

</div>
