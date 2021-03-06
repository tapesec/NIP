<?php debug($visite); ?>

<div class="row-fluid">
	<div class="span3 text-center btn-info btn config_visite_button"><small>
		<span>Inscris le : <?php echo DateHelper::fr($visite['user'][0]['use_dateI']); ?></span><br>
		<span>Dernière connexion : <?php echo DateHelper::fr($visite['user'][0]['use_dateC'], array('delay' => true)); ?></span></small>
	</div>
	<div class="span2 offset3 text-center">
		<?php $this->img('/avatar/tapesec.png', array('class' => 'img-avatar img-polaroid auto')); ?>
		<span class="text-success"><strong><?php echo ucfirst($visite['user'][0]['use_login']); ?></strong></span><br>
		<span><small><?php echo ucfirst($visite['user'][0]['use_mail']); ?></small></span>
	</div>
	<div class="span2 offset2 config_visite_button">
		<?php if($visite['user'][0]['use_id'] == Auth::$session['use_id']): ?>
		<a class="btn btn-warning" href="<?php echo BASE_URL.'/parcours/edit'; ?>">
			Configurez votre carte de visite
		</a>
		<?php endif; ?>
	</div>	
</div>

<div class="row-fluid">
	<div class="span12">
		<h4>Informations</h4>
	</div>
</div>
<?php $u = $visite['user'][0]; ?>
<?php if(empty($u['use_prenom']) && empty($u['use_age']) && empty($u['use_profession']) && empty($u['use_residence'])): ?>
<div class="row-fluid">
	<div class="span12 text-center">
		<em>Vous n'avez pas encore renseigné cette rubrique</em>
	</div>	
</div>

<?php else: ?>
	<div class="row-fluid text-center">
		<?php if(!empty($u['use_prenom'])): ?>
			<div class="span3">
				<span>Prénom : <?php echo $u['use_prenom']; ?></span>
			</div>
		<?php endif; ?>

		<?php if(!empty($u['use_age'])): ?>
		<div class="span3">
			<span>Age : <?php echo $u['use_age']; ?></span>
		</div>
		<?php endif; ?>

		<?php if(!empty($u['use_profession'])): ?>
		<div class="span3">
			<span>Métiers : <?php echo $u['use_profession']; ?></span>
		</div>
		<?php endif; ?>

		<?php if(!empty($u['use_residence'])): ?>
		<div class="span3">
			<span>Ville : <?php echo $u['use_residence']; ?></span>
		</div>
		<?php endif; ?>	
	</div>
<?php endif; ?>


<div class="row-fluid">
	<div class="span12">
		<h4>Diplômes obtenus</h4>
	</div>
</div>

<?php $d = $visite['diplomes']; ?>

<div class="row-fluid">
<?php if(!empty($d)): ?>
	<?php $dip=''; $ue=0; $end=false; $end2=false; ?>
	<!-- début de la boucle foreach des diplomes -->
	<?php foreach ($d as $k => $v): ?>
	
		<!-- affichage du premier diplome  -->
		<?php if($dip != $v['dip_name']): ?>
		<?php if($end == true){ echo '</div></div></div></div>'; } ?>
			<?php $dip = $v['dip_name']; ?><?php $end = true; $ue=0;?>
			<div class="span6 block-diplome">	
				<div class="row-fluid">
					<div class="span4">
						<a class="thumbnail">
							<?php $this->img($v['dip_img_url'], array('alt' => $v['dip_name'], 'title' => $v['dip_code'].' '.$v['dip_name'])); ?>
						</a>
					</div>
					<div class="span6">
						<div class="row-fluid">
		<?php endif; ?>
		<!-- fin condition d'affichage du premier diplome -->			

						<!-- à partir de la deuxième UV -->
						<?php if(empty($v['uni_name']) || $ue==3): ?>
								</div><!-- fin bloc row-fluid de la ligne 85-->
							<div class="row-fluid">
								<?php $ue=0;  ?>
						<?php endif; ?>
						<?php $ue++; ?>
							<div class="span4">
								<a class="thumbnail">
									<?php $this->img($v['uni_img_url'], array('alt' => $v['uni_code'].' '.$v['uni_name'], 'title' => $v['uni_code'].' '.$v['uni_name'])); ?>
								</a>
							</div>
						


		<!-- fermeture du premier diplome -->					
		
	<?php endforeach ?>

				</div><!-- fermeture du bloc row fluid de la ligne 69 -->
			</div><!-- test --><!-- test -->
		</div><!-- test -->
	</div><!-- test -->
<?php else: ?>
<div class="span12 text-center">
	<em>vous n'avez pas encore de diplome ou vous ne les avez pas configurés</em>
</div>
<?php endif; ?>



</div><!-- test -->



<div class="row-fluid">
	<div class="span12">
		<h4>UE(s) obtenus</h4>
	</div>
</div>

<?php if(!empty($visite['unite_get'])): ?>
	<?php $uv_valid=0; ?>
	<?php $ug = $visite['unite_get']; ?>
	<div class="row-fluid">

		<?php foreach ($ug as $k => $v): ?>
			<?php if($uv_valid >= 12): ?>
				</div>
				<div class="row-fluid">
			<?php endif; ?>
			<div class="span1">
				<a class="thumbnail">
					<?php $this->img($v['uni_img_url'], array('alt' => $v['uni_code'].' '.$v['uni_name'], 'title' => $v['uni_code'].' '.$v['uni_name'])); ?>
				</a>
			</div>
			<?php $uv_valid++; ?>
		<?php endforeach; ?>
	</div>
<?php else: ?>
	<div class="span12 text-center">
		<em>vous n'avez pas encore validé d'UV ou vous ne les avez pas configurées</em>
	</div>
<?php endif; ?>


	
<div class="row-fluid">
	<div class="span12">
		<h4>UE(s) en cours d'obtention</h4>
	</div>
</div>

<?php if(!empty($visite['unite_progress'])): ?>
	<?php $uv_progress=0; ?>
	<?php $up = $visite['unite_progress']; ?>
	<div class="row-fluid">

		<?php foreach ($up as $k => $v): ?>
			<?php if($uv_progress >= 12): ?>
				</div>
				<div class="row-fluid">
			<?php endif; ?>
			<div class="span1">
				<a class="thumbnail">
					<?php $this->img($v['uni_img_url'], array('alt' => $v['uni_code'].' '.$v['uni_name'], 'title' => $v['uni_code'].' '.$v['uni_name'])); ?>
				</a>
			</div>
			<?php $uv_progress++; ?>
		<?php endforeach; ?>
	</div>
<?php else: ?>
	<div class="span12 text-center">
		<em>vous ne suivez pas ou plus de cours au cnam ou vous n'avez pas encore configuré ces informations</em>
	</div>
<?php endif; ?>



<div class="row-fluid">
	
		
		<?php if(!empty($visite['user'][0]['use_obs'])): ?>
		<div class="span12">
			<h4>Quelques mots</h4>
			<p><?php echo $this->Markitup->bbcodeparse($visite['user'][0]['use_obs']); ?></p>
		</div>
		<?php else: ?>
		<div class="span12">
			<h4>Quelques mots</h4>
		</div>
		<div class="span12 text-center">
			<em>Vous n'avez pas écrit de présentation</em>
		</div>
		<?php endif; ?>
	
</div>