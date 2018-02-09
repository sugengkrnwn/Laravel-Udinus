<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LombaController extends Controller
{
    //
    function index(){
        if(Auth::user()->role != 'admin'){
            return 'maaf anda ga boleh masuk';
        }
        return view('lomba.index');
    }

    function detail($id){
        return view('lomba.detail');
    }

    function add(){
        if(Auth::user()->role != 'admin'){
            return 'maaf anda ga boleh masuk';
        }
        return view('lomba.add');
    }

    function create(Request $request){
        // dd($request);
        if(Auth::user()->role != 'admin'){
            return 'maaf anda ga boleh masuk';
        }
        $nama = $request->nama;
        $deskripsi = $request->deskripsi;
        $poster = $request->poster;
        $tanggal = $request->tanggal;

        if($nama == null){
            return 'nama kosong, mohon diisi';
        }
        $lomba = new \App\Lomba;
        $lomba->nama = $nama;
        $lomba->deskripsi =  $deskripsi;
        $lomba->poster = $poster;
        $lomba->tanggal_tutup = $tanggal;
        $lomba->save();
        return redirect('lomba');

    }

    function edit($id){
        if(Auth::user()->role != 'admin'){
            return 'maaf anda ga boleh masuk';
        }
        $lomba = \App\Lomba::find($id);

        return view('lomba.edit')->with('lomba',$lomba);
    }

    function update(Request $request,$id){
        if(Auth::user()->role != 'admin'){
            return 'maaf anda ga boleh masuk';
        }
        $nama = $request->nama;
        $deskripsi = $request->deskripsi;
        $poster = $request->poster;
        $tanggal = $request->tanggal;

        if($nama == null){
            return 'nama kosong, mohon diisi';
        }

        $lomba = \App\Lomba::find($id);
        $lomba->nama = $nama;
        $lomba->deskripsi =  $deskripsi;
        $lomba->poster = $poster;
        $lomba->tanggal_tutup = $tanggal;
        $lomba->save();
        return redirect('lomba');
    }

    function delete($id){
        if(Auth::user()->role != 'admin'){
            return 'maaf anda ga boleh masuk';
        }
        $lomba = \App\Lomba::find($id);
        return view('lomba.delete')->with('lomba',$lomba);
    }

    function confirmDelete($id){
        if(Auth::user()->role != 'admin'){
            return 'maaf anda ga boleh masuk';
        }
        $lomba = \App\Lomba::find($id);
        $lomba->delete();
        return redirect('lomba');
    }
}