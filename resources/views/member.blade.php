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

            @foreach($users as $key)
            <div class="col-sm-12 col-md-3 mb-3">
                @php
                    $user = Helper::userGanking($key->id);
                @endphp
                        <div class="card-deck">
                            <div class="card">
                                <img class="card-img-top" src="{{$user['image']}}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">{{$key->name}}</h5>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Silver All : {{number_format($user['loot_all'])}}</li>
                                        <li class="list-group-item">Silver Week : {{number_format($user['loot_week'])}}</li>
                                        <li class="list-group-item">Play All : {{$user['time_all']}}</li>
                                        <li class="list-group-item">Play Week : {{$user['time_week']}}</li>
                                      </ul>
                                </div>
                            </div>
                        </div>
            </div>
            @endforeach

      </div>
    </div>

</section>

@endsection