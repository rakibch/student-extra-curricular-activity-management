@extends('dashboard')
@section('content')
<div class="content-wrap">
    <div class="main">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
              <div class="page-title">
                <h1>Hello,
                  <span>Welcome Here</span>
                </h1>
              </div>
            </div>
          </div>
          <!-- /# column -->
          <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
              <div class="page-title">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                  </li>
                  <li class="breadcrumb-item active">User Profile</li>
                </ol>
              </div>
            </div>
          </div>
          <!-- /# column -->
        </div>
        <!-- /# row -->
        <section id="main-content">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <div class="user-profile">
                    <div class="row">
                      <div class="col-lg-4">
                        <div class="user-photo m-b-30 d-flex justify-content-center align-items-center">
                        @if($getProfileInfo && $getProfileInfo->profile_image)
                            <img class="img-fluid" src="{{ asset('storage/uploads/'.$getProfileInfo->profile_image) }}" alt="" />
                        @else
                            <img class="img-fluid" src="{{ asset('storage/uploads/default-profile.png') }}" alt="Default Profile Image" />
                        @endif
                        </div>
                        <div class="user-work">
                          <h4></h4>
                        </div>
                      </div>
                      <div class="col-lg-8">
                        <div class="user-profile-name">{{$getProfileInfo->name ?? ''}}</div>
                        <br>
                        <div class="user-Location pl-1">{{$getProfileInfo->student_id ?? ''}}</div>
                        <div class="user-send-message">
                          <button class="btn btn-primary btn-addon" type="button">
                            <i class="ti-email"></i>Send Message</button>
                        </div>
                        <div class="custom-tab user-profile-tab">
                          <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                              <a href="#1" aria-controls="1" role="tab" data-toggle="tab">About</a>
                            </li>
                          </ul>
                          <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="1">
                              <div class="contact-information">
                                <h4>Contact information</h4>
                                <div class="phone-content">
                                  <span class="contact-title">Phone:</span>
                                  <span class="phone-number">{{$getProfileInfo->phone ?? ''}}</span>
                                </div>
                                <div class="address-content">
                                  <span class="contact-title">Address:</span>
                                  <span class="mail-address">{{$getProfileInfo->street_address ?? ''}},{{$getProfileInfo->city ?? ''}},{{$getProfileInfo->state ?? ''}},{{$getProfileInfo->country ?? ''}}</span>
                                </div>
                                <div class="email-content">
                                  <span class="contact-title">Email:</span>
                                  <span class="contact-email">{{$getProfileInfo->email ?? ''}}</span>
                                </div>
                                <div class="skype-content">
                                  <span class="contact-title">Skype:</span>
                                  <span class="contact-skype">{{$getProfileInfo->skype_id ?? ''}}</span>
                                </div>
                              </div>
                              <div class="basic-information">
                                <h4>Basic information</h4>
                                <div class="birthday-content">
                                  <span class="contact-title">Birthday:</span>
                                  <span class="birth-date">{{ date('jS F Y', strtotime($getProfileInfo->date_of_birth ?? '')) }} </span>
                                </div>
                                <div class="gender-content">
                                  <span class="contact-title">Gender:</span>
                                  <span class="gender">
                                  <?php
                                    if(isset($getProfileInfo->gender))
                                    {
                                      if($getProfileInfo->gender == 1)
                                      echo "Male";
                                      elseif($getProfileInfo->gender == 0)
                                      echo "Female";
                                    }
                                    else{
                                      echo "";
                                    }
                                  ?>
                                  </span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /# row -->
          <div class="row">
            <div class="col-lg-12">
              <div class="footer">
                <!-- <p>2018 © Admin Board. -
                  <a href="#">example.com</a>
                </p> -->
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
@endsection