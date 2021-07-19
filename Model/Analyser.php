<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Cron\Analyser\Model;

class Analyser extends \Magento\Framework\Model\AbstractModel {

    const CACHE_TAG = 'cron_schedule';

    protected function _construct() {

        $this->_init('Cron\Analyser\Model\ResourceModel\Analyser');
    }

}
