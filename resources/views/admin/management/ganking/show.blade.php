@extends('template.content')
@section('content')

    <div class="row">
        <div class="col-sm-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">{{$title}}</h4>
              
              <div class="table-responsive">
                <table class="table table-borderless">
                    <tr>
                        <td>name</td>
                        <td>:</td>
                        <td>{{$row->name}}</td>
                    </tr>
                    <tr>
                        <td>date</td>
                        <td>:</td>
                        <td>{{$row->date}}</td>
                    </tr>
                    <tr>
                        <td>loot</td>
                        <td>:</td>
                        <td>{{$row->loot}}</td>
                    </tr>
                    <tr>
                        <td>qty</td>
                        <td>:</td>
                        <td>{{$row->qty}}</td>
                    </tr>
                    <tr>
                        <td>status</td>
                        <td>:</td>
                        <td>{{$row->status}}</td>
                    </tr>
                    <tr>
                        <td>description</td>
                        <td>:</td>
                        <td>{{$row->description}}</td>
                    </tr>

                    <tr>
                        <td>created_by</td>
                        <td>:</td>
                        <td>{{$row->created_by}}</td>
                    </tr>

                    <tr>
                        <td>updated_by</td>
                        <td>:</td>
                        <td>{{$row->created_by}}</td>
                    </tr>
                 
                </table>

              </div>

                <hr>
                <div class="row mt-20">
                  <div class="col-sm-12">
                      <a class="btn btn-success" href="{{url('ganking')}}">Back</a>
                  </div>
                </div>

            </div>
          </div>
        </div>
    </div>


@endsection