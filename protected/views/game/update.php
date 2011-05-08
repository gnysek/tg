<?php
$this->breadcrumbs=array(
	'Game'=>array('/game'),
	'Edytuj grę',
);
$this->menu=array(
	array('label'=>'Wróć', 'url'=>array('view', 'id' => $model->game_id))
);

?>

<h1>Edytuj grę</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'pub' => $pub)); ?>