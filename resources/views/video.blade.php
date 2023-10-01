@extends('web.content')
@section('content')

<section class="pt-10">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="text-center">
                    <h3>Member HARAKIRI GUILD</h3>
                </div>
            </div>
        </div>

    </div>

</section>

<section class="pt-4 pt-md-6">

    <div class="container">
      <div class="row align-items-center">

            @foreach($tutorial as $key)
            <div class="col-sm-12 col-md-6 mb-3">
                    <div class="card-deck">
                        <div class="card">
                            @php
                                echo $key->url;
                            @endphp
                            <div class="card-body">
                                <h5 class="card-title">{{$key->judul}}</h5>
                            </div>
                        </div>
                    </div>
            </div>
            @endforeach

            <div class="text-center">
              <a class="btn btn-lg btn-danger hover-top btn-glow" href="{{url('/video')}}">Show All Tutorial</a>
            </div>

      </div>
    </div>

</section>


@endsection