<?php
namespace App\Repositories;
use Illuminate\Database\Eloquent\ModelNotFoundException;

abstract class BaseRepository
{
	protected $model;

	public function getNumber()
	{

		$total = $this->model->count();
		$new = $this->model->where('seen', 0)->count();
		return compact('total', 'new');
	}

	public function destroy($id)
	{
		$this->getById($id)->delete();
	}

	public function getById($id)
	{
		try
		{
			$user = $this->model->findOrFail($id);
		} 
		catch (ModelNotFoundException $e)
		{
			return null;
		}
		
		return $user;
	}
}