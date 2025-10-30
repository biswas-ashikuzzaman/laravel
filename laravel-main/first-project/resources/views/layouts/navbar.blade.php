<nav class="navbar navbar-expand-lg navbar-light bg-primary shadow-sm fixed-top">
  <div class="container">
    <!-- Brand / Logo -->
    <a class="navbar-brand fw-bold text-light" href="#">
      <img src="image/logo.png" alt="Logo" height="60" class="me-2 rounded-circle">
      TravelMate
    </a>

    <!-- Navbar Toggle (for mobile) -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTravel"
      aria-controls="navbarTravel" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar Links -->
    <div class="collapse navbar-collapse" id="navbarTravel">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active text-light" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="#">Destinations</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="#">Packages</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="#">Tours</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="{{route('pages.about')}}">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="#">Contact</a>
        </li>
      </ul>

      <!-- Search Form -->
      <form class="d-flex ms-lg-3">
        <input class="form-control me-2" type="search" placeholder="Search places..." aria-label="Search">
        <button class="btn btn-outline-primary" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>