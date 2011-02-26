<?php
$this->breadcrumbs=array(
	'Content Images'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List ContentImage', 'url'=>array('index')),
	array('label'=>'Create ContentImage', 'url'=>array('create')),
	array('label'=>'Update ContentImage', 'url'=>array('update', 'id'=>$model->content_id)),
	array('label'=>'Delete ContentImage', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->content_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ContentImage', 'url'=>array('admin')),
);
?>

<h1>View ContentImage #<?php echo $model->content_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'content_id',
		'title',
		'src',
		'thumb_src',
		'votes',
		'score',
	),
)); ?>
