<?php
$this->breadcrumbs=array(
	'Fcats'=>array('index'),
	$model->name=>array('view','id'=>$model->cat_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Fcat', 'url'=>array('index')),
	array('label'=>'Create Fcat', 'url'=>array('create')),
	array('label'=>'View Fcat', 'url'=>array('view', 'id'=>$model->cat_id)),
	array('label'=>'Manage Fcat', 'url'=>array('admin')),
);
?>

<h1>Update Fcat <?php echo $model->cat_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>