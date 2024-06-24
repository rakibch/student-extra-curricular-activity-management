@extends('dashboard')
@section('content')
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <input type="hidden" value="{{ $userId }}" id="userId">
                @foreach($activityList as $key=>$value)
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="stat-widget-two">
                                <div class="stat-content">
                                    <img src="{{ asset('storage/uploads/'.$value['activity_image']) }}"
                                        height="150">
                                    <div class="stat-text pt-2">{{ $value['activity_name'] }}
                                    </div>
                                    <div class="stat-text pt-2">Location:
                                        {{ $value['activity_location'] }}</div>
                                    <div class="stat-digit">
                                        Enrolled Person: {{ $value['userCount'] }}
                                    </div>
                                    <div class="stat-text pt-2">
                                        From({{ date('Y-m-d', strtotime($value['start_date'])) }}-{{ date('Y-m-d', strtotime($value['end_date'])) }})
                                    </div>
                                    <div>
                                        @if($value['status']==1)
                                            <button type="button"
                                                class="btn btn-success btn-rounded m-b-10 m-l-5">Applied</button>
                                                <button class="btn btn-info m-b-10 m-l-5 get-enrolled" data-id="{{ $value['id'] }}" del-status="0">Cancel
                                                Application</button>
                                        @elseif($value['status']==0)
                                            <button class="btn btn-info m-b-10 m-l-5 get-enrolled"
                                                data-id="{{ $value['id'] }}">Apply for 
                                                Enrollment</button>
                                        @elseif($value['status']==2)
                                            <button class="btn btn-info m-b-10 m-l-5 get-enrolled"
                                                data-id="{{ $value['id'] }}">Enrolled
                                            </button>
                                            <button class="btn btn-info m-b-10 m-l-5 get-enrolled" data-id="{{ $value['id'] }}" del-status="0">Cancel
                                                Application</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll(".get-enrolled").forEach(function (link) {
            link.addEventListener("click", function (event) {
                event.preventDefault();
                var activityId = this.getAttribute("data-id");
                var delStatus = this.getAttribute("del-status");
                if (delStatus == 0) {
                    swal({
                        title: "Are you sure to delete Enrollment ?",
                        text: "",
                        type: "success",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes, Cancel Enrollment !!",
                        cancelButtonText: "No, Keep me Enrolled !!",
                        closeOnConfirm: false,
                        closeOnCancel: false,
                    }, function (isConfirmed) {
                        if (isConfirmed) {
                            updateEnrollment(activityId, delStatus);
                        } else {
                            swal("Cancelled", "Your activity is safe!", "error");
                        }
                    })
                } else {
                    var delStatus = 1;
                    var activityId = this.getAttribute("data-id");
                    swal({
                        title: "Are you sure to delete ?",
                        text: "You will not be able to recover this imaginary file !!",
                        type: "success",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes, Get Me Enroll !!",
                        cancelButtonText: "No, cancel it !!",
                        closeOnConfirm: false,
                        closeOnCancel: false,
                    }, function (isConfirmed) {
                        if (isConfirmed) {
                            updateEnrollment(activityId, delStatus);
                        } else {
                            swal("Cancelled", "Your activity is safe!", "error");
                        }
                    })
                }

            });
        });

        function updateEnrollment(activityId, delStatus) {
            var url = "{{ route('enrollment.update') }}";
            var formData = new FormData();
            let userId = $('#userId').val();
            formData.append('id', activityId);
            formData.append('userId', userId);

            if (delStatus == 0) {
              //  alert(delStatus)
                formData.append('status', delStatus);
            } else {
                formData.append('status', 1);
            }

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
                    if (data.status == 200) {
                        swal("Updated !!", "You are successfully enrolled for the activity !!",
                            "success");
                        location.reload();
                        
                    } else {
                        swal("Error", "Failed to update the activity", "error");
                    }
                },
                error: function (error) {
                    console.error('Error:', error);
                    swal("Error", "Failed to update the activity", "error");
                }
            });
        }
    });

</script>
