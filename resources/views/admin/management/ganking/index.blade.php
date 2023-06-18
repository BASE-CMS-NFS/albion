@extends('template.content')
@section('content')

@push('css')
    
@endpush


<div class="mb-3">
  <nav class="navbar navbar-example navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid" style="justify-content: start">
        <a class="btn btn-primary btn-sm" href="{{url('ganking/create')}}"><i class='bx bx-plus'></i>&nbsp;tambah data</a>
        </div>
    </nav>
  </div>


{{-- <div class="row" style="margin-bottom: 30px">
  <div class="col-sm-12">
    <div class="overflow-auto">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">{{$title}}</h4>
        <div class="table-responsive">
          <table class="table table-hover" id="tabel">
            <thead>
              <tr>
                <th>name</th>
                <th>date</th>
                <th>loot</th>
                <th>qty</th>
                <th>status</th>
                <th>description</th>
                <th>created by</th>
                <th>updated by</th>
                <th>action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($row as $key)
              <tr>
                <td>{{$key->name}}</td>
                <td>{{$key->date}}</td>
                <td>{{$key->loot}}</td>
                <td>{{$key->qty}}</td>
                <td>{{$key->status}}</td>
                <td>@php echo $key->description @endphp</td>
                <td>{{Helper::nameUser($key->created_by)}}</td>
                <td>{{Helper::nameUser($key->updated_by)}}</td>
                <td>
                  <a href="{{url('ganking/show/'.$key->id)}}" class="btn btn-sm btn-primary">detail</a>
                  <a href="{{url('ganking/edit/'.$key->id)}}" class="btn btn-sm btn-warning">edit</a>
                  <a href="javascript:void(0)" onclick="hapus('{{url('ganking/destroy/'.$key->id)}}')" class="btn btn-sm btn-danger">delete</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    </div>
  </div>

</div> --}}

<div class="row">
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
                @if(Session::get('id') == $key->created_by or Sessio::get('cms_role_id') == 1)
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
</div>


@push('js')
<script>
    $(document).ready( function () {
      $('#tabel').DataTable({
        "pageLength": 25,
           searching: true,
           ordering:  true,
           paging: true,   
           "order": [[1, 'desc']],
           "columnDefs": [
              { "type": "date", "targets": [1] }//date column formatted like "03/23/2018 10:25:13 AM".
            ],     
      });
  });
  </script>
@endpush

@endsection