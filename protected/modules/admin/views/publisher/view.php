<?php
$this->breadcrumbs=array(
	'Publishers'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Publisher', 'url'=>array('index')),
	array('label'=>'Create Publisher', 'url'=>array('create')),
	array('label'=>'Update Publisher', 'url'=>array('update', 'id'=>$model->publisher_id)),
	array('label'=>'Delete Publisher', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->publisher_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Publisher', 'url'=>array('admin')),
);
?>

<h1>View Publisher #<?php echo $model->publisher_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'publisher_id',
		'user_id',
		'type',
		'name',
		'www',
		'desc',
	),
)); ?>
