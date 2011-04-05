<?php
$this->breadcrumbs = array(
	'Edytuj Team/Wydawcę',
);

$this->menu = array(
	array('label' => 'Wróć', 'url' => array('view', 'id' => $model->publisher_id))
);
?>

<h1>Edytuj Team/Wydawcę</h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>