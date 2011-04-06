
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