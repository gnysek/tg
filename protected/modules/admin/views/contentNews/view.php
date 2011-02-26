<?php
$this->breadcrumbs=array(
	'Content News'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List ContentNews', 'url'=>array('index')),
	array('label'=>'Create ContentNews', 'url'=>array('create')),
	array('label'=>'Update ContentNews', 'url'=>array('update', 'id'=>$model->content_id)),
	array('label'=>'Delete ContentNews', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->content_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ContentNews', 'url'=>array('admin')),
);
?>

<h1>View ContentNews #<?php echo $model->content_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'content_id',
		'title',
		'text',
		'more',
	),
)); ?>
