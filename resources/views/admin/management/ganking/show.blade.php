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
                        <td>{{number_format($row->loot)}}</td>
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
                        <td>@php echo $row->description @endphp</td>
                    </tr>

                    <tr>
                        <td>created by</td>
                        <td>:</td>
                        <td>{{Helper::nameUser($row->created_by)}}</td>
                    </tr>

                    <tr>
                        <td>updated by</td>
                        <td>:</td>
                        <td>{{Helper::nameUser($row->updated_by)}}</td>
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

    <div class="row" style="margin-bottom: 30px">
        <div class="col-sm-12">
          <div class="overflow-auto">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">{{$title}} Member</h4>
              <div class="table-responsive">
                <table class="table table-hover" id="tabel">
                  <thead>
                    <tr>
                      <th>member</th>
                      <th>time start</th>
                      <th>time end</th>
                      <th>play time</th>
                      <th>claim location</th>
                      <th>presen</th>
                      <th>split amount</th>
                      <th>item split</th>
                      <th>regear</th>
                    </tr>
                  </thead>
                  <tbody>
      
                    @foreach ($gank as $key)
                        <tr>
                          <td>{{$key->users}}</td>
                          <td>{{$key->time_start}}</td>
                          <td>{{$key->time_end}}</td>
                          <td>{{Date::diff($key->time_start,$key->time_end, $key->id)}}</td>
                          <td>{{$key->loot}}</td>
                          <td>{{Date::presentase($key->play_time,$key->ganking_id, $key->id)}} %</td>
                          <td><b>{{Date::split_loot($key->id, $key->ganking_id)}}</b> Silver</td>
                          <td><b>{{Date::split_item($key->id, $key->ganking_id)}}</b> Item</td>
                          <td>{{$key->regear}}</td>
                        </tr>

                    @endforeach
              
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          </div>
        </div>
      
      </div>


@endsection