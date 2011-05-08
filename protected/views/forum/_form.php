<div class="form">

<?php 
/* @var $form CActiveForm */
$form=$this->beginWidget('CActiveForm', array(
	'id'=>'post-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Pola oznaczone <span class="required">*</span> są wymagane.</p>

	<?php echo $form->errorSummary($model); ?>
	
	<?php if (empty($tid)): ?>
	<div class="row">
		<?php echo $form->labelEx($modelTopic,'title'); ?>
		<?php echo $form->textField($modelTopic,'title',array('maxlen'=>255)); ?>
		<?php echo $form->error($modelTopic,'title'); ?>
	</div>
	<?php endif; ?>

	<div class="row">
		<?php echo $form->labelEx($model,'text'); ?>
		<?php echo $form->textArea($model,'text',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'text'); ?>
	</div>

	<div class="row buttons">
		<?php if (!$tid) {
			echo CHtml::submitButton($model->isNewRecord ? 'Dodaj' : 'Zapisz');
		} else {
			echo CHtml::submitButton($model->isNewRecord ? 'Utwórz nowy temat' : 'Zapisz');
		}
		?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->