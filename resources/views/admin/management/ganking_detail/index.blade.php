@extends('template.content')
@section('content')

@push('css')
    
@endpush


<div class="mb-3">
  <nav class="navbar navbar-example navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid" style="justify-content: start">
        <a class="btn btn-success btn-sm" href="{{url('ganking_detail/create')}}"><i class='bx bx-plus'></i>&nbsp;tambah data</a>
        </div>
    </nav>
  </div>

  <div class="row">
      <div class="col-sm-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            
            <div class="btn btn-primary">
                <p>
                  QTY LOOT : {{$ganking->qty}}
                </p>
            </div>
  
            <div class="btn btn-primary">
              <p>
                  ESTIMASI SILVER : {{number_format($ganking->loot)}}
              </p>
          </div>

          <div class="btn btn-primary">
            <p>
                TANGGAL GANKING : {{$ganking->date}}
            </p>
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
        <h4 class="card-title">{{$title}}</h4>
        <div class="table-responsive">
          <table class="table table-hover" id="tabel">
            <thead>
              <tr>
                <th>name</th>
                <th>file</th>
                <th>link</th>
                <th>type</th>
                <th>master</th>
                <th>status</th>
                <th>action</th>
              </tr>
            </thead>
            <tbody>
        
            </tbody>
          </table>
        </div>
      </div>
    </div>
    </div>
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