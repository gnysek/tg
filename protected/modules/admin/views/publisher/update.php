<?php
$this->breadcrumbs=array(
	'Publishers'=>array('index'),
	$model->name=>array('view','id'=>$model->publisher_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Publisher', 'url'=>array('index')),
	array('label'=>'Create Publisher', 'url'=>array('create')),
	array('label'=>'View Publisher', 'url'=>array('view', 'id'=>$model->publisher_id)),
	array('label'=>'Manage Publisher', 'url'=>array('admin')),
);
?>

<h1>Update Publisher <?php echo $model->publisher_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>