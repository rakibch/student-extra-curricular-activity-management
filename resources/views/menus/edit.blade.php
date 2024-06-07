<div class="content-wrap">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-title">
                <h4>Menu Add</h4>
            </div>
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Success!</strong> {{ $message }}
              </div>
            @endif
            <div class="card-body">
                <div class="horizontal-form">
                    <form class="form-horizontal" method="post" action="{{ route('update.routeName') }}">
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-2 control-label">URL Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="url" value="{{$data->url}}" placeholder="">
                                <input type="hidden" class="form-control" name="id" value="{{$data->id}}">
                            </div>
                        </div>
                        {{-- <div class="form-group">
                            <label class="col-sm-2 control-label">Icon</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="icon"
                                    placeholder="Icon name...(ex: ti-target)">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Url</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="url"
                                    placeholder="Menu Name" readonly value="defaultmenu">
                            </div>
                        </div> --}}
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>