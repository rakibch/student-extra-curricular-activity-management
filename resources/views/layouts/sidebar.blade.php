<!-- /# sidebar start -->
<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
    <div class="nano">
        <div class="nano-content">
            <ul>
                <div class="logo"><a href="#!">
                        <!-- <img src="images/logo.png" alt="" /> --><span>Dashboard</span></a></div>
                <li class="label">Menus</li>
                
                <li><a class="sidebar-sub-toggle"><i class="ti-angle-right"></i>User Profile<span
                            class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="{{route('update.userProfile')}}"><i class="ti-arrow-right"></i>Update Profile</a></li>
                        <li><a href="{{route('user.profileview')}}"><i class="ti-arrow-right"></i>View Profile</a></li>
                    </ul>
                </li>
               
                {{-- USER MANAGEMENT--}}
                @can('user-management')
                <li><a class="sidebar-sub-toggle"><i class="ti-angle-right"></i>User Management<span
                            class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="{{route('users.index')}}"><i class="ti-arrow-right"></i>User List</a></li>
                        <li><a href="{{route('permissions.index')}}"><i class="ti-arrow-right"></i>Permission List</a></li>
                        <li><a href="{{route('roles.index')}}"><i class="ti-arrow-right"></i>Role List</a></li>
                    </ul>
                </li>
                @endcan
                {{-- Activity Enrollment by User --}}
                @can('activity-enrollment')
                <li><a class="sidebar-sub-toggle"><i class="ti-angle-right"></i>Activity Enrollment<span
                            class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="{{route('enroll.activity')}}"><i class="ti-arrow-right"></i>Enroll in Activity</a></li>
                        @can('enrollment-application-approve')
                        <li><a href="{{route('enrollment.application.approve')}}"><i class="ti-arrow-right"></i>Enrollment Application Approve</a></li>
                        @endcan
                        <!-- <li><a href="{{route('permissions.index')}}"><i class="ti-arrow-right"></i>User Engagement Report</a></li> -->
                    </ul>
                </li>
                @endcan
                {{--  Extra Curricular Activities --}}
                @can('extra-curricular-acitivities')
                <li><a class="sidebar-sub-toggle"><i class="ti-angle-right"></i>Extra Curricular Activities<span
                            class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="{{route('create.activity')}}"><i class="ti-arrow-right"></i>Create Activity</a></li>
                        <li><a href="{{route('activity.list')}}"><i class="ti-arrow-right"></i>Activity List</a></li>
                        <!-- <li><a href="{{route('permissions.index')}}"><i class="ti-arrow-right"></i>User Engagement Report</a></li> -->
                    </ul>
                </li>
                @endcan
        
                {{-- Report --}}
                @can('reports')
                <li><a class="sidebar-sub-toggle"><i class="ti-angle-right"></i>Report<span
                            class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="{{route('view.activities.report')}}"><i class="ti-arrow-right"></i>Extra-curricular Activity Report</a></li>
                    </ul>
                </li>
                @endcan
                {{-- System User Activities --}}
                <li><a class="sidebar-sub-toggle"><i class="ti-angle-right"></i>Parent <span
                            class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        @can('enroll-as-parent-for-kids')
                        <li><a href="{{route('enrollment.parent')}}"><i class="ti-arrow-right"></i>Enroll as Parent for Kids</a></li>
                        @endcan
                        @can('view-children-activity')
                        <li><a href="{{route('view.children.activity')}}"><i class="ti-arrow-right"></i>View Children Activity</a></li>
                        @endcan
                        @can('view-parent-application-list')
                        <li><a href="{{route('view.parent.application')}}"><i class="ti-arrow-right"></i>View Parent Application List</a></li>          
                        @endcan
                    </ul>
                </li>
                <!-- <li><a class="sidebar-sub-toggle"><i class="ti-angle-right"></i><span
                            class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="{{route('users.index')}}"><i class="ti-arrow-right"></i>List of  Activities</a></li>
                    </ul>
                </li> -->
                <!-- <li><a href="{{route('user.profileview')}}"><i class="ti-arrow-right"></i>Profile View</a></li>
                <li><a href="#!"><i class="ti-arrow-right"></i>Profile Edit</a></li> -->
                <!-- @can('create-menu')
                <li><a href="{{route('menus.create')}}"><i class="ti-arrow-right"></i> Create Menu</a></li>
                @endcan -->
                <!-- <?php
                    use App\Models\Sidebarmenu;
                    $data = Sidebarmenu::all();
                ?> -->
                <!-- @foreach($data as $key=>$value)
                    @can($value->permission_name)
                    <li><a href="{{route($value->url)}}"><i class="ti-arrow-right"></i> {{$value->name}}</a></li>
                    @endcan
                @endforeach -->
                {{-- <li><a><i class="ti-close"></i> Logout</a></li> --}}
            </ul>
        </div>
    </div>
</div>
<!-- /# sidebar end -->
