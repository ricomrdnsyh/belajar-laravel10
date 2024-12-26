<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\returnSelf;

class UserController extends Controller
{

    public function user(){

        $data = User::get();

        return view('users.index', compact('data'));
    }

    public function addUser(){
        return view('users.addUser');
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(),[
            'email' => 'required|email|unique:users,email',
            'nama'  => 'required',
            'password'  => 'required|min:3',

        ]);

        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['name']       = $request->nama;
        $data['email']      = $request->email;
        $data['password'] = Hash::make($request->password);

        User::create($data);

        return redirect()->route('adminuser')->with('success', 'Data Berhasil ditambahkan!');
    }

    public function editUser(Request $request,$id){
        $data = User::find($id);

        return view('users.editUser', compact('data'));
    }

    public function updateuser(Request $request,$id){

        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'nama'  => 'required',
            'password'  => 'nullable',

        ]);

        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['name']       = $request->nama;
        $data['email']      = $request->email;

        if($request->password){
            $data['password'] = Hash::make($request->password);
        }

        User::whereId($id)->update($data);

        return redirect()->route('adminuser')->with('success', 'Data berhasil diubah! ');
    }

    public function deleteUser(Request $request,$id){
        $data = User::find($id);

        if($data){
            $data->delete();
        }

        return redirect()->route('adminuser')->with('success', 'Data berhasil dihapus! ');
    }
}
