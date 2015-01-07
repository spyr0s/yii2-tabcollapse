<?php

namespace spyr0s\tabcollapse;


use kartik\tabs\TabsX;
use yii\helpers\Json;

class TabCollapseX extends TabsX{

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
        $options = Json::encode($this->tabCollapseOptions);
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
