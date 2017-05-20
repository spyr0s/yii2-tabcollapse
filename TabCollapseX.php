<?php

namespace spyr0s\tabcollapse;


use kartik\tabs\TabsX;
use yii\helpers\Json;
use yii\web\View;

class TabCollapseX extends TabsX{

    public $tabCollapseOptions = [];
    public $tabCollapseEvents = [];
    public $hashVarLoadPosition = View::POS_HEAD;
    
    public function run(){
        parent::run();
        $this->registerClientScipt();
    }

    public function behaviors()
    {
        return [
            'collapse' => [
                'class' => 'spyr0s\tabcollapse\CollapseBehavior'
            ]
        ];
    }

}
