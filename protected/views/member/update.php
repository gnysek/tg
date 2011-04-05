<?php
$this->breadcrumbs=array(
    'Teamy / Wydawcy' => array('/publisher'),
    $model->getPublisherName()=>array('/publisher/view','id'=>$model->publisher_id),
    'Edycja członka zespołu',
);
?>

<h1>Edycja członka: <?php echo $model->getUserName(); ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?> 