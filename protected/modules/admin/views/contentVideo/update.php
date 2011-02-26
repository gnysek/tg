<?php
$this->breadcrumbs=array(
	'Content Videos'=>array('index'),
	$model->title=>array('view','id'=>$model->content_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ContentVideo', 'url'=>array('index')),
	array('label'=>'Create ContentVideo', 'url'=>array('create')),
	array('label'=>'View ContentVideo', 'url'=>array('view', 'id'=>$model->content_id)),
	array('label'=>'Manage ContentVideo', 'url'=>array('admin')),
);
?>

<h1>Update ContentVideo <?php echo $model->content_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>