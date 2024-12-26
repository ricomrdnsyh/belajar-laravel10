<?php

namespace App\Http\Controllers;

use App\Models\Multimedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class MultimediaController extends Controller
{
    public function index(Request $request){
        $data = new Multimedia;

        if($request->get('search')){
            $data = $data->where('nama', 'LIKE', '%'.$request->get('search').'%')
            ->orWhere('jabatan', 'LIKE', '%'.$request->get('search').'%')
            ->orWhere('alamat', 'LIKE', '%'.$request->get('search').'%');
        }

        // $data = $data->onlyTrashed();

        $data = $data->get();

        return view('multimedia.index', compact('data', 'request'));
    }

    public function addMultimedia(){
        return view('multimedia.addMultimedia');
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(),[
            'image'         => 'required|mimes:png,jpg,jpeg|max:2048',
            'nama'          => 'required',
            'jenisKelamin'  => 'required',
            'jabatan'       => 'required',
            'alamat'        => 'required',
        ]);

        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $image      = $request->file('image');
        $filename   = date('Y-m-d').$image->getClientOriginalName();
        $path       = 'multimedia-image/'.$filename;

        Storage::disk('public')->put($path, file_get_contents($image));

        $data['image']          = $filename;
        $data['nama']           = $request->nama;
        $data['jenis_kelamin']  = $request->jenisKelamin;
        $data['jabatan']        = $request->jabatan;
        $data['alamat']         = $request->alamat;

        Multimedia::create($data);

        return redirect()->route('adminmultimedia')->with('success', 'Data Berhasil ditambahkan!');

    }

    public function editMultimedia(Request $request,$id){
        $data = Multimedia::find($id);

        return view('multimedia.editMultimedia', compact('data'));
    }

    public function updateMultimedia(Request $request,$id){
        $validator = Validator::make($request->all(),[
            'image'         => 'nullable|mimes:png,jpg,jpeg|max:2048',
            'nama'          => 'required',
            'jenisKelamin'  => 'required|in:Laki-laki,Perempuan',
            'jabatan'       => 'required',
            'alamat'        => 'required',
        ]);

        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $find = Multimedia::find($id);

        $data['nama']           = $request->nama;
        $data['jenis_kelamin']  = $request->jenisKelamin;
        $data['jabatan']        = $request->jabatan;
        $data['alamat']         = $request->alamat;

        $image      = $request->file('image');

        if($image){
            $filename   = date('Y-m-d').$image->getClientOriginalName();
            $path       = 'multimedia-image/'.$filename;

            if($find->image){
                Storage::disk('public')->delete('multimedia-image/'.$find->image);
            }

            Storage::disk('public')->put($path, file_get_contents($image));

            $data['image'] = $filename;
        }

        $find->update($data);

        return redirect()->route('adminmultimedia')->with('success', 'Data berhasil diubah! ');
    }

    public function deleteMultimedia(Request $request,$id){
        $data = Multimedia::find($id);

        if($data){
            $data->forceDelete();
        }

        return redirect()->route('adminmultimedia')->with('success', 'Data berhasil dihapus! ');
    }
}
