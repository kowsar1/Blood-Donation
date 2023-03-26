<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('dashboard')}}">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('donar.list')}}">
                    <span data-feather="file" class="align-text-bottom"></span>
                    Donar
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('patient.list')}}">
                    <span data-feather="file" class="align-text-bottom"></span>
                    Patient
                </a>
            </li>  <li class="nav-item">
                <a class="nav-link" href="{{route('blood.request')}}">
                    <span data-feather="file" class="align-text-bottom"></span>
                    Request
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('category.list')}}">
                    <span data-feather="file" class="align-text-bottom"></span>
                    Blood Group
                </a>
            </li>
           

            <li class="nav-item">
                <a class="nav-link" href="{{route('brand.list')}}">
                    <span data-feather="file" class="align-text-bottom"></span>
                    Brands
                </a>
            </li>

        </ul>

    </div>
</nav>
