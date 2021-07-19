<?php

namespace Cron\Analyser\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
	protected $_scheduleFactory;

	public function __construct(\Magento\Cron\Model\ScheduleFactory $scheduleFactory)
	{
		$this->_scheduleFactory = $scheduleFactory;
	}

	public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
	{
            //Dummy job to test the functionality
		$data = [
			'job_code'         => "consumers_runner_dummy",
			'status' => 'pending',
			'messages'      => NULL,
			'created_at'         => '2021-06-10 10:14:06',
			'scheduled_at'       => '2021-06-10 11:14:06',
			'executed_at'       => NULL,
			'finished_at'       => NULL,
		];
		$scheduleJobOne = $this->_scheduleFactory->create();
		$scheduleJobOne->addData($data)->save();
                
		$data = [
			'job_code'         => "consumers_runner_dummy",
			'status' => 'pending',
			'messages'      => NULL,
			'created_at'         => '2021-06-10 10:14:06',
			'scheduled_at'       => '2021-06-10 12:24:06',
			'executed_at'       => NULL,
			'finished_at'       => NULL,
		];
		$scheduleJobTwo = $this->_scheduleFactory->create();
		$scheduleJobTwo->addData($data)->save();
		$data = [
			'job_code'         => "consumers_runner_dummy",
			'status' => 'processing',
			'messages'      => NULL,
			'created_at'         => '2021-06-10 10:14:06',
			'scheduled_at'       => '2021-06-10 11:14:06',
			'executed_at'       => '2021-06-10 11:24:06',
			'finished_at'       => NULL,
		];
		$scheduleJobThree = $this->_scheduleFactory->create();
		$scheduleJobThree->addData($data)->save();
		$data = [
			'job_code'         => "consumers_runner_dummy",
			'status' => 'processing',
			'messages'      => NULL,
			'created_at'         => '2021-06-10 11:14:06',
			'scheduled_at'       => '2021-06-10 00:12:06',
			'executed_at'       => '2021-06-10 00:22:06',
			'finished_at'       => NULL,
		];
		$scheduleJobFour = $this->_scheduleFactory->create();
		$scheduleJobFour->addData($data)->save();
		$data = [
			'job_code'         => "consumers_runner_dummy",
			'status' => 'pending',
			'messages'      => NULL,
			'created_at'         => '2021-06-10 10:14:06',
			'scheduled_at'       => '2021-06-10 12:14:06',
			'executed_at'       => NULL,
			'finished_at'       => NULL,
		];
		$scheduleJobFive = $this->_scheduleFactory->create();
		$scheduleJobFive->addData($data)->save();
	}
}