<!DOCTYPE html>
<html lang="en">
<head>
    <title>Fiverr Admin Panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="d-flex">
        <div class="bg-dark text-white p-3" style="width:250px; height:100vh;">
            <h3>Admin</h3>
            <ul class="nav flex-column">
                <li><a href="{{ route('admin.dashboard') }}" class="nav-link text-white">Dashboard</a></li>
                <li><a href="{{ route('admin.users.index') }}" class="nav-link text-white">Users</a></li>

                <li><a href="#" class="nav-link text-white">Gigs</a></li>
                <li><a href="#" class="nav-link text-white">Orders</a></li>
            </ul>
        </div>

        <div class="flex-grow-1 p-4">
            @yield('content')
        </div>
    </div>
</body>
</html>
