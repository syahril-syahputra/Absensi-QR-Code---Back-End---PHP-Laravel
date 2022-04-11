<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Department;
use App\Models\Employe;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Department::withCount('employe')->get();
    }

    public function byDate($date)
    {
        try {
            $result =  Absensi::join('employes', 'absensis.employe_id', '=', 'employes.id')
                ->whereDate('time_scan', $date)
                ->selectRaw('employes.department_id, count(*) as jumlahHadir')
                ->groupBy('employes.department_id')
                ->get()
                ->makeHidden(['department_id'])
                ->groupBy('department_id');
            return response()->json($result, Response::HTTP_OK);
        } catch (QueryException $th) {
            $response = [
                'message' => 'failed' . $th
            ];
            return response()->json($response, Response::HTTP_BAD_REQUEST);
        }
    }

    public function byDepartmentAndDate($id, $tgl)
    {
        return Employe::where('department_id', $id)
            ->leftJoin('absensis', function ($join) use ($tgl) {
                $join->on('absensis.employe_id', '=', 'employes.id')
                    ->whereDate('absensis.time_scan', $tgl);
            })
            ->get()
            ->makeHidden(['employe_id']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $validatedRequest = request()->validate([
            'name' => 'string|required',
        ]);




        try {
            $department = Department::create($validatedRequest);
            $department['employe_count'] = 0;
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
    public function update(Request $request, $id)
    {
        $updatingEntry = Department::withCount('employe')->find($id);

        $validatedRequest = request()->validate([

          'name' => 'string|required',
        ]);

        try {
          $updatingEntry->update($validatedRequest);
          $updatingEntry->refresh();
          // ENCAPSULATE semua response dalam metode json();
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
        $toBeDeletedEntry = Department::find($id);
        $toBeDeletedEntry->employe()->delete();
        $toBeDeletedEntry->delete();

        return response()->json($toBeDeletedEntry, Response::HTTP_OK);
    }
}
