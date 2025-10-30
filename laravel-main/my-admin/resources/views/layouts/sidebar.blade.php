        <nav class="pc-sidebar">
  <div class="navbar-wrapper">
    <div class="m-header d-flex align-items-center p-2 bg-light">
  <a href="{{ route('home') }}" class="d-flex align-items-center text-decoration-none">
    <!-- Logo image -->
    <img src="../assets/images/investment.png" class="img-fluid me-2" style="height:40px;" alt="FinTrack Logo">
    <!-- Brand name -->
    <span class="h4 mb-0 text-primary fw-bold">FinTrack</span>
  </a>
</div>
        
        <div class="navbar-content">
            <ul class="pc-navbar">
                <li class="pc-item">
                    <a href="{{ route('home') }}" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-dashboard"></i></span>
                        <span class="pc-mtext">Dashboard</span>
                    </a>
                </li>

                <!-- Income Section -->
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-wallet"></i></span>
                        <span class="pc-mtext">Income</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="{{ route('addMoney') }}">Add Income</a></li>
                        <li class="pc-item pc-hasmenu">
                            <a href="#!" class="pc-link">View Income History<span class="pc-arrow"><i
                                        data-feather="chevron-right"></i></span></a>
                            <ul class="pc-submenu">
                                <li class="pc-item"><a class="pc-link" href="#!">Filter by Month</a></li>
                                <li class="pc-item"><a class="pc-link" href="#!">Filter by Category</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <!-- Expenses Section -->
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-credit-card"></i></span>
                        <span class="pc-mtext">Expenses</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="#!">Add Expense</a></li>
                        <li class="pc-item pc-hasmenu">
                            <a href="#!" class="pc-link">View Expense History<span class="pc-arrow"><i
                                        data-feather="chevron-right"></i></span></a>
                            <ul class="pc-submenu">
                                <li class="pc-item"><a class="pc-link" href="#!">Filter by Month</a></li>
                                <li class="pc-item"><a class="pc-link" href="#!">Filter by Category</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <!-- Budgets Section -->
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-layout-grid"></i></span>
                        <span class="pc-mtext">Budgets</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="#!">Set Monthly Budgets</a></li>
                        <li class="pc-item"><a class="pc-link" href="#!">Track Spending vs Budget</a></li>
                    </ul>
                </li>

                <!-- Reports Section -->
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-chart-line"></i></span>
                        <span class="pc-mtext">Reports</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="#!">Monthly / Yearly Reports</a></li>
                        <li class="pc-item"><a class="pc-link" href="#!">Export PDF / Excel</a></li>
                    </ul>
                </li>

                <!-- Savings Goals Section -->
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-target"></i></span>
                        <span class="pc-mtext">Savings Goals</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="#!">Create and Track Goals</a></li>
                        <li class="pc-item"><a class="pc-link" href="#!">View Progress</a></li>
                    </ul>
                </li>



                <!-- my work -->



                <li class="pc-item">
                    <a href="../pages/login.html" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-lock"></i></span>
                        <span class="pc-mtext">Login</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="../pages/register.html" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-user-plus"></i></span>
                        <span class="pc-mtext">Register</span>
                    </a>
                </li>
                <!-- my work -->

            </ul>

        </div>
        </div>
</nav>