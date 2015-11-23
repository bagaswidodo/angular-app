<?php

namespace App\Http\Controllers;

use Illuminate\Http\Exception\HttpResponseException;
use Illuminate\Http\Request;
use App\Repositories\WisataRepository;
use Auth;
use App\Wisata;

class WisataController extends Controller
{
	protected $wisataRepository;

	protected $rules = [
		'name' => 'required|max:200',
	];

	public function __construct(WisataRepository $wisataRepository)
	{
		$this->wisataRepository = $wisataRepository;
		// $this->middleware('auth',['only'=>['store','update','destroy']]);
	}

	public function index()
	{
		return $this->wisataRepository->getAllWisataPaginate(5);
		// return Wisata::latest()->simplePaginate(5);
	}

	public function store(Request $request)
	{
		$this->validate($request, $this->rules);
		$this->wisataRepository->store($request->all(),Auth::id());
		return $this->wisataRepository->getAllWisataPaginate(5);
	}

	public function update(Request $request, $id)
	{
		$this->validate($request, $this->rules);

		if($this->wisataRepository->update($request->all(),$id))
		{
			return ['result' => 'success'];
		}
	}

	public function destroy($id)
	{
		if($this->wisataRepository->destroy($id))
		{
			return ['result' => 'success'];
		}
	}
}