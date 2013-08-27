<?php
/* @var $this SiteController */
/* @var $dataProvider CActiveDataProvider */

$this->pageTitle = Yii::app()->name;
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider' => $dataProvider,
	'columns' => array(
		'email:email:E-mail',
		'company:text:Компания'
	),
	'cssFile' => false,
	'htmlOptions' => array(
		'class' => 'users-list-container'
	),
	'template' => '{items}{pager}',
	'itemsCssClass' => 'table',
	'pager' => array(
		'header' => false,
		'cssFile' => false,
		'htmlOptions' => array('class' => 'pagination'),
		'firstPageLabel' => '&laquo;',
		'lastPageLabel' => '&raquo;',
		'hiddenPageCssClass' => 'disabled',
		'selectedPageCssClass' => 'active'
	),
	'pagerCssClass' => 'pager-container'
)); ?>