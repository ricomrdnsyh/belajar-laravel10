<?php

namespace App\Http\Controllers;

use App\Models\Multimedia;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Barryvdh\DomPDF\Facade\Pdf;

class DataTableController extends Controller
{
    public function clientSide(Request $request){
        $data = new Multimedia();

        if($request->get('search')){
            $data = $data->where('nama', 'LIKE', '%'.$request->get('search').'%')
            ->orWhere('jabatan', 'LIKE', '%'.$request->get('search').'%')
            ->orWhere('alamat', 'LIKE', '%'.$request->get('search').'%');
        }

        // $data = $data->onlyTrashed();

        $data = $data->get();

        if($request->get('export') == 'pdf'){
            $pdf = Pdf::loadView('pdf.multimedia', ['data' => $data]);
            return $pdf->stream('Data Tim Multimedia.pdf');
        }

        return view('datatable.clientside', compact('data', 'request'));
    }

    public function serverSide(Request $request){

        if($request->ajax()){

            $data = new Multimedia;
            $data = $data->latest();

            return DataTables::of($data)
            ->addColumn('action', function($data){
                return '<a class="btn btn-sm btn-secondary btn-icon" href="#"><i data-feather="eye"></i></a>
                        <a class="btn btn-sm btn-warning btn-icon" href="'.route('adminedit.multimedia', ['id'=> $data->id]).'"><i data-feather="edit-2"></i></a>
                        <a class="btn btn-sm btn-danger btn-icon" href="" data-bs-toggle="modal" data-bs-target="#modalHapus'.$data->id.'"><i data-feather="trash-2"></i></a>';
            })
            ->addColumn('image', function($data){
                return '<img src="'.asset('storage/multimedia-image/'.$data->image).'" alt="profile">';
            })
            ->addColumn('nama', function($data){
                return $data->nama;
            })
            ->addColumn('jenisKelamin', function($data){
                return $data->jenis_kelamin;
            })
            ->addColumn('jabatan', function($data){
                return $data->jabatan;
            })
            ->addColumn('alamat', function($data){
                return $data->alamat;
            })
            ->rawColumns(['image','action'])
            ->make(true);
        }

        return view('datatable.serverside', compact('request'));
    }
}
