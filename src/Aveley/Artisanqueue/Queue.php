<?php

namespace Aveley\Artisanqueue;

use Illuminate\Support\Facades\Facade;

/**
 * Class Queue
 *
 * @package Aveley\Artisanqueue
 */
class Queue extends Facade {
    /**
     * Queue the artisan command
     *
     * @param $command
     * @param $arguments
     */
    public static function artisan($command, $arguments = array())
    {
        \Illuminate\Support\Facades\Queue::push('Aveley\Artisanqueue\Queue', array('command' => $command, 'arguments' => $arguments));
    }

    /**
     * Executes the artisan command
     * @param $job
     * @param $data
     */
    public function fire($job, $data)
    {
        \Artisan::call($data['command'], $data['arguments']);

        $job->delete();
    }
} 