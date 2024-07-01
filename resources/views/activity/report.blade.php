@extends('dashboard')
@section('content')
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <!-- /# row -->
            <section id="main-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <select class="form-control form-select me-2" id="activitySelect">
                            <option selected>Select an Activity</option>
                            @foreach($fetchActivities as $key => $value)
                                <option value="{{ $value->id }}">{{ $value->activity_name }}</option>
                            @endforeach
                        </select>
                        &nbsp &nbsp
                        <button class="btn btn-primary me-2" id="searchButton">Search</button>
                        &nbsp &nbsp
                        <button class="btn btn-success me-2" id="generatePdfButton">Generate PDF</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover ">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Activity Name</th>
                                    <th>Student Name</th>
                                    <th>Student Id</th>
                                    <th>Student Email</th>
                                    <th>Student Image</th>
                                    <th>Class</th>
                                    <th>Applied Date</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody">
                                @foreach($enrolledUserList as $key => $value)
                                    <tr>
                                        <th scope="row">{{ ++$key }}</th>
                                        <td>{{ $value->activity_details->activity_name ?? '' }}</td>
                                        <td>{{ $value->user_details->name ?? '' }}</td>
                                        <td>{{ $value->user_details->student_id ?? '' }}</td>
                                        <td>{{ $value->user_details->email ?? '' }}</td>
                                        <td><img src="{{ asset('storage/uploads/'.$value->user_details->profile_image) }}" width="50"></td>
                                        <td>{{ $value->user_details->class ?? '' }}</td>
                                        <td>{{ $value->created_at->format('d/m/Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
        </div>
    </div>
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    $('#searchButton').on('click', function() {
        let activityId = $('#activitySelect').val();
        let startDate = $('#startDate').val();
        let endDate = $('#endDate').val();

        $.ajax({
            url: '{{ route('search.activities') }}',
            type: 'GET',
            data: {
                activity_id: activityId,
                start_date: startDate,
                end_date: endDate
            },
            success: function(data) {
                let tableBody = $('#tableBody');
                tableBody.empty();

                data.forEach((value, key) => {
                    let row = `<tr>
                        <th scope="row">${key + 1}</th>
                        <td>${value.activity_details?.activity_name ?? ''}</td>
                        <td>${value.user_details?.name ?? ''}</td>
                        <td>${value.user_details?.student_id ?? ''}</td>
                        <td>${value.user_details?.email ?? ''}</td>
                        <td><img src="{{ asset('storage/uploads') }}/${value.user_details?.profile_image}" width="50"></td>
                        <td>${value.user_details?.class ?? ''}</td>
                        <td>${new Date(value.created_at).toLocaleDateString('en-GB')}</td>
                    </tr>`;
                    tableBody.append(row);
                });
            }
        });
    });

    $('#generatePdfButton').on('click', function() {
        let activityId = $('#activitySelect').val();
        let url = '{{ route('generate.pdf') }}?activity_id=' + activityId;
        window.open(url, '_blank');
    });
});
</script>
