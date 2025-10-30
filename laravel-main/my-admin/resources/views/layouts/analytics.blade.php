 <div class="row">
  <!-- Total Income -->
  <div class="col-md-6 col-xl-3">
    <div class="card">
      <div class="card-body">
        <h6 class="mb-2 f-w-400 text-muted">Total Income</h6>
        <h4 class="mb-3">$45,780 <span class="badge bg-light-success border border-success"><i
              class="ti ti-trending-up"></i> 12.5%</span></h4>
        <p class="mb-0 text-muted">You earned an extra <span class="text-success">$5,500</span> this year</p>
      </div>
    </div>
  </div>

  <!-- Total Expenses -->
  <div class="col-md-6 col-xl-3">
    <div class="card">
      <div class="card-body">
        <h6 class="mb-2 f-w-400 text-muted">Total Expenses</h6>
        <h4 class="mb-3">$28,340 <span class="badge bg-light-danger border border-danger"><i
              class="ti ti-trending-down"></i> 8.2%</span></h4>
        <p class="mb-0 text-muted">You spent <span class="text-danger">$2,100</span> more this year</p>
      </div>
    </div>
  </div>

  <!-- Total Savings -->
  <div class="col-md-6 col-xl-3">
    <div class="card">
      <div class="card-body">
        <h6 class="mb-2 f-w-400 text-muted">Total Savings</h6>
        <h4 class="mb-3">$17,440 <span class="badge bg-light-primary border border-primary"><i
              class="ti ti-trending-up"></i> 22.4%</span></h4>
        <p class="mb-0 text-muted">You saved an extra <span class="text-primary">$3,200</span> this year</p>
      </div>
    </div>
  </div>

  <!-- Budget Utilization -->
  <div class="col-md-6 col-xl-3">
    <div class="card">
      <div class="card-body">
        <h6 class="mb-2 f-w-400 text-muted">Budget Utilization</h6>
        <h4 class="mb-3">68% <span class="badge bg-light-warning border border-warning"><i
              class="ti ti-trending-down"></i> 5.6%</span></h4>
        <p class="mb-0 text-muted">Remaining budget <span class="text-warning">$8,750</span></p>
      </div>
    </div>
  </div>

  <!-- Unique Visitor (Financial Dashboard Chart) -->
  <div class="container mt-2">
  <div class="row">
    <!-- Income vs Expense Chart -->
    <div class="col-md-12 col-xl-8">
      <div class="d-flex align-items-center justify-content-between mb-3">
        <h5 class="mb-0">Income vs Expense</h5>
        <ul class="nav nav-pills justify-content-end mb-0" id="chart-tab-tab" role="tablist">
          <li class="nav-item" role="presentation">
            <button
              class="nav-link"
              id="chart-tab-home-tab"
              data-bs-toggle="pill"
              data-bs-target="#chart-tab-home"
              type="button"
              role="tab"
              aria-controls="chart-tab-home"
              aria-selected="true"
            >
              Month
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button
              class="nav-link active"
              id="chart-tab-profile-tab"
              data-bs-toggle="pill"
              data-bs-target="#chart-tab-profile"
              type="button"
              role="tab"
              aria-controls="chart-tab-profile"
              aria-selected="false"
            >
              Week
            </button>
          </li>
        </ul>
      </div>

      <div class="card">
        <div class="card-body">
          <div class="tab-content" id="chart-tab-tabContent">
            <div
              class="tab-pane"
              id="chart-tab-home"
              role="tabpanel"
              aria-labelledby="chart-tab-home-tab"
              tabindex="0"
            >
              <div id="visitor-chart-1"></div>
            </div>
            <div
              class="tab-pane show active"
              id="chart-tab-profile"
              role="tabpanel"
              aria-labelledby="chart-tab-profile-tab"
              tabindex="0"
            >
              <div id="visitor-chart"></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Income Overview -->
    <div class="col-md-12 col-xl-4">
      <h5 class="mt-4">Income Overview</h5>
      <div class="card">
        <div class="card-body">
          <h6 class="mb-2 f-w-400 text-muted">This Week Statistics</h6>
          <h3 class="mb-3">$7,650</h3>
          <div id="income-overview-chart"></div>
        </div>
      </div>
    </div>
  </div>
</div>






  <!-- Recent Transactions -->
  <div class="col-md-12 col-xl-8">
    <h5 class="mb-3">Recent Transactions</h5>
    <div class="card tbl-card">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-hover table-borderless mb-0">
            <thead>
              <tr>
                <th>Transaction ID</th>
                <th>Description</th>
                <th>Category</th>
                <th>Status</th>
                <th class="text-end">Amount</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><a href="#" class="text-muted">TXN-001</a></td>
                <td>Salary</td>
                <td>Income</td>
                <td><span class="text-success">Completed</span></td>
                <td class="text-end">$3,200</td>
              </tr>
              <tr>
                <td><a href="#" class="text-muted">TXN-002</a></td>
                <td>Electricity Bill</td>
                <td>Expenses</td>
                <td><span class="text-danger">Pending</span></td>
                <td class="text-end">$150</td>
              </tr>
              <tr>
                <td><a href="#" class="text-muted">TXN-003</a></td>
                <td>Freelance Income</td>
                <td>Income</td>
                <td><span class="text-success">Completed</span></td>
                <td class="text-end">$1,500</td>
              </tr>
              <tr>
                <td><a href="#" class="text-muted">TXN-004</a></td>
                <td>Groceries</td>
                <td>Expenses</td>
                <td><span class="text-danger">Completed</span></td>
                <td class="text-end">$320</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- Analytics Report -->
  <div class="col-md-12 col-xl-4">
    <h5 class="mb-3">Analytics Report</h5>
    <div class="card">
      <div class="list-group list-group-flush">
        <a href="#"
          class="list-group-item list-group-item-action d-flex align-items-center justify-content-between">Income Growth
          <span class="h5 mb-0">+15.2%</span></a>
        <a href="#"
          class="list-group-item list-group-item-action d-flex align-items-center justify-content-between">Expense Ratio
          <span class="h5 mb-0">0.48%</span></a>
        <a href="#"
          class="list-group-item list-group-item-action d-flex align-items-center justify-content-between">Savings Rate
          <span class="h5 mb-0">High</span></a>
      </div>
      <!-- <div class="card-body px-2">
        <div id="analytics-report-chart"></div>
      </div> -->
    </div>
  </div>

  <!-- Weekly Income Report -->
   <div class="col-md-12 col-xl-8">
          <h5 class="mb-3">Finance Report</h5>
          <div class="card">
            <div class="card-body">
              <h6 class="mb-2 f-w-400 text-muted">This week Statistics</h6>
              <h3 class="mb-0">$7,650</h3>
              <div id="sales-report-chart"></div>
            </div>
          </div>
        </div>
        <div class="col-md-12 col-xl-4">
          <h5 class="mb-3">Transaction History</h5>
          <div class="card">
            <div class="list-group list-group-flush">
              <a href="#" class="list-group-item list-group-item-action">
                <div class="d-flex">
                  <div class="flex-shrink-0">
                    <div class="avtar avtar-s rounded-circle text-success bg-light-success">
                      <i class="ti ti-gift f-18"></i>
                    </div>
                  </div>
                  <div class="flex-grow-1 ms-3">
                    <h6 class="mb-1">Order #002434</h6>
                    <p class="mb-0 text-muted">Today, 2:00 AM</P>
                  </div>
                  <div class="flex-shrink-0 text-end">
                    <h6 class="mb-1">+ $1,430</h6>
                    <p class="mb-0 text-muted">78%</P>
                  </div>
                </div>
              </a>
              <a href="#" class="list-group-item list-group-item-action">
                <div class="d-flex">
                  <div class="flex-shrink-0">
                    <div class="avtar avtar-s rounded-circle text-primary bg-light-primary">
                      <i class="ti ti-message-circle f-18"></i>
                    </div>
                  </div>
                  <div class="flex-grow-1 ms-3">
                    <h6 class="mb-1">Order #984947</h6>
                    <p class="mb-0 text-muted">5 August, 1:45 PM</P>
                  </div>
                  <div class="flex-shrink-0 text-end">
                    <h6 class="mb-1">- $302</h6>
                    <p class="mb-0 text-muted">8%</P>
                  </div>
                </div>
              </a>
              <a href="#" class="list-group-item list-group-item-action">
                <div class="d-flex">
                  <div class="flex-shrink-0">
                    <div class="avtar avtar-s rounded-circle text-danger bg-light-danger">
                      <i class="ti ti-settings f-18"></i>
                    </div>
                  </div>
                  <div class="flex-grow-1 ms-3">
                    <h6 class="mb-1">Order #988784</h6>
                    <p class="mb-0 text-muted">7 hours ago</P>
                  </div>
                  <div class="flex-shrink-0 text-end">
                    <h6 class="mb-1">- $682</h6>
                    <p class="mb-0 text-muted">16%</P>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Transaction History -->
  <!-- <div class="col-md-12 col-xl-4">
    <h5 class="mb-3">Transaction History</h5>
    <div class="card">
      <div class="list-group list-group-flush">
        <a href="#" class="list-group-item list-group-item-action">
          <div class="d-flex">
            <div class="flex-shrink-0">
              <div class="avtar avtar-s rounded-circle text-success bg-light-success">
                <i class="ti ti-wallet f-18"></i>
              </div>
            </div>
            <div class="flex-grow-1 ms-3">
              <h6 class="mb-1">Income: Salary</h6>
              <p class="mb-0 text-muted">Today, 9:00 AM</p>
            </div>
            <div class="flex-shrink-0 text-end">
              <h6 class="mb-1">+ $3,200</h6>
              <p class="mb-0 text-muted">100%</p>
            </div>
          </div>
        </a>
        <a href="#" class="list-group-item list-group-item-action">
          <div class="d-flex">
            <div class="flex-shrink-0">
              <div class="avtar avtar-s rounded-circle text-danger bg-light-danger">
                <i class="ti ti-credit-card f-18"></i>
              </div>
            </div>
            <div class="flex-grow-1 ms-3">
              <h6 class="mb-1">Expense: Electricity</h6>
              <p class="mb-0 text-muted">Today, 2:30 PM</p>
            </div>
            <div class="flex-shrink-0 text-end">
              <h6 class="mb-1">- $150</h6>
              <p class="mb-0 text-muted">10%</p>
            </div>
          </div>
        </a>
      </div>
    </div>
  </div> -->
</div>