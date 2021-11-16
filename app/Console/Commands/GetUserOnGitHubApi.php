<?php

namespace App\Console\Commands;

use App\Http\Controllers\ApiController;
use Illuminate\Console\Command;

class GetUserOnGitHubApi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:getuserongithub';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Armazena 500 candidatos no banco de dados';

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
        return ApiController::getUserOnGitHub();
    }
}
