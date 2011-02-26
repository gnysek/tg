<?php
$this->breadcrumbs=array(
	'Content News'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ContentNews', 'url'=>array('index')),
	array('label'=>'Manage ContentNews', 'url'=>array('admin')),
);
?>

<h1>Create ContentNews</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>