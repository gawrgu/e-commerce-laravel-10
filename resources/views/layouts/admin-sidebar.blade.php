 <!-- partial:partials/_sidebar.html -->
 <nav class="sidebar sidebar-offcanvas" id="sidebar">
     <ul class="nav">
         <li class="nav-item {{ Request::is('admin / dashboard') ? 'active' : '' }}">
             <a class="nav-link" href="{{ url('admin/dashboard') }}">
                 <i class="mdi mdi-home menu-icon"></i>
                 <span class="menu-title">Dashboard</span>
             </a>
         </li>
         <li class="nav-item {{ Request::is('admin / orders') ? 'active' : '' }}">
             <a class="nav-link" href="{{ url('admin/orders') }}">
                 <i class="mdi mdi-sale menu-icon"></i>
                 <span class="menu-title">Orders</span>
             </a>
         </li>
         <li class="nav-item {{ Request::is('admin / category*') ? 'active' : '' }}">
             <a class="nav-link" data-bs-toggle="collapse" href="#categories"
                 aria-expanded="{{ Request::is('admin / category*') ? 'true' : 'false' }}">
                 <i class="mdi mdi-view-list menu-icon"></i>
                 <span class="menu-title">Category</span>
                 <i class="menu-arrow"></i>
             </a>
             <div class="collapse {{ Request::is('admin/category*') ? 'show' : '' }}" id="categories">
                 <ul class="nav flex-column sub-menu">
                     <li class="nav-item">
                         <a class="nav-link {{ Request::is('admin/category/create') ? 'active' : '' }}"
                             href="{{ route('create-category') }}">Create Category
                         </a>
                     <li class="nav-item">
                         <a class="nav-link {{ Request::is('admin/category') || Request::is('admin/category/*/edit') ? 'active' : '' }}"
                             href="{{ route('categories') }}">View Category
                         </a>
                     </li>
         </li>
     </ul>
     </div>
     </li>
     <li class="nav-item {{ Request::is('admin/products*') ? 'active' : '' }}">
         <a class="nav-link" data-bs-toggle="collapse" href="#products"
             aria-expanded="{{ Request::is('admin/products*') ? 'true' : 'false' }}">
             <i class="mdi mdi-plus-circle menu-icon"></i>
             <span class="menu-title">Products</span>
             <i class="menu-arrow"></i>
         </a>
         <div class="collapse {{ Request::is('admin/products*') ? 'show' : '' }}" id="products">
             <ul class="nav flex-column sub-menu">
                 <li class="nav-item">
                     <a class="nav-link {{ Request::is('admin/products/create') ? 'active' : '' }}"
                         href="{{ route('create-product') }}">
                         Create Product
                     </a>
                 <li class="nav-item">
                     <a class="nav-link {{ Request::is('admin/products') || Request::is('admin/products/*/edit') ? 'active' : '' }}"
                         href={{ route('products') }}>
                         View Products
                     </a>
                 </li>
     </li>
     </ul>
     </div>
     </li>
     <li class="nav-item {{ Request::is('admin / brands') ? 'active' : '' }}">
         <a class="nav-link" href="{{ route('brands') }}">
             <i class="mdi mdi-view-headline menu-icon"></i>
             <span class="menu-title">Brands</span>
         </a>
     </li>
     <li class="nav-item {{ Request::is('admin / colors') ? 'active' : '' }}">
         <a class="nav-link" href="{{ route('colors') }}">
             <i class="mdi mdi-view-headline menu-icon"></i>
             <span class="menu-title">Colors</span>
         </a>
     </li>
     <li class="nav-item {{ Request::is('admin/user*') ? 'active' : '' }}">
         <a class="nav-link" data-bs-toggle="collapse" href="#auth"
             aria-expanded="{{ Request::is('admin/user*') ? 'true' : 'false' }}">
             <i class="mdi mdi-account menu-icon"></i>
             <span class="menu-title">Users</span>
             <i class="menu-arrow"></i>
         </a>
         <div class="collapse {{ Request::is('admin/users*') ? 'show' : '' }}" id="auth">
             <ul class="nav flex-column sub-menu">
                 <li class="nav-item">
                     <a class="nav-link {{ Request::is('admin/users') || Request::is('admin/users/*/edit') ? 'active' : '' }}""
                         href="{{ route('user') }}">
                         View User
                     </a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link {{ Request::is('admin/user-admin') || Request::is('admin/users/*/edit') ? 'active' : '' }}"
                         href="{{ route('admin') }}">
                         View Admin
                     </a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link {{ Request::is('admin/users/create') ? 'active' : '' }}"
                         href="{{ route('create-user') }}">
                         Add User
                     </a>
                 </li>
             </ul>
         </div>
     </li>
     <li class="nav-item {{ Request::is('admin / sliders') ? 'active' : '' }}">
         <a class="nav-link" href="{{ route('sliders') }}">
             <i class="mdi mdi-view-carousel menu-icon"></i>
             <span class="menu-title">Home Slider</span>
         </a>
     </li>
     <li class="nav-item {{ Request::is('admin / site-setting') ? 'active' : '' }}">
         <a class="nav-link" href="{{ route('setting') }}">
             <i class="mdi mdi-file-document-box-outline menu-icon"></i>
             <span class="menu-title">Site Setting</span>
         </a>
     </li>
     </ul>
 </nav>
