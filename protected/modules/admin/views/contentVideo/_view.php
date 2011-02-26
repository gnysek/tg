<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('content_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->content_id), array('view', 'id'=>$data->content_id)); ?>
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