@extends('template.content')
@section('content')

<div class="content-wrapper">
  <div class="row">
    <div class="col-sm-12">
      <div class="text-center">
          <h1>Welcome to albion</h1>
      </div>
      <div class="home-tab">
        <div class="tab-content tab-content-basic">
          <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview"> 
            <div class="row">
              <div class="col-sm-12">
                <div class="statistics-details d-flex align-items-center justify-content-between">
                  <div>
                    <p class="statistics-title">Member</p>
                    <h3 class="rate-percentage">{{Helper::countMember()}}</h3>
                  </div>
                  <div class="d-none d-md-block">
                    <p class="statistics-title">Total Silver</p>
                    <h3 class="rate-percentage">{{number_format(Helper::totalLoot())}}</h3>
                  </div>
                  <div>
                    <p class="statistics-title">Total Content</p>
                    <h3 class="rate-percentage">{{Helper::totalContent()}}</h3>
                  </div>
                </div>
              </div>
            </div> 
          </div>
        </div>
      </div>
    </div>
  </div>
  

  {{-- <div class="row">
    @foreach($row as $key)
      <div class="col-sm-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">{{$title}}</h4>
            
            <div class="btn btn-primary">
                <p>
                  QTY LOOT : {{$key->qty}}
                </p>
            </div>
  
            <div class="btn btn-primary">
              <p>
                  ESTIMASI SILVER : {{number_format($key->loot)}}
              </p>
          </div>
  
            <div class="table-responsive">
              <table class="table table-borderless">
                  <tr>
                      <td>name</td>
                      <td>=</td>
                      <td><b>{{$key->name}}</b></td>
                  </tr>
                  <tr>
                      <td>date</td>
                      <td>=</td>
                      <td><b>{{$key->date}}</b></td>
                  </tr>
                  <tr>
                      <td>status</td>
                      <td>=</td>
                      <td><b>{{$key->status}}</b></td>
                  </tr>
                  <tr>
                      <td>description</td>
                      <td>=</td>
                      <td><b>@php echo $key->description @endphp</b></td>
                  </tr>
  
                  <tr>
                      <td>dibuat oleh</td>
                      <td>=</td>
                      <td><b>{{Helper::nameUser($key->created_by)}}</b></td>
                  </tr>
  
                  <tr>
                      <td>diupdate oleh</td>
                      <td>=</td>
                      <td><b>{{Helper::nameUser($key->updated_by)}}</b></td>
                  </tr>
              
              </table>
  
            </div>
  
              <hr>
              <div class="row mt-20">
                <div class="col-sm-12">
                  <a href="{{url('ganking/show/'.$key->id)}}" class="btn btn-sm btn-primary">detail</a>
                  @if(Session::get('id') == $key->created_by or Session::get('cms_role_id') == 1)
                    <a href="{{url('ganking/edit/'.$key->id)}}" class="btn btn-sm btn-warning">edit</a>
                    <a href="javascript:void(0)" onclick="hapus('{{url('ganking/destroy/'.$key->id)}}')" class="btn btn-sm btn-danger">delete</a>
                    <a href="{{url('ganking_detail/'.$key->id)}}" class="btn btn-sm btn-success">Tambahkan Member</a>
                  @endif
                </div>
              </div>
  
          </div>
        </div>
      </div>
    @endforeach
  </div>
  
  <div class="row">
    <div class="col-sm-12">
      {{ $row->links('vendor.pagination.simple-bootstrap-4') }}
    </div>
  </div> --}}


</div>
@endsection