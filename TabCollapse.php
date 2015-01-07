<?php

namespace spyr0s\tabcollapse;

use yii\bootstrap\Tabs;
use yii\helpers\Json;

class TabCollapse extends Tabs{

    public $tabCollapseOptions = [];
    public $tabCollapseEvents = [];

    public function run(){
        parent::run();
        $this->registerClientScipt();
    }

    public function registerClientScipt(){
        $view = $this->getView();
        TabCollapseAsset::register($view);

        $id = $this->options['id'];
        $options = Json::encode($this->clientOptions);
        $js = '$("#'.$id.'").tabCollapse('.$options.')';
        $view->registerJs($js);
        
        if (!empty($this->tabCollapseEvents)) {
            $js = [];
            foreach ($this->tabCollapseEvents as $event => $function) {
                $js[] = '$("#'.$id.'").on("'.$event.'", '.$function.');';
            }
            $view->registerJs(implode("\n", $js));
        }
    }
}
