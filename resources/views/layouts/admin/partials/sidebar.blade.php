<div class="sidebar" data-color="azure" data-background-color="black" data-image="{{ asset('/img/sidebar-2.jpg')}}">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
            Creative Tim
        </a></div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item {{ url()->current() == route('admin.dashboard.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.dashboard.index') }}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item {{ url()->current() == route('admin.categories.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.categories.index') }}">
                    <i class="material-icons">dashboard</i>
                    <p>Categories</p>
                </a>
            </li>
            <li class="nav-item {{ url()->current() == route('admin.products.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.products.index') }}">
                    <i class="material-icons">dashboard</i>
                    <p>Products</p>
                </a>
            </li>
            <li class="nav-item {{ url()->current() == route('admin.attributes.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.attributes.index') }}">
                    <i class="material-icons">content_paste</i>
                    <p>Product attributes</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="./typography.html">
                    <i class="material-icons">library_books</i>
                    <p>Images</p>
                </a>
            </li>
{{--            <li class="nav-item ">--}}
{{--                <a class="nav-link" href="./icons.html">--}}
{{--                    <i class="material-icons">bubble_chart</i>--}}
{{--                    <p>Icons</p>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li class="nav-item ">--}}
{{--                <a class="nav-link" href="./map.html">--}}
{{--                    <i class="material-icons">location_ons</i>--}}
{{--                    <p>Maps</p>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li class="nav-item ">--}}
{{--                <a class="nav-link" href="./notifications.html">--}}
{{--                    <i class="material-icons">notifications</i>--}}
{{--                    <p>Notifications</p>--}}
{{--                </a>--}}
{{--            </li>--}}
        </ul>
    </div>
</div>
