<?php
$this->breadcrumbs=array(
	'Game Bugtrackers'=>array('index'),
	$model->bug_id,
);

$this->menu=array(
	array('label'=>'List GameBugtracker', 'url'=>array('index')),
	array('label'=>'Create GameBugtracker', 'url'=>array('create')),
	array('label'=>'Update GameBugtracker', 'url'=>array('update', 'id'=>$model->bug_id)),
	array('label'=>'Delete GameBugtracker', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->bug_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage GameBugtracker', 'url'=>array('admin')),
);
?>

<h1>View GameBugtracker #<?php echo $model->bug_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'bug_id',
		'game_id',
		'bug_reporter',
		'type',
		'status',
		'text',
		'reply',
		'date',
		'update_date',
	),
)); ?>
