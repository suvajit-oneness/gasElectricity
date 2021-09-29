@auth
    <div class="nav-left-sidebar sidebar-dark closestyle" id="sidenav">
        <div class="menu-list">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav flex-column">
                        <li class="first-list">
                            <button class="closebtn nav-toggler hide" id="closebutton" onclick="closeNav()">
                                <i class="fas fa-times"></i>
                            </button>
                        </li>
                        <li class="nav-divider"> Menu </li>
                        <li class="nav-item custom-tooltip">
                        <span class="tooltiptext">Dashboard</span>
                            <a class="nav-link {{request()->routeIs('home')?'active':''}}" href="{{route('home')}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layout"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg>
                                <h5>Dashboard</h5></a>
                        </li>

                        <li class="nav-item custom-tooltip">
                            <span class="tooltiptext">Profile</span>
                            <a class="nav-link {{request()->routeIs('user.profile')?'active':''}}" href="{{route('user.profile')}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                            <h5>Profile</h5></a>
                        </li>
                        @if(Auth::user()->user_type != 1)
                            <!-- <li class="nav-item">
                            <span class="tooltiptext">Your Points</span>
                                <a class="nav-link {{request()->routeIs('user.points')?'active':''}}" href="{{route('user.points')}}">
                                <i class="fa fa-fw fa-user-circle"></i>
                                <h5>Your Points</h5></a>
                            </li> -->
                        @endif

                        <!-- Admin Sidebar -->
                        @if(Auth::user()->user_type == 1)
                            <!-- <li class="nav-item">
                                <a class="nav-link {{request()->routeIs('admin.membership')?'active':''}}" href="{{route('admin.membership')}}"><i class="fa fa-fw fa-user-circle"></i>Membership</a>
                            </li> -->
                            <li class="nav-item custom-tooltip">
                            <span class="tooltiptext">Users</span>
                                <a class="nav-link {{request()->routeIs('admin.user*')?'active':''}}" href="{{route('admin.users')}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                <h5>Users</h5></a>
                            </li>
                            <!-- Main Section -->
                            <li class="nav-divider">Main</li>
                            <li class="nav-item custom-tooltip">
                            <span class="tooltiptext">State</span>
                                <a class="nav-link {{request()->routeIs('admin.state*')?'active':''}}" href="{{route('admin.states')}}"><i class="fa fa-fw fa-user-circle"></i><h5>State</h5></a>
                            </li>
                            <li class="nav-item custom-tooltip">
                            <span class="tooltiptext">Companies</span>
                                <a class="nav-link {{request()->routeIs('admin.companie*')?'active':''}}" href="{{route('admin.companies')}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>
                                <h5>Companies</h5></a>
                            </li>
                            <li class="nav-item custom-tooltip">
                            <span class="tooltiptext">Products</span>
                                <a class="nav-link {{request()->routeIs('admin.product*')?'active':''}}" href="{{route('admin.products')}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>    
                                <h5>Products</h5></a>
                            </li>
                            
                            <!-- Report Section -->
                            <li class="nav-divider">Report</li>
                            <li class="nav-item custom-tooltip">
                            <span class="tooltiptext">Contact us</span>
                                <a class="nav-link {{request()->routeIs('admin.report.contactus')?'active':''}}" href="{{route('admin.report.contactus')}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                                <h5>Contact us</h5></a>
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
                                <a class="nav-link {{request()->routeIs('admin.blogs')?'active':''}}" href="{{route('admin.blogs')}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book-open"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg>    
                                <h5>Blogs</h5></a>
                            </li>
                            <li class="nav-item custom-tooltip">
                            <span class="tooltiptext">Testimonial</span>
                                <a class="nav-link {{request()->routeIs('admin.testimonial')?'active':''}}" href="{{route('admin.testimonial')}}"><i class="fa fa-fw fa-user-circle"></i><h5>Testimonial</h5></a>
                            </li>
                            <li class="nav-item custom-tooltip">
                            <span class="tooltiptext">Faq</span>
                                <a class="nav-link {{request()->routeIs('admin.faq')?'active':''}}" href="{{route('admin.faq')}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-help-circle"><circle cx="12" cy="12" r="10"></circle><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>    
                                <h5>Faq</h5></a>
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
                            <li class="nav-item">
                                <a class="nav-link {{request()->routeIs('user.usage_details')?'active':''}}" href="{{route('user.usage_details')}}"><i class="fa fa-fw fa-user-circle"></i>Home & Usage Details</a>
                            </li>
                            <li class="nav-item">
                                <span class="tooltiptext">Referral</span>
                                <a class="nav-link {{request()->routeIs('user.referral')?'active':''}}" href="{{route('user.referral')}}">
                                <i class="fa fa-fw fa-user-circle"></i>
                                <h5>Referral</h5></a>
                            </li>
                            <!-- {{-- <li class="nav-divider">History</li>
                            <li class="nav-item">
                                <a class="nav-link {{request()->routeIs('customer.enquiry.rfq')?'active':''}}" href="{{route('customer.enquiry.rfq')}}"><i class="fa fa-fw fa-user-circle"></i>History</a>
                            </li> --}} -->
                        @endif
                    </ul>
                </div>
            </nav>
        </div>
    </div>
@endauth