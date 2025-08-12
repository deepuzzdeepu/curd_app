<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{


    public function view()
{
    return view('users.index'); // your Blade page
}

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $users = DB::table('reg')->select([
                'id', 'name', 'age', 'address', 'gender', 'email', 'phone', 'occupation', 'date_of_birth'
                // 'id', 'name', 'username', 
            ]);

            return DataTables::of($users)
                ->addColumn('action', function($row) {
                    return '
                        <button class="btn btn-sm btn-primary edit-user" data-id="'.$row->id.'">Edit</button>
                        <button class="btn btn-sm btn-danger delete-user" data-id="'.$row->id.'">Delete</button>
                    ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        // return view('list_users');
        return view('users.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'         => 'required|string|max:255',
            'age'          => 'required|integer|min:1|max:120',
            'address'      => 'required|string',
            'gender'       => 'required|in:male,female,other',
            'email'        => 'required|email|unique:reg,email',
            'phone'        => 'required|string|max:20',
            'occupation'   => 'required|string|max:255',
            'date_of_birth'=> 'required|date'
        ]);

        DB::table('reg')->insert([
            'name'         => $request->input('name'),
            'age'          => $request->input('age'),
            'address'      => $request->input('address'),
            'gender'       => $request->input('gender'),
            'email'        => $request->input('email'),
            'phone'        => $request->input('phone'),
            'occupation'   => $request->input('occupation'),
            'date_of_birth'=> $request->input('date_of_birth'),
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        return response()->json(['success' => 'User created successfully!']);
    }

    public function show($id)
    {
        $user = DB::table('reg')->where('id', $id)->first();
        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'         => 'required|string|max:255',
            'age'          => 'required|integer|min:1|max:120',
            'address'      => 'required|string',
            'gender'       => 'required|in:male,female,other',
            'email'        => 'required|email|unique:reg,email,' . $id,
            'phone'        => 'required|string|max:20',
            'occupation'   => 'required|string|max:255',
            'date_of_birth'=> 'required|date'
        ]);

        DB::table('reg')
            ->where('id', $id)
            ->update([
                'name'         => $request->input('name'),
                'age'          => $request->input('age'),
                'address'      => $request->input('address'),
                'gender'       => $request->input('gender'),
                'email'        => $request->input('email'),
                'phone'        => $request->input('phone'),
                'occupation'   => $request->input('occupation'),
                'date_of_birth'=> $request->input('date_of_birth'),
                'updated_at'   => now(),
            ]);

        return response()->json(['success' => 'User updated successfully!']);
    }

    public function destroy($id)
    {
        DB::table('reg')->where('id', $id)->delete();
        return response()->json(['success' => 'User deleted successfully!']);
        // DB::beginTransaction();
        // $errr =0
        // $erro =1;
        // if()
    }


    public function user_profile($id){
        // $user = DB::table('users')->where('id', $id)->first();
        // $email = $user->email;
        // $user = DB::table('users')->where('email'==$email);
        return view('profile_registration');

    }


}
