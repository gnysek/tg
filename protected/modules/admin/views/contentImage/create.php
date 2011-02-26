<?php
$this->breadcrumbs=array(
	'Content Images'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ContentImage', 'url'=>array('index')),
	array('label'=>'Manage ContentImage', 'url'=>array('admin')),
);
?>

<h1>Create ContentImage</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>