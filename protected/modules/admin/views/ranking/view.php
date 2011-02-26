<?php
$this->breadcrumbs=array(
	'Rankings'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Ranking', 'url'=>array('index')),
	array('label'=>'Create Ranking', 'url'=>array('create')),
	array('label'=>'Update Ranking', 'url'=>array('update', 'id'=>$model->ranking_id)),
	array('label'=>'Delete Ranking', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ranking_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ranking', 'url'=>array('admin')),
);
?>

<h1>View Ranking #<?php echo $model->ranking_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ranking_id',
		'ranking_creator',
		'start_date',
		'end_date',
		'name',
		'rules',
		'winner',
	),
)); ?>
