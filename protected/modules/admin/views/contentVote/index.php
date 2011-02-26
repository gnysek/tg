<?php
$this->breadcrumbs=array(
	'Content Votes',
);

$this->menu=array(
	array('label'=>'Create ContentVote', 'url'=>array('create')),
	array('label'=>'Manage ContentVote', 'url'=>array('admin')),
);
?>

<h1>Content Votes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
