<?php

namespace Cron\Analyser\Ui\DataProvider\Cron;

use Cron\Analyser\Model\ResourceModel\Analyser\CollectionFactory;
use Cron\Analyser\Helper\Data as CronHelper;

class CronDataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider {

    public function __construct(
    CollectionFactory $collectionFactory, $name, $primaryFieldName, $requestFieldName, array $meta = [], array $data = [], CronHelper $cronHelper
    ) {
        $collection = $collectionFactory->create();
        parent::__construct(
                $name, $primaryFieldName, $requestFieldName, $meta, $data
        );
        $threshold = ($cronHelper->getThreshold()) ? $cronHelper->getThreshold(): 1;
        $thresholdSeconds = 3600 * $threshold;

        $file = fopen(__DIR__ . "/test.txt", 'a');
        $collectionReturn = $collectionFactory->create()
                ->addFieldToFilter('status', ['eq' => 'pending']);
        foreach ($collectionReturn as $item) {
            if($item->getStatus() == 'success'){
                $collectionReturn->removeItemByKey($item->getScheduleId());
            }
            if (is_null($item->getExecutedAt())) {
                if ((strtotime(date('Y-m-d H:i:s')) - strtotime($item->getScheduledAt())) < $thresholdSeconds) {
                    $collectionReturn->removeItemByKey($item->getScheduleId());
                }
            } else if (!is_null($item->getExecutedAt()) && is_null($item->getFinishedAt())) {
                if ((strtotime(date('Y-m-d H:i:s')) - strtotime($item->getScheduledAt())) < $thresholdSeconds) {
                    $collectionReturn->removeItemByKey($item->getScheduleId());
                }
            }
        }
        foreach($collectionReturn as $item){
            $item->setStatus('broken');
        }
        $this->collection = $collectionReturn;
    }

}
