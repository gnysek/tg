<?php
$this->breadcrumbs=array(
	'Content Images',
);

$this->menu=array(
	array('label'=>'Create ContentImage', 'url'=>array('create')),
	array('label'=>'Manage ContentImage', 'url'=>array('admin')),
);
?>

<h1>Content Images</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
