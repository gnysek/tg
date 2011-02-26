<?php
$this->breadcrumbs=array(
	'Game Comments'=>array('index'),
	$model->comm_id,
);

$this->menu=array(
	array('label'=>'List GameComment', 'url'=>array('index')),
	array('label'=>'Create GameComment', 'url'=>array('create')),
	array('label'=>'Update GameComment', 'url'=>array('update', 'id'=>$model->comm_id)),
	array('label'=>'Delete GameComment', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->comm_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage GameComment', 'url'=>array('admin')),
);
?>

<h1>View GameComment #<?php echo $model->comm_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'comm_id',
		'game_id',
		'user_id',
		'date',
		'text',
	),
)); ?>
