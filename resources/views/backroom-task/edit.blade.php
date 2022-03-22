@extends('layouts.app')

@section('content')
<div class="container mt-4 mb-5">
  <form action="{{ route('backroomtask.update', $status->id) }}" method="POST" enctype="multipart/form-data" class="form-group">
    @csrf
    @method('PUT')
    <div class="card-panel panel-default">
      <div class="collapse show" id="col-task">
        <div class="panel-heading">
          <h1 class="panel-title"><center>Task Information</center></h1>
        </div>
        
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <label class="p-2">Bussiness Key</label>
              <input class="form-control" id="" readonly="" value="{{ $status->customerRequests->business_key }}">
              <label class="p-2">Customer</label>
              <input name="" class="form-control" id="" readonly="" value="{{ $status->customerRequests->name }}">
              <label class="p-2">Service</label>
              <input name="service" class="form-control" id="" readonly="" value="{{ $status->customerRequests->service->name }}">
              <label class="p-2">Notes</label>
              <textarea name="information" class="form-control" id="" rows="4">{{ $status->information }}</textarea>
            </div>
            
            <div class="col-md-6">
              <label class="p-2">Kapasitas</label>
              <input class="form-control" id="" readonly="" value="{{ $status->customerRequests->capacity }}">
              <label class="p-2">Long Lat</label>
              <input name="longlat" class="form-control" id="" readonly="" value="{{ $status->customerRequests->latlong }}">
              <label class="p-2">Status</label>
              <div class="input-group">
                <select class="form-control" name="name">
                @foreach (["Waiting to Process" => "Waiting to Process", "Not Ready" => "Not Ready", "Ready" => "Ready" ] as $statuses => $name)
                  <option value="{{ $statuses }}" 
                  @if ($statuses === $status->name)
                    selected
                  @endif>
                    {{ $name }}
                  </option>
                @endforeach
                </select>
              </div>
              <label class="p-2">Foto</label>
              <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
              @error('image')
                <div class="alert alert-danger mt-2">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
        </div>
      </div>
    </div>
    <button type="submit" class="btn btn-primary float-end">Complete Task</button>
  </form>
</div>
@endsection