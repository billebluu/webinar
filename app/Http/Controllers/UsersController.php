<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\PIC_Seminar;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $datas = User::all();
        // return view('users', compact('datas'));
        $pic_seminar = PIC_Seminar::all();

        return view('dashboard.users',['pic_seminar' => $pic_seminar]);

    }

    public function index_profile()
    {
        // $datas = User::all();
        // return view('users', compact('datas'));
        // $user = User::all();
        $user = User::all()->where('id', 3)->first();

        return view('profile.view-user',['user' => $user]);

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
        $user = User::find(3);
        return view('profile.edit-user', compact('user'));
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

        return redirect('profile')->with('success', 'Profil berhasil diperbarui');
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


    public function layout_users(){
        return view('users');
    }

    public function create_layout(){
        return view('users');
    }

    public function edit_layout(){
        return view('users');
    }

}


