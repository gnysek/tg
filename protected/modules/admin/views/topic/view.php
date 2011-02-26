<?php
$this->breadcrumbs=array(
	'Topics'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Topic', 'url'=>array('index')),
	array('label'=>'Create Topic', 'url'=>array('create')),
	array('label'=>'Update Topic', 'url'=>array('update', 'id'=>$model->topic_id)),
	array('label'=>'Delete Topic', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->topic_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Topic', 'url'=>array('admin')),
);
?>

<h1>View Topic #<?php echo $model->topic_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'topic_id',
		'cat_id',
		'forum_id',
		'status',
		'type',
		'title',
		'posts',
		'topic_data',
		'last_post_data',
	),
)); ?>
