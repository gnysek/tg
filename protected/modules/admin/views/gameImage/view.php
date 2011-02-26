<?php
$this->breadcrumbs=array(
	'Game Images'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List GameImage', 'url'=>array('index')),
	array('label'=>'Create GameImage', 'url'=>array('create')),
	array('label'=>'Update GameImage', 'url'=>array('update', 'id'=>$model->game_id)),
	array('label'=>'Delete GameImage', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->game_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage GameImage', 'url'=>array('admin')),
);
?>

<h1>View GameImage #<?php echo $model->game_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'game_id',
		'title',
		'src',
		'thumb_src',
		'votes',
		'score',
	),
)); ?>
