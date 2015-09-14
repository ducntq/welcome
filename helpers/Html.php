<?php

namespace app\helpers;


use yii\helpers\ArrayHelper;

class Html extends \yii\helpers\Html
{
    public static function buttonGroupLink($icon, $label, $href, $type = 'default', $options = [])
    {
        $labelHtml = '';
        if (!empty($icon)) $labelHtml = Html::tag('i', '', ['class' => 'fa ' . $icon]);
        if (!empty($label)) $labelHtml .= ' ' . Html::encode($label);

        $defaultOptions = ['class' => 'btn btn-' . $type, 'data-toggle' => 'tooltip', 'data-placement' => 'left'];
        if (!empty($options['class'])) {
            self::addCssClass($options, $defaultOptions['class']);
        }
        $options = ArrayHelper::merge($defaultOptions, $options);

        return Html::a($labelHtml, $href, $options);
    }
}