<?php
$this->breadcrumbs=array(
	'Ranking Votes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RankingVote', 'url'=>array('index')),
	array('label'=>'Manage RankingVote', 'url'=>array('admin')),
);
?>

<h1>Create RankingVote</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>