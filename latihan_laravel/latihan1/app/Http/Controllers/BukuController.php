<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Http\Requests\StoreBukuRequest;
use App\Http\Requests\UpdateBukuRequest;
use Illuminate\Support\Facades\DB;

class BukuController extends Controller
{
   
    public function index()
    {
        $buku = Buku::get();
        return view('buku.index', compact('buku'));
    }

    public function create()
    {
        return view('buku.form');
    }

    public function store(StoreBukuRequest $request)
    {
        DB::beginTransaction();
        try{

            DB::commit();

        } catch (Expection | PDOExpection $e) {
            DB::rollBack();
            return $this->failResponse($e->getMessage(),$e->getCode());
        }
    } 

    public function show(Buku $buku)
    {
        //
    }

    public function edit(Buku $buku)
    {
        return view('buku.form');
    }

    public function update(UpdateBukuRequest $request, Buku $buku)
    {
        //
    }

    public function destroy(Buku $buku)
    {
        //
    }
}
