<table class="bug-table">
<tr>
<td><?php echo $model->date ?></td>

</tr>
<tr>
<td style="width: 25%;"><?php echo $model->content->user->name;  ?></td>
</tr>
<tr>
<td style="width: 25%;"><?php echo $model->content_id;  ?></td>
</tr>
<tr>
<td colspan="3"><tt><?php echo $model->text ?></tt></td>
</tr>
</table>