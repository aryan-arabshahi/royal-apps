<?php

namespace App\Traits;

use Log;

trait Logger
{
    /**
     * Get the log prefix
     */
    private function getLogPrefix()
    {
        return $this->logPrefix ?? get_class($this);
    }

    /**
     * @param string $message
     * @param array $data = []
     * 
     * @return void
     */
    protected function debug(string $message, array $data = []): void
    {
        $this->log('debug', $message, $data);
    }

    /**
     * @param string $message
     * @param array $data = []
     * 
     * @return void
     */
    protected function error(string $message, array $data = []): void
    {
        $this->log('error', $message, $data);
    }

    /**
     * @param string $type
     * @param string $message
     * @param array $data = []
     * 
     * @return void
     */
    private function log(string $type, string $message, array $data = []): void
    {
        Log::$type(
            "[{$this->getLogPrefix()}] {$message}",
            $data
        );
    }
}
