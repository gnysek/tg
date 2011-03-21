<?php
$this->breadcrumbs=array(
	'Teamy / Wydawcy',
);

$this->menu = array(
	array('label' => 'Utwórz nowy team', 'url' => array('add')),
);
?>

<h1>Wydawcy i Teamy do których jesteś zapisany</h1>

<p>
	Aby dodac jakąkolwiek grę, nawet w pojedynkę, musisz utworzyć team/wydawcę dla tej produkcji.<br/>
	Poniżej znajdzuje się lista wszystkich teamów w których się znajdujesz:
</p>

<?php $i = 1; ?>
<?php foreach ($model as $data): ?>
	<?php /* @var $data Member */ ?>
	<b><?php echo $i++; ?>. <?php echo CHtml::link($data->publisher->name,array('/publisher/view/','id'=>$data->publisher_id)); ?></b>,
	jako <?php echo $data->publisher_staff_role; ?>.
	<?php if ($data->publisher_admin): ?>
		<span style="color: red;">Możesz administrować tą grupą.</span>
	<?php endif; ?>
	<br/>
	<br/>
<?php endforeach; ?>
