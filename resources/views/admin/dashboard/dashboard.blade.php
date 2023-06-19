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
</div>
@endsection