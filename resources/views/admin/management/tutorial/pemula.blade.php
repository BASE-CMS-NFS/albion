@extends('template.content')
@section('content')

<div class="content-wrapper">

    <div class="container">
        <div class="row align-items-center">
  
              @foreach($row as $key)
              <div class="col-sm-12 col-md-6 mb-3">
                          <div class="card-deck">
                              <div class="card">
                                  @php
                                      echo $key->url;
                                  @endphp
                                  <div class="card-body">
                                      <h5 class="card-title">{{$key->judul}}</h5>
                                      <p>@php echo $key->description; @endphp</p>
                                  </div>
                              </div>
                          </div>
              </div>
              @endforeach

              <div class="mt-3">{{ $row->links() }}</div>
  
        </div>

  </div>

</div>

@endsection