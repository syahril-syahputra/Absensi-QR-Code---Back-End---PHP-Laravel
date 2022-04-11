<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EmployeCOntroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return Employe::where('department_id', $id)->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $validatedRequest = request()->validate([
            'pn' => 'string|required',
            'nama' => 'string|required',
            'username' => 'string|required',
            'password' => 'string|required',
            'department_id' => 'integer|required',
        ]);
        try {
            $department = Employe::create($validatedRequest);
            return response()->json($department, Response::HTTP_OK);
        } catch (QueryException $th) {
            $response = [
                'message' => 'failed' . $th
            ];
            return response()->json($response, Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $updatingEntry = Employe::find($id);

        $validatedRequest = request()->validate([
            'pn' => 'string|required',
            'nama' => 'string|required',
            'username' => 'string|required',
            'password' => 'string|required',
        ]);

        try {
          $updatingEntry->update($validatedRequest);
          $updatingEntry->refresh();

          return response()->json($updatingEntry, Response::HTTP_OK);
        } catch (\Exception $e) {
          abort(500, "SERVER ERROR");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $toBeDeletedEntry = Employe::find($id);
        $toBeDeletedEntry->delete();

        return response()->json($toBeDeletedEntry, Response::HTTP_OK);
    }
}
