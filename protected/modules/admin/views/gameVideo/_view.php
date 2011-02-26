<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('game_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->game_id), array('view', 'id'=>$data->game_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('src')); ?>:</b>
	<?php echo CHtml::encode($data->src); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('preview_img')); ?>:</b>
	<?php echo CHtml::encode($data->preview_img); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('votes')); ?>:</b>
	<?php echo CHtml::encode($data->votes); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('score')); ?>:</b>
	<?php echo CHtml::encode($data->score); ?>
	<br />


</div>