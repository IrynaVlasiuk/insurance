<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ImportFromWinsure extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:windsure';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Imports Information from Windsure';

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
        //
    }
}
