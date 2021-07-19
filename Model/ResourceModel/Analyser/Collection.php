<?php

/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Cron\Analyser\Model\ResourceModel\Analyser;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection {

    /**
     * @var string
     */
    protected $_idFieldName = 'schedule_id';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct() {
        $this->_init(
                \Cron\Analyser\Model\Analyser::class, \Cron\Analyser\Model\ResourceModel\Analyser::class
        );
    }
    

}
