<?php
$this->breadcrumbs=array(
	'Content Videos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ContentVideo', 'url'=>array('index')),
	array('label'=>'Manage ContentVideo', 'url'=>array('admin')),
);
?>

<h1>Create ContentVideo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>