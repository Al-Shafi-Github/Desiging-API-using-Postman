<?php

namespace App\Http\Controllers;

use auth;
use App\Models\Member;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class MemberController extends Controller
{
    //
    function getUser()
    {
        return Member::get();
    }
    // SELECT `id`, `phone_number`, `password`, `name`, `email`, `profession`, `blood_group`, `hsc_year`, `hsc_roll`, `hsc_board`, `hsc_institute_name`, `ssc_year`, `ssc_roll`, `ssc_board`, `ssc_institute_name`, `present_address`, `permanent_address`, `created_at`, `updated_at` FROM `members` WHERE 1
    function register(Request $req)
    {
        $data = new Member;
        $data->phone_number = $req->phone_number;
        $data->password =  Hash::make($req->password);
        $data->name = $req->name;
        $data->email = $req->email;
        $data->profession = $req->profession;
        $data->blood_group = $req->blood_group;
        $data->hsc_year = $req->hsc_year;
        $data->hsc_roll = $req->hsc_roll;
        $data->hsc_board = $req->hsc_board;
        $data->hsc_institute_name = $req->hsc_institute_name;
        $data->ssc_year = $req->ssc_year;
        $data->ssc_roll = $req->ssc_roll;
        $data->ssc_board = $req->ssc_board;
        $data->ssc_institute_name = $req->ssc_institute_name;
        $data->present_address = $req->present_address;
        $data->permanent_address = $req->permanent_address;
        $data->img = $req->file('file')->store('apiDocs');
        $data->save();
    }



    public function getUserById($id)
    {
        $user = Member::find($id);
        return $user;
    }

    public function search(Request $request)
    {
        $query = $request->all; // Get the search query from the request

        $results = Member::where(function ($queryBuilder) use ($query) {
            $queryBuilder
                ->where('phone_number', 'like', '%' . $query . '%')
                ->orWhere('password', 'like', '%' . $query . '%')
                ->orWhere('name', 'like', '%' . $query . '%')
                ->orWhere('email', 'like', '%' . $query . '%')
                ->orWhere('profession', 'like', '%' . $query . '%')
                ->orWhere('blood_group', 'like', '%' . $query . '%')
                ->orWhere('hsc_year', 'like', '%' . $query . '%')
                ->orWhere('hsc_roll', 'like', '%' . $query . '%')
                ->orWhere('hsc_board', 'like', '%' . $query . '%')
                ->orWhere('hsc_institute_name', 'like', '%' . $query . '%')
                ->orWhere('ssc_year', 'like', '%' . $query . '%')
                ->orWhere('ssc_roll', 'like', '%' . $query . '%')
                ->orWhere('ssc_board', 'like', '%' . $query . '%')
                ->orWhere('ssc_institute_name', 'like', '%' . $query . '%')
                ->orWhere('present_address', 'like', '%' . $query . '%')
                ->orWhere('permanent_address', 'like', '%' . $query . '%');
        })->get();

        return response()->json(['data' => $results]);
    }

    public function searchform(Request $request)
    {
        $query = $request->all; // Get the search query from the request

        $results = Member::where(function ($queryBuilder) use ($query) {
            $queryBuilder
                ->Where('profession', 'like', '%' . $query . '%') //
                ->orWhere('blood_group', 'like', '%' . $query . '%') //
                ->orWhere('hsc_year', 'like', '%' . $query . '%') //
                ->orWhere('hsc_roll', 'like', '%' . $query . '%')
                ->orWhere('hsc_board', 'like', '%' . $query . '%') //
                ->orWhere('hsc_institute_name', 'like', '%' . $query . '%') //
                ->orWhere('ssc_year', 'like', '%' . $query . '%') //
                ->orWhere('ssc_roll', 'like', '%' . $query . '%')
                ->orWhere('ssc_board', 'like', '%' . $query . '%') //
                ->orWhere('ssc_institute_name', 'like', '%' . $query . '%'); //
        })->get();

        return response()->json(['data' => $results]);
    }

    public function login(Request $req)
    {
        $user = Member::where(['email'=>$req->email])->first();
        if(!$user || !Hash::check($req->password,$user->password))
        {
            return 'Username or password is not matched';
        }else{
            return 'Login Successful';
        }
    }
    
}
