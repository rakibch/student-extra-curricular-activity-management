@extends('dashboard')
@section('content')
<div class="content-wrap">
    <div class="main">
      <div class="container-fluid">
      <div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-title">
                <h4>Update Profile</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form id="profilePictureForm">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" value="{{$getProfileDetails->name ?? ''}}" name="name" id="name" class="form-control" placeholder="Type your name">
                        </div>
                        <div class="form-group">
                            <label>Teacher ID</label>
                            <input name="teacher_id" value="{{$getProfileDetails->teacher_id ?? ''}}" id="teacher_id" type="text" class="form-control" placeholder="Type your teacher id">
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" value="{{$getProfileDetails->phone ?? ''}}" name="phone" id="phone" class="form-control" placeholder="Type your phone">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" value="{{$getProfileDetails->email ?? ''}}" name="email" id="email" class="form-control" placeholder="Type your phone">
                        </div>
                        <div class="form-group">
                            <label>Skype Id</label>
                            <input type="text" value="{{$getProfileDetails->skype_id ?? ''}}" name="skypeId" id="skypeId" class="form-control" placeholder="Type your skype">
                        </div>
                        <div class="form-group">
                            <label>Date of Birth</label>
                            <input type="date" value="{{$getProfileDetails->date_of_birth ?? ''}}" name="dateOfBirth" id="date_of_birth" class="form-control" placeholder="Select">
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                    <label>Gender</label>
                                    <select class="form-control" name="gender" id="gender">
                                        <option value="1" @if($getProfileDetails && $getProfileDetails->gender == 1) selected @endif>Male</option>
                                        <option value="2" @if($getProfileDetails && $getProfileDetails->gender == 2) selected @endif>Female</option>
                                    </select>
                                </div>
                        </div>
                        <div class="form-group">
                            <label>Street Address</label>
                            <input type="text" value="{{$getProfileDetails->street_address ?? ''}}" name="street_address" id="street_address" class="form-control" placeholder="Type your city">
                        </div>
                        <div class="form-group">
                            <label>City</label>
                            <input type="text" name="city" id="city" value="{{$getProfileDetails->city ?? ''}}" class="form-control" placeholder="Type your city">
                        </div>

                        <div class="form-group">
                            <label>State</label>
                            <input type="text" name="state" id="state" value="{{$getProfileDetails->state ?? ''}}" class="form-control" placeholder="Type your state">
                        </div>

                        <div class="form-group">
                            <label>Country</label>
                            <input type="text" name="country" id="country" value="{{$getProfileDetails->city ?? ''}}"  class="form-control" placeholder="Type your state">
                        </div>
                        
                        <div class="form-group">
                            <label for="formFile" class="form-label">Profile Picture</label>
                            <input class="form-control" type="file" id="formFile" name="profilePicture">
                        </div>
                        <button type="buttons" class="btn btn-default">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /# column -->
    <!-- <div class="col-lg-6">
        <div class="card">
            <div class="card-title">
                <h4>Horizontal Form</h4>

            </div>
            <div class="card-body">
                <div class="horizontal-form">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> Remember me
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default">Sign in</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> -->
    <!-- /# column -->
</div>
      </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#profilePictureForm').submit(function (e) {
            e.preventDefault(); // Prevent the form from submitting normally
        
            var formData = new FormData(this);
            var name = $('#name').val();
            var teacher_id = $('#teacher_id').val();
            var phone = $('#phone').val();
            var email = $('#email').val();
            var skype_id = $('#skypeId').val();
            var date_of_birth = $('#date_of_birth').val();
            var gender = $('#gender').val();
            var city = $('#city').val();
            var state = $('#state').val();
            var country = $('#country').val();
            var street_address = $('#street_address').val();

            formData.append('name', name);
            formData.append('teacher_id', teacher_id);
            formData.append('phone', phone);
            formData.append('email', email);
            formData.append('skypeId', skype_id);
            formData.append('dateOfBirth', date_of_birth);
            formData.append('gender', gender);
            formData.append('city', city);
            formData.append('state', state);
            formData.append('country', country);
            formData.append('street_address', street_address);
        
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: '{{ route("upsert.userProfile") }}',
                data: formData,
                processData: false,
                contentType: false,
                success: function (data) {
                    // Handle success response
                    if(data.status==true)
                    {
                        swal("Success !!", "Data updated successfully !!", "success");
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
