<?php
$this->breadcrumbs=array(
	'Content Votes'=>array('index'),
	$model->content_id,
);

$this->menu=array(
	array('label'=>'List ContentVote', 'url'=>array('index')),
	array('label'=>'Create ContentVote', 'url'=>array('create')),
	array('label'=>'Update ContentVote', 'url'=>array('update', 'id'=>$model->content_id)),
	array('label'=>'Delete ContentVote', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->content_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ContentVote', 'url'=>array('admin')),
);
?>

<h1>View ContentVote #<?php echo $model->content_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'content_id',
		'user_id',
		'score',
	),
)); ?>
