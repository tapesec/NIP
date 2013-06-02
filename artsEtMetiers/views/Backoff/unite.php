<?php debug($unites);?>
<?php if(isset($unites['edit'])){
	$edit = $unites['edit'][0];
}?>
<?php if(isset($unites['list'])){
	$unites = $unites['list'];
} ?>

<table class="table table-condensed table-striped table-bordered table-hover">
	<th>Code</th>
	<th>Nom de l'UV</th>
	<th>Action</th>
	<?php foreach ($unites as $k => $v): current($v); ?>
		<tr>
			<?php echo '<td><small>'.$v['uni_code'].'</small></td>'; ?>
			<?php echo '<td><small>'.$v['uni_name'].'</small></td>'; ?>
			<?php echo '<td><small><a href="'.BASE_URL.'/backoff/unite/'.$v['uni_id'].'">Editer</a>'; ?>
			<?php echo '<a href="'.BASE_URL.'/backoff/delUnite/'.$v['uni_id'].'">Supprimer</a></small></td>'; ?>
		</tr>
	<?php endforeach; ?>
</table>


<?php echo $this->Form->create('backoff/unite/'.$id= (isset($edit['uni_id']))? $edit['uni_id'] : false, array('type' => 'POST', 'name' => 'uni_id', 'value' =>  $id)); ?>

<?php echo $this->Form->input(array('name' => 'uni_code', 'type' => 'text', 'label' => 'Code', 'value' => $value = (isset($edit['uni_code']))? $edit['uni_code'] : '')); ?>
<?php echo $this->Form->input(array('name' => 'uni_name', 'type' => 'text', 'label' => 'Unité d\'enseignement', 'value' => $value = (isset($edit['uni_name']))? $edit['uni_name'] : '')); ?>

<?php $this->Form->end(array('type' => 'submit', 'value' => 'Valider', 'class' => 'btn btn-info submit')); ?>
