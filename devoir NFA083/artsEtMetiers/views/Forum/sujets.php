<?php debug($subjects); ?>




<ul class="breadcrumb">
	<li><a href="<?php echo BASE_URL.'/forum/index';?>">Accueil</a> <span class="divider">/</span></li>
   	<li class="active"><?php echo $subjects['subject'][0]['sec_name']; ?></li>
</ul>
<div class="add_message_area">
<?php if(!empty(Auth::$session['use_checked']) && Auth::$session['use_checked'] == true): ?>
	<a class="btn btn-info" href="<?php echo BASE_URL.'/forum/addSubject/'.$subjects['subject'][0]['sec_id']; ?>">Ajouter un sujet</a>
<?php else: ?>
	<a class="btn btn-info" href="<?php echo BASE_URL.'/auth/connexion'; ?>">Connectez vous !</a>
<?php endif; ?>
</div>



	<table class="table table-striped table-bordered table-hover">
		<tr>
			<th></th>
			<th>Sujets</th>
			<th>Réponses</th>
			<th>Vues</th>
			<th>dernière réponse</th>
		</tr>
	<?php if(isset($subjects['subject'][0]['use_id'])): ?>	
	<?php foreach ($subjects['postit'] as $k => $v):  ?>
		<tr class="warning">
			<?php echo '<td class=""><i class="icon-warning-sign"></i> </td>'; ?>
			<td><a href="<?php echo BASE_URL.'/forum/posts/'.$v['sub_id']; ?>"><?php echo $v['sub_title']; ?><br></a>
			<?php echo '<small>Par <a href="'.BASE_URL.'/parcours/voir/'.$v['use_id'].'" >'.ucfirst($v['use_login']).'</a> le '.DateHelper::fr($v['sub_dateC']).'</small></td>'; ?></td>
			<td>
				<?php $rep_count = $this->layoutLoad('forum', 'repCount2', $v['sub_id'] ); ?>
				<?php echo $rep_count; ?>
			</td>
			<td>
				<?php $nbre_view = $this->layoutLoad('forum', 'viewposts', $v['sub_id']); ?>
				<?php echo $nbre_view; ?>
			</td>
			<td><small>
				<?php $last = $this->layoutLoad('forum', 'lastSubject2', $v['sub_id']); ?>
				<?php debug($last); ?>
				<?php if(!empty($last[0]['use_login'])): ?>
					<?php echo DateHelper::fr($last[0]['rep_dateC'], array('delay' => true)). '<br> par <a class="text-success" href="'.BASE_URL.'/parcours/voir/'.$v['use_id'].'">'.ucfirst($last[0]['use_login']).'</a>'; ?>
				<?php else: ?>
					<?php echo '-'; ?>
				<?php endif; ?>
				</small>
			</td>
		</tr>
	<?php endforeach; ?>
	<?php foreach ($subjects['subject'] as $k => $v): current($v); ?>
		<tr>
			<?php echo '<td class=""><i class="icon-book"></i> </td>'; ?>
			<td><a href="<?php echo BASE_URL.'/forum/posts/'.$v['sub_id']; ?>"><?php echo $v['sub_title']; ?><br></a>
			<?php echo '<small>Par <a href="'.BASE_URL.'/parcours/voir/'.$v['use_id'].'" >'.ucfirst($v['use_login']).'</a> le '.DateHelper::fr($v['sub_dateC']).'</small></td>'; ?></td>
			<td>
				<?php $rep_count = $this->layoutLoad('forum', 'repCount2', $v['sub_id'] ); ?>
				<?php echo $rep_count; ?>
			</td>
			<td>
				<?php $nbre_view = $this->layoutLoad('forum', 'viewposts', $v['sub_id']); ?>
				<?php echo $nbre_view; ?>
			</td>
			<td><small>
				<?php $last = $this->layoutLoad('forum', 'lastSubject2', $v['sub_id']); ?>
				<?php debug($last); ?>
				<?php if(!empty($last[0]['use_login'])): ?>
					<?php echo DateHelper::fr($last[0]['rep_dateC'], array('delay' => true)). '<br> par <a class="text-success" href="'.BASE_URL.'/parcours/voir/'.$v['use_id'].'">'.ucfirst($last[0]['use_login']).'</a>'; ?>
				<?php else: ?>
					<?php echo '-'; ?>
				<?php endif; ?>
				</small>
			</td>
		</tr>
	<?php endforeach; ?>
	<?php endif; ?>
	</table>
	<?php debug($subjects['subject'][0]['sec_id']); ?>
	<?php echo $this->paginator('forum/section/'.$subjects['subject'][0]['sec_id'], 'pagination'); ?>
