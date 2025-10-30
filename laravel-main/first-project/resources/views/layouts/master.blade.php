<!-- resources/views/layouts/master.blade.php -->

  {{-- Header --}}
  @include('layouts.header')

  <!-- navbar -->
   @include('layouts.navbar')

  {{-- Dynamic Page Content --}}
  <div class="container mt-4">
      @yield('content')
  </div>

  {{-- Footer --}}
  @include('layouts.footer')
