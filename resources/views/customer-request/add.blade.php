@extends('layouts.app')

@section('content')
    <div class="container mt-5 mb-5">
        <h2 class="card-title">Input Customer Request</h2>
        <hr>
        <form action="{{ route('customer.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Pelanggan</label>
              <div class="col-sm-10">
                <input name="name" type="name" class="form-control @error('name') is-invalid @enderror" id="inputEmail3" placeholder="Nama Customer" value="{{ old('name') }}">
                @error('name')
                  <div class="alert alert-danger mt-2">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">No Telp. Pelanggan</label>
              <div class="col-sm-10">
                <input name="phoneNumber" type="tel" class="form-control @error('phoneNumber') is-invalid @enderror" id="inputEmail3" placeholder="08xxxxxxxxx" value="{{ old('phoneNumber') }}">
                @error('phoneNumber')
                  <div class="alert alert-danger mt-2">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Latlong</label>
                <div class="col-sm-10">
                  <input name="latlong" type="name" class="form-control @error('latlong') is-invalid @enderror" id="inputEmail3" placeholder="Latitude & Longitude" value="{{ old('latlong') }}">
                  @error('latlong')
                    <div class="alert alert-danger mt-2">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                  <input name="address" type="name" class="form-control @error('address') is-invalid @enderror" id="inputEmail3" placeholder="Alamat" value="{{ old('address') }}">
                  @error('address')
                    <div class="alert alert-danger mt-2">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Service</label>
                <div class="col-sm-10">
                    <select name="service_id" class="form-select @error('service_id') is-invalid @enderror" aria-label="Default select example">
                      <option>-----Pilih service-----</option>  
                      @foreach ($services as $service)
                        <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>{{ $service->name }}</option>
                      @endforeach
                    </select>
                    @error('service_id')
                      <div class="alert alert-danger mt-2">
                        {{ $message }}
                      </div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Bandwidth</label>
                <div class="col-sm-10">
                  <div class="input-group">
                    <input name="bandwidth" type="number" class="form-control @error('bandwidth') is-invalid @enderror" placeholder="Bandwidth" value="{{ old('bandwidth') }}">
                    <span>
                      <select name="unit" class="form-select" id="inputGroupSelect01">
                        <option value="MB">MB</option>
                        <option value="GB">GB</option>
                        <option value="TB">TB</option>
                      </select>
                    </span>
                  </div>
                  @error('bandwidth')
                    <div class="alert alert-danger mt-2">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
            </div>
            <h5>Account Manager</h5>
            <hr>
            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Nama AM</label>
              <div class="col-sm-10">
                <input name="amName" type="name" class="form-control @error('amName') is-invalid @enderror" id="inputEmail3" placeholder="Nama AM" value="{{ Auth::user()->name }}" readonly>
                @error('amName')
                  <div class="alert alert-danger mt-2">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">No Telp. AM</label>
              <div class="col-sm-10">
                <input name="amPhoneNumber" type="tel" class="form-control @error('amPhoneNumber') is-invalid @enderror" id="inputEmail3" placeholder="" value="{{ Auth::user()->phoneNumber }}" readonly>
                @error('amPhoneNumber')
                  <div class="alert alert-danger mt-2">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
            <h5>Witel</h5>
            <hr>
            <div id="witel">
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Witel A</label>
                <div class="col-sm-10">
                  <select name="witel[]" class="form-select @error('witel') is-invalid @enderror">
                    <option>-----Pilih Witel-----</option>  
                    @foreach ($witels as $witel)
                      @if (old('witel'))
                        <option value="{{ $witel->id }}" {{ in_array($witel->id, old('witel')) ? 'selected' : '' }}>{{ $witel->name }}</option>
                      @else
                        <option value="{{ $witel->id }}">{{ $witel->name }}</option>  
                      @endif
                    @endforeach
                  </select>
                  @error('witel')
                    <div class="alert alert-danger mt-2">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col">
                <button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary float-end">Tambahkan Witel</button>
              </div>
            </div>
            <hr>
          <button type="submit" class="btn btn-primary float-end">Submit</button>
        </form>
    </div>
    <script type="text/javascript">
      var i = 0;
      $("#dynamic-ar").click(function () {
          ++i;
          // $("#witel").append('<tr><td><input type="text" name="addMoreInputFields[' + i +
          //     '][subject]" placeholder="Enter subject" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
          //     );
          $("#witel").append('<div id="div" class="row mb-3"><label class="col-sm-2 col-form-label">Witel '+ String.fromCharCode(65 + i) +'</label><div class="col-sm-8"><select name="witel[]" class="form-select"><option>-----Pilih Witel-----</option>@foreach ($witels as $witel)<option value="{{ $witel->id }}">{{ $witel->name }}</option>@endforeach</select></div><div class="col-sm-2"><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></div></div>');                
      });
      $(document).on('click', '.remove-input-field', function () {
          $(this).parents('#div').remove();
          --i;
      });
  </script>
@endsection