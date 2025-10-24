{{--
Controller example (place in app/Http/Controllers/Admin/DashboardController.php):

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        // Build real stats from DB in real app
        $stats = [
            'customers' => 12540,
            'deposits' => 15420000,
            'loans' => 128,
            'txns_today' => 432
        ];

        $recentTxns = [
            ['id'=>'TXN-1001','account_no'=>'ACC-3421','type'=>'deposit','amount'=>12000,'date'=>'2025-10-23','status'=>'success'],
            ['id'=>'TXN-1000','account_no'=>'ACC-9987','type'=>'withdrawal','amount'=>5000,'date'=>'2025-10-23','status'=>'pending'],
        ];

        $topAccounts = [
            ['name'=>'Md. Kamal','account_no'=>'ACC-1001','balance'=>1250000],
            ['name'=>'Sadia Rahman','account_no'=>'ACC-1100','balance'=>950000],
        ];

        $chart = [
            'months' => ['Jan','Feb','Mar','Apr','May','Jun','Jul'],
            'deposits' => [120000,150000,130000,160000,170000,180000,200000],
            'withdrawals' => [90000,80000,110000,100000,130000,90000,120000],
            'loans' => ['Personal'=>45,'Mortgage'=>25,'Business'=>20,'Other'=>10]
        ];

        return view('admin.dashboard', compact('stats','recentTxns','topAccounts','chart'));
    }
}

Route (web.php):
Route::get('/admin/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');

--}}