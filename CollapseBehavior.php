<?php
/**
 * Created by PhpStorm.
 * User: lordovol
 * Date: 7/1/2015
 * Time: 10:42 μμ
 */

namespace spyr0s\tabcollapse;


use yii\base\Behavior;
use yii\helpers\Json;

class CollapseBehavior extends Behavior
{

    public function registerClientScipt()
    {
        $view = $this->owner->getView();
        TabCollapseAsset::register($view);

        $id = $this->owner->options['id'];
        $options = Json::encode($this->owner->clientOptions);
        $js = '$("#' . $id . '").tabCollapse(' . $options . ')';
        $view->registerJs($js);

        if (!empty($this->owner->tabCollapseEvents)) {
            $js = [];
            foreach ($this->owner->tabCollapseEvents as $event => $function) {
                $js[] = '$("#' . $id . '").on("' . $event . '", ' . $function . ');';
            }
            $view->registerJs(implode("\n", $js));
        }
    }
} 