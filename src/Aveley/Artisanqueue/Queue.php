<?php

namespace Aveley\Artisanqueue;

use \Illuminate\Support\Facades;
use \Artisan;

/**
 * Class Queue
 *
 * @package Aveley\Artisanqueue
 */
class Queue extends Facades\Queue {
    /**
     * Queue the artisan command
     *
     * @param $command
     * @param $arguments
     */
    public static function artisan($command, $arguments = [], $tube = null)
    {
        Queue::push('Aveley\Artisanqueue\Queue', ['command' => $command, 'arguments' => $arguments], $tube);
    }

    /**
     * Executes the artisan command
     * @param $job
     * @param $data
     */
    public function fire($job, $data)
    {
        Artisan::call($data['command'], $data['arguments']);

        $job->delete();
    }
} 