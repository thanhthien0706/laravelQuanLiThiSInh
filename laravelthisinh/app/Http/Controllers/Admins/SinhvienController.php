<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\student;
use Illuminate\Support\Facades\DB;

class SinhvienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = student::paginate(6);
        return view('admins.pages.sinhvien.index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ten_thi_sinh = '';
        $idNgaySinh = '';
        $idQueQuan = '';
        $idTongDiem = '';
        $idStudent = '';


        for ($i = 0; $i < count($request->input('data_id')); $i++) {
            if ($request->input('data_id')[$i]['name'] == 'ten_thi_sinh') {
                $ten_thi_sinh = $request->input('data_id')[$i]['value'];
            }
            if ($request->input('data_id')[$i]['name'] == 'idNgaySinh') {
                $idNgaySinh = $request->input('data_id')[$i]['value'];
            }
            if ($request->input('data_id')[$i]['name'] == 'idQueQuan') {
                $idQueQuan = $request->input('data_id')[$i]['value'];
            }
            if ($request->input('data_id')[$i]['name'] == 'idTongDiem') {
                $idTongDiem = $request->input('data_id')[$i]['value'];
            }
            if ($request->input('data_id')[$i]['name'] == 'idStudent') {
                $idStudent = $request->input('data_id')[$i]['value'];
            }
        }
        if ($idStudent == null) {
            $student = new student;
            $student->TenThiSinh = $ten_thi_sinh;
            $student->NgaySinh = $idNgaySinh;
            $student->QueQuan = $idQueQuan;
            $student->TongDiem = $idTongDiem;
            $student->save();
            return response()->json([
                'successAddStudent' => 'Thêm thành công'
            ]);
        } else {
            $student = student::where('MaThiSinh', $idStudent)
                ->update(['TenThiSinh' => $ten_thi_sinh, 'NgaySinh' => $idNgaySinh, 'QueQuan' => $idQueQuan, 'TongDiem' => $idTongDiem]);
            // $student->TenThiSinh = $ten_thi_sinh;
            // $student->NgaySinh = $idNgaySinh;
            // $student->QueQuan = $idQueQuan;
            // $student->TongDiem = $idTongDiem;
            // $student->save();
            return response()->json([
                'editThanhCong' => 'Sửa thành công'
            ]);
        }
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
        $student = student::where('MaThiSinh', $id)->get();
        // return $student;
        return response()->json([
            'editDataCategory' => $student
        ]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // return $request;
        student::where('MaThiSinh', $id)->delete();
        return redirect(route('sinhvien.index'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function searchStudent(Request $request)
    {
        if ($request->get('data_id')) {
            $query = $request->get('data_id');
            $data = DB::table('students')
                ->where('TenThiSinh', 'LIKE', "%{$query}%")
                ->get();

                return response()->json([
                    'datasudent' => $data
                ]);
        }
    }
}
