  
  {{-- @php
    dd($categories);
  @endphp --}}

  <!-- ================================== TOP NAVIGATION ================================== -->
  <div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
    <nav class="yamm megamenu-horizontal">
      <ul class="nav">

        @foreach($categories as $row)
        <li class="dropdown menu-item"> <a href="{{ route('categorywise.product', ['category' => @$row->id]) }}"><i class="icon fa fa-shopping-bag" aria-hidden="true"></i>{{ @$row->category_name }}</a>
        </li>
        <!-- /.menu-item -->
        @endforeach
        
      </ul>
      <!-- /.nav --> 
    </nav>
    <!-- /.megamenu-horizontal --> 
  </div>
  <!-- /.side-menu --> 
  <!-- ================================== TOP NAVIGATION : END ================================== --> 
  
