<?php
$this->breadcrumbs=array(
    'Users',
);
?>

<h1>Użytkownicy</h1>

<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_index',
)); ?>