<?php 

namespace Netflex\NewsletterFoundation\Console\Commands;

use Illuminate\Console\Command;

class RegisterTemplateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nnf:register:template';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Registers default newsletter template in Netflex';

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