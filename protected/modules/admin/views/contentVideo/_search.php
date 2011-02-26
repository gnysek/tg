<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'content_id'); ?>
		<?php echo $form->textField($model,'content_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'src'); ?>
		<?php echo $form->textField($model,'src',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'preview_img'); ?>
		<?php echo $form->textField($model,'preview_img',array('size'=>60,'maxlength'=>255)); ?>
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