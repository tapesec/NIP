<?php debug($sections);
if(count($sections) == 2){
	$section = $sections[0];
	$edit = current($sections[1]);

}else{
	$section = $sections;
}
?>

<table>
	<?php foreach ($section as $k => $v):  ?>
		<tr>
			<?php echo '<td>'.$v['sec_name'].'</td>'; ?>
			<?php echo '<td><a href="'.BASE_URL.'/backoff/forum/'.$v['sec_id'].'">Editer</a></td>'; ?>
		</tr>
	<?php endforeach; ?>
</table>


<?php echo $this->Form->create('backoff/forum/'.$id= (isset($edit['sec_id']))? $edit['sec_id'] : false, array('type' => 'POST', 'name' => 'sec_id', 'value' =>  $id)); ?>
<p>
	<?php echo $this->Form->input(array('name' => 'sec_name', 'type' => 'text', 'label' => 'Intitulé de la section', 'value' => $value = (isset($edit['sec_name']))? $edit['sec_name'] : '')); ?>
</p>

<p>
	<?php $this->Form->input(array('name' => 'sec_online', 'type' => 'checkbox', 'label' => 'Mettre en ligne ?', 'value' => $value = (isset($edit['art_online']))? $edit['art_online'] : 1, 'message' => true)); ?>
</p>
<p>
	<?php $this->Form->end(array('type' => 'submit', 'value' => 'Valider')); ?>
</p>