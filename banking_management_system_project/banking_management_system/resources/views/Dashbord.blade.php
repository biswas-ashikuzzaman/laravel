{{--
File: resources/views/admin/dashboard.blade.php
Purpose: Admin dashboard for a Banking Management System.
Usage: copy this file to resources/views/admin/dashboard.blade.php
Then add a route and controller action that returns view('admin.dashboard')
--}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Banking Admin Dashboard</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-p+..." crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Simple custom styles for layout -->
    <style>
        body { min-height: 100vh; background: #f4f6f9; }
        .sidebar { width: 250px; position: fixed; top: 0; left: 0; bottom: 0; background: #343a40; color: #fff; padding-top: 1rem; }
        .sidebar a { color: rgba(255,255,255,0.85); text-decoration: none; }
        .sidebar .nav-link.active { background: rgba(255,255,255,0.06); }
        .content { margin-left: 250px; padding: 1.5rem; }
        .card-stats .card-body { display:flex; align-items:center; justify-content:space-between; }
        .table-responsive { max-height: 420px; overflow:auto; }
        footer { margin-left:250px; padding:1rem; color:#6c757d; }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <aside class="sidebar d-flex flex-column">
        <div class="px-3 mb-4">
            <h4 class="mb-0">BankMS</h4>
            <small>Admin Panel</small>
        </div>

        <nav class="nav flex-column px-2">
            <a class="nav-link active py-2" href="#"><i class="fa-solid fa-gauge me-2"></i> Dashboard</a>
            <a class="nav-link py-2" href="#accounts"><i class="fa-solid fa-user me-2"></i> Accounts</a>
            <a class="nav-link py-2" href="#transactions"><i class="fa-solid fa-exchange-alt me-2"></i> Transactions</a>
            <a class="nav-link py-2" href="#loans"><i class="fa-solid fa-hand-holding-dollar me-2"></i> Loans</a>
            <a class="nav-link py-2" href="#reports"><i class="fa-solid fa-chart-line me-2"></i> Reports</a>
            <a class="nav-link py-2" href="#settings"><i class="fa-solid fa-cog me-2"></i> Settings</a>
        </nav>

        <div class="mt-auto p-3">
            <small class="text-muted">Logged in as <strong>Admin</strong></small>
        </div>
    </aside>

    <!-- Content area -->
    <div class="content">

        <!-- Top header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="mb-0">Dashboard</h2>
                <small class="text-muted">Overview &amp; statistics</small>
            </div>
            <div class="d-flex gap-2 align-items-center">
                <div class="input-group">
                    <input class="form-control form-control-sm" placeholder="Search accounts, txns...">
                    <button class="btn btn-sm btn-outline-secondary">Search</button>
                </div>
                <button class="btn btn-primary btn-sm"><i class="fa-solid fa-plus me-1"></i> New</button>
                <div class="dropdown">
                    <a class="btn btn-light btn-sm dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Admin</a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="#">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Statistic cards -->
        <div class="row mb-4">
            <div class="col-md-3 mb-3">
                <div class="card card-stats shadow-sm">
                    <div class="card-body">
                        <div>
                            <h6 class="text-muted">Total Customers</h6>
                            <h3>{{ number_format($stats['customers'] ?? 12540) }}</h3>
                        </div>
                        <div class="text-end">
                            <i class="fa-solid fa-users fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <div class="card card-stats shadow-sm">
                    <div class="card-body">
                        <div>
                            <h6 class="text-muted">Total Deposits</h6>
                            <h3>{{ number_format($stats['deposits'] ?? 15420000) }} BDT</h3>
                        </div>
                        <div class="text-end">
                            <i class="fa-solid fa-piggy-bank fa-2x text-success"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <div class="card card-stats shadow-sm">
                    <div class="card-body">
                        <div>
                            <h6 class="text-muted">Active Loans</h6>
                            <h3>{{ number_format($stats['loans'] ?? 128) }}</h3>
                        </div>
                        <div class="text-end">
                            <i class="fa-solid fa-hand-holding-dollar fa-2x text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <div class="card card-stats shadow-sm">
                    <div class="card-body">
                        <div>
                            <h6 class="text-muted">Today's Transactions</h6>
                            <h3>{{ number_format($stats['txns_today'] ?? 432) }}</h3>
                        </div>
                        <div class="text-end">
                            <i class="fa-solid fa-receipt fa-2x text-danger"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts row -->
        <div class="row mb-4">
            <div class="col-lg-8 mb-3">
                <div class="card shadow-sm">
                    <div class="card-header">Monthly Deposits vs Withdrawals</div>
                    <div class="card-body">
                        <canvas id="txnChart" height="120"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mb-3">
                <div class="card shadow-sm">
                    <div class="card-header">Loan Distribution</div>
                    <div class="card-body">
                        <canvas id="loanChart" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent transactions and Accounts table -->
        <div class="row">
            <div class="col-lg-7 mb-3">
                <div class="card shadow-sm">
                    <div class="card-header">Recent Transactions</div>
                    <div class="card-body table-responsive">
                        <table class="table table-hover table-sm">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Account</th>
                                    <th>Type</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentTxns ?? [] as $txn)
                                    <tr>
                                        <td>{{ $txn['id'] }}</td>
                                        <td>{{ $txn['account_no'] }}</td>
                                        <td>{{ ucfirst($txn['type']) }}</td>
                                        <td>{{ number_format($txn['amount'],2) }}</td>
                                        <td>{{ $txn['date'] }}</td>
                                        <td><span class="badge bg-{{ $txn['status']=='success' ? 'success' : 'secondary' }}">{{ ucfirst($txn['status']) }}</span></td>
                                    </tr>
                                @endforeach

                                {{-- If no real data passed, show sample rows --}}
                                @if(empty($recentTxns ?? []))
                                    <tr>
                                        <td>TXN-1001</td>
                                        <td>ACC-3421</td>
                                        <td>Deposit</td>
                                        <td>12,000.00</td>
                                        <td>2025-10-23</td>
                                        <td><span class="badge bg-success">Success</span></td>
                                    </tr>
                                    <tr>
                                        <td>TXN-1000</td>
                                        <td>ACC-9987</td>
                                        <td>Withdrawal</td>
                                        <td>5,000.00</td>
                                        <td>2025-10-23</td>
                                        <td><span class="badge bg-secondary">Pending</span></td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 mb-3">
                <div class="card shadow-sm">
                    <div class="card-header">Top Accounts</div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($topAccounts ?? [] as $acc)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <strong>{{ $acc['name'] }}</strong><br>
                                        <small class="text-muted">{{ $acc['account_no'] }}</small>
                                    </div>
                                    <span>{{ number_format($acc['balance']) }} BDT</span>
                                </li>
                            @endforeach

                            @if(empty($topAccounts ?? []))
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <strong>Md. Kamal</strong><br>
                                        <small class="text-muted">ACC-1001</small>
                                    </div>
                                    <span>1,250,000 BDT</span>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>

                <div class="card mt-3 shadow-sm">
                    <div class="card-body">
                        <h6>Quick Actions</h6>
                        <div class="d-grid gap-2">
                            <a href="#" class="btn btn-outline-primary btn-sm">Create Account</a>
                            <a href="#" class="btn btn-outline-success btn-sm">Approve Loan</a>
                            <a href="#" class="btn btn-outline-warning btn-sm">Run Reconciliation</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <footer class="bg-white border-top">
        <div class="container-fluid">
            <small>© {{ date('Y') }} BankMS — Built with Laravel & Bootstrap</small>
        </div>
    </footer>


    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.0/dist/chart.umd.min.js"></script>

    <script>
        // Sample data - replace with real data passed from controller
        const months = {{ json_encode($chart['months'] ?? ['Jan','Feb','Mar','Apr','May','Jun','Jul']) }};
        const deposits = {{ json_encode($chart['deposits'] ?? [120000,150000,130000,160000,170000,180000,200000]) }};
        const withdrawals = {{ json_encode($chart['withdrawals'] ?? [90000,80000,110000,100000,130000,90000,120000]) }};

        // Transactions chart
        const ctx = document.getElementById('txnChart');
        if(ctx){
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: months,
                    datasets: [
                        { label: 'Deposits', data: deposits, tension: 0.3, fill:false },
                        { label: 'Withdrawals', data: withdrawals, tension: 0.3, fill:false }
                    ]
                },
                options: {
                    responsive: true,
                    interaction: { mode: 'index', intersect: false },
                    plugins: { legend: { position: 'top' } },
                }
            });
        }

        // Loan chart (pie)
        const loanCtx = document.getElementById('loanChart');
        if(loanCtx) {
            const loanData = {{ json_encode($chart['loans'] ?? ['Personal'=>45,'Mortgage'=>25,'Business'=>20,'Other'=>10]) }};
            const labels = Object.keys(loanData);
            const values = Object.values(loanData);

            new Chart(loanCtx, {
                type: 'doughnut',
                data: { labels: labels, datasets: [{ data: values }] },
                options: { responsive:true }
            });
        }
    </script>

</body>
</html>

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
