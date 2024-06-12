<?php

namespace App\Http\Controllers\AksesController;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\AksesController\merkAksesController as MerAcKon;
use App\Http\Controllers\AksesController\SupplierAksesController as AksesSup;
use DateTime;

class ProductAksesController extends Controller
{
    public function getAll()
    {
        $token = session()->get('token');
        $request = Request::create('http://127.0.0.1:8000/api/products', 'GET');
        $request->headers->set('Authorization', 'Bearer ' . $token);
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

    public function createData(StoreRequest $request)
    {
        $validated = $request->validated();

        $data = [
            'product_name' => $validated['product_name'],
            'harga_jual' => $validated['harga_jual'],
            'harga_asli' => $validated['harga_asli'],
            'stock' => $validated['stock'],
            'supplier_id' => $validated['supplier_id'],
            'merk_id' => $validated['merk_id'],
            'status' => 'aktif',
        ];
        // dd($data);

        $temp_request = Request::create(
            'http://127.0.0.1:8000/api/products',
            'POST',
            $data,
        );

        if ($request->hasFile('img')) {
            $temp_request->files->set('img', $request->file('img'));
        }

        $response = app()->handle($temp_request);
        // dd("Response from ProductAksesController -> createData", $response);

        if ($response->getStatusCode() == 201) {
            session()->flash('success', 'Product "' . $validated['product_name'] . '" berhasil di tambahkan');
            return redirect('/admin/product');
        } else {
            return redirect()->back()->withInput()->withErrors(['messages' => 'Data Product gagal di tambahkan']);
            // return response()->json([
            //     'message' => 'Unauthorized',
            // ], 401);
        }
    }

    public function getDetail($token)
    {
        $token = session()->get('token');
        $request = Request::create('http://127.0.0.1:8000/api/products', 'GET');
        $request->headers->set('Authorization', 'Bearer ' . $token);
        $response = app()->handle($request);
        $data = json_decode($response->getContent(), true);
        if ($response->getStatusCode() == 200) {
            return dd($data['data']);
            // return view('products.show', ['data' => $data['data']]);
        } else {
            return response()->json([
                'message' => 'Unauthorized',
            ]);
        }
    }

    public function deleteData(Product $product)
    {
        // dd("ProductAksesController > deleteData", $product->id);
        $request = Request::create('http://127.0.0.1:8000/api/products/' . $product->id, 'DELETE');
        $response = app()->handle($request);

        if ($response->getStatusCode() == 200 && $product->status == 'tidak aktif') {
            return redirect()->route('products.admin.index')->with('nonaktif', 'Product ' . $product->product_name . ' Sudah Tidak Aktif');
        }

        if ($response->getStatusCode() == 200) {
            return redirect()->route('products.admin.index')->with('success', 'Product ' . $product->product_name . ' berhasil dinonaktifkan');
        } else {
            return response()->json([
                'message' => 'Unauthorized',
            ]);
        }
    }

    public function productAdminNew()
    {
        $sup = $this->getsup();
        $merk = $this->getMerk();
        // dd($merk);
        // dd(count($sup));

        return view('admin.product.create', ['Supp' => $sup, 'merks' => $merk]);
    }

    public function productAdminUpdate($produk)
    {

        $requestSupplier = Request::create('http://127.0.0.1:8000/api/suppliers', 'GET');
        $responseSupplier = app()->handle($requestSupplier);
        $dataSupplier = json_decode($responseSupplier->getContent(), true);
        // dd($dataSupplier);
        $requestMerk = Request::create('http://127.0.0.1:8000/api/merk', 'GET');
        $responseMerk = app()->handle($requestMerk);
        $dataMerk = json_decode($responseMerk->getContent(), true);
        // make request api to get data for product
        $request = Request::create('http://127.0.0.1:8000/api/products/' . $produk, 'GET');
        $responsePro = app()->handle($request);
        $pro = json_decode($responsePro->getContent(), true);
        // dd($pro);
        // dd($dataMerk);
        // dd("ProductAksesController->getAllToCreate()", compact('dataSupplier', 'dataMerk'));
        if ($responseSupplier->getStatusCode() == 200 && $responseMerk->getStatusCode() == 200) {
            return view('admin.product.update', [
                'dataSupplier' => $dataSupplier['data'],
                'dataMerk' => $dataMerk['data'],
                'pro' => $pro['data'],
            ]);
        } else {
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        }
    }

    public function productAdminMakeUpdate(UpdateRequest $request, Product $product)
    {
        $validated = $request->validated();

        $data = [
            'product_name' => $validated['product_name'],
            'stock' => $validated['stock'],
            'harga_jual' => $validated['harga_jual'],
            'harga_asli' => $validated['harga_asli'],
            'supplier_id' => $validated['supplier_id'],
            'merk_id' => $validated['merk_id'],
            'status' => $validated['status'],
        ];

        $temp_request = Request::create(
            'http://127.0.0.1:8000/api/products/' . $product->id,
            'PUT',
            $data,
        );

        if ($request->hasFile('img_product')) {
            $temp_request->files->set('img_product', $request->file('img_product'));
        }

        $response = app()->handle($temp_request);

        if ($response->getStatusCode() == 200) {
            session()->flash('success', 'Product ' . $product->product_name . ' berhasil di update');
            return redirect('/admin/product');
        } else {
            dd($response);
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        }


    }
    public function getDate()
    {
        $dataTime = new DateTime('now');
        // dd($dataTime);
        $format = $dataTime->format('YmdHis');
        return ($format);
    }


        //fungsi dibawah ini untuk mengirimkan data Merk & Supplier ke halaman create
        public function getAllToCreate()
        {
            $token = session()->get('token');
            $requestSupplier = Request::create('http://127.0.0.1:8000/api/suppliers', 'GET');
            $requestSupplier->headers->set('Authorization', 'Bearer ' . $token);
            $responseSupplier = app()->handle($requestSupplier);
            $dataSupplier = json_decode($responseSupplier->getContent(), true);
            // dd($dataSupplier);
            $requestMerk = Request::create('http://127.0.0.1:8000/api/merk', 'GET');
            $requestSupplier->headers->set('Authorization', 'Bearer ' . $token);
            $responseMerk = app()->handle($requestMerk);
            $dataMerk = json_decode($responseMerk->getContent(), true);
            // dd($dataMerk);
            // dd("ProductAksesController->getAllToCreate()", compact('dataSupplier', 'dataMerk'));
            if ($responseSupplier->getStatusCode() == 200 && $responseMerk->getStatusCode() == 200) {
                return view('admin.product.create', compact('dataSupplier', 'dataMerk'));
            } else {
                return response()->json([
                    'message' => 'Unauthorized',
                ], 401);
            }
        }

    /*
        public function getEdit($product)
        {
            $request = Request::create('http://127.0.0.1:8000/api/products/' . $product, 'GET');
            $response = app()->handle($request);
            $data = json_decode($response->getContent(), true);
            if ($response->getStatusCode() == 200) {
                return view('admin.merk.update', ['merk' => $data['data']]);
            } else {
                return response()->json(['message' => 'Unauthorized'], 401);
            }
        }
    */
    /*
        public function updateData(UpdateRequest $request, Product $product)
        {
            $validated = $request->validated();

            $data = [
                'product_name' => $validated['product_name'],
                'stock' => $validated['stock'],
                'harga_jual' => $validated['harga_jual'],
                'harga_asli' => $validated['harga_asli'],
                'supplier_id' => $validated['supplier_id'],
                'merk_id' => $validated['merk_id'],
                'status' => $validated['status'],
            ];

            $temp_request = Request::create(
                'http://127.0.0.1:8000/api/products/' . $product->id,
                'PUT',
                $data,
            );

            if ($request->hasFile('img_product')) {
                $temp_request->files->set('img_product', $request->file('img_product'));
            }

            $response = app()->handle($temp_request);

            if ($response->getStatusCode() == 200) {
                session()->flash('success', 'Data Product berhasil di update');
                return redirect()->route('product.index');
            } else {
                return response()->json([
                    'message' => 'Unauthorized',
                ], 401);
            }
        }
    */
}
