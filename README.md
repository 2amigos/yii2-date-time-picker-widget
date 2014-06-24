Bootstrap DateTimePicker Widget for Yii2
========================================

[![Latest Stable Version](https://poser.pugx.org/2amigos/yii2-date-time-picker-widget/v/stable.svg)](https://packagist.org/packages/2amigos/yii2-date-time-picker-widget) [![Total Downloads](https://poser.pugx.org/2amigos/yii2-date-time-picker-widget/downloads.svg)](https://packagist.org/packages/2amigos/yii2-date-time-picker-widget) [![Latest Unstable Version](https://poser.pugx.org/2amigos/yii2-date-time-picker-widget/v/unstable.svg)](https://packagist.org/packages/2amigos/yii2-date-time-picker-widget) [![License](https://poser.pugx.org/2amigos/yii2-date-time-picker-widget/license.svg)](https://packagist.org/packages/2amigos/yii2-date-time-picker-widget)

Renders a [Bootstrap DateTimePicker plugin](http://www.malot.fr/bootstrap-datetimepicker/).

Installation
------------
The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require "2amigos/yii2-date-time-picker-widget" "*"
```
or add

```json
"2amigos/yii2-date-time-picker-widget" : "*"
```

to the require section of your application's `composer.json` file.

Usage
-----

This widget renders a Bootstrap DateTimePicker input control. Best suitable for model with date string attribute. Its functionality is similar to [Bootstrap DatePicker plugin](https://github.com/2amigos/yii2-date-picker-widget) but this widget is enhanced with Time selection. 

It also allows you to restrict the views so you can use this widget as a DatePicker, TimePicker, or DateTimePicker. 

There are two ways of using it, with an `ActiveForm` instance or as a widget setting up its `model` and `attribute`.

```
<?php
use dosamigos\datetimepicker\DateTimePicker;

// as a widget
?>

<?= DateTimePicker::widget([
	'model' => $model,
	'attribute' => 'created_at',
	'language' => 'es',
	'size' => 'ms',
	'clientOptions' => [
		'autoclose' => true,
		'format' => 'dd MM yyyy - HH:ii P',
		'todayBtn' => true
	]
]);?>

<?php 
// with an ActiveForm instance displayed as a TimePicker

use dosamigos\datetimepicker\DateTimePicker;
?>
<?= $form->field($tour, 'date_from')->widget(DateTimePicker::className(), [
	'language' => 'es',
	'size' => 'ms',
	'template' => '{input}',
	'pickButtonIcon' => 'glyphicon glyphicon-time',
	'inline' => true,
	'clientOptions' => [
		'startView' => 1,
		'minView' => 0,
		'maxView' => 1,
		'autoclose' => true,
		'linkFormat' => 'HH:ii P', // if inline = true
		// 'format' => 'HH:ii P', // if inline = false
		'todayBtn' => true
	]
]);?>
```

Further Information
-------------------
Please, check the [Bootstrap DateTimePicker site](http://www.malot.fr/bootstrap-datetimepicker/) documentation for further information about its configuration options. 


> [![2amigOS!](http://www.gravatar.com/avatar/55363394d72945ff7ed312556ec041e0.png)](http://www.2amigos.us)  
<i>Web development has never been so fun!</i>  
[www.2amigos.us](http://www.2amigos.us)
