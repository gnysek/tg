<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'entry_id'); ?>
		<?php echo $form->textField($model,'entry_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'game_id'); ?>
		<?php echo $form->textField($model,'game_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'votes'); ?>
		<?php echo $form->textField($model,'votes'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'score'); ?>
		<?php echo $form->textField($model,'score',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->