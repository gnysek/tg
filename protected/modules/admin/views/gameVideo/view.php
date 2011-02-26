<?php
$this->breadcrumbs=array(
	'Game Videos'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List GameVideo', 'url'=>array('index')),
	array('label'=>'Create GameVideo', 'url'=>array('create')),
	array('label'=>'Update GameVideo', 'url'=>array('update', 'id'=>$model->game_id)),
	array('label'=>'Delete GameVideo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->game_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage GameVideo', 'url'=>array('admin')),
);
?>

<h1>View GameVideo #<?php echo $model->game_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'game_id',
		'title',
		'src',
		'preview_img',
		'votes',
		'score',
	),
)); ?>
