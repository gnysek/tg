<?php
/* @var $model Publisher */
$this->breadcrumbs=array(
	'Wydawcy'=>array('/publisher'),
	$model->name=>array('/publisher/view','id'=>$model->publisher_id),
	'Członkowie'=>array('/publisher/view','id'=>$model->publisher_id),
	'Dodaj',
);?>
<h1>Dodaj członków: <?php echo $model->name; ?></h1>

<?php if ($dataProvider->getItemCount()): ?>
<table class="tg-table">
	<tr>
		<th width="10%">Id</th>
		<th>Nick</th>
		<th>Data rejestracji</th>
		<th>Opcje</th>
	</tr>
<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
	'viewData'=>array('model'=>$model),
    'enablePagination'=>true,
)); ?>
</table>
<?php else: ?>
Nie znaleziono użytkowników którzy nie byli by już członkami teamu.
<?php endif; ?>