<!-- /# sidebar start -->
<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
    <div class="nano">
        <div class="nano-content">
            <ul>
                <div class="logo"><a href="#!">
                        <!-- <img src="images/logo.png" alt="" /> --><span>Dashboard</span></a></div>
                <li class="label">Menus</li>
                @can('user-profile')
                <li><a class="sidebar-sub-toggle"><i class="ti-target"></i>User Profile<span
                            class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <!-- <li><a href="page-login.html">Login</a></li> -->
                        <li><a href="{{route('update.userProfile')}}"><i class="ti-file"></i>Update Profile</a></li>
                        <li><a href="{{route('user.profileview')}}"><i class="ti-file"></i>View Profile</a></li>
                    </ul>
                </li>
                @endcan
                {{-- USER MANAGEMENT--}}
                @can('user-management')
                <li><a class="sidebar-sub-toggle"><i class="ti-target"></i>User Management<span
                            class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="{{route('users.index')}}"><i class="ti-file"></i>User List</a></li>
                        <li><a href="{{route('permissions.index')}}"><i class="ti-file"></i>Permission List</a></li>
                        <li><a href="{{route('roles.index')}}"><i class="ti-file"></i>Role List</a></li>
                    </ul>
                </li>
                @endcan
                {{-- Activity Enrollment by User --}}
                @can('activity-enrollment')
                <li><a class="sidebar-sub-toggle"><i class="ti-target"></i>Activity Enrollment<span
                            class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="{{route('enroll.activity')}}"><i class="ti-file"></i>Enroll in Activity</a></li>
                        <li><a href="{{route('create.activity')}}"><i class="ti-file"></i>Create Activity</a></li>
                        <li><a href="{{route('activity.list')}}"><i class="ti-file"></i>Activity List</a></li>
                        @can('enrollment-application-approve')
                        <li><a href="{{route('enrollment.application.approve')}}"><i class="ti-file"></i>Enrollment Application Approve</a></li>
                        @endcan
                        <li><a href="{{route('activity.list')}}"><i class="ti-file"></i>Parent Request</a></li>
                        <!-- <li><a href="{{route('permissions.index')}}"><i class="ti-file"></i>User Engagement Report</a></li> -->
                    </ul>
                </li>
                @endcan
                {{--  Extra Curricular Activities --}}
                @can('extra-curricular-acitivities')
                <li><a class="sidebar-sub-toggle"><i class="ti-target"></i>Extra Curricular Activities<span
                            class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="{{route('users.index')}}"><i class="ti-file"></i>Add an Activity</a></li>
                        <li><a href="{{route('users.index')}}"><i class="ti-file"></i>List of Activities</a></li>
                        <!-- <li><a href="{{route('permissions.index')}}"><i class="ti-file"></i>User Engagement Report</a></li> -->
                    </ul>
                </li>
                @endcan
                {{-- Notification --}}
                @can('notification')
                <li><a class="sidebar-sub-toggle"><i class="ti-target"></i>Notification<span
                            class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="{{route('users.index')}}"><i class="ti-file"></i>Recent Notification</a></li>
                        <!-- <li><a href="{{route('permissions.index')}}"><i class="ti-file"></i>User Engagement Report</a></li> -->
                    </ul>
                </li>
                @endcan
                {{-- Report --}}
                @can('reports')
                <li><a class="sidebar-sub-toggle"><i class="ti-target"></i>Reports<span
                            class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="{{route('users.index')}}"><i class="ti-file"></i>Extra-curricular Activity Report</a></li>
                        <li><a href="{{route('permissions.index')}}"><i class="ti-file"></i>User Engagement Report</a></li>
                    </ul>
                </li>
                @endcan
                {{-- System User Activities --}}
                @can('system-user-activities')
                <li><a class="sidebar-sub-toggle"><i class="ti-target"></i>System activites<span
                            class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="{{route('users.index')}}"><i class="ti-file"></i>List of  Activities</a></li>
                    </ul>
                </li>
                @endcan
                <li><a class="sidebar-sub-toggle"><i class="ti-target"></i>Parent <span
                            class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="{{route('enrollment.parent')}}"><i class="ti-file"></i>Enroll as Parent for Kids</a></li>
                        <li><a href="{{route('users.index')}}"><i class="ti-file"></i>View Children Activity</a></li>
                    </ul>
                </li>
                <!-- <li><a class="sidebar-sub-toggle"><i class="ti-target"></i><span
                            class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="{{route('users.index')}}"><i class="ti-file"></i>List of  Activities</a></li>
                    </ul>
                </li> -->
                <!-- <li><a href="{{route('user.profileview')}}"><i class="ti-file"></i>Profile View</a></li>
                <li><a href="#!"><i class="ti-arrow-right"></i>Profile Edit</a></li> -->
                <!-- @can('create-menu')
                <li><a href="{{route('menus.create')}}"><i class="ti-file"></i> Create Menu</a></li>
                @endcan -->
                <!-- <?php
                    use App\Models\Sidebarmenu;
                    $data = Sidebarmenu::all();
                ?> -->
                <!-- @foreach($data as $key=>$value)
                    @can($value->permission_name)
                    <li><a href="{{route($value->url)}}"><i class="ti-file"></i> {{$value->name}}</a></li>
                    @endcan
                @endforeach -->
                {{-- <li><a><i class="ti-close"></i> Logout</a></li> --}}
            </ul>
        </div>
    </div>
</div>
<!-- /# sidebar end -->
