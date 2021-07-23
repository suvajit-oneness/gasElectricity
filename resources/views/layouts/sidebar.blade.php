@auth
<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <!-- <a class="d-xl-none d-lg-none" href="#">Dashboard</a> -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider"> Menu </li>
                    
                    <li class="nav-item">
                        <a class="nav-link {{request()->routeIs('home')?'active':''}}" href="{{route('home')}}"><i class="fa fa-fw fa-user-circle"></i>Dashboard</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{request()->routeIs('user.profile')?'active':''}}" href="{{route('user.profile')}}"><i class="fa fa-fw fa-user-circle"></i>Profile</a>
                    </li>
                    @if(Auth::user()->user_type != 1)
                        <li class="nav-item">
                            <a class="nav-link {{request()->routeIs('user.points')?'active':''}}" href="{{route('user.points')}}"><i class="fa fa-fw fa-user-circle"></i>Your Points</a>
                        </li>
                    @endif

                    <!-- Admin Sidebar -->
                    @if(Auth::user()->user_type == 1)
                        <li class="nav-item">
                            <a class="nav-link {{request()->routeIs('admin.membership')?'active':''}}" href="{{route('admin.membership')}}"><i class="fa fa-fw fa-user-circle"></i>Membership</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{request()->routeIs('admin.users')?'active':''}}" href="{{route('admin.users')}}"><i class="fa fa-fw fa-user-circle"></i>Users</a>
                        </li>
                        <!-- Main Section -->
                        <li class="nav-divider">Main</li>
                        <li class="nav-item">
                            <a class="nav-link {{request()->routeIs('admin.states.*')?'active':''}}" href="{{route('admin.states')}}"><i class="fa fa-fw fa-user-circle"></i>State</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{request()->routeIs('admin.companies')?'active':''}}" href="{{route('admin.companies')}}"><i class="fa fa-fw fa-user-circle"></i>Companies</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{request()->routeIs('admin.products')?'active':''}}" href="{{route('admin.products')}}"><i class="fa fa-fw fa-user-circle"></i>Products</a>
                        </li>
                        
                        <!-- Report Section -->
                        <li class="nav-divider">Report</li>
                        <li class="nav-item">
                            <a class="nav-link {{request()->routeIs('admin.report.contactus')?'active':''}}" href="{{route('admin.report.contactus')}}"><i class="fa fa-fw fa-user-circle"></i>Contact us</a>
                        </li>
                        <!-- Crud Operation Section -->
                        <li class="nav-divider">Features</li>
                        <li class="nav-item">
                            <a class="nav-link {{request()->routeIs('admin.blogs.category')?'active':''}}" href="{{route('admin.blogs.category')}}"><i class="fa fa-fw fa-user-circle"></i>Blog Category</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{request()->routeIs('admin.blogs')?'active':''}}" href="{{route('admin.blogs')}}"><i class="fa fa-fw fa-user-circle"></i>Blogs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{request()->routeIs('admin.testimonial')?'active':''}}" href="{{route('admin.testimonial')}}"><i class="fa fa-fw fa-user-circle"></i>Testimonial</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{request()->routeIs('admin.faq')?'active':''}}" href="{{route('admin.faq')}}"><i class="fa fa-fw fa-user-circle"></i>Faq</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0)" data-toggle="collapse" aria-expanded="{{request()->routeIs('admin.setting.*')?'true':'false'}}" data-target="#submenu-6" aria-controls="submenu-6"><i class="fas fa-fw fa-file"></i> Settings </a>
                            <div id="submenu-6" class="collapse submenu {{request()->routeIs('admin.setting.*')?'show':''}}">
                                <ul class="nav flex-column">
                                    <li class="nav-item {{request()->routeIs('admin.setting.about_us')?'active':''}}">
                                        <a class="nav-link" href="{{route('admin.setting.about_us')}}">About us</a>
                                    </li>
                                    <li class="nav-item {{request()->routeIs('admin.setting.whychooseus')?'active':''}}">
                                        <a class="nav-link" href="{{route('admin.setting.whychooseus')}}">Why Choose Us</a>
                                    </li>
                                    <li class="nav-item {{request()->routeIs('admin.setting.how_it_works')?'active':''}}">
                                        <a class="nav-link" href="{{route('admin.setting.how_it_works')}}">How it works</a>
                                    </li>
                                    
                                </ul>
                            </div>
                        </li>
                    <!-- Admin Sidebar End -->
                    <!-- Supplier Sidebar -->
                    @elseif(Auth::user()->user_type == 2)
                        <!-- Main Section -->
                        <li class="nav-divider">Features</li>
                        <li class="nav-item">
                            <a class="nav-link {{request()->routeIs('supplier.service.pincode')?'active':''}}" href="{{route('supplier.service.pincode')}}"><i class="fa fa-fw fa-user-circle"></i>Pincode</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{request()->routeIs('supplier.companie*')?'active':''}}" href="{{route('supplier.companies')}}"><i class="fa fa-fw fa-user-circle"></i>Companies</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{request()->routeIs('supplier.product*')?'active':''}}" href="{{route('supplier.products')}}"><i class="fa fa-fw fa-user-circle"></i>Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0)" data-toggle="collapse" aria-expanded="{{request()->routeIs('supplier.setting.*')?'true':'false'}}" data-target="#supplierSettings-6" aria-controls="supplierSettings-6"><i class="fas fa-fw fa-file"></i> Settings </a>
                            <div id="supplierSettings-6" class="collapse submenu {{request()->routeIs('supplier.setting.*')?'show':''}}">
                                <ul class="nav flex-column">
                                    <li class="nav-item {{request()->routeIs('supplier.setting.form')?'active':''}}">
                                        <a class="nav-link" href="{{route('supplier.setting.form')}}">Forms</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <!-- <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0)" data-toggle="collapse" aria-expanded="{{request()->routeIs('supplier.reports.*')?'true':'false'}}" data-target="#supplierReports-1" aria-controls="supplierReports-1"><i class="fas fa-fw fa-file"></i> Reports </a>
                            <div id="supplierReports-1" class="collapse submenu {{request()->routeIs('supplier.reports.*')?'show':''}}">
                                <ul class="nav flex-column">
                                    <li class="nav-item {{request()->routeIs('supplier.reports.form.filledbyuser')?'active':''}}">
                                        <a class="nav-link" href="{{route('supplier.reports.form.filledbyuser')}}">User Form Filled</a>
                                    </li>
                                </ul>
                            </div>
                        </li> -->
                    <!-- Supplier Sidebar End-->
                    <!-- Customer Sidebar -->
                    @elseif(Auth::user()->user_type == 3)
                    @endif
                </ul>
            </div>
        </nav>
    </div>
</div>
@endauth