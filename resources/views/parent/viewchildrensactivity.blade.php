@extends('dashboard')
@section('content')
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <!-- /# row -->
            <section id="main-content">
                <div class="row">
                    <!-- /# column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                                <h4>Childrens Activity</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover ">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Student Name</th>
                                                <th>Student ID</th>
                                                <th>Activity Name</th>
                                                <th>Activity Location</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data as $key=>$value)
                                            <tr>
                                                <th scope="row">{{++$key}}</th>
                                                <td>{{ $value['student_name'] }}</td>
                                                <td>{{ $value['student_id'] }}</td>
                                                <td>{{ $value['activiity_name'] }}</td>
                                                <td>{{ $value['activiity_location']}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer">
                            <!-- <p>2018 © Admin Board. - <a href="#">example.com</a></p> -->
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
