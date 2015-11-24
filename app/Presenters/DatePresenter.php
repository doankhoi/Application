<?php
namespace App\Presenters;
use Carbon\Carbon;

trait DatePresenter {


	public function getCreatedAtAttribte($date) 
	{
		return $this->getDateFormatted($date);
	}

	public function getUpdatedAtAttribute($date) 
	{
		return $this->getDateFormatted($date);
	}

	public function getDateFormatted($date)
	{
		return Carbon::parse($date)->format((config('app.locale') == 'vi') ? 'm/d/Y' : 'Y/m/d');
	}

}