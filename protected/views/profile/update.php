<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->name=>array('view','id'=>$model->user_id),
	'Update',
);

$this->menu=array(
	array('label'=>'Back', 'url'=>array('view', 'id'=>$model->user_id))
);
?>

<h1><?php echo $model->name; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>