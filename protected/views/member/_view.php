<tr>
	<td>
		<?php echo CHtml::link(CHtml::encode($data->user_id), array('view', 'id' => $data->user_id)); ?>
	</td>
	<td>
		<?php echo CHtml::encode($data->name); ?>
	</td>
	<td>
		<?php echo CHtml::encode($data->regDateText); ?>
	</td>
	<td>
		<?php echo CHtml::link('Dodaj', array('add', 'pubId'=>$model->publisher_id, 'memId' => $data->user_id)); ?>
	</td>
</tr>