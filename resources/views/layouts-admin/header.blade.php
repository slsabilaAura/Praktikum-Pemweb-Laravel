<div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('dashboard-admin') }}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-event"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin SpaceRuang</div>
                <!-- <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div> -->

            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

          

            <!-- Nav Item - Event Details -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.ruang') }}">
                    <i class="fas fa-fw fa-calendar"></i>
                    <span> Spaces List</span></a>
            </li>


            <!-- Nav Item - Event Approval Request -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('pengajuan.index') }}">
                    <i class="fas fa-fw fa-check-circle"></i>
                    <span>Space Approval</span></a>
            </li>


            


            <!-- Nav Item - Logout -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); confirmLogout();">
                  <i class="fas fa-fw fa-sign-out-alt"></i>
                  <span>Logout</span>
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

            
            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">
                                        Logout</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

            
         

          
            <br><br>
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            
        </ul>
        <!-- End of Sidebar -->
        