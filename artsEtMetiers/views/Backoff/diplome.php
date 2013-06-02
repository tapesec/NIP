<?php debug($diplomes);?>
<?php if(isset($diplomes['edit'])){
	$edit = $diplomes['edit'][0];
}?>
<?php if(isset($diplomes['list'])){
	$diplomes = $diplomes['list'];
} ?>

<table class="table table-condensed table-striped table-bordered table-hover">
	<th>Code</th>
	<th>Nom de la section</th>
	<th>Action</th>
	<?php foreach ($diplomes as $k => $v): current($v); ?>
		<tr>
			<?php echo '<td><small>'.$v['dip_code'].'</small></td>'; ?>
			<?php echo '<td><small>'.$v['dip_name'].'</small></td>'; ?>
			<?php echo '<td><small><a href="'.BASE_URL.'/backoff/diplome/'.$v['dip_id'].'">Editer</a>'; ?>
			<?php echo '<a href="'.BASE_URL.'/backoff/delDiplome/'.$v['dip_id'].'">Supprimer</a></small></td>'; ?>
		</tr>
	<?php endforeach; ?>
</table>


<?php echo $this->Form->create('backoff/diplome/'.$id= (isset($edit['dip_id']))? $edit['dip_id'] : false, array('type' => 'POST', 'name' => 'dip_id', 'value' =>  $id)); ?>

<?php echo $this->Form->input(array('name' => 'dip_code', 'type' => 'text', 'label' => 'Code', 'value' => $value = (isset($edit['dip_code']))? $edit['dip_code'] : '')); ?>
<?php echo $this->Form->input(array('name' => 'dip_name', 'type' => 'text', 'label' => 'Diplome', 'value' => $value = (isset($edit['dip_name']))? $edit['dip_name'] : '')); ?>

<?php $this->Form->end(array('type' => 'submit', 'value' => 'Valider', 'class' => 'btn btn-info submit')); ?>
