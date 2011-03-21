<?php
$this->breadcrumbs=array(
	'Edytuj profil',
);

$this->menu=array(
	array('label'=>'Wróć', 'url'=>array('view'))
);
?>

<h1>Edytuj profil</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>