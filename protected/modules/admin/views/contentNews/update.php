<?php
$this->breadcrumbs=array(
	'Content News'=>array('index'),
	$model->title=>array('view','id'=>$model->content_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ContentNews', 'url'=>array('index')),
	array('label'=>'Create ContentNews', 'url'=>array('create')),
	array('label'=>'View ContentNews', 'url'=>array('view', 'id'=>$model->content_id)),
	array('label'=>'Manage ContentNews', 'url'=>array('admin')),
);
?>

<h1>Update ContentNews <?php echo $model->content_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>