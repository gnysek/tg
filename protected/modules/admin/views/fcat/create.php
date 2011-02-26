<?php
$this->breadcrumbs=array(
	'Fcats'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Fcat', 'url'=>array('index')),
	array('label'=>'Manage Fcat', 'url'=>array('admin')),
);
?>

<h1>Create Fcat</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>