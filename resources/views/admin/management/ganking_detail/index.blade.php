@extends('template.content')
@section('content')

@push('css')
    
@endpush


<div class="mb-3">
          <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#create">
              Tambah Data
          </button>

          <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#edit-show">
            Edit Estimasi Silver
          </button>
  </div>

  <div class="row">
      <div class="col-sm-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            
            <div class="btn btn-primary">
                <p>
                  QTY LOOT : {{$ganking->qty}}
                </p>
            </div>
  
            <div class="btn btn-primary">
              <p>
                  ESTIMASI SILVER : {{number_format($ganking->loot)}}
              </p>
          </div>

          <div class="btn btn-primary">
            <p>
                TANGGAL GANKING : {{$ganking->date}}
            </p>
          </div>

          </div>
        </div>
      </div>
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
                <th>member</th>
                <th>time start</th>
                <th>time end</th>
                <th>play time</th>
                <th>claim location</th>
                <th>presen</th>
                <th>split amount</th>
                <th>item split</th>
                <th>regear</th>
                <th>action</th>
              </tr>
            </thead>
            <tbody>

              @foreach ($row as $key)
                  <tr>
                    <td>{{$key->users}}</td>
                    <td>{{$key->time_start}}</td>
                    <td>{{$key->time_end}}</td>
                    <td>{{Date::diff($key->time_start,$key->time_end, $key->id)}}</td>
                    <td>{{$key->chest_loot}}</td>
                    <td>{{Date::presentase($key->play_time,$key->ganking_id, $key->id)}} %</td>
                    <td><b>{{Date::split_loot($key->id, $key->ganking_id)}}</b> Silver</td>
                    <td><b>{{Date::split_item($key->id, $key->ganking_id)}}</b> Item</td>
                    <td>{{$key->regear}}</td>
                    <td>
                      <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#edit{{$key->id}}"
                         class="btn btn-sm btn-primary">edit</a>

                      <a href="javascript:void(0)" onclick="hapus('{{url('ganking_detail/destroy/'.$key->id)}}')" 
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
                
                        <form action="{{url('ganking_detail/update')}}" method="POST">
                            @csrf
                            <input type="hidden" id="id" name="id" value="{{$key->id}}">
                            <div class="modal-body">
                               
                              <input type="hidden" name="ganking_id" value="{{$ganking_id}}">

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
                                <label for="time_start" class="form-label">time start</label>
                                <input type="datetime-local" class="form-control" id="time_start" name="time_start" value="{{$key->time_start}}" placeholder="time_start">
                              </div>
              
                              <div class="mb-3">
                                <label for="time_end" class="form-label">time end</label>
                                <input type="datetime-local" class="form-control" id="time_end" name="time_end" value="{{$key->time_end}}" placeholder="time_end">
                              </div>
              
                              <div class="mb-3">
                                <label for="loot" class="form-label">loot claim location</label>
                                <input type="text" class="form-control" id="chest_loot" name="chest_loot" value="{{$key->chest_loot}}" placeholder="chest_loot">
                              </div>
              
                              <div class="mb-3">
                                <label for="regear" class="form-label">regear</label>
                                <input type="number" class="form-control" id="regear" name="regear" value="{{$key->regear}}" placeholder="regear">
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

              @endforeach
        
            </tbody>
          </table>
        </div>
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

      <form action="{{url('ganking_detail/store')}}" method="POST">
          @csrf
          <div class="modal-body">

                <input type="hidden" name="ganking_id" value="{{$ganking_id}}">

                <div class="form-group">
                  <label for="member">member</label>
                  <select class="js-example-basic-single" style="width: 100%;z-index :999" name="users_id" aria-label="Default select example">
                      <option value="" selected></option>
                      @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                      @endforeach
                  </select>
                </div>

                <div class="mb-3">
                  <label for="time_start" class="form-label">time start</label>
                  <input type="datetime-local" class="form-control" id="time_start" name="time_start" placeholder="time_start">
                </div>

                <div class="mb-3">
                  <label for="time_end" class="form-label">time end</label>
                  <input type="datetime-local" class="form-control" id="time_end" name="time_end" placeholder="time_end">
                </div>

                <div class="mb-3">
                  <label for="loot" class="form-label">loot claim location</label>
                  <input type="text" class="form-control" id="chest_loot" name="chest_loot" placeholder="chest_loot">
                </div>

                <div class="mb-3">
                  <label for="regear" class="form-label">regear</label>
                  <input type="number" class="form-control" id="regear" name="regear" placeholder="regear">
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


<!-- Modal -->
<div class="modal fade" id="edit-show" tabindex="-1" aria-labelledby="create" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Create</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="{{url('ganking/qty')}}" method="POST">
          @csrf
          <div class="modal-body">

            <input type="hidden" name="id" value="{{$ganking_id}}">

            <div class="form-group">
              <label for="qty">{{Helper::uc('estimasi silver')}}</label>
              <input type="number" class="form-control" id="loot" name="loot" placeholder="loot" value="{{$ganking->loot}}" required>
            </div>

            <div class="form-group">
              <label for="status">{{Helper::uc('status')}}</label>
              <select class="form-control" name="status" id="status" required>
                <option value="{{$ganking->status}}">{{$ganking->status}}</option>
                <option>masih ganking</option>
                <option>selesai ganking</option>
              </select>
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