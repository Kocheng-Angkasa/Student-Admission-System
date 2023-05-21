<section class="sidebar">
      <!-- Sidebar user panel -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">

        
        @if(\Auth::user()->name != 'Admin')
        <li class="menu-sidebar"><a href="{{ url('/dashboard') }}"><span class="fa fa-home"></span> Beranda Dashboard</span></a></li>
        <li class="menu-sidebar"><a href="{{ url('/biodata') }}"><span class="fa fa-address-card-o"></span> Biodata</span></a></li>
        <li class="menu-sidebar"><a href="{{ url('/pesan') }}"><span class="fa fa-comments-o"></span> Kirim Pesan</span></a></li>
        @endif

        
        


        @if(\Auth::user()->name == 'Admin')
        <li class="menu-sidebar"><a href="{{ url('/dashboard') }}"><span class="fa fa-home"></span> Beranda Dashboard</span></a></li>
        <li class="menu-sidebar"><a href="{{ url('/peserta') }}"><span class="fa fa-user-circle"></span> Data Peserta</span></a></li> 
        <li class="menu-sidebar"><a href="{{ url('/verifikasi') }}"><span class="fa fa-address-card-o"></span> Verifikasi Peserta</span></a></li>
        <li class="menu-sidebar"><a href="{{ url('/pesan') }}"><span class="fa fa-comments-o"></span> Pesan</span></a></li>
        <li class="menu-sidebar"><a href="{{ url('/profile-sekolah') }}"><span class="fa fa-graduation-cap"></span> Update Profil Sekolah</span></a></li>
        @endif


        


      </ul>
    </section>


            <!-- @if(\Auth::user()->role == 1)

        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Master Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

          @
            <li><a href="{{ url('siswa') }}"><i class="fa fa-circle-o"></i> Data Siswa</a></li>

            <li><a href="{{ url('guru') }}"><i class="fa fa-circle-o"></i> Data Guru</a></li>

            <li><a href="{{ url('kelas') }}"><i class="fa fa-circle-o"></i> Data Kelas</a></li>


            <li><a href="{{ url('mapel') }}"><i class="fa fa-circle-o"></i> Data Mapel</a></li>
          </ul>
          
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Jadwal Pelajaran</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('set/jadwal-pelajaran') }}"><i class="fa fa-circle-o"></i> Set Jadwal Pelajaran</a></li>

            <li><a href="{{ url('jadwal-pelajaran') }}"><i class="fa fa-circle-o"></i> List Jadwal Pelajaran</a></li>

            <li><a href="{{ url('action/jadwal-pelajaran') }}"><i class="fa fa-circle-o"></i> Action Jadwal Pelajaran</a></li>
          </ul>
        </li>

        @endif

        @if((\Auth::user()->role == 2) || (\Auth::user()->role == 3))

        <li class="menu-sidebar"><a href="{{ url('/jadwal-pelajaran-ku') }}"><span class="glyphicon glyphicon-log-out"></span> Jadwal Pelajaran Ku</span></a></li>

        @endif -->