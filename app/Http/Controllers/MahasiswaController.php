<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MahasiswaController extends Controller
{
    public function index(){
        $response = Http::get(config('services.api.api_base_url').'/mahasiswa');

        return view ('mahasiswa.index', [
            'mahasiswa' => $response->json()
        ]);
    }
    public function create(){
        return view ('mahasiswa.create');
    }
    public function store(Request $request){
        // dd($request->all());
        $response = Http::post(config('services.api.api_base_url').'/mahasiswa', [
            'nama'=>$request->nama,
            'nim'=>$request->nim,
            'email'=>$request->email,
            'prodi'=>$request->prodi,
        ]);
        return redirect('/mahasiswa');
    }
    public  function edit(string $nim){
         $response = Http::get(config('services.api.api_base_url').'/mahasiswa/'.$nim);
        return view ('mahasiswa.edit', [
            'mahasiswa' => $response->json()
        ]);
    }
    public function update(Request $request){
        $response = Http::put(config('services.api.api_base_url').'/mahasiswa/'.$request->nim, [
            'nama'=>$request->nama,
            'nim'=>$request->nim,
            'email'=>$request->email,
            'prodi'=>$request->prodi,
        ]);
        return redirect('/mahasiswa');
    }
    public function destroy(string $nim){
        $response = Http::delete(config('services.api.api_base_url').'/mahasiswa/'.$nim);
        return redirect('/mahasiswa');
    }
}
