<?php
$this->breadcrumbs=array(
	'Ranking Votes'=>array('index'),
	$model->entry_id,
);

$this->menu=array(
	array('label'=>'List RankingVote', 'url'=>array('index')),
	array('label'=>'Create RankingVote', 'url'=>array('create')),
	array('label'=>'Update RankingVote', 'url'=>array('update', 'id'=>$model->entry_id)),
	array('label'=>'Delete RankingVote', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->entry_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RankingVote', 'url'=>array('admin')),
);
?>

<h1>View RankingVote #<?php echo $model->entry_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'entry_id',
		'user_id',
		'score',
	),
)); ?>
