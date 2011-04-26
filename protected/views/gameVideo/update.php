<?php
$this->breadcrumbs=array(
	'Game' => array('/game/index'),
	'Video',
	'Edytuj',
);

$this->menu=array(
	array('label'=>'Wróć', 'url'=>array('/game/view', 'id' => $_GET['gameId'])),
);
?>

<h1>Edytuj Video</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>