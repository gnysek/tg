<?php
$this->breadcrumbs=array(
	'Teamy / Wydawcy',
);

$this->menu = array(
	array('label' => 'Zobacz swoje teamy', 'url' => array('my')),
	array('label' => 'Utwórz nowy team', 'url' => array('add')),
);
?>

<h1>Lista Wszystkich Wydawców</h1>

<p>
	Aby dodac jakąkolwiek grę, nawet w pojedynkę, musisz utworzyć team/wydawcę dla tej produkcji.<br/>
	Poniżej znajdzuje się lista wszystkich wydawców w serwisie:
</p>

<?php $i = 1; ?>
<table class="tg-table">
	<tr>
		<th>Id.</th>
		<th>Nazwa.</th>
		<th>Gry</th>
		<th>Opcje.</th>
	</tr>
<?php foreach ($model as $data): ?>
	<tr>
	<?php /* @var $data Publisher */ ?>
	<td><?php echo $i++; ?>.</td>
	<td>
		<?php if ($data->user_id == Yii::app()->user->id): ?>
			<span style="color: red;"><b>&curren;</b></span>
		<?php endif; ?>
		<?php echo $data->name; ?>
	</td>
	<td><?php echo CHtml::link('Zobacz &raquo;', array('game/pubGames', 'pubId' => $data->publisher_id)); ?></td>
	<td><?php echo CHtml::link('Szczegóły &raquo;',array('/publisher/view/','id'=>$data->publisher_id)); ?></td>
	</tr>
<?php endforeach; ?>
</table>
<div>
	<?php $this->widget('CLinkPager', array('pages' => $pages)); ?>
</div>