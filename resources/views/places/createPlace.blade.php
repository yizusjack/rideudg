<x-menu>
    <x-slot:title>
        Agregar lugares
    </x-slot>
 
    <div class="pagetitle">
        <h1>Agregar lugares</h1>
    </div>
    
    <section class="section">
    <div class="card">
        <div class="card-body">
          <h5 class="card-title"></h5>

          <!-- Horizontal Form -->
          <form action="{{route('place.store')}}" method="POST">
            @csrf

            <div class="row mb-3">
              <label for="name_p" class="col-sm-2 col-form-label">Nombre</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="name_p" name="name_p" value={{old('name_p')}}>
                @error('name_p')
                    <p>{{$message}}</p>
                @enderror
              </div>
            </div>

            <div class="row mb-3">
                <label for="address_p" class="col-sm-2 col-form-label">Dirección</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="address_p" name="address_p" value={{old('address_p')}}>
                  @error('address_p')
                    <p>{{$message}}</p>
                  @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="latitude_p" class="col-sm-2 col-form-label">Latitud</label>
                <div class="col-sm-4">
                  <input type="number" step="any" class="form-control" id="latitude_p" name="latitude_p" value={{old('latitude_p')}}>
                    @error('latitude_p')
                        <p>{{$message}}</p>
                    @enderror
                </div>

                <label for="longitude_p" class="col-sm-2 col-form-label">Longitud</label>
                <div class="col-sm-4">
                  <input type="number" step="any" class="form-control" id="longitude_p" name="longitude_p" value={{old('longitude_p')}}>
                    @error('longitude_p')
                         <p>{{$message}}</p>
                    @enderror
                </div>
            </div>

            <div class="text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
              <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
          </form><!-- End Horizontal Form -->

        </div>
      </div>
    </section>

</x-menu>