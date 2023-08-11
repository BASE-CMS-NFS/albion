@extends('template.content')
@section('content')

@push('css')
    
@endpush


<div class="mb-3">
    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#create">
        Tambah Data
    </button>
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
                  <th>judul</th>
                  <th>url</th>
                  <th>create date</th>
                  <th>action</th>
                </tr>
              </thead>
              <tbody>
  
                @foreach ($row as $key)
                    <tr>
                            <td>{{$key->judul}}</td>
                            <td>{{$key->url}}</td>
                            <td>{{$key->created_at}}</td>
                            <td>
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#edit{{$key->id}}"
                                    class="btn btn-sm btn-primary">edit</a>
                                <a href="javascript:void(0)" onclick="hapus('{{url('admin/tutorial/destroy/'.$key->id)}}')" 
                                    class="btn btn-sm btn-danger">delete</a>

                            </td>
                    </tr>

                    <div class="modal fade" id="edit{{$key->id}}" tabindex="-1" aria-labelledby="edit" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">edit</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                    
                            <form action="{{url('admin/tutorial/update')}}" method="POST">
                                @csrf
                                <input type="hidden" id="id" name="id" value="{{$key->id}}">
                                <div class="modal-body">
                      
                                    <div class="mb-3">
                                        <label for="judul" class="form-label">masukan judul</label>
                                        <input type="text" class="form-control" id="judul" value="{{$key->judul}}" name="judul" placeholder="judul" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="url" class="form-label">masukan url</label>
                                        <input type="text" class="form-control" id="url" value="{{$key->url}}" name="url" placeholder="url" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="url" class="form-label">description</label>
                                        <textarea name="description" id="" cols="30" rows="10">{{$key->description}}</textarea>
                                    </div>
    
    
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update changes</button>
                                </div>
                            </form>
                    
                          </div>
                        </div>
                      </div>

                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      </div>
</div>



<!-- Modal -->
<div class="modal fade" id="create" tabindex="-1" aria-labelledby="create" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Create</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
  
        <form action="{{url('admin/tutorial/store')}}" method="POST">
            @csrf
            <div class="modal-body">
  
                  <div class="mb-3">
                    <label for="judul" class="form-label">masukan judul</label>
                    <input type="text" class="form-control" id="judul" name="judul" placeholder="judul" required>
                  </div>

                  <div class="mb-3">
                    <label for="url" class="form-label">masukan url</label>
                    <input type="text" class="form-control" id="url" name="url" placeholder="url" required>
                </div>

                <div class="mb-3">
                    <label for="url" class="form-label">description</label>
                    <textarea name="description" id="" cols="30" rows="10"></textarea>
                </div>

  
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
  
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
  
  <script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2({
            dropdownParent: $('#create')
        });
    });
  </script>
  
  @endpush
  
  @endsection
