<?php
$this->breadcrumbs=array(
	'Game Comments'=>array('index'),
	$model->comm_id=>array('view','id'=>$model->comm_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List GameComment', 'url'=>array('index')),
	array('label'=>'Create GameComment', 'url'=>array('create')),
	array('label'=>'View GameComment', 'url'=>array('view', 'id'=>$model->comm_id)),
	array('label'=>'Manage GameComment', 'url'=>array('admin')),
);
?>

<h1>Update GameComment <?php echo $model->comm_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>