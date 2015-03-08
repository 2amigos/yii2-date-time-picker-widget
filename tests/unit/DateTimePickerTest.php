<?php
/**
 *
 * CKEditorTest.php
 *
 * Date: 02/03/15
 * Time: 12:07
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 */

namespace tests;


use dosamigos\datetimepicker\DateTimePicker;
use tests\data\models\Post;
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
        $expected = '<div class="input-group date"><input type="text" id="post-create_time" class="form-control" name="Post[create_time]" value="1425807308" readonly="readonly"><span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span><span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span></div>';

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

//    public function testRenderInline()
//    {
//        $model = new Post();
//
//        $widget = TestCKEditor::begin(
//            [
//                'model' => $model,
//                'attribute' => 'message',
//                'preset' => 'basic'
//            ]
//        );
//        $basic = [
//            ['name' => 'undo'],
//            ['name' => 'basicstyles', 'groups' => ['basicstyles', 'cleanup']],
//            ['name' => 'colors'],
//            ['name' => 'links', 'groups' => ['links', 'insert']],
//            ['name' => 'others', 'groups' => ['others', 'about']],
//        ];
//        $this->assertArrayHasKey('toolbarGroups', $widget->clientOptions);
//        $this->assertEquals($basic, $widget->clientOptions['toolbarGroups']);
//
//    }
//
//    public function testCKEditorStandard()
//    {
//        $model = new Post();
//
//        $widget = TestCKEditor::begin(
//            [
//                'model' => $model,
//                'attribute' => 'message',
//                'preset' => 'standard'
//            ]
//        );
//        $standard = [
//            ['name' => 'clipboard', 'groups' => ['mode', 'undo', 'selection', 'clipboard', 'doctools']],
//            ['name' => 'editing', 'groups' => ['tools', 'about']],
//            '/',
//            ['name' => 'paragraph', 'groups' => ['templates', 'list', 'indent', 'align']],
//            ['name' => 'insert'],
//            '/',
//            ['name' => 'basicstyles', 'groups' => ['basicstyles', 'cleanup']],
//            ['name' => 'colors'],
//            ['name' => 'links'],
//            ['name' => 'others'],
//        ];
//        $this->assertArrayHasKey('toolbarGroups', $widget->clientOptions);
//        $this->assertEquals($standard, $widget->clientOptions['toolbarGroups']);
//    }
//
//    public function testCKEditorFull()
//    {
//        $model = new Post();
//
//        $widget = TestCKEditor::begin(
//            [
//                'model' => $model,
//                'attribute' => 'message',
//                'preset' => 'full'
//            ]
//        );
//        $full = [
//            ['name' => 'document', 'groups' => ['mode', 'document', 'doctools']],
//            ['name' => 'clipboard', 'groups' => ['clipboard', 'undo']],
//            ['name' => 'editing', 'groups' => [ 'find', 'selection', 'spellchecker']],
//            ['name' => 'forms'],
//            '/',
//            ['name' => 'basicstyles', 'groups' => ['basicstyles', 'colors','cleanup']],
//            ['name' => 'paragraph', 'groups' => [ 'list', 'indent', 'blocks', 'align', 'bidi' ]],
//            ['name' => 'links'],
//            ['name' => 'insert'],
//            '/',
//            ['name' => 'styles'],
//            ['name' => 'blocks'],
//            ['name' => 'colors'],
//            ['name' => 'tools'],
//            ['name' => 'others'],
//        ];
//        $this->assertArrayHasKey('toolbarGroups', $widget->clientOptions);
//        $this->assertEquals($full, $widget->clientOptions['toolbarGroups']);
//    }
//
//    public function testCKEditorRegisterPluginScriptMethod()
//    {
//        $class = new \ReflectionClass('tests\\data\\overrides\\TestCKEditor');
//        $method = $class->getMethod('registerPlugin');
//        $method->setAccessible(true);
//
//        $model = new Post();
//        $widget = TestCKEditor::begin(
//            [
//                'model' => $model,
//                'attribute' => 'message',
//                'preset' => 'basic'
//            ]
//        );
//        $view = $this->getView();
//        $widget->setView($view);
//        $method->invoke($widget);
//
//        $test = <<<JS
//CKEDITOR.replace('post-message', {"height":200,"toolbarGroups":[{"name":"undo"},{"name":"basicstyles","groups":["basicstyles","cleanup"]},{"name":"colors"},{"name":"links","groups":["links","insert"]},{"name":"others","groups":["others","about"]}],"removeButtons":"Subscript,Superscript,Flash,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe","removePlugins":"elementspath","resize_enabled":false});
//dosamigos.ckEditorWidget.registerOnChangeHandler('post-message');
//JS;
//        $this->assertEquals($test, $view->js[View::POS_READY]['test-ckeditor-js']);
//    }
}
