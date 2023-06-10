<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = User::all();
        return view('users', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $model = new User;
        return view('create', compact('model'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $model = new User;
        $model->password = 1;
        $model->nama_user = $request->nama_user;
        $model->email_user = $request->email_user;
        $model->asal_instansi = $request->asal_instansi;
        $model->no_telp = $request->no_telp;
        $model->save();

        return redirect('users');
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
        $model = User::find($id);
        return view('edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $model = User::find($id);
        $model->password = 1;
        $model->nama_user = $request->nama_user;
        $model->email_user = $request->email_user;
        $model->asal_instansi = $request->asal_instansi;
        $model->no_telp = $request->no_telp;
        $model->save();

        return redirect('users');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model = User::find($id);
        $model->delete();
        return redirect('users');
    }
}
