  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('admin/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          @if(auth()->guard('admin')->check())
          <p>{{auth()->guard('admin')->user()->name}}</p>
          @endif
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
  
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
         
        </li>
        <li class="treeview">
          <a href="{{route('post.index')}}">
            <i class="fa fa-files-o"></i>
            <span>Posts</span>
          </a>
        </li>
        <li>
          <a href="{{route('cateogery.index')}}">
            <i class="fa fa-th"></i> <span>Cateogeries</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>
         <li>
          <a href="{{route('tag.index')}}">
            <i class="fa fa-th"></i> <span>Tags</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>
         <li>
          <a href="{{route('user.index')}}">
            <i class="fa fa-th"></i> <span>Users</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>
         <li>
          <a href="{{route('role.index')}}">
            <i class="fa fa-th"></i> <span>Roles</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>
          <li>
          <a href="{{route('permission.index')}}">
            <i class="fa fa-th"></i> <span>Permissions</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>
       
     
      
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
