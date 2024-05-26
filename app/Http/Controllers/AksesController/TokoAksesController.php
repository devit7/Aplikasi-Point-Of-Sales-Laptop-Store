<?php

namespace App\Http\Controllers\AksesController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Toko;
use App\Http\Requests\Toko\StoreRequest;
use App\Http\Requests\Toko\UpdateRequest;

class TokoAksesController extends Controller
{
    // public function createData(StoreRequest $request)
    // {
    //     $validated = $request->validated();

    //     if ($request->hasFile('logo_toko')) {
    //         $request->file('logo_toko')->storePubliclyAs('logos', $request->file('logo_toko')->getClientOriginalName(), 'public');
    //     }

    //     $data = [
    //         'nama_toko' => $validated['nama_toko'],
    //         'no_hp' => $validated['no_hp'],
    //         'alamat' => $validated['alamat'],
    //         'logo_toko' => $validated['logo_toko'],
    //     ];

    //     $request = Request::create('http://127.0.0.1:8000/api/toko', 'POST', $data);
    //     $response = app()->handle($request);
    //     $data = json_decode($response->getContent(), true);
    //     if ($response->getStatusCode() == 201) {
    //         session()->flash('success', 'Toko berhasil ditambahkan');
    //         return redirect()->route('admin.setting');
    //     } else if ($response->getStatusCode() == 422) {
    //         $errorMessage = $data['message'];
    //         session()->flash('error', $errorMessage);
    //         return redirect()->route('admin.setting');
    //     } else {
    //         return response()->json([
    //             'message' => 'Unauthorized',
    //         ], 401);
    //     }
    // }

    public function getAll()
    {
        $request = Request::create('http://127.0.0.1:8000/api/toko', 'GET');
        $response = app()->handle($request);
        $data = json_decode($response->getContent(), true);
        // dd("getAll Toko", $data['data']);
        if ($response->getStatusCode() == 200) {
            return view('admin.setting', ['toko' => $data['data']]);
        } else {
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        }
    }

    public function updateData(UpdateRequest $request, Toko $toko)
    {
        // dd($request->hasFile('logo_toko'), $toko);
        $validated = $request->validated();
        // dd("validated", $validated);

        $logo_toko_name = $request->input('old_logo_toko');
        if ($request->hasFile('logo_toko')) {
            $logo_toko = $request->file('logo_toko');
            $logo_toko_name = 'logo' . '.' . $logo_toko->getClientOriginalExtension();
            $logo_toko->storePubliclyAs('logos', $logo_toko_name, 'public');
        }
        // $logo_toko_name = null;
        // if ($request->hasFile('logo_toko')) {
        //     $logo_toko = $request->file('logo_toko');
        //     $logo_toko_name = time() . '.' . $logo_toko->getClientOriginalExtension();
        //     $logo_toko->storePubliclyAs('logos', $logo_toko_name, 'public');
        // }

        $data = [
            'nama_toko' => $validated['nama_toko'],
            'logo_toko' => $logo_toko_name,
            'alamat' => $validated['alamat'],
            'no_hp' => $validated['no_hp'],
        ];
        // dd("data", $data);

        $api_url = 'http://127.0.0.1:8000/api/toko/' . $toko->id . '?' . http_build_query($data);
        // dd("api_url", $api_url);
        $request = Request::create($api_url, 'PUT');
        // dd("request", $request);    

        $response = app()->handle($request);
        // dd("response", $response);

        if ($response->getStatusCode() == 200) {
            session()->flash('success', 'Toko berhasil di update');
            return redirect()->route('admin.index');
        } else {
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        }
    }
}
