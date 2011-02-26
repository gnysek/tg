<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>38,'maxlength'=>38)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'autokey'); ?>
		<?php echo $form->textField($model,'autokey',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'autokey'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'regdate'); ?>
		<?php echo $form->textField($model,'regdate'); ?>
		<?php echo $form->error($model,'regdate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sex'); ?>
		<?php echo $form->textField($model,'sex'); ?>
		<?php echo $form->error($model,'sex'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'from'); ?>
		<?php echo $form->textField($model,'from',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'from'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bday'); ?>
		<?php echo $form->textField($model,'bday'); ?>
		<?php echo $form->error($model,'bday'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'real_name'); ?>
		<?php echo $form->textField($model,'real_name',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'real_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'social_status'); ?>
		<?php echo $form->textField($model,'social_status',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'social_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'avatar'); ?>
		<?php echo $form->textField($model,'avatar',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'avatar'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'posts'); ?>
		<?php echo $form->textField($model,'posts'); ?>
		<?php echo $form->error($model,'posts'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'games'); ?>
		<?php echo $form->textField($model,'games'); ?>
		<?php echo $form->error($model,'games'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_time'); ?>
		<?php echo $form->textField($model,'last_time'); ?>
		<?php echo $form->error($model,'last_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'time'); ?>
		<?php echo $form->textField($model,'time'); ?>
		<?php echo $form->error($model,'time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'active'); ?>
		<?php echo $form->textField($model,'active'); ?>
		<?php echo $form->error($model,'active'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ban'); ?>
		<?php echo $form->textField($model,'ban'); ?>
		<?php echo $form->error($model,'ban'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'admin'); ?>
		<?php echo $form->textField($model,'admin'); ?>
		<?php echo $form->error($model,'admin'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->