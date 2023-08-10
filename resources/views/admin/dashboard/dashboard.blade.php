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
                    <p class="statistics-title">Total Silver Ganking</p>
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

</div>
@endsection