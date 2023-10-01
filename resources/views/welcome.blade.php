@extends('web.content')
@section('content')

      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="pb-6">

        <div class="container">
          <div class="row flex-center">
            <div class="col-lg-6 col-md-5 order-md-1"><img class="img-fluid" src="{{url('web/assets/img/illustrations/1.png')}}" alt="" /></div>
            <div class="col-md-7 col-lg-6 mt-5 text-center text-md-start">
              <h1 class="fw-medium">Share Ganking<br /><span class="fw-bold">HARAKIRI GUILD</span></h1>
              <p class="mt-3 mb-4">ALBION ONLINE GANKING SHARE SYSTEM </p>
              <br>
                <a class="btn btn-lg btn-danger hover-top btn-glow" href="{{url('/member')}}">Member Harakiri</a>
            </div>
          </div>
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->




      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="py-4">

        <div class="container">
          <div class="card py-5 border-0 shadow-sm">
            <div class="card-body">
              <div class="row">
                <div class="col-4">
                  <div class="border-end d-flex justify-content-md-center">
                    <div class="mx-2 mx-md-0 me-md-5">
                      <div class="badge badge-circle bg-soft-danger">
                        <svg class="bi bi-person-fill" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#F53838" viewBox="0 0 16 16">
                          <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"></path>
                        </svg>
                      </div>
                    </div>
                    <div>
                      <p class="fw-bolder text-1000 mb-0">{{Helper::countMember()}} </p>
                      <p class="mb-0">Member</p>
                    </div>
                  </div>
                </div>
                <div class="col-4">
                  <div class="border-end d-flex justify-content-md-center">
                    <div class="mx-2 mx-md-0 me-md-5">
                      <div class="badge badge-circle bg-soft-danger">
                        <svg class="bi bi-geo-alt-fill" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#F53838" viewBox="0 0 16 16">
                          <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"></path>
                        </svg>
                      </div>
                    </div>
                    <div>
                      <p class="fw-bolder text-1000 mb-0">{{number_format(Helper::totalLoot())}}</p>
                      <p class="mb-0">Total Silver </p>
                    </div>
                  </div>
                </div>
                <div class="col-4">
                  <div class="d-flex justify-content-md-center">
                    <div class="mx-2 mx-md-0 me-md-5">
                      <div class="badge badge-circle bg-soft-danger">
                        <svg class="bi bi-hdd-stack-fill" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#F53838" viewBox="0 0 16 16">
                          <path d="M2 9a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-1a2 2 0 0 0-2-2H2zm.5 3a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm2 0a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zM2 2a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2zm.5 3a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm2 0a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1z"></path>
                        </svg>
                      </div>
                    </div>
                    <div>
                      <p class="fw-bolder text-1000 mb-0">{{Helper::totalContent()}}</p>
                      <p class="mb-0">Total Content</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->

      <section class="pt-4 pt-md-6">

          <div class="container">
            <div class="card py-5 border-0 shadow-sm">
              <div class="card-body">
                <div class="row">

                  <iframe width="100%" height="500" src="https://www.youtube.com/embed/kj_ZIbyCqx0?si=eO7Sc856fljgsPTW" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

                </div>
              </div>
          </div>
        </div>
      </section>


      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="pt-4 pt-md-6">

        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-5 col-lg-7 text-lg-center"><img class="img-fluid mb-5 mb-md-0" src="{{url('web/assets/img/illustrations/2.png')}}" alt="" /></div>
            <div class="col-md-7 col-lg-5 text-center text-md-start">
              <h2>JOIN HARAKIRI GUILD</h2>
              <p>syarat dan ketentuan.</p>
              <div class="d-flex">
                <svg class="bi bi-check-circle-fill" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#2FAB73" viewBox="0 0 16 16">
                  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"></path>
                </svg>
                <p class="ms-2">Wajib discord, kita tidak telepati.</p>
              </div>
              <div class="d-flex">
                <svg class="bi bi-check-circle-fill" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#2FAB73" viewBox="0 0 16 16">
                  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"></path>
                </svg>
                <p class="ms-2">Kegiatan di Martlock Portal</p>
              </div>
              <div class="d-flex">
                <svg class="bi bi-check-circle-fill" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#2FAB73" viewBox="0 0 16 16">
                  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"></path>
                </svg>
                <p class="ms-2">Tanpa syarat langsung apply.</p>
              </div>
              <div class="d-flex">
                <svg class="bi bi-check-circle-fill" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#2FAB73" viewBox="0 0 16 16">
                  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"></path>
                </svg>
                <p class="ms-2">Tidak ada mandatory.</p>
              </div>
              <div class="d-flex">
                <svg class="bi bi-check-circle-fill" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#2FAB73" viewBox="0 0 16 16">
                  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"></path>
                </svg>
                <p class="ms-2">TAX GUILD 0%.</p>
              </div>
              <div class="d-flex">
                <svg class="bi bi-check-circle-fill" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#2FAB73" viewBox="0 0 16 16">
                  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"></path>
                </svg>
                <p class="ms-2">Regear 100% untuk content ganking.</p>
              </div>
              <div class="d-flex">
                <svg class="bi bi-check-circle-fill" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#2FAB73" viewBox="0 0 16 16">
                  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"></path>
                </svg>
                <p class="ms-2">Money making yang mudah.</p>
              </div>

              <div class="d-flex">
                <svg class="bi bi-check-circle-fill" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#2FAB73" viewBox="0 0 16 16">
                  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"></path>
                </svg>
                <p class="ms-2"><a href="https://discord.gg/CyUWF3rk5c">https://discord.gg/CyUWF3rk5c 
</a>
                </p>
              </div>
              
            </div>
          </div>
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->


        <section class="pt-4 pt-md-6">

          <div class="container">
            <div class="row align-items-center">

              <div class="text-center">
                <h2>Money Making</h2>
                <p>tutorial money making albion online</p>
              </div>
      
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


        <section class="pt-4 pt-md-6">

          <div class="container">
            <div class="row align-items-center">

              <div class="text-center">
                <h2>Harakiri Guild</h2>
                <p>the most members who get silver from ganking</p>
              </div>
      
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

                  <div class="text-center">
                    <a class="btn btn-lg btn-danger hover-top btn-glow" href="{{url('/member')}}">Show All Member Harakiri</a>
                  </div>
      
            </div>
          </div>
      
      </section>

      @endsection