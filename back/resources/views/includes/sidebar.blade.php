
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>

    </ul>

  </nav>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->

    <a href="#" class="brand-link">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">



      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item">
                <a href="{{route('admin.comments.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-tenge"></i>
                    <p>
                    Comments
                  </p>
                </a>
              </li>
          <li class="nav-item">
            <a href="{{route('admin.category.index')}}" class="nav-link">
                <i class="nav-icon fas fa-tenge"></i>
                <p>
                Категория
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.subcategory.index')}}" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                    Подкатегория
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.color.index')}}" class="nav-link">
                <i class="nav-icon fas fa-user-graduate"></i>
                <p>
                    Colors
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('admin.size.index')}}" class="nav-link">
                <i class="nav-icon fas fa-chalkboard-teacher"></i>
                <p>
                    Size
              </p>
            </a>
          </li>
            <li class="nav-item">
                <a href="{{route('admin.product.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-chalkboard-teacher"></i>
                    <p>
                        Products                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.user.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-chalkboard-teacher"></i>
                    <p>
                        Users                   </p>
                </a>
            </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
