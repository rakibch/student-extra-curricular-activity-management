@extends('dashboard')
@section('content')
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <!-- /# row -->
            <section id="main-content">
                <div class="row">
                    <!-- /# column -->
                    <form id="student-search-form" method="post"
                        action="{{ route('student.id.check') }}">
                        @csrf
                        <div class="col-lg-8">
                            <input id="student-id-input" name="student_id" class="form-control input-default"
                                type="text" placeholder="Search student by ID...">
                        </div>
                        <div class="col-lg-4">
                            <button type="submit" class="btn btn-info m-b-10 m-l-5">Search</button>
                        </div>
                    </form>
                    <div class="col-lg-12">
                        <div id="student-result" class="mt-3" style="display:none;">
                            <div class="card">
                                <div class="card-body">
                                    <button type="button" class="close" aria-label="Close"
                                        onclick="$('#student-result').hide()">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h5 class="card-title" id="student-name"></h5>
                                    <p class="card-text" id="student-id"></p>
                                    <img id="student-image" src="" alt="Student Image" width="100">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                                <h4>Student List</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover ">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Student name</th>
                                                <th>Student ID</th>
                                                <th>Image</th>
                                                <th>Gender</th>
                                                <th>Parent Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($studentList->isEmpty())
                                                <tr>
                                                    <td colspan="6" class="text-center">No data found</td>
                                                </tr>
                                            @else
                                                @foreach($studentList as $key => $value)
                                                    <tr>
                                                        <th scope="row">{{ ++$key }}</th>
                                                        <td>{{ $value->name }}</td>
                                                        <td>{{ $value->student_id }}</td>
                                                        <td><img src="{{ asset('storage/uploads/' . $value->profile_image) }}"
                                                                width="50"></td>
                                                        <td>
                                                            @if($value->gender == 1)
                                                                Male
                                                            @elseif($value->gender == 2)
                                                                Female
                                                            @elseif($value->gender == 3)
                                                                Other
                                                            @endif
                                                        </td>
                                                        <td>
                                                        @if($value['status'] == 1)
                                                            <a href="#!" type="button" class="btn btn-info btn-rounded m-b-10 m-l-5">Applied</a>
                                                        @elseif($value['status'] == 2)
                                                            <a href="#!" type="button" class="btn btn-success btn-rounded m-b-10 m-l-5">Accepted</a>
                                                        @elseif($value['status'] == 3)
                                                            <a href="#!" type="button" class="btn btn-danger btn-rounded m-b-10 m-l-5">Cancelled</a>
                                                        @else
                                                            <a href="#!" type="button" class="btn btn-default btn-rounded m-b-10 m-l-5">Apply as Parent</a>
                                                        @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
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
<script>
    $(document).ready(function () {
        $('#student-search-form').on('submit', function (e) {
            e.preventDefault();

            var studentId = $('#student-id-input').val();
            var url = $(this).attr('action');

            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    student_id: studentId,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    if (response.status === 'success') {
                        $('#student-name').text(response.data.name);
                        $('#student-id').text(response.data.student_id);
                        $('#student-image').attr('src', response.data.profile_image);
                        $('#student-result').show();
                    } else {
                        alert(response.message);
                    }
                },
                error: function (xhr) {
                    alert('An error occurred. Please try again.');
                }
            });
        });
    });

</script>
