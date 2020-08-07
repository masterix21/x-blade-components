<?php

namespace Masterix21\XBladeComponents\Commands;

use Illuminate\Console\Command;

class XBladeComponentsCommand extends Command
{
    public $signature = 'x-blade-components';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
