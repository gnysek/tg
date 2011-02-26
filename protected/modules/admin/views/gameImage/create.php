<?php
$this->breadcrumbs=array(
	'Game Images'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List GameImage', 'url'=>array('index')),
	array('label'=>'Manage GameImage', 'url'=>array('admin')),
);
?>

<h1>Create GameImage</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>