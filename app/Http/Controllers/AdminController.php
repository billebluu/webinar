<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PIC_Seminar;
use App\Models\User;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     */
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

    public function show_event(Request $request)
    {
        $keyword = $request->keyword;

        $seminar = PIC_Seminar::where(function ($query) use ($keyword) {
            $query->where('nama_seminar', 'LIKE', '%' . $keyword . '%')
                ->orWhere('tanggal_seminar', 'LIKE', '%' . $keyword . '%');
        })
        ->where('status', 'accepted')
        ->paginate(10);

        $seminar->withPath('event-details');
        $seminar->appends($request->all());

        return view('admin.event-details', compact('seminar', 'keyword'));
    }


    public function show_event_approval(Request $request)
    {
        $keyword = $request->keyword;

        // $seminar = PIC_Seminar::all();
        $seminar = PIC_Seminar::where('nama_seminar','LIKE', '%'.$keyword.'%')
                    ->orWhere('tanggal_seminar','LIKE', '%'.$keyword.'%')
                    ->orWhere('status','LIKE', '%'.$keyword.'%')
                    ->paginate(10);
        $seminar->withPath('event-approval-request');
        $seminar->appends($request->all());

        return view('admin.event-approval-request',compact('seminar','keyword'));
    }

    public function show_user(Request $request)
    {
        $keyword = $request->keyword;

        // $user = User::all();
        $user = User::where('nama_user','LIKE', '%'.$keyword.'%')
                    ->orWhere('email_user','LIKE', '%'.$keyword.'%')
                    ->paginate(10);
        $user->withPath('user-details');
        $user->appends($request->all());

        return view('admin.user-details',compact('user','keyword'));
    }

    public function show_more_details(string $id)
    {
        $seminar = PIC_Seminar::find($id);

        return view('admin.more-details',['seminar' => $seminar]);
    }

    public function approve(Request $request, $id)
    {
        $seminar = PIC_Seminar::findOrFail($id);
        $seminar->status = 'ACCEPTED';
        $seminar->save();

        // Tambahkan logika lain yang diperlukan

        return redirect('event-approval-request')->with('success', 'Seminar berhasil diterima');
    }

    public function reject(Request $request, $id)
    {
        $seminar = PIC_Seminar::findOrFail($id);
        $seminar->status = 'REJECTED';
        $seminar->save();

        // Tambahkan logika lain yang diperlukan

        return redirect('event-approval-request')->with('success2', 'Seminar berhasil ditolak');
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
    public function destroy_user(string $id)
    {
        User::findOrFail($id)->delete();

        return redirect('user-details')->with('success', 'Data berhasil dihapus');
    }

    public function destroy_event(string $id)
    {
        PIC_Seminar::findOrFail($id)->delete();
    
        return redirect('event-details')->with('success', 'Data berhasil dihapus');
    }
    
}
