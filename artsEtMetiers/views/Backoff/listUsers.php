<?php debug($users); 

$option = count($users);

if($option == 2){
	$user = $users[0];
	$edit = $users[1];
}
?>

<?php debug(Config::accessShow()); ?>


<?php if(isset($edit)): $edit = current($edit); ?>
	<?php echo $this->Form->create('backoff/listUsers/'.$id= (isset($edit['use_id']))? $edit['use_id'] : false, array('type' => 'POST', 'name' => 'use_id', 'value' =>  $id)); ?>
	<p>
		<?php echo $this->Form->input(array('name' => 'use_statut', 'type' => 'select', 'label' => 'Statut de '.$edit['use_login'], 'value' => $value = (isset($edit['use_statut']))? $edit['use_statut'] : '', 'list' => Config::accessShow())); ?>
	</p>

	<p>
		<?php $this->Form->end(array('type' => 'submit', 'value' => 'changez')); ?>
	</p>

<?php endif; ?>

<table>
			<td>Login :</td>
			<td>Inscris le</td>
			<td>Dernière visite</td>
			<td>Editer</td>
			<td>Actif</td>
	<?php foreach ($user as $k => $v): current($v); ?>
		<tr>
			<td><?php echo $v['use_login']; ?></td>
			<td><?php echo $v['use_dateI']; ?></td>
			<td><?php echo $v['use_dateC']; ?></td>
			<td><a href="<?php echo BASE_URL.'/backoff/listUsers/'.$v['use_id']; ?>"><?php echo Config::accessShow($v['use_statut']); ?></a></td>
			<td><?php echo $v['use_checked']; ?></td>
		</tr>
	<?php endforeach; ?> 
</table>



