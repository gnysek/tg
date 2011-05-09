<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'game-bugtracker-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Pola oznaczone <span class="required">*</span> są wymagane.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->dropDownList($model,'type', GameBugtracker::model()->_getType()); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->dropDownList($model,'status',GameBugtracker::model()->_getStatusOptions()); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>
<?php if (!empty($model->date)) {?>
	<div class="row">
		<?php echo $form->labelEx($model,'text'); ?>
		<?php echo $form->textArea($model,'text',array('disabled'=>'disabled','rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'text'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'reply'); ?>
		<?php echo $form->textArea($model,'reply',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'reply'); ?>
	</div>
<?php } else { ?>
	<div class="row">
		<?php echo $form->labelEx($model,'text'); ?>
		<?php echo $form->textArea($model,'text',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'text'); ?>
	</div>
<?php }?>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Dodaj' : 'Zapisz'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->