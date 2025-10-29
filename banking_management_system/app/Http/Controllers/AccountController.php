<?php

namespace App\Http\Controllers;
use App\Models\Account;
use Illuminate\Http\Request;

class AccountController
{
     // Show form for new account
    public function create()
    {
        return view('accounts.create');
    }

    // Save new account to DB
    public function store(Request $request)
    {
        $validated = $request->validate([
            'account_number' => 'required|unique:accounts,account_number',
            'holder_name'    => 'required|string|max:255',
            'email'          => 'required|email|unique:accounts,email',
            'balance'        => 'required|numeric|min:0',
            'account_type'   => 'required|in:savings,current',
        ]);

        Account::create($validated);

        return redirect()->route('accounts.index')->with('success', 'New account created successfully!');
    }

    // Show list of all accounts
    public function index()
    {
        $accounts = Account::latest()->paginate(10);
        return view('accounts.index', compact('accounts'));
    }
}
