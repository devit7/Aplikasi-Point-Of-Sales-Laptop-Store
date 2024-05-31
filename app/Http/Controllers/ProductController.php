<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Product;
use App\Http\Controllers\AksesController\SupplierController;
use App\Http\Controllers\MerkController;
use App\Http\Controllers\AksesController\merkAksesController as aksesMerk;
use App\Http\Controllers\AksesController\SupplierAksesController as AksesSup;
use App\Http\Controllers\SupplierController as supKon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DateTime;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'message' => 'List Product',
            'data' => Product::orderBy('product_name', 'asc')->get(),
            'tabel_name' => (new Product)->getTable(),
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $validated = $request->validated();

        $product = Product::create([
            'product_name' => $validated['product_name'],
            'stock' => $validated['stock'],
            'harga_jual' => $validated['harga_jual'],
            'harga_asli' => $validated['harga_asli'],
            'img' => $request['img'],
            'supplier_id' => $validated['supplier_id'],
            'merk_id' => $validated['merk_id'],
        ]);

        return response()->json([
            'message' => 'Product berhasil ditambahkan',
            'data' => $product,
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return response()->json([
            'message' => 'Detail Product',
            'data' => $product,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Product $product)
    {
        $validated = $request->validated();

        $product->update([
            'product_name' => $validated['product_name'],
            'stock' => $validated['stock'],
            'harga_jual' => $validated['harga_jual'],
            'harga_asli' => $validated['harga_asli'],
            'img' => $validated['img'],
            'supplier_id' => $validated['supplier_id'],
            'merk_id' => $validated['merk_id'],
        ]);

        return response()->json([
            'message' => 'Product berhasil diubah',
            'data' => $product,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json([
            'message' => 'Product berhasil dihapus',
        ], 200);
    }

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
            $aksesMerk = new aksesMerk();
            
            $idMerk=$aksesMerk->makeMerk($req->newMerk);
            $p->merk_id=$idMerk;
        }
        if($req->supplier=='0'){
            $aksesSupp = new AksesSup();
            $idSup=$aksesSupp->makeNewSup($req->namaSupli,$req->noSUp,$req->companySup,$req->alamatSup);
            $p->supplier_id = $idSup;

        }
        
        if($p->save()){
            return redirect('/adm-prod');
        }
        // dd($p->id);

        // $this->getDate();
    }
    public function productAdminUpdate($idProduk){
        $produk = Product::findOrFail($idProduk);
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
            $aksesMerk = new aksesMerk();
            
            $idMerk=$aksesMerk->makeMerk($req->newMerk);
            $p->merk_id=$idMerk;
        }
        if($req->supplier=='0'){
            $aksesSupp = new AksesSup();
            $idSup=$aksesSupp->makeNewSup($req->namaSupli,$req->noSUp,$req->companySup,$req->alamatSup);
            $p->supplier_id = $idSup;

        }
        
        if($p->save()){
            return redirect('/adm-prod');
        }


    }
    public function getsup(){
        $supp = new supKon();
        $back = $supp->getSupplier();
        return $back;
    }
    public function getMerk(){
        $merk = new MerkController();
        return ($merk->getMerk());
    }
    public function getDate(){
        $dataTime = new DateTime('now');
        // dd($dataTime);
        $format = $dataTime->format('YmdHis');
        return($format);
    }
}
