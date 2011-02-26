<?php
$this->breadcrumbs=array(
	'Game Videos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List GameVideo', 'url'=>array('index')),
	array('label'=>'Manage GameVideo', 'url'=>array('admin')),
);
?>

<h1>Create GameVideo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>