<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin Dashboard</title>

<!-- Bootstrap 5 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

<style>
  :root{
    --primary:#0d6efd; 
    --bg:#f5f7fb;
    --text:#222;
    --card:#fff;
  }
  [data-theme="dark"]{
    --bg:#0b1220;
    --text:#e6eef8;
    --card:#0f1724;
  }
  body{
    background:var(--bg);
    color:var(--text);
    transition: background .25s ease, color .25s ease;
    padding-top:64px;
    font-family:Inter, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
  }

  /* Navbar */
  .navbar{
    background:var(--card);
    border-bottom:1px solid rgba(0,0,0,0.06);
    position:fixed; top:0; left:0; right:0; z-index:1100;
    transition: background .25s ease, transform .18s ease;
    padding:0.5rem 1rem;
  }
  .navbar .brand { font-weight:700; color:var(--primary);}
  .navbar .nav-link{ color:var(--text) !important; transition: all .15s ease; }
  .navbar .nav-link:hover{ color:var(--primary) !important; transform:translateY(-2px); }
  .navbar .badge{ font-size:0.7rem; }

  /* Sidebar */
  .sidebar{
    min-width:220px; max-width:220px;
    background:var(--primary);
    color:white; min-height:calc(100vh - 64px);
    transition: all .3s ease;
    padding-top:1rem;
    position:sticky;
    top:64px;
  }
  .sidebar a{ color: rgba(255,255,255,0.95); text-decoration:none; padding:8px 12px; border-radius:8px; display:block; transition: all .22s ease;}
  .sidebar a:hover{ background: rgba(255,255,255,0.12); transform:translateX(6px); }

  /* Main content */
  .flex-fill{ padding:1.25rem; }
  .kpi { border-radius:12px; box-shadow:0 6px 18px rgba(13,110,253,0.06); background:var(--card); padding:1rem; }
  .table-wrap { max-height:360px; overflow:auto; background:transparent; }
  .small-muted{ font-size:.85rem; color:rgba(0,0,0,0.45); }
  .card{ background:var(--card); border-radius:12px; box-shadow: 0 4px 18px rgba(2,6,23,0.04); }
  footer{ background:transparent; padding:10px 0; text-align:center; font-size:.9rem; color:var(--text); margin-top:20px; }

  /* Chat widget */
  .chat-box{ position:fixed; right:18px; bottom:18px; width:320px; max-width:calc(100% - 40px); z-index:1200; }
  .chat-header{ background:linear-gradient(90deg,var(--primary),#0062d6); color:white; padding:.6rem .8rem; border-top-left-radius:10px; border-top-right-radius:10px; cursor:pointer;}
  .chat-body{ max-height:320px; overflow:auto; background:var(--card); padding:.6rem; border-bottom-left-radius:10px; border-bottom-right-radius:10px; }

  /* Notifications badge */
  .badge-notify{ position:relative; }
  .badge-notify .dot{ position:absolute; top:-6px; right:-6px; width:12px; height:12px; border-radius:50%; background:#dc3545; box-shadow:0 0 0 3px rgba(220,53,69,0.08); }

  /* settings color swatches */
  .swatch{ width:36px; height:26px; border-radius:6px; cursor:pointer; border:2px solid rgba(255,255,255,0.12); }

  /* responsive */
  @media (max-width:991px){
    .sidebar{ display:none; }
  }

  /* theme color applied to elements */
  .primary-bg{ background:var(--primary); color:white; }
  .primary-border{ border-color: var(--primary) !important; }
</style>
</head>
<body>

<!-- Navbar -->
<header class="navbar d-flex align-items-center">
  <div class="container-fluid d-flex align-items-center">
    <div class="d-flex align-items-center gap-3">
      <button id="sidebarToggle" class="btn btn-sm btn-outline-secondary d-lg-none">☰</button>
      <a class="brand h5 mb-0" href="#">AsHik</a>
      <small class="small-muted ms-2 d-none d-md-inline" id="headerClock">--:--</small>
    </div>

    <div class="ms-auto d-flex align-items-center gap-2">
      <div class="btn-group me-2">
        <button class="btn btn-sm btn-outline-secondary" id="chartVisitorsBtn">Visitors</button>
        <button class="btn btn-sm btn-outline-secondary" id="chartRevenueBtn">Revenue</button>
      </div>

      <div class="form-check form-switch me-2">
        <input class="form-check-input" type="checkbox" id="darkToggle">
        <label class="form-check-label small-muted" for="darkToggle">Dark</label>
      </div>

      <div class="dropdown me-2">
        <button class="btn btn-sm btn-outline-secondary dropdown-toggle badge-notify" id="notifBtn" data-bs-toggle="dropdown">
          🔔
          <span class="dot" id="notifDot" style="display:none;"></span>
        </button>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notifBtn" style="min-width:300px;">
          <li class="dropdown-header">Notifications</li>
          <li><hr class="dropdown-divider"></li>
          <div id="notifList" style="max-height:280px; overflow:auto;"></div>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item text-center text-primary" href="#" id="clearNotifs">Mark all read</a></li>
        </ul>
      </div>

      <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#settingsModal">⚙️</button>
    </div>
  </div>
</header>

<!-- Dashboard Layout -->
<div class="d-flex" style="margin-top:12px;">
  <aside class="sidebar p-3">
    <h5 class="mb-3">Dashboard</h5>
    <nav class="nav flex-column mb-3">
      <a class="nav-link mb-2" href="#overview">Overview</a>
      <a class="nav-link mb-2" href="#users">Users</a>
      <a class="nav-link mb-2" href="#orders">Orders</a>
      <a class="nav-link mb-2" href="#content">Content</a>
      <a class="nav-link mb-2" href="#settings">Settings</a>
    </nav>

    <div class="mb-3">
      <small class="d-block small-muted mb-1">Quick chat</small>
      <div class="card p-2" style="background:rgba(255,255,255,0.06);">
        <div id="chatPreview" style="min-height:54px;">
          <div class="small-muted">No messages yet — open chat</div>
        </div>
        <div class="d-grid gap-2 mt-2">
          <button class="btn btn-sm btn-light btn-primary-border" id="openChatBtn">Open Chat</button>
        </div>
      </div>
    </div>

    <hr style="border-color: rgba(255,255,255,0.08);" />
    <small>Logged in as: <strong id="displayName">Admin</strong></small>
  </aside>

  <main class="flex-fill p-4">
    <!-- KPIs + Charts + Tables + Footer -->
    <div class="container">
      <h3>Welcome to Dashboard</h3>
      <p>Place all KPIs, Charts, Tables, Chat Widget here...</p>
    </div>
  </main>
</div>

<!-- Settings Modal -->
<div class="modal fade" id="settingsModal" tabindex="-1">
  <div class="modal-dialog modal-sm modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header"><h5 class="modal-title">Settings</h5><button class="btn-close" data-bs-dismiss="modal"></button></div>
      <div class="modal-body">
        <form id="settingsForm">
          <div class="mb-2">
            <label class="form-label small-muted">Display name</label>
            <input class="form-control" id="inputDisplayName" placeholder="Admin">
          </div>
          <div class="mb-2">
            <label class="form-label small-muted d-block">Primary color</label>
            <div class="d-flex gap-2">
              <div class="swatch" data-color="#0d6efd" style="background:#0d6efd;"></div>
              <div class="swatch" data-color="#6f42c1" style="background:#6f42c1;"></div>
              <div class="swatch" data-color="#20c997" style="background:#20c997;"></div>
              <div class="swatch" data-color="#ff7b00" style="background:#ff7b00;"></div>
            </div>
          </div>
          <div class="mb-2">
            <label class="form-label small-muted">Compact mode</label>
            <div class="form-check form-switch">
              <input class="form-check-input" type="checkbox" id="compactSwitch">
              <label class="form-check-label" for="compactSwitch">Enable compact spacing</label>
            </div>
          </div>
          <div class="d-grid"><button class="btn btn-primary" type="submit">Save Settings</button></div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- footer -->
<div class="card">
  <div class="card-header">
    Featured
  </div>
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
  // Dark Mode Toggle
  const darkToggle = document.getElementById('darkToggle');
  darkToggle.addEventListener('change', e=>{
    if(e.target.checked){ document.documentElement.setAttribute('data-theme','dark'); localStorage.setItem('iN_dark','1'); }
    else{ document.documentElement.removeAttribute('data-theme'); localStorage.removeItem('iN_dark'); }
  });

  // Sidebar toggle (mobile)
  const sidebarToggle = document.getElementById('sidebarToggle');
  sidebarToggle.addEventListener('click', ()=>{
    const sb = document.querySelector('.sidebar');
    if(sb.style.display === 'none' || getComputedStyle(sb).display === 'none') sb.style.display = 'block';
    else sb.style.display = 'none';
  });
</script>
</body>
</html>
