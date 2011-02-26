<?php
$this->breadcrumbs=array(
	'Content Videos',
);

$this->menu=array(
	array('label'=>'Create ContentVideo', 'url'=>array('create')),
	array('label'=>'Manage ContentVideo', 'url'=>array('admin')),
);
?>

<h1>Content Videos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
