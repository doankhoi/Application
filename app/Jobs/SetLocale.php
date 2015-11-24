<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use Request;

class SetLocale extends Job implements SelfHandling
{

    protected $languages = ['vi', 'en'];

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if(!session()->has('locale'))
        {
            session()->put('locale', Request::getPreferredLanguage($this->languages));
        }

        app()->setLocale(session('locale'));
    }
}
