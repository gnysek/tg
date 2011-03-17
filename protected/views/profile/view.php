<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Change', 'url'=>array('update', 'id'=>$model->user_id))
);
?>

<h1><?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'name',
		'email',
		'regdate',
		'sex',
		'from',
		'bday',
		'real_name',
		'social_status',
		'avatar',
		'posts',
		'games'
	),
)); ?>
