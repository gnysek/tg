<div class="form">
<?php
/* @var $form CActiveForm */
$form=$this->beginWidget('CActiveForm', array(
'id'=>'comment-form',
'enableAjaxValidation'=>false,
)); ?>

<?php echo $form->errorSummary($model); ?>

<div class="row">
<?php echo $form->hiddenField($model, 'user_id', array('value' => Yii::app()->user->id )); ?>
<?php echo $form->labelEx($model,'text'); ?>
<?php echo $form->textArea($model, 'text',array('rows'=>4, 'cols'=>50)); ?>
<?php echo $form->error($model,'text'); ?>
</div>

<div class="row buttons">
<?php echo CHtml::submitButton($model->isNewRecord ? 'Dodaj' : 'Zapisz'); ?>
</div>

<?php $this->endWidget(); ?>

</div><!-- form -->