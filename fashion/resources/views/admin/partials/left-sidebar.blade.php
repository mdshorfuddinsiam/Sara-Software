  <aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">	
		
        <div class="user-profile">
			<div class="ulogo">
				 <a href="index.html">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">					 	
						  <img src="{{ asset('') }}images/logo-dark.png" alt="">
						  <h3><b>Unique </b>Fashion</h3>
					 </div>
				</a>
			</div>
        </div>
      
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">  

		<li>
          <a href="{{ route('admin.dashboard') }}">
            <i data-feather="pie-chart"></i>
			<span>Dashboard</span>
          </a>
        </li>  
		
        <li class="treeview">
          <a href="#">
            <i data-feather="message-circle"></i>
            <span>Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('categories.index') }}"><i class="ti-more"></i>Categories</a></li>
          </ul>
        </li> 

        <li class="treeview">
          <a href="#">
            <i data-feather="message-circle"></i>
            <span>Product</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('products.index') }}"><i class="ti-more"></i>Products</a></li>
            <li><a href="{{ route('products.create') }}"><i class="ti-more"></i>Create</a></li>
          </ul>
        </li> 
		  
        <li class="header nav-small-cap">User Interface</li>

        <li class="treeview">
          <a href="#">
            <i data-feather="message-circle"></i>
            <span>Contact</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('contacts.index') }}"><i class="ti-more"></i>Contacts</a></li>
          </ul>
        </li> 
		  
		  
		{{-- <li class="header nav-small-cap">EXTRA</li>		   --}}
		  
		  
		<li>
          <a href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i data-feather="lock"></i>
			<span>Log Out</span>
          </a>
          <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
              @csrf
          </form>
        </li> 
        
      </ul>
    </section>

    <div class="sidebar-footer">
    <!-- item-->
    <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
    <!-- item-->
    <a href="{{ route('admin.logout') }}" class="link float-right" data-toggle="tooltip" title="" data-original-title="Logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="ti-lock"></i></a>
    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
        @csrf
    </form>
  </div>
  </aside>