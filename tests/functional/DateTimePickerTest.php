<?php

namespace tests;


use dosamigos\datetimepicker\DateTimePicker;
use tests\data\models\Post;
use tests\data\overrides\TestDateTimePicker;
use yii\web\JsExpression;
use yii\web\View;

class DateTimePickerTest extends TestCase
{

    public function testRenderWithModel()
    {
        $model = new Post();
        $model->create_time = 1425807308;
        $out = DateTimePicker::widget([
            'model' => $model,
            'attribute' => 'create_time'
        ]);
        $expected = '<div class="input-group date"><input type="text" id="post-create_time" class="form-control" name="Post[create_time]" value="Mar 8, 2015 9:35:08 AM" readonly="readonly"><span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span><span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span></div>';

        $this->assertEqualsWithoutLE($expected, $out);
    }

    public function testRenderWithNameAndValue()
    {
        $out = DateTimePicker::widget([
            'id' => 'test',
            'name' => 'test-editor-name',
            'value' => 'test-editor-value'
        ]);
        $expected = '<div class="input-group date"><input type="text" id="test" class="form-control" name="test-editor-name" value="test-editor-value" readonly="readonly"><span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span><span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span></div>';

        $this->assertEqualsWithoutLE($expected, $out);
    }

    public function testRenderInline()
    {
        $out = DateTimePicker::widget([
            'id' => 'test',
            'name' => 'test-editor-name',
            'value' => 'test-editor-value',
            'inline' => true
        ]);
        $expected = '<div><input type="text" id="test" class="form-control text-center" name="test-editor-name" value="test-editor-value" readonly="readonly"></div>';

        $this->assertEqualsWithoutLE($expected, $out);
    }

    public function testRenderWithSize()
    {
        $out = DateTimePicker::widget([
            'id' => 'test',
            'name' => 'test-editor-name',
            'value' => 'test-editor-value',
            'size' => 'lg'
        ]);
        $expected = '<div class="input-group date input-lg"><input type="text" id="test" class="form-control input-lg" name="test-editor-name" value="test-editor-value" readonly="readonly"><span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span><span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span></div>';

        $this->assertEqualsWithoutLE($expected, $out);
    }


    public function testDateTimePickerRegisterPluginScriptMethod()
    {
        $class = new \ReflectionClass('tests\\data\\overrides\\TestDateTimePicker');
        $method = $class->getMethod('registerClientScript');
        $method->setAccessible(true);

        $model = new Post();
        $model->create_time = 1425807308;

        $widget = TestDateTimePicker::begin(
            [
                'model' => $model,
                'attribute' => 'create_time',
                'language' => 'es',
                'clientEvents' => [
                    'changeDate' => new JsExpression('function(ev){console.log(ev);}')
                ]
            ]
        );

        $view = $this->getView();
        $widget->setView($view);
        $method->invoke($widget);

        $test = <<<JS
;jQuery('#post-create_time').parent().datetimepicker({"language":"es"});
;jQuery('#post-create_time').parent().on('changeDate', function(ev){console.log(ev);});
JS;
        $this->assertEquals($test, $view->js[View::POS_READY]['test-datetimepicker-js']);
    }
}
