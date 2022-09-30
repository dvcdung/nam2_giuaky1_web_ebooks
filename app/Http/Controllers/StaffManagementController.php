<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaffManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $staffs = DB::select("select * from ebooks");
        return view('StaffManagement/show_staff_list', ['staffs' => $staffs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(isset($_POST['act']) && $_POST['act'] === "add") {
            $name = filter_input(INPUT_POST, 'name');
            $year = filter_input(INPUT_POST, 'year', FILTER_VALIDATE_INT);
            number_format($price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT), 2);
            try {
                DB::insert("insert into ebooks (id, name, year, price) values (null, '$name', $year, $price)");
                return redirect()->route('staff-management.index');
            } catch (\Throwable $th) {
                //throw $th;
            }
        }
        return view('StaffManagement/add_staff');
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
    public function update(Request $request) {
        if(isset($_POST['act']) && $_POST['act'] === "save") {
            try {
                DB::update("update
                ebooks
              SET
                name = '".$_POST['object']['name']."',
                year = ".$_POST['object']['year'].",
                price = ".$_POST['object']['price']."
              WHERE
                id = ". $_POST['object']['id']);
                return redirect()->route('staff-management.index');
            } catch (\Throwable $th) {
                //throw $th;
            }
        }else {
            $id = $request->input('id');
            try {
                $object = DB::select("select * from ebooks where id = $id");
                return view('StaffManagement/update_staff', ['object' => $object[0]]);
            } catch (\Throwable $th) {
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->input('id');
        try {
            DB::delete("delete from ebooks where id = $id");
        } catch (\Throwable $th) {
        }
        return redirect()->route('staff-management.index');
    }

    public function resetTable() {
        try {
            DB::delete("delete from ebooks");

        } catch (\Throwable $th) {
            //throw $th;
        }    
        return redirect()->route('staff-management.index');
    }

    public function search(Request $request) {
        $pattern = trim($request->input('pattern'));
        // try {
            $staffs = DB::select("select * from ebooks where id like '%".$pattern."%' or name like '%".$pattern."%' or year like '%".$pattern."%' or price like'%".$pattern."%'");
            return view('StaffManagement/show_staff_list', ['staffs' => $staffs]);
        // } catch (\Throwable $th) {
            
        // }
    }
}
