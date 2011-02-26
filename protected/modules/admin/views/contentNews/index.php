<?php
$this->breadcrumbs=array(
	'Content News',
);

$this->menu=array(
	array('label'=>'Create ContentNews', 'url'=>array('create')),
	array('label'=>'Manage ContentNews', 'url'=>array('admin')),
);
?>

<h1>Content News</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
