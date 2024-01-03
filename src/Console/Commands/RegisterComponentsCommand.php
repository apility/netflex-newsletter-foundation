<?php 

namespace Netflex\NewsletterFoundation\Console\Commands;

use Illuminate\Console\Command;

class RegisterComponentsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nnf:register:components';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Registers all default newsletter components in Netflex';

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