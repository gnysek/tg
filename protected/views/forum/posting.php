<?php
/* @var $fcat Fcat */
$this->breadcrumbs = array(
	'Forum' => array('/forum'),
	'Posting',
);
?>
<h1><?php echo (empty($tid)) ? 'Nowy temat' : 'Nowy post'; ?>: <?php echo $fcat->forum->name; ?> / <?php echo $fcat->name; ?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model, 'modelTopic' => $modelTopic, 'fid' => $id, 'tid' => $tid)); ?>
