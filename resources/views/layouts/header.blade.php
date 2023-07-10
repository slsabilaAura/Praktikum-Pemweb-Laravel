<header id="header" class="fixed-top ">
<div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
          <span class="icofont-close js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    <nav class="site-nav">
      <div class="container">
        <div class="menu-bg-wrap">
          <div class="site-navigation">
            <a href="#" class="logo m-0 float-start">SpaceRuang</a>

            <ul
              class="js-clone-nav d-none d-lg-inline-block text-start site-menu float-end"
            >
              <li class="nav-link scrollto"><a href="{{url('dashboard')}}">Home</a></li>
             
              <li class="nav-link scrollto{{ Request::is('ruangan*') ? ' active' : '' }}">
                <a href="{{ url('ruangan') }}">Daftar Ruang</a>
                </li>
                <li class="nav-link scrollto {{ Request::is('daftar-permintaan*') ? ' active' : '' }}" >
                <a href="{{ route('daftar-permintaan') }}">Daftar Pengajuan Ruang</a>
                </li>
              <li class="nav-link scrollto{{ Request::is('profile') ? ' active' : '' }}">
               <a href="{{ url('profile') }}">Profil</a>
              </li>
              <li>
                  <a href="{{ route('logout') }}" onclick="event.preventDefault(); confirmLogout();">
                    {{ __('Logout') }}
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                  </form>
                </li>

                <script>
                  function confirmLogout() {
                    if (confirm('Apakah Anda yakin ingin logout?')) {
                      document.getElementById('logout-form').submit();
                    }
                  }
                </script>

              

            
           
         
          </div>
        </div>
      </div>
    </nav>

    
   
</header>