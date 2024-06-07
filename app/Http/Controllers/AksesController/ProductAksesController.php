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

// use App\Http\Controllers\AksesController\merkAksesController as MerAcKon;
// use DateTime;
// use App\Http\Controllers\AksesController\SupplierAksesController as AksesSup;


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
        // dd($dataSupplier);
        $requestMerk = Request::create('http://127.0.0.1:8000/api/merk', 'GET');
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

    public function createData(StoreRequest $request)
    {
        // dd($request->all(), $request->file('img_product'));

        // dd("Request", $request);
        $validated = $request->validated();
        // dd("Validator", $validated, "Request", $request);

        $data = [
            'product_name' => $validated['product_name'],
            'harga_jual' => $validated['harga_jual'],
            'harga_asli' => $validated['harga_asli'],
            'stock'=>$validated['stock'],
            'supplier_id' => $validated['supplier_id'],
            'merk_id' => $validated['merk_id'],
        ];
        // dd($data);

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
            return redirect('/admin/product');
        } else {
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        }
    }

    public function getDetail($product)
    {
        $request = Request::create('http://127.0.0.1:8000/api/products/' . $product, 'GET');
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
        } 
        else {
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        }
    }

    public function deleteData($idproduct)
    {
        // dd($idproduct);
        $request = Request::create('http://127.0.0.1:8000/api/products/' . $idproduct, 'DELETE');
        $response = app()->handle($request);
        
        if ($response->getStatusCode() == 200) {
            return redirect('/admin/product')->with('success', 'Data Product berhasil dihapus');
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


    public function productAdminUpdate($idProduk)
    {
        
        $pro = Product::with('supplier', 'merk')->findOrFail($idProduk);
        $requestSupplier = Request::create('http://127.0.0.1:8000/api/suppliers', 'GET');
        $responseSupplier = app()->handle($requestSupplier);
        $dataSupplier = json_decode($responseSupplier->getContent(), true);
        // dd($dataSupplier);
        $requestMerk = Request::create('http://127.0.0.1:8000/api/merk', 'GET');
        $responseMerk = app()->handle($requestMerk);
        $dataMerk = json_decode($responseMerk->getContent(), true);
        // dd($dataMerk);
        // dd("ProductAksesController->getAllToCreate()", compact('dataSupplier', 'dataMerk'));
        if ($responseSupplier->getStatusCode() == 200 && $responseMerk->getStatusCode() == 200) {
            return view('admin.product.update', compact('dataSupplier', 'dataMerk', 'pro'));
        } else {
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        }
    }

    public function productAdminMakeUpdate($idProduk, Request $req)
    {
        // dd("productAdminMakeUpdate", $req->all(), "id", $idProduk);

        $val = $req->validate([
            'product_name' => 'required',
            'harga_jual' => 'required',
            'harga_asli' => 'required',
            'stock' => 'required',
            'supplier' => 'required',
            'merk' => 'required',
        ]);
        // dd('masuk');
        $p = Product::findOrFail($idProduk);
        $p->product_name = $val['product_name'];
        $p->stock = $val['stock'];
        $p->harga_jual = $val['harga_jual'];
        $p->harga_asli = $val['harga_asli'];
        $p->supplier_id = $val['supplier'];
        $p->merk_id = $val['merk'];

        $val['img'] = '';
        if ($req->cbCheck == "ubah") {
            if ($req->hasFile('img_product')) {
                // dd($req->file('img_product')->extension());
                $file = $req->file('img_product');
                $filename = $req->nama . $this->getDate() . "." . $file->extension();
                // $file->storeAs('public/images', $filename);
                $file->storePubliclyAs('image_product', $filename, 'public');

                $val['img'] = $filename;

            } else {
                $val['img'] = 'null';
            }
            $p->img = $val['img'];
        } else {
            $p->img = $req->fotoLama;
        }


        if ($req->merk == '0') {

            //input Merk baru
            $aksesMerk = new MerAcKon();

            $idMerk = $aksesMerk->makeMerk($req->newMerk);
            $p->merk_id = $idMerk;
        }
        if ($req->supplier == '0') {
            $aksesSupp = new AksesSup();
            $idSup = $aksesSupp->makeNewSup($req->namaSupli, $req->noSUp, $req->companySup, $req->alamatSup);
            $p->supplier_id = $idSup;

        }

        if ($p->save()) {
            session()->flash('success', 'Product ' . $p->product_name . ' berhasil di update');
            return redirect('/admin/product');
        }


    }
    public function getDate()
    {
        $dataTime = new DateTime('now');
        // dd($dataTime);
        $format = $dataTime->format('YmdHis');
        return ($format);
    }
}
