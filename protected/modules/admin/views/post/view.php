<?php
$this->breadcrumbs=array(
	'Posts'=>array('index'),
	$model->post_id,
);

$this->menu=array(
	array('label'=>'List Post', 'url'=>array('index')),
	array('label'=>'Create Post', 'url'=>array('create')),
	array('label'=>'Update Post', 'url'=>array('update', 'id'=>$model->post_id)),
	array('label'=>'Delete Post', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->post_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Post', 'url'=>array('admin')),
);
?>

<h1>View Post #<?php echo $model->post_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'post_id',
		'topic_id',
		'user_id',
		'text',
	),
)); ?>
