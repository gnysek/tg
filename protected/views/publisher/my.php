<?php
$this->breadcrumbs=array(
	'Teamy / Wydawcy',
);

$this->menu = array(
	array('label' => 'Lista wszystkich teamów', 'url' => array('index')),
	array('label' => 'Utwórz nowy team', 'url' => array('add')),
);
?>

<h1>Wydawcy i Teamy do których jesteś zapisany</h1>

<p>
	Aby dodac jakąkolwiek grę, nawet w pojedynkę, musisz utworzyć team/wydawcę dla tej produkcji.<br/>
	Poniżej znajdzuje się lista wszystkich teamów w których się znajdujesz:
</p>

<?php $i = 1; ?>
<table class="tg-table">
	<tr>
		<th>Id.</th>
		<th>Nazwa.</th>
		<th>Opcje.</th>
	</tr>
<?php foreach ($model as $data): ?>
	<tr>
	<?php /* @var $data Member */ ?>
	<td><?php echo $i++; ?>.</td>
	<td>
		<?php if ($data->publisher_admin): ?>
			<span style="color: red;"><b>&curren;</b></span>
		<?php endif; ?>
		<?php echo CHtml::link($data->publisher->name,array('/publisher/view/','id'=>$data->publisher_id)); ?>
	</td>
	<td><?php echo CHtml::link('Szczegóły &raquo;',array('/publisher/view/','id'=>$data->publisher_id)); ?></td>
	</tr>
<?php endforeach; ?>
</table>
