<?php
$this->breadcrumbs=array(
	'Fcats',
);

$this->menu=array(
	array('label'=>'Create Fcat', 'url'=>array('create')),
	array('label'=>'Manage Fcat', 'url'=>array('admin')),
);
?>

<h1>Fcats</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
