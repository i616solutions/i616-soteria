<?php

namespace i616\Soteria\Commands;

use Illuminate\Console\Command;

class SoteriaCommand extends Command
{
    public $signature = 'soteria';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
