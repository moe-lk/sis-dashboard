<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ImportDashbords extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:dashboard {org} {file_path}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'To import dashboards to given Org';

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
     * @return int
     */
    public function handle()
    {
        return 0;
    }
}
