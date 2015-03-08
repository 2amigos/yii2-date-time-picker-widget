<?php
namespace tests\data\overrides;

use dosamigos\datetimepicker\DateTimePicker;
use dosamigos\datetimepicker\DateTimePickerAsset;
use yii\helpers\Json;
use yii\web\View;

class TestDateTimePicker extends DateTimePicker
{
    /**
     * Registers required script for the plugin to work as a DateTimePicker
     */
    public function registerClientScript()
    {
        $view = $this->getView();

        if ($this->language !== null) {
            $this->clientOptions['language'] = $this->language;
            DateTimePickerAsset::register(
                $view
            )->js[] = 'js/locales/bootstrap-datetimepicker.' . $this->language . '.js';
        } else {
            DateTimePickerAsset::register($view);
        }

        $id = $this->options['id'];
        $selector = ";jQuery('#$id')";

        if (strpos($this->template, '{button}') !== false || $this->inline) {
            $selector .= ".parent()";
        }

        $options = !empty($this->clientOptions) ? Json::encode($this->clientOptions) : '';

        $js[] = "$selector.datetimepicker($options);";

        if ($this->inline) {
            $js[] = "$selector.find('.datetimepicker-inline').addClass('center-block');";
            $js[] = "$selector.find('table.table-condensed').attr('align','center').css('margin','auto');";
        }

        if (!empty($this->clientEvents)) {
            foreach ($this->clientEvents as $event => $handler) {
                $js[] = "$selector.on('$event', $handler);";
            }
        }
        $view->registerJs(implode("\n", $js), View::POS_READY, 'test-datetimepicker-js');
    }
}
