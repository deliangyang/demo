<?php

namespace App\Listeners;

use App\Events\ArticleShow;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ArticleShowNotify implements ShouldQueue
{

    use InteractsWithQueue;

    protected $connection = 'redis';

    public $queue = 'listeners';

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(ArticleShow $event)
    {
        $this->release();
        var_dump(111111111);
        var_dump($event);
    }
}
