<?php
$this->breadcrumbs=array(
	'Ranking Games'=>array('index'),
	$model->entry_id=>array('view','id'=>$model->entry_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List RankingGame', 'url'=>array('index')),
	array('label'=>'Create RankingGame', 'url'=>array('create')),
	array('label'=>'View RankingGame', 'url'=>array('view', 'id'=>$model->entry_id)),
	array('label'=>'Manage RankingGame', 'url'=>array('admin')),
);
?>

<h1>Update RankingGame <?php echo $model->entry_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>