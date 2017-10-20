@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-sm-12" id="monthlylist">
       <div class="panel panel-default" id="filter">
            <div class="panel-heading">
                Import Users
            </div>
            <div class="panel-body">
              <form action="{{ url('importusers')}}" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="form-group col-sm-6">
                      <input type="file" name="file" class="form-control">
                  </div>
                  <div class="form-group col-sm-6">
                      <button type="submit" class="btn btn-default">
                          Import
                      </button>
                  </div>

              </form>
            </div>
       </div>
    </div>
</div>
@endsection
