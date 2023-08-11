@extends('template.content')
@section('content')

@push('css')
    
@endpush

<div class="mb-3">
    <div class="card-body">
      <div class="row">
        <!-- List group Numbered -->
        <div class="col-sm-12">
          <small class="text-light fw-semibold">Informasi</small>
          <div class="demo-inline-spacing mt-3">
            <ol class="list-group list-group-numbered">
              <li class="list-group-item">kupon akan di tambahkan disini jika anda sudah memenuhi SK</li>
              <li class="list-group-item">spin dilakukan sekali seminggu setiap hari senin</li>
              <li class="list-group-item">lakukan spin dengan memasukan kupon</li>
              <li class="list-group-item">kupon hanya bisa di gunakan sekali</li>
              <li class="list-group-item">screenshoot hadiah dan claim di discord harakiri</li>
              <li class="list-group-item">jika kurang paham silahkan hubungi admin di discord, <b>mittch/mordepth/mikasa</b></li>
              <li class="list-group-item">hanya untuk havefun dan semoga beruntung</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </div>
  


@if($add == true)
<div class="mb-3">
    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#create">
        Tambah Data
    </button>
</div>
@endif



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
                  <th>kupon</th>
                  <th>users</th>
                  <th>create date</th>
                  <th>action</th>
                </tr>
              </thead>
              <tbody>
  
                @foreach ($row as $key)
                    <tr>
                            <td>{{$key->kupon}}</td>
                            <td>{{$key->users}}</td>
                            <td>{{$key->created_at}}</td>
                        @if($edit == true)
                            <td>
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#edit{{$key->id}}"
                                    class="btn btn-sm btn-primary">edit</a>
                                    <a href="javascript:void(0)" onclick="hapus('{{url('admin/kupon/destroy/'.$key->id)}}')" 
                                        class="btn btn-sm btn-danger">delete</a>

                            </td>
                        @else
                            <td>
                                    <a href="https://gatcha.harakiri-albion.online/" target="_blank">spin disini</a>
                            </td>
                        @endif
                    </tr>

                    <div class="modal fade" id="edit{{$key->id}}" tabindex="-1" aria-labelledby="edit" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">edit</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                    
                            <form action="{{url('admin/kupon/update')}}" method="POST">
                                @csrf
                                <input type="hidden" id="id" name="id" value="{{$key->id}}">
                                <div class="modal-body">
                                   
                                    <div class="form-group">
                                        <label for="member">member</label>
                                        <select id="user{{$key->id}}" class="form-control"  style="width: 100%" name="users_id" aria-label="Default select example">
                                            <option selected value="{{$key->users_id}}">{{$key->users}}</option>
                                            @foreach($users as $user)
                                              <option value="{{$user->id}}">{{$user->name}}</option>
                                            @endforeach
                                        </select>
                                      </div>
                      
                                      <div class="mb-3">
                                        <label for="kupon" class="form-label">masukan kupon</label>
                                        <input type="text" class="form-control" id="kupon" value="{{$key->kupon}}" name="kupon" placeholder="kupon" required>
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
  
        <form action="{{url('admin/kupon/store')}}" method="POST">
            @csrf
            <div class="modal-body">
  
                  <div class="form-group">
                    <label for="member">member</label>
                    <select class="js-example-basic-single" style="width: 100%;z-index :999" name="users_id" aria-label="Default select example" required>
                        <option value="" selected></option>
                        @foreach($users as $user)
                          <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                  </div>
  
                  <div class="mb-3">
                    <label for="kupon" class="form-label">masukan kupon</label>
                    <input type="text" class="form-control" id="kupon" name="kupon" placeholder="kupon" required>
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
