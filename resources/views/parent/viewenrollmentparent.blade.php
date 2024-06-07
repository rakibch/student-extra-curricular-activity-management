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
                        <input class="form-control input-default" type="text" placeholder="Search...">
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
                                                <th>Created By</th>
                                                <th>Image</th>
                                                <th>Class</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          
                                                <tr>
                                                    <th scope="row"></th>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td><img src=""
                                                            width="50"></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>
                                                        <a href="#!" class="delete-link" data-id=""><i
                                                                class="ti-trash"></i></a>
                                                        <a href="#!" class="ml-1"><i class="ti-pencil-alt"></i></a>
                                                    </td>
                                                </tr>
                                            
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
