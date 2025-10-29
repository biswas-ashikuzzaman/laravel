<?php

namespace App\Http\Controllers;
use App\Models\Account;
use Illuminate\Http\Request;

class AccountController
{// ✅ List all accounts
    public function index()
    {
        $accounts = Account::all();
        return view('accounts.index', compact('accounts'));
    }

    // ✅ Show create form
    public function create()
    {
        return view('accounts.create');
    }

    // ✅ Store new account
    public function store(Request $request)
    {
        $validated = $request->validate([
            'holder_name' => 'required|string|max:255',
            'email' => 'required|email|unique:accounts',
            'account_type' => 'required|string',
        ]);

        $validated['account_number'] = rand(1000000000000000, 9999999999999999);
        $validated['balance'] = 0.00;

        Account::create($validated);

        return redirect()->route('accounts.index')->with('success', 'Account created successfully!');
    }

    // ✅ Show single account details
    public function show(Account $account)
    {
        return view('accounts.show', compact('account'));
    }

    // ✅ Edit form
    public function edit(Account $account)
    {
        return view('accounts.edit', compact('account'));
    }

    // ✅ Update account info
    public function update(Request $request, Account $account)
    {
        $validated = $request->validate([
            'holder_name' => 'required|string|max:255',
            'email' => 'required|email|unique:accounts,email,' . $account->id,
            'account_type' => 'required|string',
        ]);

        $account->update($validated);

        return redirect()->route('accounts.index')->with('success', 'Account updated successfully!');
    }

    // ✅ Delete account
    public function destroy(Account $account)
    {
        $account->delete();
        return redirect()->route('accounts.index')->with('success', 'Account deleted!');
    }

    // ✅ Deposit money
    public function deposit(Request $request, Account $account)
    {
        $request->validate(['amount' => 'required|numeric|min:1']);
        $account->increment('balance', $request->amount);

        return back()->with('success', 'Deposited successfully!');
    }

    // ✅ Withdraw money
    public function withdraw(Request $request, Account $account)
    {
        $request->validate(['amount' => 'required|numeric|min:1']);

        if ($request->amount > $account->balance) {
            return back()->with('error', 'Insufficient balance!');
        }

        $account->decrement('balance', $request->amount);

        return back()->with('success', 'Withdrawn successfully!');
    }
}
