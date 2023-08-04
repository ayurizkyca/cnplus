<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session as FacadesSession;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function beranda()
     {
         return view('beranda');
     }

     public function input()
     {
         return view('product.form_input');
     }

     public function validate_input(Request $req)
    {
        FacadesSession::flash('kode_produk', $req->kode_produk);
        FacadesSession::flash('nama_produk', $req->nama_produk);
        FacadesSession::flash('harga_beli', $req->harga_beli);
        FacadesSession::flash('harga_jual', $req->harga_jual);
        FacadesSession::flash('status_produk', $req->status_produk);
        FacadesSession::flash('kelompok_produk', $req->kelompok_produk);
        FacadesSession::flash('stok', $req->stok);

            //membuat proses validasi
            $this->validate($req,[
                'kode_produk' => 'required|string|min:12',
                'nama_produk' => 'required|string|max:30',
                'harga_beli' => 'required|numeric',
                'harga_jual' => 'required|numeric',
                'status_produk' => 'required|string',
                'kelompok_produk' => 'required|string',
                'stok' => 'required|numeric',
            ],[
                'kode_produk.required' => 'Kode produk wajib diisi',
                'nama_produk.required' => 'Nama produk wajib diisi',
                'harga_beli.required' => 'Harga beli wajib diisi',
                'harga_jual.required' => 'Harga jual wajib diisi',
                'status_produk.required' => 'Status produk wajib diisi',
                'kelompok_produk.required' => 'Kelompok produk wajib diisi',
                'stok.required' => 'Stok produk wajib diisi',
                'kode_produk.string' => 'Kode produk kumpulan dari karakter',
                'nama_produk.string' => 'Nama produk kumpulan dari karakter',
                'harga_beli.numeric' => 'Harga beli wajib diisi dengan angka',
                'harga_jual.numeric' => 'Harga jual wajib diisi dengan angka',
                'kode_produk.min' => 'Kode produk terlalu pendek, minimal 12 karakter',
                'nama_produk.max' => 'Nama produk terlalu panjang, maksimal 30 karakter ',
                'stok.numeric' => 'Stok produk wajib diisi dengan angka',
            ]);

            // create data saja
            // $datas = $req->all();
            // $save_data = new Product;
            // $save_data->kode_produk = $datas['kode_produk'];
            // $save_data->nama_produk = $datas['nama_produk'];
            // $save_data->harga_beli = $datas['harga_beli'];
            // $save_data->harga_jual = $datas['harga_jual'];
            // $save_data->status_produk = $datas['status_produk'];
            // $save_data->kelompok_produk = $datas['kelompok_produk'];
            // $save_data->stok = $datas['stok'];
            // $save_data->save();

            Product::upsert([
                'kode_produk' => $req->kode_produk,
                'nama_produk' => $req->nama_produk,
                'harga_beli' => $req->harga_beli,
                'harga_jual' => $req->harga_jual,
                'status_produk' => $req->status_produk,
                'kelompok_produk' => $req->kelompok_produk,
                'stok' => $req->stok,
            ],[
                'kode_produk' => $req->kode_produk,
            ],[
                'nama_produk',
                'harga_beli',
                'harga_jual',
                'status_produk',
                'kelompok_produk',
                'stok'
            ]);
            return redirect()->route('product.input')->with('success', __('Berhasil Simpan Data Produk'));

    }
    
    public function list_produk(Request $request)
    {
        if($request->has('search')){
            $dataProduct = Product::where('nama_produk', 'LIKE', '%' .$request->search.'%')->paginate(5);
        }else{
            $dataProduct = Product::paginate(5);
        }
        return view('product.list_produk', compact('dataProduct'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function cari_produk(Request $request)
    {
        if($request->has('search')){
            $dataProduct = Product::where('kode_produk','==', '$request->search')->get();
        }else{
            $dataProduct ='';
        }
        return view('product.input', compact('dataProduct'));
    }


    public function delete_produk($id)
    {
        try {
            Product::where('id', $id)->delete();
            return redirect()->route('product.list_produk')->with('success', __('Berhasil menghapus data'));
        } catch (\Throwable $th) {
            return redirect()->route('product.list_produk')->with('error', __($th->getMessage()));
        }
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
