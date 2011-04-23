<?php
$this->breadcrumbs = array(
	'Game' => array('/game'),
	'Add',
);
?>
<h1>Dodaj nową grę</h1>

<?php
echo $this->renderPartial('_form', array('model' => $model, 'pub' => $pub));
?>
