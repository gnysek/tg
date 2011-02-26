<?php
$this->breadcrumbs=array(
	'Forums',
);

$this->menu=array(
	array('label'=>'Create Forum', 'url'=>array('create')),
	array('label'=>'Manage Forum', 'url'=>array('admin')),
);
?>

<h1>Forums</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
