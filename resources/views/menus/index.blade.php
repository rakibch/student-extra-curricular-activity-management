@extends('dashboard')
@section('content')
    <div class="content-wrap">
        <div class="row menu-table">
            <!-- /# column -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-title">
                        <h4>Created Menu List</h4>
                    </div>
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Success!</strong> {{ $message }}
                      </div>
                    @endif
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover ">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Menu Name</th>
                                        <th>Icon Name</th>
                                        <th>Route Name</th>
                                        <th>Permission Name</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $key=>$value)
                                    <tr>
                                        <th scope="row">{{$key+1}}</th>
                                        <td>{{$value->name}}</td>
                                        <td>{{$value->icon}}</td>
                                        <td>{{$value->url}}</td>
                                        <td>{{$value->permission_name}}</td>
                                        <td>{{date('Y-m-d H:i:s', strtotime($value->created_at)) }}</td>
                                        <td><button class="btn btn-primary edit-button" data-id="{{$value->id}}">Edit</button></td>
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
        <div id="edit_route_name"></div>
    </div>
    
    <script src="{{asset('back-end/js/lib/jquery.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('.edit-button').click(function() {
                var id = $(this).data('id'); 
                var content_wrap = $
                alert(id);
                var editRoute = '/edit-route-name';  
                $.ajax({    
                    data :{id : id},
                    url: editRoute,
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' // Include the CSRF token for Laravel security
                    },
                    success: function(response) {
                        $(".menu-table").css('display','none'); 
                        $("#edit_route_name").html(response.view)
                        console.log(response)
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        });
    </script>
    
@endsection
