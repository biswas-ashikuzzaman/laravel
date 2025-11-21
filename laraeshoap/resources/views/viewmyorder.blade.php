<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    {{-- My Orders Link --}}
                    <x-nav-link :href="route('myorders')" :active="request()->routeIs('myorders')">
                        {{ __('My Orders') }}
                    </x-nav-link>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                             this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
             <x-responsive-nav-link :href="route('myorders')" :active="request()->routeIs('myorders')">
                {{ __('My Orders') }}
            </x-responsive-nav-link>
        </div>

        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                         this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>

{{-- Bootstrap Section Start --}}
<div class="container my-5">
    <h2 class="mb-4 text-center fw-bold text-dark">📜 My Order History</h2>
    
    @if($orders->isEmpty())
        <div class="alert alert-info text-center shadow-sm" role="alert">
            <i class="bi bi-info-circle-fill me-2"></i> No orders found. Start shopping today!
        </div>
    @else
        <div class="card shadow-lg border-0">
            <div class="card-header bg-primary text-white fw-bold">
                Orders List ({{ $orders->count() }} items)
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col"># ID</th>
                                <th scope="col">Date</th>
                                <th scope="col">Product</th>
                                <th scope="col" class="text-center">Image</th>
                                <th scope="col" class="text-end">Total Price</th>
                                <th scope="col" class="text-center">Status</th>
                                <th scope="col" class="text-center">Invoice</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    {{-- 1. ID --}}
                                    <td class="fw-bold">{{ $order->id }}</td>
                                    
                                    {{-- 2. Date --}}
                                    {{-- Assuming 'created_at' exists --}}
                                    <td>{{ $order->created_at->format('M d, Y') }}</td> 
                                    
                                    {{-- 3. Product Title --}}
                                    <td>
                                        <a href="{{ url('products', $order->product->id) }}" class="text-decoration-none text-dark fw-semibold">
                                            {{ $order->product->product_title ?? 'N/A' }}
                                        </a>
                                    </td>
                                    
                                    {{-- 4. Product Image --}}
                                    <td class="text-center">
                                        {{-- Updated path to use 'asset()' and display image --}}
                                        <img src="{{ asset('storage/product_images/' . ($order->product->product_image ?? 'default.jpg')) }}" 
                                            alt="{{ $order->product->product_title ?? 'Product Image' }}"
                                            width="50" height="50" class="img-thumbnail rounded">
                                    </td>
                                    
                                    {{-- 5. Total Price --}}
                                    {{-- Assuming 'product_price' is the total price for this simple order entry. Use 'grand_total' if available in the $order object --}}
                                    <td class="text-end fw-bold text-success">
                                        ৳{{ number_format($order->product->product_price ?? 0, 2) }}
                                    </td>
                                    
                                    {{-- 6. Status (Improved with Badge) --}}
                                    <td class="text-center">
                                        @php
                                            $status = $order->status ?? 'Pending';
                                            $badgeClass = match($status) {
                                                'Delivered' => 'success',
                                                'Shipped' => 'info',
                                                'Cancelled' => 'danger',
                                                default => 'warning',
                                            };
                                        @endphp
                                        <span class="badge bg-{{ $badgeClass }}">{{ $status }}</span>
                                    </td>
                                    
                                    {{-- 7. Invoice (Used the existing route, assumed it should be a user route) --}}
                                    <td class="text-center">
                                        {{-- If the route is specifically 'admin.downloadinvoice', you might need to change it if this is a user dashboard --}}
                                        <a href="{{ route('admin.downloadinvoice', $order->id) }}" class="btn btn-sm btn-outline-info" title="Download Invoice">
                                            <i class="bi bi-file-earmark-arrow-down-fill"></i> Invoice
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
</div>