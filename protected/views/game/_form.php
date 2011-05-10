<div class="form">

<?php /* @var $form CActiveForm */ ?>	
<?php /* @var $model Game */ ?>	
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'game-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Pola oznaczone <span class="required">*</span> są wymagane.</p>

	<?php echo $form->errorSummary($model); ?>
	
	<div class="row">
		<?php echo $form->labelEx($model, 'name'); ?>
		<?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 255)); ?>
		<?php echo $form->error($model, 'name'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model, 'publisher_id'); ?>
		<?php echo $form->dropDownList($model, 'publisher_id', $pub); ?>
		<?php echo $form->error($model, 'publisher_id'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model, 'type'); ?>
		<?php echo $form->dropDownList($model, 'type', $model->getTypes()); ?>
		<?php echo $form->error($model, 'type'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model, 'version'); ?>
		<?php echo $form->textField($model, 'version', array('size' => 10, 'maxlength' => 8)); ?>
		<?php echo $form->error($model, 'version'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model, 'size'); ?>
		<?php echo $form->textField($model, 'size', array('size' => 30, 'maxlength' => 5)); ?> MB
		<?php echo $form->error($model, 'size'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model, 'url'); ?>
		<?php echo $form->textField($model, 'url', array('size' => 100, 'maxlength' => 255)); ?>
		<?php echo $form->error($model, 'url'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model, 'bugtracker_enabled'); ?>
		<?php echo $form->checkBox($model, 'bugtracker_enabled'); ?>
		<?php echo $form->error($model, 'bugtracker_enabled'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model, 'voting_enabled'); ?>
		<?php echo $form->checkBox($model, 'voting_enabled'); ?>
		<?php echo $form->error($model, 'voting_enabled'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model, 'comments_enabled'); ?>
		<?php echo $form->checkBox($model, 'comments_enabled'); ?>
		<?php echo $form->error($model, 'comments_enabled'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Dodaj' : 'Zapisz'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->