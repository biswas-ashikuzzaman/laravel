<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VendorDashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('vendor.dashboard');
    }
}
