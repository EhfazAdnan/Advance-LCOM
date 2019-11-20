<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="profile-image"> <img src="{{ asset('images/faces/face4.jpg')}}" alt="image"/> <span class="online-status online"></span> </div>
              <div class="profile-name">
                <p class="name">Ehfaz Adnan</p>
                <p class="designation">Manager</p>
                <div class="badge badge-teal mx-auto mt-3">Online</div>
              </div>
            </div>
          </li>
          <li class="nav-item"><a class="nav-link" href="{{ route('admin.index') }}"><img class="menu-icon" src="{{ asset('images/menu_icons/01.png')}}" alt="menu icon"><span class="menu-title">Dashboard</span></a></li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#manage-orders" aria-expanded="false" aria-controls="manage-orders"> <img class="menu-icon" src="{{ asset('images/menu_icons/08.png')}}" alt="menu icon"> <span class="menu-title">Manage Orders</span></a>
            <div class="collapse" id="manage-orders">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('admin.orders') }}">All Orders</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#manage-products" aria-expanded="false" aria-controls="manage-products"> <img class="menu-icon" src="{{ asset('images/menu_icons/08.png')}}" alt="menu icon"> <span class="menu-title">Manage Products</span></a>
            <div class="collapse" id="manage-products">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('admin.products') }}">All Products</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('admin.product.create') }}">Create Products</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#manage-categories" aria-expanded="false" aria-controls="manage-categories"> <img class="menu-icon" src="{{ asset('images/menu_icons/08.png')}}" alt="menu icon"> <span class="menu-title">Manage Category</span></a>
            <div class="collapse" id="manage-categories">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('admin.categories') }}">All Categories</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('admin.category.create') }}">Create Categories</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#manage-brands" aria-expanded="false" aria-controls="manage-brands"> <img class="menu-icon" src="{{ asset('images/menu_icons/08.png')}}" alt="menu icon"> <span class="menu-title">Manage Brands</span></a>
            <div class="collapse" id="manage-brands">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('admin.brands') }}">All Brands</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('admin.brand.create') }}">Create Brands</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#manage-divisions" aria-expanded="false" aria-controls="manage-divisions"> <img class="menu-icon" src="{{ asset('images/menu_icons/08.png')}}" alt="menu icon"> <span class="menu-title">Manage Divisions</span></a>
            <div class="collapse" id="manage-divisions">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('admin.divisions') }}">All Divisions</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('admin.division.create') }}">Create Divisions</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#manage-districts" aria-expanded="false" aria-controls="manage-districts"> <img class="menu-icon" src="{{ asset('images/menu_icons/08.png')}}" alt="menu icon"> <span class="menu-title">Manage Districts</span></a>
            <div class="collapse" id="manage-districts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('admin.districts') }}">All Districts</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('admin.district.create') }}">Create Districts</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link"> <img class="menu-icon" src="{{ asset('images/menu_icons/08.png')}}">
              
              <form action="{{ route('admin.logout') }}" method="post" class="form-inline">
              @csrf
              <input type="submit" value="Logout" class="btn btn-primary">
              </form> 

            </a>
          </li>

        </ul>
      </nav>
      <!-- partial -->