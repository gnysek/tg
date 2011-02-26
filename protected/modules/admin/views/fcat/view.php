<?php
$this->breadcrumbs=array(
	'Fcats'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Fcat', 'url'=>array('index')),
	array('label'=>'Create Fcat', 'url'=>array('create')),
	array('label'=>'Update Fcat', 'url'=>array('update', 'id'=>$model->cat_id)),
	array('label'=>'Delete Fcat', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->cat_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Fcat', 'url'=>array('admin')),
);
?>

<h1>View Fcat #<?php echo $model->cat_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'cat_id',
		'forum_id',
		'pos',
		'name',
		'desc',
		'topics_total',
		'posts_total',
		'last_post_data',
		'visible',
	),
)); ?>
