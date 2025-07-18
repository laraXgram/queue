<?php

namespace LaraGram\Queue\Console;

use LaraGram\Console\Command;
use LaraGram\Console\Attribute\AsCommand;

#[AsCommand(name: 'queue:forget')]
class ForgetFailedCommand extends Command
{
    /**
     * The console command signature.
     *
     * @var string
     */
    protected $signature = 'queue:forget {id : The ID of the failed job}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete a failed queue job';

    /**
     * Execute the console command.
     *
     * @return int|null
     */
    public function handle()
    {
        if ($this->laragram['queue.failer']->forget($this->argument('id'))) {
            $this->components->info('Failed job deleted successfully.');
        } else {
            $this->components->error('No failed job matches the given ID.');

            return 1;
        }
    }
}
