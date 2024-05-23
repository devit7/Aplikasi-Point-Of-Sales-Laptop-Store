<?php

namespace App\Http\Controllers\AksesController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
        if ($response->getStatusCode() == 200) {
            return view('admin.setting', compact('data'));
        } else {
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        }
    }

    public function updateData(UpdateRequest $request, $toko)
    {
        // dd($request->all(), $toko);
        $validated = $request->validated();

        $logo_toko_name = $request->input('old_logo_toko');
        if ($request->hasFile('logo_toko')) {
            $logo_toko = $request->file('logo_toko');
            $logo_toko_name = $logo_toko->getClientOriginalName();
            $logo_toko->storePubliclyAs('logos', $logo_toko_name, 'public');
        }

        $data = [
            'nama_toko' => $validated['nama_toko'],
            'no_hp' => $validated['no_hp'],
            'alamat' => $validated['alamat'],
            'logo_toko' => $logo_toko_name,
        ];

        // $token = 'Bearer 3|hsCLwqd8roBQ7zXXHG0WZghmrCe5RuIgGhhOl2Dxc73d7c89';
        // $request->headers->set('Authorization', $token);

        $request->headers->set('Content-Type', 'application/json');
        $request->headers->set('Accept', 'application/json');
        $request = Request::create('http://127.0.0.1:8000/api/toko/' . $toko, 'PUT', $data);
        // dd("request", $request);

        $response = app()->handle($request);
        // dd("response", $response);

        $data = json_decode($response->getContent(), true);
        // dd("data", $data);

        if ($response->getStatusCode() == 200) {
            session()->flash('success', 'Toko berhasil di update');
            return redirect()->route('admin.setting');
        } else {
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        }
    }
}
