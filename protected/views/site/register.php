<?php
$this->pageTitle=Yii::app()->name . ' - Rejestracja';
$this->breadcrumbs=array(
	'Zarejestruj się',
);
?>

<h1>Rejestracja</h1>

<p>Wypełnij poniższe dane:</p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'register-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Polaz oznaczone <span class="required">*</span> są wymagane.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
		<p class="hint">
			Hasło powinno mieć min. 6 liter
		</p>
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton('Rejestracja'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->