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

    public function behaviors()
    {
        return [
            'collapse' => [
                'class' => 'spyr0s\tabcollapse\CollapseBehavior'
            ]
        ];
    }
}
