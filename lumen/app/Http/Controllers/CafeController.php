<?php 
namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use App\Cafe;

class CafeController extends BaseController
{

    /**
* Send back all comments as JSON
*
* @return Response
*/
    public function index()
    {
        return response()->json(Cafe::get());
    }

    /**
* Store a newly created resource in storage.
*
* @return Response
*/
    public function store(Request $request)
    {
        return response()->json(Cafe::create($request->all()));
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param int $id
    * @return Response
    */
    public function destroy($id)
    {
        return response()->json(Cafe::destroy($id));
    }   


      /**
    * Show the specified resource from storage.
    *
    * @param int $id
    * @return Response
    */
    public function show($id)
    {
        return response()->json(Cafe::find($id));
    }  

    public function update(Request $request, $id)
    {
        $cafe = Cafe::find($id);
        $cafe->update($request->all());
        return response()->json($request->all());
    }
}