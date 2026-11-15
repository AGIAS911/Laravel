<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use App\Models\User;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function index()
    {
        $sellers = Seller::with('user')->paginate(10);
        return view('sellers.index', compact('sellers'));
    }

    public function create()
    {
        $users = User::doesntHave('seller')->get();
        return view('sellers.create', compact('users'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id|unique:sellers,user_id',
            'store_name' => 'required|string'
        ]);

        Seller::create($data);
        return redirect()->route('sellers.index');
    }

    public function edit(Seller $seller)
    {
        $users = User::all();
        return view('sellers.edit', compact('seller', 'users'));
    }

    public function update(Request $request, Seller $seller)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id|unique:sellers,user_id,' . $seller->id,
            'store_name' => 'required|string'
        ]);

        $seller->update($data);
        return redirect()->route('sellers.index');
    }

    public function destroy(Seller $seller)
    {
        $seller->delete();
        return redirect()->route('sellers.index');
    }
}