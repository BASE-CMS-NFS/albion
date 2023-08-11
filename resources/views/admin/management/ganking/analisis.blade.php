@extends('template.content')
@section('content')

@push('css')

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!-- TinyMCE -->
    
@endpush

<div class="row">
    <div class="col-sm-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Analisis Pendapatan Anggota Ganking</h4>
          <form class="forms-sample" method="POST" action="{{url('ganking/analisis')}}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
              <label for="start">{{Helper::uc('start date')}}</label>
              <input type="date" class="form-control" id="start" name="start" placeholder="start" required>
            </div>

            <div class="form-group">
              <label for="end">{{Helper::uc('end date')}}</label>
              <input type="date" class="form-control" id="end" name="end" placeholder="end" required>
            </div>

            <div class="form-group mt-20">
                  <button type="submit" class="btn btn-primary mr-2"><i class="mdi mdi-tag-faces"></i>&nbsp;Filter</button>
              </div>
            
          </form>

        </div>
      </div>
    </div>
</div>


@if($tabel == true)
    
<div class="row" style="margin-bottom: 30px">
    <div class="col-sm-12">
      <div class="overflow-auto">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">{{$title}}  Tanggal = {{$start}} - {{$end}}</h4>
          <div class="table-responsive">
            <table class="table table-hover" id="tabel">
              <thead>
                <tr>
                  <th>users</th>
                  <th>loot</th>
                </tr>
              </thead>
              <tbody>
  
                @foreach ($row as $key)
                    <tr>
                            <td>{{$key->name}}</td>
                            <td>{{number_format($key->loot)}}</td>
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
@endif

@endsection