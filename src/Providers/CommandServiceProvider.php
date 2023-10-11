<?php

namespace Results\Providers;

use Results\Commands\ResultsCommand;

class CommandServiceProvider implements Provider
{
    public function register()
    {
        if (! defined('WP_CLI') || ! WP_CLI) {
            return;
        }

        \WP_CLI::add_command('results', ResultsCommand::class);
    }
}
