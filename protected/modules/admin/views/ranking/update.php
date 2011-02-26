<?php
$this->breadcrumbs=array(
	'Rankings'=>array('index'),
	$model->name=>array('view','id'=>$model->ranking_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Ranking', 'url'=>array('index')),
	array('label'=>'Create Ranking', 'url'=>array('create')),
	array('label'=>'View Ranking', 'url'=>array('view', 'id'=>$model->ranking_id)),
	array('label'=>'Manage Ranking', 'url'=>array('admin')),
);
?>

<h1>Update Ranking <?php echo $model->ranking_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>