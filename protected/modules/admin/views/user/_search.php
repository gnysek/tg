<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'autokey'); ?>
		<?php echo $form->textField($model,'autokey',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'regdate'); ?>
		<?php echo $form->textField($model,'regdate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sex'); ?>
		<?php echo $form->textField($model,'sex'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'from'); ?>
		<?php echo $form->textField($model,'from',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bday'); ?>
		<?php echo $form->textField($model,'bday'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'real_name'); ?>
		<?php echo $form->textField($model,'real_name',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'social_status'); ?>
		<?php echo $form->textField($model,'social_status',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'avatar'); ?>
		<?php echo $form->textField($model,'avatar',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'posts'); ?>
		<?php echo $form->textField($model,'posts'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'games'); ?>
		<?php echo $form->textField($model,'games'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'last_time'); ?>
		<?php echo $form->textField($model,'last_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'time'); ?>
		<?php echo $form->textField($model,'time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'active'); ?>
		<?php echo $form->textField($model,'active'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ban'); ?>
		<?php echo $form->textField($model,'ban'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'admin'); ?>
		<?php echo $form->textField($model,'admin'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->