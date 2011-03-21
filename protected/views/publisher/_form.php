<div class="form">

<?php /* @var $form CActiveForm */ ?>	
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'publisher-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Pola oznaczone <span class="required">*</span> są wymagane.</p>

	<?php echo $form->errorSummary($model); ?>
	
	<?php echo $form->hiddenField($model, 'user_id', array('value' => Yii::app()->user->id )); ?>
	<?php echo $form->hiddenField($model, 'type', array('value' => '0')); ?>
	
	<div class="row">
		<?php echo $form->labelEx($model, 'name'); ?>
		<?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 255)); ?>
		<?php echo $form->error($model, 'name'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model, 'www'); ?>
		<?php echo $form->textField($model, 'www', array('size' => 60, 'maxlength' => 255)); ?>
		<?php echo $form->error($model, 'www'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model, 'desc'); ?>
		<?php echo $form->textArea($model, 'desc', array('rows' => 6, 'cols' => 46)); ?>
		<?php echo $form->error($model, 'desc'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Zapisz'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->