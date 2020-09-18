<aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">
        <div>
          <p class="app-sidebar__user-name"> {{auth()->guard('admin')->user()->name}}</p>
          <p class="app-sidebar__user-designation">{{auth()->guard('admin')->user()->username}}</p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item " href="dashboard.html"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li><a class="app-menu__item  " href="{{route('admin.order.list')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Orders</span></a></li>
        <li><a class="app-menu__item  " href="{{route('admin.product.list')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Product</span></a></li>
        <li><a class="app-menu__item " href="{{route('admin.materials.list')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Material</span></a></li>
        <li><a class="app-menu__item " href="{{route('admin.invoice.list')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Invoices</span></a></li>

        
      </ul>
    </aside>