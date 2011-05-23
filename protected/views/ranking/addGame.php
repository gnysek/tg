<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ranking-form',
	'enableAjaxValidation'=>false,
)); ?>
	<p class="note">Wybierz grę którą chcesz dodać do rankingu</p>
	
	
<?php echo $form->errorSummary($game); ?>
<div class="row">

<?php 
    $list = CHtml::listData($game, 'game_id', 'name');    
 	echo CHtml::dropDownList('game', $game, $list);
?>
</div>
<div class="row buttons">
		<?php echo CHtml::submitButton('Dodaj'); ?>
	</div>
<?php $this->endWidget(); ?>

</div><!-- form -->