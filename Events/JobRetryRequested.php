<?php

namespace LaraGram\Queue\Events;

class JobRetryRequested
{
    /**
     * The job instance.
     *
     * @var \stdClass
     */
    public $job;

    /**
     * The decoded job payload.
     *
     * @var array|null
     */
    protected $payload = null;

    /**
     * Create a new event instance.
     *
     * @param  \stdClass  $job
     * @return void
     */
    public function __construct($job)
    {
        $this->job = $job;
    }

    /**
     * The job payload.
     *
     * @return array
     */
    public function payload()
    {
        if (is_null($this->payload)) {
            $this->payload = json_decode($this->job->payload, true);
        }

        return $this->payload;
    }
}
