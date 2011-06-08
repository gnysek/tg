<?php
/* @var $model Publisher */
$this->breadcrumbs = array(
	'Teamy / Wydawcy' => array('/publisher'),
	$model->name,
);

$this->menu = array(
	array('label' => 'Wróć', 'url' => array('index')),
);

if ($model->isPublisherAdmin())
{
	array_unshift($this->menu, array('label' => 'Dodaj członka', 'url' => array('member/browseadd', 'id' => $model->publisher_id)));
	array_unshift($this->menu, array('label' => 'Edytuj', 'url' => array('update', 'id' => $model->publisher_id)));
}
?>
<h1>Team: <?php echo $model->name; ?></h1>

Członkowie teamu <?php echo $model->name; ?>:<br/>
<br/>

<?php
$i = 1;
/* @var $member Member */
?>
<table class="tg-table">
	<tr>
		<th>Id</th>
		<th>Nick</th>
		<th>Pozycja</th>
		<th>Gry</th>
		<?php if ($model->isPublisherAdmin()): ?>
			<th>Opcje</th>
		<?php endif; ?>
	</tr>
	<?php foreach ($model->members as $member): ?>
		<tr>
			<td><?php echo $i++; ?>.</td>
			<td>
				<?php echo $member->user->name; ?>
				<?php if ($member->publisher_admin): ?>
					<span style="color: red;">(może zarządzać)</span>
				<?php endif; ?>
				<?php if ($member->user_id == Yii::app()->user->id): ?>
					<span style="color: purple;">(to Ty)</span>
				<?php endif; ?>
			</td>
			<td>
				<?php echo $member->publisher_staff_role; ?>
			</td>
			<td>
				<?php echo CHtml::link('Zobacz &raquo;', array('game/userGames', 'userId' => $member->user_id)); ?>
			</td>
			<?php if ($model->isPublisherAdmin()): ?>
				<td>
					<?php if ($model->user_id != $member->user->user_id) {
						echo CHtml::link('Usuń', array('/member/RemoveMember/', 'id' => $member->member_id));
					} ?> &bull; <?php
						echo CHtml::link('Edytuj', array('/member/update/', 'id' => $member->member_id));
					?>
				</td>
			<?php endif; ?>
		</tr>
	<?php endforeach; ?>
</table>