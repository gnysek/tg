<?php
$this->breadcrumbs=array(
	'Rankings',
);

$this->menu=array(
	array('label'=>'Create Ranking', 'url'=>array('create')),
	array('label'=>'Manage Ranking', 'url'=>array('admin')),
);
?>

<h1>Rankings</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
