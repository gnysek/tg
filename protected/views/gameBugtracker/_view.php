<tr>
<td><?php echo $model->status;  ?></td>
<td><?php echo $model->type;  ?></td>
<td><?php echo $model->text ?></td>
<?php if ($model->game->user_id == Yii::app()->user->id) {?>
<td><?php echo CHtml::link('Odpowiedz',array('/gameBugtracker/update','id'=>$model->game_id));?></td>
<?php } else { ?>
<td><?php echo $model->reply; ?></td>
<?php }?>
</tr>