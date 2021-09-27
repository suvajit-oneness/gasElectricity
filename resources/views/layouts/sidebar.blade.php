@auth

   
    <div class="nav-left-sidebar sidebar-dark closestyle" id="sidenav">
        <div class="menu-list">
            <nav class="navbar navbar-expand-lg navbar-light">
                <!-- <a class="d-xl-none d-lg-none" href="#">Dashboard</a> -->
                <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button> -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav flex-column">
                        <li class="first-list">
                        <button class="closebtn nav-toggler hide" id="closebutton" onclick="closeNav()">
                            <i class="fas fa-times"></i>
                        </button>
                        </li>
                        <li class="nav-divider">
                             Menu 
                        </li>
                        
                        <li class="nav-item custom-tooltip">
                        <span class="tooltiptext">Dashboard</span>
                            <a class="nav-link {{request()->routeIs('home')?'active':''}}" href="{{route('home')}}"><i class="fa fa-fw fa-user-circle"></i><h5>Dashboard
                            </h5></a>
                        </li>

                        <li class="nav-item custom-tooltip">
                        <span class="tooltiptext">Profile</span>
                            <a class="nav-link {{request()->routeIs('user.profile')?'active':''}}" href="{{route('user.profile')}}"><i class="fa fa-fw fa-user-circle"></i><h5>Profile</h5></a>
                        </li>
                        @if(Auth::user()->user_type != 1)
                            <li class="nav-item">
                            <span class="tooltiptext">Your Points</span>
                                <a class="nav-link {{request()->routeIs('user.points')?'active':''}}" href="{{route('user.points')}}"><i class="fa fa-fw fa-user-circle"></i><h5>Your Points</h5></a>
                            </li>
                        @endif

                        <!-- Admin Sidebar -->
                        @if(Auth::user()->user_type == 1)
                            <!-- <li class="nav-item">
                                <a class="nav-link {{request()->routeIs('admin.membership')?'active':''}}" href="{{route('admin.membership')}}"><i class="fa fa-fw fa-user-circle"></i>Membership</a>
                            </li> -->

                            <li class="nav-item custom-tooltip">
                            <span class="tooltiptext">Users</span>
                                <a class="nav-link {{request()->routeIs('admin.user*')?'active':''}}" href="{{route('admin.users')}}"><i class="fa fa-fw fa-user-circle"></i><h5>Users</h5></a>
                            </li>
                            <!-- Main Section -->
                            <li class="nav-divider">Main</li>
                            <li class="nav-item custom-tooltip">
                            <span class="tooltiptext">State</span>
                                <a class="nav-link {{request()->routeIs('admin.state*')?'active':''}}" href="{{route('admin.states')}}"><i class="fa fa-fw fa-user-circle"></i><h5>State</h5></a>
                            </li>
                            <li class="nav-item custom-tooltip">
                            <span class="tooltiptext">Companies</span>
                                <a class="nav-link {{request()->routeIs('admin.companie*')?'active':''}}" href="{{route('admin.companies')}}"><i class="fa fa-fw fa-user-circle"></i><h5>Companies</h5></a>
                            </li>
                            <li class="nav-item custom-tooltip">
                            <span class="tooltiptext">Products</span>
                                <a class="nav-link {{request()->routeIs('admin.product*')?'active':''}}" href="{{route('admin.products')}}"><i class="fa fa-fw fa-user-circle"></i><h5>Products</h5></a>
                            </li>
                            
                            <!-- Report Section -->
                            <li class="nav-divider">Report</li>
                            <li class="nav-item custom-tooltip">
                            <span class="tooltiptext">Contact us</span>
                                <a class="nav-link {{request()->routeIs('admin.report.contactus')?'active':''}}" href="{{route('admin.report.contactus')}}"><i class="fa fa-fw fa-user-circle"></i><h5>Contact us</h5></a>
                            </li>
                            <li class="nav-item custom-tooltip">
                            <span class="tooltiptext">RFQs</span>
                                <a class="nav-link {{request()->routeIs('admin.report.rfqs')?'active':''}}" href="{{route('admin.report.rfqs')}}"><i class="fa fa-fw fa-user-circle"></i><h5>RFQs</h5></a>
                            </li>
                            <!-- Crud Operation Section -->
                            <li class="nav-divider">Features</li>
                            <li class="nav-item custom-tooltip">
                            <span class="tooltiptext">Blog Category</span>
                                <a class="nav-link {{request()->routeIs('admin.blogs.category')?'active':''}}" href="{{route('admin.blogs.category')}}"><i class="fa fa-fw fa-user-circle"></i><h5>Blog Category</h5></a>
                            </li>
                            <li class="nav-item custom-tooltip">
                            <span class="tooltiptext">Blogs</span>
                                <a class="nav-link {{request()->routeIs('admin.blogs')?'active':''}}" href="{{route('admin.blogs')}}"><i class="fa fa-fw fa-user-circle"></i><h5>Blogs</h5></a>
                            </li>
                            <li class="nav-item custom-tooltip">
                            <span class="tooltiptext">Testimonial</span>
                                <a class="nav-link {{request()->routeIs('admin.testimonial')?'active':''}}" href="{{route('admin.testimonial')}}"><i class="fa fa-fw fa-user-circle"></i><h5>Testimonial</h5></a>
                            </li>
                            <li class="nav-item custom-tooltip">
                            <span class="tooltiptext">Faq</span>
                                <a class="nav-link {{request()->routeIs('admin.faq')?'active':''}}" href="{{route('admin.faq')}}"><i class="fa fa-fw fa-user-circle"></i><h5>Faq</h5></a>
                            </li>
                            <li class="nav-item custom-tooltip">
                            <span class="tooltiptext">Settings</span>
                                <a class="nav-link" href="javascript:void(0)" data-toggle="collapse" aria-expanded="{{request()->routeIs('admin.setting.*')?'true':'false'}}" data-target="#submenu-6" aria-controls="submenu-6"><i class="fas fa-fw fa-file"></i> <h5>Settings</h5> </a>
                                <div id="submenu-6" class="collapse submenu {{request()->routeIs('admin.setting.*')?'show':''}}">
                                    <ul class="nav flex-column">
                                        <li class="nav-item {{request()->routeIs('admin.setting.points')?'active':''}}">
                                            <a class="nav-link" href="{{route('admin.setting.points')}}">Points</a>
                                        </li>
                                        <li class="                                        <li class="nav-item {{request()->routeIs('supplier.setting.form')?'active':''}}">
nav-item {{request()->routeIs('admin.setting.about_us')?'active':''}}">
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
                            <li class="nav-divider">Reports</li>
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:void(0)" data-toggle="collapse" aria-expanded="{{request()->routeIs('supplier.reports.*')?'true':'false'}}" data-target="#supplierReports-1" aria-controls="supplierReports-1"><i class="fas fa-fw fa-file"></i> Reports </a>
                                <div id="supplierReports-1" class="collapse submenu {{request()->routeIs('supplier.reports.*')?'show':''}}">
                                    <ul class="nav flex-column">
                                        <li class="nav-item {{request()->routeIs('supplier.reports.form.filledbyuser')?'active':''}}">
                                            <a class="nav-link" href="{{route('supplier.reports.form.filledbyuser')}}">User Form Filled</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-divider">Setting</li>
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
                        <!-- Supplier Sidebar End-->
                        <!-- Customer Sidebar -->
                        @elseif(Auth::user()->user_type == 3)
                            <li class="nav-divider">Enquiry</li>
                            <li class="nav-item">
                                <a class="nav-link {{request()->routeIs('customer.enquiry.rfq')?'active':''}}" href="{{route('customer.enquiry.rfq')}}"><i class="fa fa-fw fa-user-circle"></i>Your Enquiry</a>
                            </li>
                        
                        @endif
                    </ul>
                </div>
            </nav>
        </div>
    </div>
@endauth