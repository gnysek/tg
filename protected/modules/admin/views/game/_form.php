<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'game-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'publisher_id'); ?>
		<?php echo $form->textField($model,'publisher_id'); ?>
		<?php echo $form->error($model,'publisher_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'version'); ?>
		<?php echo $form->textField($model,'version',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'version'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->textField($model,'type'); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'size'); ?>
		<?php echo $form->textField($model,'size'); ?>
		<?php echo $form->error($model,'size'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'downloads'); ?>
		<?php echo $form->textField($model,'downloads'); ?>
		<?php echo $form->error($model,'downloads'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'url'); ?>
		<?php echo $form->textField($model,'url'); ?>
		<?php echo $form->error($model,'url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comments'); ?>
		<?php echo $form->textField($model,'comments'); ?>
		<?php echo $form->error($model,'comments'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'images'); ?>
		<?php echo $form->textField($model,'images'); ?>
		<?php echo $form->error($model,'images'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'videos'); ?>
		<?php echo $form->textField($model,'videos'); ?>
		<?php echo $form->error($model,'videos'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bugtracker_enabled'); ?>
		<?php echo $form->textField($model,'bugtracker_enabled'); ?>
		<?php echo $form->error($model,'bugtracker_enabled'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'voting_enabled'); ?>
		<?php echo $form->textField($model,'voting_enabled'); ?>
		<?php echo $form->error($model,'voting_enabled'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comments_enabled'); ?>
		<?php echo $form->textField($model,'comments_enabled'); ?>
		<?php echo $form->error($model,'comments_enabled'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'votes'); ?>
		<?php echo $form->textField($model,'votes'); ?>
		<?php echo $form->error($model,'votes'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'score'); ?>
		<?php echo $form->textField($model,'score',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'score'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'staff_fav'); ?>
		<?php echo $form->textField($model,'staff_fav'); ?>
		<?php echo $form->error($model,'staff_fav'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->