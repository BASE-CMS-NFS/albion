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
          <h4 class="card-title">{{$title}}</h4>
          <form class="forms-sample" method="POST" action="{{url('ganking_pict/update')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$row->id}}">
            <div class="form-group">

              <label for="name">{{Helper::uc('name')}}</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="name" value="{{$row->name}}" required>
            </div>

            <div class="form-group">
                <label for="description">{{Helper::uc('link')}}</label>
                <input type="text" class="form-control" id="link" name="link" placeholder="link" value="{{$row->link}}" required>
              </div>

              <div class="form-group">
                <label for="description">{{Helper::uc('link_download')}}</label>
                <input type="text" class="form-control" id="link_download" name="link_download" value="{{$row->link_download}}"  placeholder="link download" required>
              </div>

              <div class="form-group">
                <label for="description">{{Helper::uc('link_video')}}</label>
                <input type="text" class="form-control" id="link_video" name="link_video" value="{{$row->link_video}}"  placeholder="link video" required>
              </div>

              <div class="form-group">
                <label for="price">{{Helper::uc('price')}}</label>
                <input type="number" class="form-control" id="price" name="price" value="{{$row->price}}" placeholder="price" required>
              </div>

              <div class="form-group">
                <label for="type">{{Helper::uc('type')}}</label>
                <select class="form-control" name="type" id="type" required>
                  <option value="{{$row->type}}" selected>{{$row->type}}</option>
                  <option>free</option>
                  <option>pro</option>
                  <option>project</option>
                </select>
              </div>

              <div class="form-group">
                <label for="master">{{Helper::uc('master')}}</label>
                <select class="form-control" name="master_aplikasi_id" id="master_aplikasi_id" required>
                  <option value="{{$row->master_aplikasi_id}}" selected>{{$row->master}}</option>
                  @foreach ($master as $masters)
                    <option value="{{$masters->id}}">{{$masters->name}}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label for="status">{{Helper::uc('status')}}</label>
                <select class="form-control" name="status" id="status" required>
                  <option value="{{$row->status}}">{{$row->status}}</option>
                  <option>active</option>
                  <option>notactive</option>
                </select>
              </div>

              <div class="form-group">
                <label for="description">{{Helper::uc('description')}}</label>
                <textarea id="basic-example" name="description">{{$row->description}}</textarea>
              </div>

               @if($row->file)
                  <div class="form-group">
                    <img src="{{url('storage/'.$row->file)}}" width="200px" alt="">
                  </div>
                @endif

              <div class="form-group" style="margin-top: 10px">
                <label for="description">{{Helper::uc('image')}}</label>
                <div class="button-wrapper">
                    <label for="upload" class="btn btn-danger me-2 mb-4" tabindex="0">
                    <span class="d-none d-sm-block"><i class='bx bx-cloud-upload'></i>&nbsp;Upload photo</span>
                    <i class="bx bx-upload d-block d-sm-none"></i>
                    <input
                        type="file"
                        id="upload"
                        class="account-file-input"
                        hidden
                        accept="image/png, image/jpeg"
                        name="file"
                    />
                    </label>
                </div>
            </div>


            <hr>
            
            <div class="form-group mt-20">
              <a class="btn btn-success" href="{{url('ganking_pict')}}"><i class="mdi mdi-arrow-left-thick"></i>&nbsp;Back</a>
                <button type="submit" class="btn btn-primary mr-2"><i class="mdi mdi-content-save"></i>&nbsp;Submit</button>
            </div>

          </form>
        </div>
      </div>
    </div>
</div>


@push('js')

    <!-- TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/0el4n01c6kp1p847l54ghx1wkxjadb3pe3p1bk1orbvnq5wx/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
    tinymce.init({
      selector: 'textarea#basic-example',
      height: 500,
      plugins: [
        'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
        'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
        'insertdatetime', 'media', 'table', 'help', 'wordcount'
      ],
      toolbar: 'undo redo | blocks | ' +
      'bold italic backcolor | alignleft aligncenter ' +
      'alignright alignjustify | bullist numlist outdent indent | ' +
      'removeformat | help',
      content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
    });

    </script>

@endpush

@endsection