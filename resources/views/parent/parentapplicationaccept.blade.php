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
                                <h4>Appication as Parent List</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    @if(session('success'))
                                        <div class="alert alert-success alert-dismissible fade show">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <strong>Success! </strong>{{ session('success') }}
                                        </div>
                                    @endif
                                    @if(session('deleleteApplicationMsg'))
                                    <div class="alert alert-info alert-dismissible fade show">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <strong>Success! </strong>{{ session('deleleteApplicationMsg') }}
                                        </div>
                                    @endif
                                    <table class="table table-hover ">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Parent Name</th>
                                                <th>Student Name</th>
                                                <th>Student ID</th>
                                                <th>Class</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data as $key=>$value)
                                            <tr>
                                                <th scope="row">{{++$key}}</th>
                                                <td>{{ $value['parent_name'] }}</td>
                                                <td>{{ $value['children_name'] }}</td>
                                                <td>{{ $value['student_id'] }}</td>
                                                <td>{{ $value['class']}}</td>
                                                <td>
                                                    @if($value['status'] == 1)
                                                        <a href="{{ route('accept.approve.by.admin', ['id' => $value['user_profile_id']]) }}" class="btn btn-info btn-sm m-b-10 m-l-5">Make Approve</a>
                                                        <a href="{{ route('remove.apply.as.parent', ['id' => $value['user_profile_id']]) }}" class="btn btn-danger btn-sm m-b-10 m-l-5">Reject Application</a>
                                                    @elseif($value['status'] == 3)
                                                        <button class="btn btn-success btn-sm m-b-10 m-l-5">Approved</button>
                                                        <a href="{{ route('remove.apply.as.parent', ['id' => $value['user_profile_id']]) }}" class="btn btn-danger btn-sm m-b-10 m-l-5">Reject Application</a>
                                                   @endif
                                                </td>
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
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll(".delete-link").forEach(function (link) {
            link.addEventListener("click", function (event) {
                event.preventDefault();
                var activityId = this.getAttribute("data-id");
                swal({
                    title: "Are you sure to delete ?",
                    text: "You will not be able to recover this imaginary file !!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it !!",
                    cancelButtonText: "No, cancel it !!",
                    closeOnConfirm: false,
                    closeOnCancel: false,
                }, function (isConfirmed) {
                    if (isConfirmed) {
                        // Send AJAX request to delete the activity
                        deleteActivity(activityId);
                    } else {
                        swal("Cancelled", "Your activity is safe!", "error");
                    }
                })
            });
        });

        function deleteActivity(activityId) {
            var url = "{{ route('activity.delete') }}";
            var formData = new FormData();
            formData.append('id', activityId);

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-Token': "{{ csrf_token() }}",
                },
                success: function (data) {
                    if (data.success) {
                        swal("Deleted !!", "Your selected activity has been deleted !!",
                            "success");
                        // Reload the page or update the UI as needed
                        location.reload()
                    } else {
                        swal("Error", "Failed to delete the activity", "error");
                    }
                },
                error: function (error) {
                    console.error('Error:', error);
                    swal("Error", "Failed to delete the activity", "error");
                }
            });
        }
    });

</script>
