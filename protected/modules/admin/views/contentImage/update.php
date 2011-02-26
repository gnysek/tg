<?php
$this->breadcrumbs=array(
	'Content Images'=>array('index'),
	$model->title=>array('view','id'=>$model->content_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ContentImage', 'url'=>array('index')),
	array('label'=>'Create ContentImage', 'url'=>array('create')),
	array('label'=>'View ContentImage', 'url'=>array('view', 'id'=>$model->content_id)),
	array('label'=>'Manage ContentImage', 'url'=>array('admin')),
);
?>

<h1>Update ContentImage <?php echo $model->content_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>