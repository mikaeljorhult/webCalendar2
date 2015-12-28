<?php

namespace WebCalendar\Console\Commands;

use Illuminate\Console\Command;

class UpdateCalendarsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'calendars:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch, save and cache calendars.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->call('calendars:fetch');
        $this->call('calendars:cache');
    }
}
