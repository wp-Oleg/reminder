<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscription;

class SubscribersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subs = Subscription::all();

        return view('admin.subs.index', ['subs' => $subs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.subs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:subscriptions'
        ]);

        Subscription::add($request->get('email'));

        return redirect()->route('subscribers.index');
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
        Subscription::find($id)->delete();
        return redirect()->route('subscribers.index');
    }
}
