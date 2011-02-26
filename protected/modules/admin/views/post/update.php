<?php
$this->breadcrumbs=array(
	'Posts'=>array('index'),
	$model->post_id=>array('view','id'=>$model->post_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Post', 'url'=>array('index')),
	array('label'=>'Create Post', 'url'=>array('create')),
	array('label'=>'View Post', 'url'=>array('view', 'id'=>$model->post_id)),
	array('label'=>'Manage Post', 'url'=>array('admin')),
);
?>

<h1>Update Post <?php echo $model->post_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>