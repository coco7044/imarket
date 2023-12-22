<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\ScrapeMail;
use Illuminate\Support\Facades\Mail;



class SendScrapeMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $backItems;
    public $geoItems;
    public $email;

    public function __construct($backItems,$geoItems,$email)
    {
        $this->backItems = $backItems;
        $this->geoItems = $geoItems;
        $this->email = $email;
    
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->email)
        ->send(new ScrapeMail($this->backItems,$this->geoItems));
    }
}
