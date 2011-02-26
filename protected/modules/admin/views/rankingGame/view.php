<?php
$this->breadcrumbs=array(
	'Ranking Games'=>array('index'),
	$model->entry_id,
);

$this->menu=array(
	array('label'=>'List RankingGame', 'url'=>array('index')),
	array('label'=>'Create RankingGame', 'url'=>array('create')),
	array('label'=>'Update RankingGame', 'url'=>array('update', 'id'=>$model->entry_id)),
	array('label'=>'Delete RankingGame', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->entry_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RankingGame', 'url'=>array('admin')),
);
?>

<h1>View RankingGame #<?php echo $model->entry_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'entry_id',
		'game_id',
		'votes',
		'score',
	),
)); ?>
