<?php

namespace App\Http\Controllers\AksesController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Toko;
use App\Http\Requests\Toko\UpdateRequest;

class TokoAksesController extends Controller
{

    public function getAll()
    {
        $request = Request::create('http://127.0.0.1:8000/api/toko', 'GET');
        $response = app()->handle($request);
        $data = json_decode($response->getContent(), true);
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
        $validated = $request->validated();
        $data = [
            'nama_toko' => $validated['nama_toko'],
            'alamat' => $validated['alamat'],
            'no_hp' => $validated['no_hp'],

        ];

        if ($request->hasFile('logo_toko')) {
            $file = $request->file('logo_toko');
            $data['logo_toko'] = $file;
        }

        $temp_request = Request::create(
            'http://127.0.0.1:8000/api/toko/' . $toko->id,
            'PUT',
            $data,
        );
        if ($request->hasFile('logo_toko')) {
            $file = $request->file('logo_toko');
            $temp_request->files->set('logo_toko', $file);
        }

        $response = app()->handle($temp_request);

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
