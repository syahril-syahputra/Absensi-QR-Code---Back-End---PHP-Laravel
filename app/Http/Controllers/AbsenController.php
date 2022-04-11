<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AbsenController extends Controller
{
    public function absen(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'qrcode' => 'required',
        ]);
        if ($validate->fails()) {
            $respon = [
                'status' => 'error',
                'msg' => 'Validator error',
                'errors' => $validate->errors(),
                'content' => null,
            ];
            return response()->json($respon, 200);
        } else {

            $user = $request->user();
            $userid = $user->id;
            $cek = Absensi::where('employe_id', $userid)->whereDate("time_scan", date("Y-m-d"))->first();

            if (!$cek)
            {
                $newAbsensi = Absensi::create([
                    'employe_id' => $userid,
                    "time_scan" => Carbon::now() //ini awalnya new date() dan di set date_time_zone di router cuma ciubah pakai carbon
                ]);

                $newAbsensi->save();
                $respon = [
                    'status' => 'sukses',

                ];
            }else
            {
                $respon = [
                    'status' => 'sudahabsen',

                ];
            }

            return response()->json($respon, 200);

        }
    }
}
