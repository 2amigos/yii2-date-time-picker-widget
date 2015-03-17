<?php

namespace tests;


use dosamigos\datetimepicker\DateTimePickerAsset;
use yii\web\AssetBundle;

class DateTimePickerAssetTest extends TestCase
{
    public function testRegister()
    {
        $view = $this->getView();
        $this->assertEmpty($view->assetBundles);
        DateTimePickerAsset::register($view);
        $this->assertEquals(4, count($view->assetBundles));
        $this->assertArrayHasKey('yii\\web\\JqueryAsset', $view->assetBundles);
        $this->assertTrue($view->assetBundles['dosamigos\\datetimepicker\\DateTimePickerAsset'] instanceof AssetBundle);
        $content = $view->renderFile('@tests/data/views/rawlayout.php');
        $this->assertContains('jquery.js', $content);
        $this->assertContains('bootstrap.js', $content);
        $this->assertContains('bootstrap-datetimepicker.js', $content);

    }
}
