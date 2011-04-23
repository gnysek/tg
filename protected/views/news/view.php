<?php /* @var $model ContentNews */ ?>
<h1><?php echo $model->title ?></h1>
<?php echo $model->text ?><br/>
<Br/>
<?php echo $model->more; ?>

<?php if (count($comm)): ?>
<h2>Komentarze:</h2>
<?php
$i = 0;
foreach ($comm as $wpis) {
	echo $this->renderPartial('_comm', array('model' => $wpis, 'id' => ++$i ));
}
?>
<?php endif; ?>

<?php echo $this->renderPartial('_commform', array('model'=>$modelComm)); ?>