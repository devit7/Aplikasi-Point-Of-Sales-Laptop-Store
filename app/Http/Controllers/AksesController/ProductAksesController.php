<?php

namespace App\Http\Controllers\AksesController;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductAksesController extends Controller
{
    public function getAll()
    {
        $request = Request::create('http://127.0.0.1:8000/api/products', 'GET');
        $response = app()->handle($request);
        // merubah json ke array
        $data = json_decode($response->getContent(), true);
        // dd("ProductAksesController->getAll()", $data);
        if ($response->getStatusCode() == 200) {
            return view('admin.product.index', [
                'data' => $data['data'],
            ]);
        } else {
            return response()->json([
                'message' => 'Unauthorized',
                'error_code' => $response->getStatusCode(),
            ], 401);
        }
    }

    //fungsi dibawah ini untuk mengirimkan data Merk & Supplier ke halaman create
    public function getAllToCreate()
    {
        $requestSupplier = Request::create('http://127.0.0.1:8000/api/suppliers', 'GET');
        $responseSupplier = app()->handle($requestSupplier);
        $dataSupplier = json_decode($responseSupplier->getContent(), true);

        $requestMerk = Request::create('http://127.0.0.1:8000/api/merk', 'GET');
        $responseMerk = app()->handle($requestMerk);
        $dataMerk = json_decode($responseMerk->getContent(), true);

        // dd("ProductAksesController->getAllToCreate()", compact('dataSupplier', 'dataMerk'));
        if ($responseSupplier->getStatusCode() == 200 && $responseMerk->getStatusCode() == 200) {
            return view('admin.product.create', compact('dataSupplier', 'dataMerk'));
        } else {
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        }
    }

    public function createData(StoreRequest $request)
    {
        // dd("Request", $request);
        $validated = $request->validated();
        // dd("Validator", $validated, "Request", $request);

        $data = [
            'product_name' => $validated['product_name'],
            'stock' => $validated['stock'],
            'harga_jual' => $validated['harga_jual'],
            'harga_asli' => $validated['harga_asli'],
            'supplier_id' => $validated['supplier_id'],
            'merk_id' => $validated['merk_id'],
        ];

        $temp_request = Request::create(
            'http://127.0.0.1:8000/api/products',
            'POST',
            $data,
        );

        if ($request->hasFile('img_product')) {
            $temp_request->files->set('img_product', $request->file('img_product'));
        }

        $response = app()->handle($temp_request);
        // dd("Response from ProductAksesController -> createData", $response);

        if ($response->getStatusCode() == 201) {
            session()->flash('success', 'Data Product berhasil di tambahkan');
            return redirect()->route('product.index');
        } else {
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        }
    }

    // public function getDetail($product)
    // {
    //     $request = Request::create('http://127.0.0.1:8000/api/products/' . $product, 'GET');
    //     $response = app()->handle($request);
    //     $data = json_decode($response->getContent(), true);
    //     if ($response->getStatusCode() == 200) {
    //         return dd($data['data']);
    //     } else {
    //         return response()->json([
    //             'message' => 'Unauthorized',
    //         ]);
    //     }
    // }

    // public function getEdit($product)
    // {
    //     $request = Request::create('http://127.0.0.1:8000/api/products/' . $product, 'GET');
    //     $response = app()->handle($request);
    //     $data = json_decode($response->getContent(), true);
    //     if ($response->getStatusCode() == 200) {
    //         return view('admin.merk.update', ['merk' => $data['data']]);
    //     } else {
    //         return response()->json(['message' => 'Unauthorized'], 401);
    //     }
    // }

    // public function updateData(UpdateRequest $request, Product $product)
    // {
    //     $validated = $request->validated();

    //     $data = [
    //         'product_name' => $validated['product_name'],
    //         'stock' => $validated['stock'],
    //         'harga_jual' => $validated['harga_jual'],
    //         'harga_asli' => $validated['harga_asli'],
    //         'supplier_id' => $validated['supplier_id'],
    //         'merk_id' => $validated['merk_id'],
    //     ];

    //     $temp_request = Request::create(
    //         'http://127.0.0.1:8000/api/products/' . $product->id,
    //         'PUT',
    //         $data,
    //     );

    //     if ($request->hasFile('img_product')) {
    //         $temp_request->files->set('img_product', $request->file('img_product'));
    //     }

    //     $response = app()->handle($temp_request);

    //     if ($response->getStatusCode() == 200) {
    //         session()->flash('success', 'Data Product berhasil di update');
    //         return redirect()->route('product.index');
    //     } else {
    //         return response()->json([
    //             'message' => 'Unauthorized',
    //         ], 401);
    //     }
    // }

    // public function deleteData($product)
    // {
    //     $request = Request::create('http://127.0.0.1:8000/api/products/' . $product, 'DELETE');
    //     $response = app()->handle($request);
    //     if ($response->getStatusCode() == 200) {
    //         return redirect()->route('products.index')->with('success', 'Data Product berhasil dihapus');
    //     } else {
    //         return response()->json([
    //             'message' => 'Unauthorized',
    //         ]);
    //     }
    // }
}
