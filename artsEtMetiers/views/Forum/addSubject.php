<div class="formulaire">
<?php
# le formulaire pour poster un nouveau sujet
$this->Form->create('forum/addSubject/'.$id = (isset($add['sub_id']))? $add['sub_id'] : '', array('type' => 'POST', 'name' => 'sub_id', 'value' => $id, 'class' => 'formulaire')); ?>
<p>
<?php $this->Form->input(array('type' => 'text', 'label' => 'Titre du sujet', 'name' => 'sub_title', 'value' => $value = (isset($add['sub_title']))? $add['sub_id'] : '')); ?>
</p>
<p>
<?php $this->Form->input(array('type' => 'textarea', 'name' => 'sub_content', 'value' =>  $value = (isset($add['sub_content']))? $add['sub_content'] : '')); ?>
</p>
<p>
<?php $this->Form->end(array('type' => 'submit', 'value' => 'Postez !')); ?>
</p>

</div>