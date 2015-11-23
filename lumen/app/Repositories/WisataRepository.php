<?php

namespace App\Repositories;

use App\Wisata;
use Auth;

class WisataRepository
{
	public function getAllWisataPaginate($n)
	{
		$wisata = Wisata::latest()->simplePaginate($n);
		return $wisata;
	}

	public function store($inputs, $user_id)
	{
		$wisata = new Wisata;
		$wisata->name = $inputs['name'];
		$wisata->user_id = $user_id;
		// $wisata->user_id = 1;
		$wisata->save();
	}

	public function update($inputs, $id)
	{
		$wisata = $this->getById($id);

		if($this->checkUser($wisata))
		{
			$wisata->name = $inputs['name'];
			return $wisata->save();
		}

		return false;
	}

	public function destroy($id)
	{
		$wisata = $this->getById($id);

		if($this->checkUser($wisata))
		{
			return $wisata->delete();
		}

		return false;
	}

	public function getById($id)
	{
		return Wisata::findOrFail($id);
	}

	public function checkUser(Wisata $wisata)
	{
		return true;
	}

}
