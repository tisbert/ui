<?php

namespace atk4\ui\TableColumn;

/**
 * Column for formatting money.
 */
class Money extends Generic
{
    // overrides

    public $attr = ['all'=>['class'=>['right aligned single line']]];

    public function getDataCellHTML(\atk4\data\Field $f = null)
    {
        if (!isset($f)) {
            throw new Exception(['Money column requires a field']);
        }

        return $this->app->getTag(
            'td',
            ['class'=> '{$_'.$f->short_name.'_money}'],
            '{$'.$f->short_name.'}'
        );
    }

    public function getHTMLTags($row, $field)
    {
        if ($field->get() < 0) {
            return ['_'.$field->short_name.'_money'=>'right aligned single line negative'];
        }

        return ['_'.$field->short_name.'_money'=>'right aligned single line'];
    }
}
