<?php
$this->breadcrumbs=array(
	'Game Bugtrackers'=>array('index'),
	'Update',
);

$this->menu=array(
);
?>

<h1>Odpowiedź do buga <?php echo $model->bug_id ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>