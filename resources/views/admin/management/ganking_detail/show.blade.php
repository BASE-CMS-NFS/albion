@extends('template.content')
@section('content')

    <div class="row">
        <div class="col-sm-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">{{$title}}</h4>
              
              <div class="table-responsive">
                <table class="table table-borderless">
                    <tr>
                        <td>name</td>
                        <td>:</td>
                        <td>{{$row->name}}</td>
                    </tr>
                    <tr>
                        <td>slug</td>
                        <td>:</td>
                        <td>{{$row->slug}}</td>
                    </tr>
                    <tr>
                        <td>status</td>
                        <td>:</td>
                        <td>{{$row->status}}</td>
                    </tr>
                    <tr>
                        <td>type</td>
                        <td>:</td>
                        <td>{{$row->type}}</td>
                    </tr>
                    <tr>
                        <td>master</td>
                        <td>:</td>
                        <td>{{$row->master}}</td>
                    </tr>
                    <tr>
                        <td>price</td>
                        <td>:</td>
                        <td>{{$row->price}}</td>
                    </tr>
                    <tr>
                        <td>link</td>
                        <td>:</td>
                        <td><a href="{{$row->link}}">{{$row->link}}</a></td>
                    </tr>
                    <tr>
                        <td>link download</td>
                        <td>:</td>
                        <td><a href="{{$row->link_download}}">{{$row->link_download}}</a></td>
                    </tr>
                    <tr>
                        <td>link video</td>
                        <td>:</td>
                        <td><a href="{{$row->link_video}}">{{$row->link_video}}</a></td>
                    </tr>
                    <tr>
                        <td>description</td>
                        <td>:</td>
                        <td>
                            @php
                                echo $row->description;
                            @endphp
                        </td>
                    </tr>
                    <tr>
                        <td>Image</td>
                        <td>:</td>
                        <td>
                            @if($row->file)
                            <img class="img-show" src="{{url('storage/'.$row->file)}}" alt="">
                            @else
                            <p>no image</p>
                            @endif
                        </td>
                    </tr>
                    
                </table>

              </div>

                <hr>
                <div class="row mt-20">
                  <div class="col-sm-12">
                      <a class="btn btn-success" href="{{url('ganking_detail')}}">Back</a>
                  </div>
                </div>

            </div>
          </div>
        </div>
    </div>


@endsection