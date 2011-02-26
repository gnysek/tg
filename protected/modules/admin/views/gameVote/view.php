<?php
$this->breadcrumbs=array(
	'Game Votes'=>array('index'),
	$model->game_id,
);

$this->menu=array(
	array('label'=>'List GameVote', 'url'=>array('index')),
	array('label'=>'Create GameVote', 'url'=>array('create')),
	array('label'=>'Update GameVote', 'url'=>array('update', 'id'=>$model->game_id)),
	array('label'=>'Delete GameVote', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->game_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage GameVote', 'url'=>array('admin')),
);
?>

<h1>View GameVote #<?php echo $model->game_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'game_id',
		'user_id',
		'score',
	),
)); ?>
