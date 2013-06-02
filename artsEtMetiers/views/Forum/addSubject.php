<?php debug($section);
if(isset($section['edit'])){
	$edit = current($section['edit']);
} 
if(isset($section['sec_id'])){
	$section[0]['sec_id'] = $section['sec_id'];
}
	?>
<div class="addSubject">
<?php
# le formulaire pour poster un nouveau sujet
$this->Form->create('forum/addSubject/'.$id = (isset($section[0]['sec_id']))? $section[0]['sec_id'] : '', array('type' => 'POST', 'name' => 'sub_id', 'value' => $id = (isset($edit['sub_id']))? $edit['sub_id'] : '', 'class' => 'formulaire')); ?>

<?php $this->Form->input(array('type' => 'text', 'label' => 'Titre du sujet', 'name' => 'sub_title', 'value' => $value = (isset($edit['sub_title']))? $edit['sub_title'] : '')); ?>

<div id="emoticons" class="emoticons_area">
	<a href="#" onclick="return false;" title=":p"><?php $this->img('design/emoticons/tongue.png');?></a>
	<a href="#" onclick="return false;" title=":("><?php $this->img('design/emoticons/unhappy.png');?></a>
	<a href="#" onclick="return false;" title=":D"><?php $this->img('design/emoticons/wink.png');?></a>
	<a href="#" onclick="return false;" title=">:("><?php $this->img('design/emoticons/hangry.png');?></a>
	<a href="#" onclick="return false;" title=":)"><?php $this->img('design/emoticons/smile.png');?></a>
</div>
<?php $this->Form->input(array('type' => 'textarea', 'name' => 'sub_content', 'value' =>  $value = (isset($edit['sub_content']))? $edit['sub_content'] : '', 'rows' => 15, 'class' => 'markitup')); ?>


<?php $this->Form->end(array('type' => 'submit', 'value' => 'Postez !', 'class' => 'btn btn-info submit')); ?>


</div>
