<?php $this->pageTitle=Yii::app()->name; ?>

<h1>Witawy w serwisie <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<?php if (Yii::app()->user->isGuest): ?>
Jeżeli nie posiadasz jeszcze konta, <?php echo CHtml::link('zarejestruj się', array('/site/register')); ?>, aby móc w pełni korzystać z dobrodziejstw strony.
<?php else: ?>
Witaj <b><?php echo Yii::app()->user->name ?></b>!<br/>
<br/>
&raquo; <?php echo CHtml::link('Edytuj swój profil', array('profile/update')); ?><br/>
<?php endif; ?>
