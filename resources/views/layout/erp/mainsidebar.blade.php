<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="profile-image">
                <img src="{{asset('asset')}}/images/faces/face5.jpg" alt="image"/>
              </div>
              <div class="profile-name">
                <p class="name">
                  Welcome Jane
                </p>
                <p class="designation">
                  Super Admin
                </p>
              </div>
            </div>
          </li>
         <li class="nav-item">
            <a class="nav-link" href="/laravel/project/public/home">
              <i class="fa fa-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
         <!--   <li class="nav-item">
            <a class="nav-link" href="{{asset('asset')}}/pages/widgets.html">
              <i class="fa fa-puzzle-piece menu-icon"></i>
              <span class="menu-title">Widgets</span>
            </a>
          </li> -->

          @include("layout.erp.menus.customer");
          @include("layout.erp.menus.service");
          @include("layout.erp.menus.purchase");
          @include("layout.erp.menus.c_conversation_menu");
          @include("layout.erp.menus.order");
          @include("layout.erp.menus.system");





          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#page-layouts" aria-expanded="false" aria-controls="page-layouts">
              <i class="fab fa-trello menu-icon"></i>
              <span class="menu-title">Page Layouts</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="page-layouts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="{{asset('asset')}}/pages/layout/boxed-layout.html">Boxed</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{asset('asset')}}/pages/layout/rtl-layout.html">RTL</a></li>
                <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="{{asset('asset')}}/pages/layout/horizontal-menu.html">Horizontal Menu</a></li>
              </ul>
            </div>
          </li>
          
        </ul>
      </nav>