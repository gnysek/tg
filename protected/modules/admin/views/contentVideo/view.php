<?php
$this->breadcrumbs=array(
	'Content Videos'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List ContentVideo', 'url'=>array('index')),
	array('label'=>'Create ContentVideo', 'url'=>array('create')),
	array('label'=>'Update ContentVideo', 'url'=>array('update', 'id'=>$model->content_id)),
	array('label'=>'Delete ContentVideo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->content_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ContentVideo', 'url'=>array('admin')),
);
?>

<h1>View ContentVideo #<?php echo $model->content_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'content_id',
		'title',
		'src',
		'preview_img',
		'votes',
		'score',
	),
)); ?>
