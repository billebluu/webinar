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

    public function show_event()
    {
        $seminar = PIC_Seminar::all();

        return view('admin.event-details',['seminar' => $seminar]);
    }

    public function show_event_approval()
    {
        $seminar = PIC_Seminar::all();

        return view('admin.event-approval-request',['seminar' => $seminar]);
    }

    public function show_user()
    {
        $user = User::all();

        return view('admin.user-details',['user' => $user]);
    }

    public function show_more_details(string $id)
    {
        $seminar = PIC_Seminar::find($id);

        return view('admin.more-details',['seminar' => $seminar]);
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

        return redirect('user-details');
    }

    public function destroy_event(string $id)
    {
        PIC_Seminar::findOrFail($id)->delete();

        return redirect('event-details');
    }
}
