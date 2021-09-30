<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{config('app.name', 'Laravel')}} - @yield('title')</title>
    <link rel="icon" href="{{asset('forntEnd/images/logo.png')}}" type="image/gif" sizes="any">
    <link rel="stylesheet" type="text/css" href="{{asset('design/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('design/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('design/css/sumoselect.min.css')}}">
    <link rel="stylesheet" href="{{asset('design/vendor/fonts/fontawesome/css/fontawesome-all.css')}}">
    <link rel="stylesheet" href="{{asset('design/vendor/fonts/flag-icon-css/flag-icon.min.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    @yield('css')
</head>
<body>
    <!-- loader -->
    <div class="loading-data" style="display:block; color: #fff;">Loading&#8230;</div>
    <div class="dashboard-main-wrapper">
        <!-- Header Content -->
        @include('layouts.header')
        <!-- Sidebar Content -->
        @include('layouts.sidebar')
        <div class="dashboard-wrapper" id="dashboardwrapper" @if(!Auth::user()) style="margin-left : 0px !important;"@endif>
            <!-- Main Content -->
            @yield('content')
        </div>
    </div>
    <form>@csrf</form>

    <script type="text/javascript" src="{{asset('design/js/jquery-3.5.1.js')}}"></script>
    <script type="text/javascript" src="{{asset('design/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('design/js/sweetalert.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('design/js/jquery.sumoselect.min.js')}}"></script>
    <script src="{{asset('design/vendor/slimscroll/jquery.slimscroll.js')}}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.js"></script> -->
    <!-- <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css"> -->

    <script type="text/javascript">
        $(document).ready(function() {
            $('.loading-data').hide();$('.card').addClass('shadow-sm').addClass('p-3');$('.table').removeClass('table-striped');
            $(document).on('submit', 'form', function() {
                $('button').attr('disabled', 'disabled');
                $('.loading-data').show();
            });
            $('#example4').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [[10, 25, 50, - 1], [10, 25, 50, "All"]],
                responsive: true,
                language: {
                search: "_INPUT_",
                        searchPlaceholder: "Search records",
                }
        });
            $('.multipleSelect').SumoSelect();
        });
        @if(Session::has('Success'))
            swal('Success','{{Session::get('Success')}}', 'success');
        @elseif(Session::has('Errors'))
            swal('Error','{{Session::get('Errors')}}', 'error');
        @endif

        function isNumberKey(evt){
            if(evt.charCode >= 48 && evt.charCode <= 57 || evt.charCode <= 43){  
                return true;  
            }  
            return false;  
        }
    </script>
    <script>
        var sidenav = document.getElementById("sidenav");
        var buttoncross = document.getElementById("closebutton");
        function closeNav() {
        document.getElementById("sidenav").style.width = "64px";
        document.getElementById("dashboardwrapper").style.marginLeft = "64px";
        sidenav.classList.add("closestyle");
        sidenav.classList.remove("openstyle");
        buttoncross.classList.add("hide");
        buttoncross.classList.remove("show");
        }
        function openNav() {
        document.getElementById("sidenav").style.width = "240px";
        document.getElementById("dashboardwrapper").style.marginLeft = "240px";
        sidenav.classList.add("openstyle");
        sidenav.classList.remove("closestyle");
        buttoncross.classList.add("show");
        buttoncross.classList.remove("hide");
        }
    </script>
    @yield('script')
</body>
</html>
