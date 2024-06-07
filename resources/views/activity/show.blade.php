@extends('dashboard')
@section('content')
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-title">
                            <h4>Create Activity</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form id="profilePictureForm">
                                    <div class="form-group">
                                        <label>Activity Title</label>
                                        <input type="text" value="" name="acitivity_name" id="acitivity_name"
                                            class="form-control" placeholder="Type activity title">
                                    </div>
                                    <div class="form-group">
                                        <label>Activity Location</label>
                                        <input type="activity_location" name="activity_location" value=""
                                            id="activity_location" type="text" class="form-control"
                                            placeholder="Type activity location">
                                    </div>
                                    <div class="form-group">
                                        <label>Activity Description</label>
                                        <textarea name="activity_description" id="activity_description"
                                            class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Start Date</label>
                                        <input type="date" value="" name="start_date" id="start_date"
                                            class="form-control" placeholder="Type start date">
                                    </div>
                                    <div class="form-group">
                                        <label>End Date</label>
                                        <input type="date" value="" name="end_date" id="end_date" class="form-control"
                                            placeholder="Type end date">
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label>Created By</label>
                                            <select class="form-control" name="created_by" id="created_by">
                                                @foreach($getTeachersInfo as $value)
                                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- <div class="form-group">
                            <label for="formFile" class="form-label">Activity Picture</label>
                            <input class="form-control" type="file" id="formFile" name="profilePicture">
                        </div> -->
                                    <div class="form-group">
                                        <label for="formFile" class="form-label">Profile Picture</label>
                                        <input class="form-control" type="file" id="formFile" name="profilePicture">
                                        <br>
                                        <div id="profilePictureContainer" style="display: none;">
                                            <img id="profilePicturePreview" src="#" alt="Profile Picture"
                                                style="max-width: 200px; max-height: 200px;">
                                            <button id="removeProfilePicture" class="btn btn-sm btn-danger">X</button>
                                        </div>
                                    </div>
                                    <button type="buttons" class="btn btn-default">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
                <!-- /# column -->
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        // When a file is selected
        $('#formFile').change(function () {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    // Show the profile picture container
                    $('#profilePictureContainer').show();
                    // Set the preview image source
                    $('#profilePicturePreview').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        });

        // When the remove button is clicked
        $('#removeProfilePicture').click(function (e) {
            e.preventDefault();
            // Hide the profile picture container
            $('#profilePictureContainer').hide();
            // Clear the file input
            $('#formFile').val('');
        });
        $('#profilePictureForm').submit(function (e) {
            e.preventDefault(); // Prevent the form from submitting normally
            var formData = new FormData(this);
            var acitivity_name = $('#acitivity_name').val();
            var activity_location = $('#activity_location').val();
            var activity_description = $('#activity_description').val();
            var start_date = $('#start_date').val();
            var end_date = $('#end_date').val();
            var created_by = $('#created_by').val();
            formData.append('acitivity_name', acitivity_name);
            formData.append('activity_location', activity_location);
            formData.append('activity_description', activity_description);
            formData.append('start_date', start_date);
            formData.append('end_date', end_date);
            formData.append('created_by', created_by);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: '{{ route("submit.activity") }}',
                data: formData,
                processData: false,
                contentType: false,
                success: function (data) {
                    // Handle success response
                    if (data.status == true) {
                        swal("Success !!", "Activity added successfully !!", "success");
                    }

                },
                error: function (xhr, status, error) {
                    // Handle error response
                    console.error(xhr.responseText);
                }
            });
        });
    });

</script>
@endsection
