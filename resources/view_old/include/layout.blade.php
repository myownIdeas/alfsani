<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ALIF SANI TRADERS</title>
    <link rel="stylesheet" href="{{url('/')}}/assets/css/style.css">

</head>
<body>
<script>
    var mainUrl ="";
     mainUrl = '{{ URL::to('/')}}';
</script>
<div class="wrapper">
    <nav class="sidebar">
        <div class="sidebar-header text-center">
            <h3>Alif SANI TRADERS</h3>
        </div>
        <ul class="list-unstyled components">
        @if( \Session::get('user')->user_type ==1 )
            <li class="active">
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">SHOP</a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li>
                        <a href="{{URL::to('add/shop')}}">Add Shop</a>
                    </li>
                    <li>
                        <a href="{{URL::to('shop/listing')}}">Shop Listing</a>
                    </li>

                </ul>
            </li>
            @endif
            @if( \Session::get('user')->user_type ==1 )
                <li class="active">
                    <a href="#stock" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Stock</a>
                    <ul class="collapse list-unstyled" id="stock">
                        <li>
                            <a href="{{URL::to('add/stock')}}">Add Stock</a>
                        </li>
                        <li>
                            <a href="{{URL::to('stock/listing')}}">Stock Listing</a>
                        </li>

                    </ul>
                </li>
            @endif
                <li class="active">
                    <a href="#orderList" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Order</a>
                    <ul class="collapse list-unstyled" id="orderList">
                        <li>
                            <a href="{{URL::to('order_listing')}}">Order Listing</a>
                        </li>


                    </ul>
                </li>

            <li class="active">
                <a href="#group" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Group</a>
                <ul class="collapse list-unstyled" id="group">
                    @if( \Session::get('user')->user_type ==1 )
                    <li>
                        <a href="{{URL::to('add/group')}}"> Make Group </a>
                    </li>
                    <li>
                        <a href="{{URL::to('edit_my_group')}}"> Edit Group </a>
                    </li>
                    @endif
                    <li>
                        <a href="{{URL::to('group/listing')}}"> Group Listing </a>
                    </li>

                </ul>
            </li>

            <li>


                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false"
                   class="dropdown-toggle">Settings</a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <a href="#city" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">City</a>
                    <ul class="collapse list-unstyled" id="city">
                        <li>
                            <a href="{{URL::to('add/city')}}">Add City</a>
                        </li>
                        <li>
                            <a href="{{URL::to('city/listing')}}">City Listing</a>
                        </li>

                    </ul>

                    <a href="#item" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Company</a>
                    <ul class="collapse list-unstyled" id="item">
                        <li>
                            <a href="{{URL::to('add/company')}}">Add Company</a>
                        </li>
                        <li>
                            <a href="{{URL::to('company/listing')}}">Company Listing</a>
                        </li>

                    </ul>
                    <a href="#comitem" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Items</a>
                    <ul class="collapse list-unstyled" id="comitem">
                        <li>
                            <a href="{{URL::to('add_Items')}}">Add Item</a>
                        </li>
                        <li>
                            <a href="{{URL::to('item_listing')}}">Item Listing</a>
                        </li>

                    </ul>
                    <a href="#company_model" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Model</a>
                    <ul class="collapse list-unstyled" id="company_model">
                        <li>
                            <a href="{{URL::to('add/company/model')}}">Add Model</a>
                        </li>
                        <li>
                            <a href="{{URL::to('company/listing/model')}}">Model Listing</a>
                        </li>

                    </ul>
                    @if( \Session::get('user')->user_type ==1 )
                    <a href="#user" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Add User</a>
                    <ul class="collapse list-unstyled" id="user">
                        <li>
                            <a href="{{URL::to('add/user')}}">Add User</a>
                        </li>
                        <li>
                            <a href="{{URL::to('user/listing')}}">User Listing</a>
                        </li>

                    </ul>
                    @endif
                </ul>

            </li>


        </ul>



    </nav>
    <!-- Page Content  -->
    <div class="content">

        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn btn-info">
                    <i class="fas fa-align-left"></i>
                </button>
                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-align-justify"></i>
                </button>

                <div class="collapse navbar-collapse cst-nav" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">

                        <li class="nav-item">
                            <a class="nav-link" href="#">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.html">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    @yield('content')
     </div>
    <!-- End Page Content  -->
</div>

<div class="overlay"></div>

<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="{{url('/')}}/assets/js/jquery-3.3.1.slim.min.js"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/locale/af.js"> </script>
<script src="{{url('/')}}/assets/js/jquery-3.3.1.js"></script>
<!-- Popper.JS -->
<script src="{{url('/')}}/assets/js/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="{{url('/')}}/assets/js/bootstrap.min.js"></script>
<!-- DATATABLE JS -->
<script src="{{url('/')}}/assets/js/jquery.dataTables.min.js"></script>
<script src="{{url('/')}}/assets/js/dataTables.bootstrap4.min.js"></script>
<!-- Font Awesome JS -->
<script src="{{url('/')}}/assets/js/all.js"></script>
<script src="{{url('/')}}/assets/js/script.js"></script>


</body>

</html>