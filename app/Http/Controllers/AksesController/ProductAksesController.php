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
        dd($request->all(),$request->file('fileUpload'));

        // dd("Request", $request);
        $validated = $request->validated();
        // dd("Validator", $validated, "Request", $request);

        $data = [
            'product_name' => $validated['namaProduk'],
            'stock' => $validated['stok'],
            'harga_jual' => $validated['hargaJual'],
            'harga_asli' => $validated['hargaAsli'],
            'supplier_id' => $validated['supplier'],
            'merk_id' => $validated['merk'],
        ];

        $temp_request = Request::create(
            'http://127.0.0.1:8000/api/products',
            'POST',
            $data,
        );

        if ($request->hasFile('fileUpload')) {
            $temp_request->files->set('img_product', $request->file('fileUpload'));
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
        } else {
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        }
    }

    public function deleteData($product)
    {
        $request = Request::create('http://127.0.0.1:8000/api/products/' . $product, 'DELETE');
        $response = app()->handle($request);
        if ($response->getStatusCode() == 200) {
            return redirect()->route('products.index')->with('success', 'Data Product berhasil dihapus');
        } else {
            return response()->json([
                'message' => 'Unauthorized',
            ]);
        }
    }


    //tidak perlu membuat function controller lagi, cukup memakai yang sudah ada diatas
    // public function productAdmin(){
    //     $produk = Product::select('product.id', 'product.product_name', 'product.stock', 'product.harga_jual', 'product.harga_asli', 'product.img', 'supplier.supplier_name', 'merk.merk_name')
    //     ->join('supplier', 'product.supplier_id', '=', 'supplier.id')
    //     ->join('merk', 'product.merk_id', '=', 'merk.id')
    //     ->get();
    //     // dd($produk);
    //     return view('admin.product.index',['produks'=>$produk]);
    // }
    public function productAdminNew(){
        $sup = $this->getsup();
        $merk = $this->getMerk();
        // dd($merk);
        // dd(count($sup));

        return view('admin.product.create',['Supp'=>$sup,'merks'=>$merk]);
    }

    public function productAdminMakeNew(Request $req){
        // dd($req->all(),$req->file('fileUpload'));

        $val = $req->validate([
            'namaProduk'=>'required',
            'hargaJual'=>'required',
            'hargaAsli'=>'required',
            'stok'=>'required',
            'supplier'=>'required',
            'merk'=>'required',
        ]);
        // dd($val);

        // dd('masuk');
        // $val['foto']='';
        if($req->hasFile('fileUpload')){
            // dd($req->file('fileUpload')->extension());
            $file = $req->file('fileUpload');
            $filename = $req->nama.$this->getDate().".".$file->extension();
            $file->storeAs('public/images',$filename);
            $val['foto']=$filename;

        }else{
            $val['foto']='null';
        }

        $p = new Product();
        $p->product_name = $val['namaProduk'];
        $p->stock = $val['stok'];
        $p->harga_jual	= $val['hargaJual'];
        $p->harga_asli = $val['hargaAsli'];
        $p->img = $val['foto'];
        $p->supplier_id = $val['supplier'];
        $p->merk_id = $val['merk'];

        

        if($p->save()){
            return redirect('/admin/product');
        }
        // dd($p->id);

        // $this->getDate();
    }

    public function productAdminUpdate($idProduk){
        // @evftrya vi ini $produk tak edit buat ngeget data Produk sama relasinya
        // $sup = $this->getsup();
        // $merk = $this->getMerk();
        // dd($produk);
        // return view('admin.product.update',['pro'=>$produk,'sup'=>$sup,'merk'=>$merk]);
        $pro = Product::with('supplier','merk')->findOrFail($idProduk);
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
            return view('admin.product.update', compact('dataSupplier', 'dataMerk','pro'));
        } else {
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        }
    }

    public function productAdminMakeUpdate($idProduk,Request $req){
        // dd($req->all(),$req->file('fileUpload'),$req->hargaAsli,$req->cbCheck);

        $val = $req->validate([
            'namaProduk'=>'required',
            'hargaJual'=>'required',
            'hargaAsli'=>'required',
            'stok'=>'required',
            'supplier'=>'required',
            'merk'=>'required'
        ]);
        // dd('masuk');
        $p = Product::findOrFail($idProduk);
        $p->product_name = $val['namaProduk'];
        $p->stock = $val['stok'];
        $p->harga_jual	= $val['hargaJual'];
        $p->harga_asli = $val['hargaAsli'];
        $p->supplier_id = $val['supplier'];
        $p->merk_id = $val['merk'];

        $val['foto']='';
        if($req->cbCheck=="ubah"){
            if($req->hasFile('fileUpload')){
                // dd($req->file('fileUpload')->extension());
                $file = $req->file('fileUpload');
                $filename = $req->nama.$this->getDate().".".$file->extension();
                $file->storeAs('public/images',$filename);
                $val['foto']=$filename;

            }else{
                $val['foto']='null';
            }
            $p->img = $val['foto'];
        }
        else{
            $p->img = $req->fotoLama;
        }


        if($req->merk=='0'){

            //input Merk baru
            $aksesMerk = new MerAcKon();

            $idMerk=$aksesMerk->makeMerk($req->newMerk);
            $p->merk_id=$idMerk;
        }
        if($req->supplier=='0'){
            $aksesSupp = new AksesSup();
            $idSup=$aksesSupp->makeNewSup($req->namaSupli,$req->noSUp,$req->companySup,$req->alamatSup);
            $p->supplier_id = $idSup;

        }

        if($p->save()){
            return redirect('/admin/product');
        }


    }
    public function getDate(){
        $dataTime = new DateTime('now');
        // dd($dataTime);
        $format = $dataTime->format('YmdHis');
        return($format);
    }
}
