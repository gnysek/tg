<?php
$this->breadcrumbs=array(
	'Publisher'=>array('/publisher'),
	'Dodaj'=>array('/publisher/add'),
	'Dodaj',
);?>
<h1>Utwórz nowy Team/Wydawcę</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>