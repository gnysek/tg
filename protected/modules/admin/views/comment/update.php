<?php
$this->breadcrumbs=array(
	'Comments'=>array('index'),
	$model->comm_id=>array('view','id'=>$model->comm_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Comment', 'url'=>array('index')),
	array('label'=>'Create Comment', 'url'=>array('create')),
	array('label'=>'View Comment', 'url'=>array('view', 'id'=>$model->comm_id)),
	array('label'=>'Manage Comment', 'url'=>array('admin')),
);
?>

<h1>Update Comment <?php echo $model->comm_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>