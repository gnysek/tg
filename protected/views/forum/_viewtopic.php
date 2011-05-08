<?php /* @var $data Post */ ?>
<tr>
	<td style="vertical-align: top;">
		<b><?php echo $data->user->name; ?></b><br/>
		<?php echo CHtml::image("avatars/{$data->user->name}/{$data->user->avatar}"); ?><br/>
	</td>
	<td style="vertical-align: top;"><?php echo nl2br($data->text); ?></td>
</tr>
