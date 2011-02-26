<?php
$this->breadcrumbs=array(
	'Ranking Games'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RankingGame', 'url'=>array('index')),
	array('label'=>'Manage RankingGame', 'url'=>array('admin')),
);
?>

<h1>Create RankingGame</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>