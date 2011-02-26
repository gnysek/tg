<?php
$this->breadcrumbs=array(
	'Members'=>array('index'),
	$model->member_id,
);

$this->menu=array(
	array('label'=>'List Member', 'url'=>array('index')),
	array('label'=>'Create Member', 'url'=>array('create')),
	array('label'=>'Update Member', 'url'=>array('update', 'id'=>$model->member_id)),
	array('label'=>'Delete Member', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->member_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Member', 'url'=>array('admin')),
);
?>

<h1>View Member #<?php echo $model->member_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'member_id',
		'user_id',
		'publisher_id',
		'publisher_admin',
		'publisher_staff_role',
	),
)); ?>
