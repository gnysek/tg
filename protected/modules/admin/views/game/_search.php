<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'game_id'); ?>
		<?php echo $form->textField($model,'game_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'publisher_id'); ?>
		<?php echo $form->textField($model,'publisher_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'version'); ?>
		<?php echo $form->textField($model,'version',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'type'); ?>
		<?php echo $form->textField($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'size'); ?>
		<?php echo $form->textField($model,'size'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'downloads'); ?>
		<?php echo $form->textField($model,'downloads'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'url'); ?>
		<?php echo $form->textField($model,'url'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'comments'); ?>
		<?php echo $form->textField($model,'comments'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'images'); ?>
		<?php echo $form->textField($model,'images'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'videos'); ?>
		<?php echo $form->textField($model,'videos'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bugtracker_enabled'); ?>
		<?php echo $form->textField($model,'bugtracker_enabled'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'voting_enabled'); ?>
		<?php echo $form->textField($model,'voting_enabled'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'comments_enabled'); ?>
		<?php echo $form->textField($model,'comments_enabled'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'votes'); ?>
		<?php echo $form->textField($model,'votes'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'score'); ?>
		<?php echo $form->textField($model,'score',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'staff_fav'); ?>
		<?php echo $form->textField($model,'staff_fav'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->