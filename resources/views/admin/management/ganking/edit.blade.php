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
          <form class="forms-sample" method="POST" action="{{url('ganking/update')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$row->id}}">

            <div class="form-group">
              <label for="name">{{Helper::uc('name')}}</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="name" value="{{$row->name}}" required>
            </div>

            <div class="form-group">
              <label for="date">{{Helper::uc('date')}}</label>
              <input type="date" class="form-control" id="date" name="date" placeholder="date" value="{{$row->date}}" required>
            </div>

            <div class="form-group">
              <label for="loot">{{Helper::uc('estimasi silver')}}</label>
              <input type="number" class="form-control" id="loot" name="loot" placeholder="loot" value="{{$row->loot}}" required>
            </div>

            <div class="form-group">
              <label for="qty">{{Helper::uc('total loot qty')}}</label>
              <input type="number" class="form-control" id="qty" name="qty" placeholder="qty" value="{{$row->qty}}" required>
            </div>

            <div class="form-group">
              <label for="status">{{Helper::uc('status')}}</label>
              <select class="form-control" name="status" id="status" required>
                <option value="{{$row->status}}">{{$row->status}}</option>
                <option>masih ganking</option>
                <option>selesai ganking</option>
              </select>
            </div>

            <div class="form-group">
              <label for="description">{{Helper::uc('description')}}</label>
              <textarea id="basic-example" name="description">{{$row->description}}</textarea>
            </div>


            <hr>
            
            <div class="form-group mt-20">
              <a class="btn btn-success" href="{{url('ganking')}}"><i class="mdi mdi-arrow-left-thick"></i>&nbsp;Back</a>
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
      height: 200,
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