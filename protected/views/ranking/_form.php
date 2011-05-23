<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ranking-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Pola oznaczone <span class="required">*</span> są wymagane.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'start_date'); ?>
		
		
		<?php 
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' =>'start_date',
    		#'name'=>'start_date',
    		'language'=>Yii::app()->language=='et' ? 'et' : null,
   			'options'=>array(
		        'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
		        'showOn'=>'button', // 'focus', 'button', 'both'
		        'buttonText'=>Yii::t('ui','Select form calendar'), 
		        'buttonImage'=>Yii::app()->request->baseUrl.'/css/calendar.gif', 
		        'buttonImageOnly'=>true,
		    ),
		    'htmlOptions'=>array(
		        'style'=>'width:80px;vertical-align:top'
		    ),  
			));?>
		<?php echo $form->error($model,'start_date'); ?> 	
	</div>

	<div class="row">
	<?php echo $form->labelEx($model,'end_date'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' =>'end_date',
    		#'name'=>'start_date',
    		'language'=>Yii::app()->language=='et' ? 'et' : null,
   			'options'=>array(
		        'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
		        'showOn'=>'button', // 'focus', 'button', 'both'
		        'buttonText'=>Yii::t('ui','Select form calendar'), 
		        'buttonImage'=>Yii::app()->request->baseUrl.'/css/calendar.gif', 
		        'buttonImageOnly'=>true,
		    ),
		    'htmlOptions'=>array(
		        'style'=>'width:80px;vertical-align:top'
		    ),  
			));?>
		<?php echo $form->error($model,'end_date'); ?> 	
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rules'); ?>
		<?php echo $form->textArea($model,'rules',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'rules'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Dodaj' : 'Zapisz'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->