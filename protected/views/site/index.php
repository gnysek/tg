<?php $this->pageTitle=Yii::app()->name; ?>

<h1>Witawy w serwisie <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<?php if (Yii::app()->user->isGuest): ?>
Jeżeli nie posiadasz jeszcze konta, <?php echo CHtml::link('zarejestruj się', array('/site/register')); ?>, aby móc w pełni korzystać z dobrodziejstw strony. 
W przeciwnym wypadku <?php echo CHtml::link('zaloguj się', array('/site/login')); ?>.
<?php else: ?>
Witaj <b><?php echo Yii::app()->user->name ?></b>!<br/>
<br/>
<h2>Profil</h2>
&raquo; <?php echo CHtml::link('Zobacz swój profil', array('profile/view')); ?><br/>
&raquo; <?php echo CHtml::link('Edytuj swój profil', array('profile/update')); ?><br/>
<br/>
<h2>Team/Wydawca</h2>
&raquo; <?php echo CHtml::link('Utwórz nowy zespół', array('publisher/add')); ?><br/>
&raquo; <?php echo CHtml::link('Zobacz zespoły w których się znajdujesz', array('/publisher')); ?><br/>
<?php endif; ?>
