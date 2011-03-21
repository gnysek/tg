<?php
$this->breadcrumbs=array(
	'Edytuj profil',
);

$this->menu=array(
	array('label'=>'Wróć', 'url'=>array('view', 'id'=>$model->user_id))
);
?>

<h1>Edytuj profil</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>