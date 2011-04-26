<?php
$this->breadcrumbs=array(
	'Game' => array('/game/index'),
	'Screens',
	'Dodaj',
);

$this->menu=array(
	array('label'=>'Wróć', 'url'=>array('/game/view', 'id' => $_GET['gameId'])),
);
?>

<h1>Dodaj Screen'a</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>