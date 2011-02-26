<?php
$this->breadcrumbs=array(
	'Comments'=>array('index'),
	$model->comm_id,
);

$this->menu=array(
	array('label'=>'List Comment', 'url'=>array('index')),
	array('label'=>'Create Comment', 'url'=>array('create')),
	array('label'=>'Update Comment', 'url'=>array('update', 'id'=>$model->comm_id)),
	array('label'=>'Delete Comment', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->comm_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Comment', 'url'=>array('admin')),
);
?>

<h1>View Comment #<?php echo $model->comm_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'comm_id',
		'content_id',
		'user_id',
		'date',
		'text',
	),
)); ?>
