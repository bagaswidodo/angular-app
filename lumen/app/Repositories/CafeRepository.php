<?php

namespace App\Repositories;

use App\Cafe;
use Auth;

class CafeRepository
{
	public function getAllCafe()
	{
		$cafe = Cafe::with('cafe')
				->simplePaginate($n);

		return $cafe;
	}

	public function store($inputs, $user_id)
	{
		$cafe = new Cafe;
		$cafe->name = $inputs['name'];
		$cafe->user_id = $user_id;
		$cafe->save();
	}

	public function update($inputs, $id)
	{
		$cafe = $this->getById($id);

		if($this->checkUser($cafe))
		{
			$cafe->name = $inputs['name'];
			return $cafe->save();
		}
		return false;
	}

	public function destroy($id)
	{
		$cafe = $this->getById($id);

		if($this->checkUser($cafe))
		{
			return $cafe->delete();
		}

		return false;
	}

	public function getById($id)
	{
		return Cafe::findOrFail($id);
	}

	public function checkUser(Cafe $cafe)
	{
		return true;//fake
	}
}
