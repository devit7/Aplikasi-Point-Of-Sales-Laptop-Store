<?php

namespace App\Http\Controllers\AksesController;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\AksesController\merkAksesController as MerAcKon;
use DateTime;
use App\Http\Controllers\AksesController\SupplierAksesController as AksesSup;
use App\Models\Product;


class ProductAksesController extends Controller
{
    public function getAll(){
        $request = Request::create('http://127.0.0.1:8000/api/products', 'GET');
        $response = app()->handle($request);
        // merubah json ke array
        $data = json_decode($response->getContent(),true);
        if($response->getStatusCode() == 200){
            //return dd($data['data']);
            return view('admin.product.index', [
                'data' => $data['data']
                ]);
        }else{
            // dd($response);
            return response()->json([
                'message' => 'Unauthorized',
                'error_code' => $response->getStatusCode()
            ], 401);
        }
    }

    public function createData(StoreRequest $request){
        $validator = $request->validated();
        $data = [
            'product_name' => $validator['product_name'],
            'stock' => $validator['stock'],
            'harga_jual' => $validator['harga_jual'],
            'harga_asli' => $validator['harga_asli'],
            'img' => "alskdlaks",
            'supplier_id' => $validator['supplier_id'],
            'merk_id' => $validator['merk_id']
        ];
        $request = Request::create('http://127.0.0.1:8000/api/products', 'POST', $data);
        $response = app()->handle($request);
        $data = json_decode($response->getContent(), true);
        if($response->getStatusCode() == 201){
            return view('admin.product.create', [
                'data' => $data['data']
                ]);
        }else{
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        }
    }



    ///////////////// CONTROLLER CRUD PRODUCT ADMIN //////////////////////////
    public function productAdmin(){
        $produk = Product::select('product.id', 'product.product_name', 'product.stock', 'product.harga_jual', 'product.harga_asli', 'product.img', 'supplier.supplier_name', 'merk.merk_name')
        ->join('supplier', 'product.supplier_id', '=', 'supplier.id')
        ->join('merk', 'product.merk_id', '=', 'merk.id')
        ->get();
        // dd($produk);
        return view('admin.product.index',['produks'=>$produk]);
    }
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
        // dd($p->id);

        // $this->getDate();
    }

    public function productAdminUpdate($idProduk){
        $produk = Product::with('supplier','merk')->findOrFail($idProduk);// @evftrya vi ini $produk tak edit buat ngeget data Produk sama relasinya
        $sup = $this->getsup();
        $merk = $this->getMerk();
        // dd($produk);
        return view('admin.product.update',['pro'=>$produk,'sup'=>$sup,'merk'=>$merk]);
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

    public function getsup(){
        $supp = new AksesSup();
        $back = $supp->getSupplier();
        // dd($back);
        return $back;
    }
    public function getMerk(){
        $merk = new MerAcKon();
        return ($merk->getMerk());
    }
    public function getDate(){
        $dataTime = new DateTime('now');
        // dd($dataTime);
        $format = $dataTime->format('YmdHis');
        return($format);
    }

}
