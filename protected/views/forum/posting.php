<?php
$this->breadcrumbs=array(
	'Forum'=>array('/forum'),
	'Posting',
);?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
