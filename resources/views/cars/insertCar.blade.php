<x-menu>
    <x-slot:title>
        Agregar vehículo
    </x-slot>
 
    <div class="pagetitle">
        <h1>Agregar vehículo</h1>
    </div>
    
    <section class="section">
    <div class="card">
        <div class="card-body">
          <h5 class="card-title"></h5>

          <!-- Horizontal Form -->
          <form action="{{route('car.store')}}" method="POST">
            @csrf

            <div class="row mb-3">
              <label for="marcas_id" class="col-sm-2 col-form-label">Marca</label>
              <div class="col-sm-10">
                <select class="form-control" id="marcas_id" name="marcas_id">
                    @foreach ($marcas as $marca)
                        <option value="{{$marca->id}}" @if(old('marcas_id') == $marca->id)
                            selected 
                           @endif>{{$marca->name_m}}</option>
                    @endforeach
                </select>
                @error('marcas_id')
                    <p>{{$message}}</p>
                @enderror
              </div>
            </div>

            <div class="row mb-3">
                <label for="model_c" class="col-sm-2 col-form-label">Modelo</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="model_c" name="model_c" value="{{old('model_c')}}">
                  @error('model_c')
                    <p>{{$message}}</p>
                  @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="colors_id" class="col-sm-2 col-form-label">Color</label>
                <div class="col-sm-10">
                  <select class="form-control" id="colors_id" name="colors_id">
                      @foreach ($colors as $color)
                          <option value="{{$color->id}}" @if(old('colors_id') == $color->id)
                            selected 
                           @endif>{{$color->name_co}}</option>
                      @endforeach
                  </select>
                  @error("colors_id")
                    <p>{{$message}}</p>
                  @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="placas_c" class="col-sm-2 col-form-label">Placas</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="placas_c" name="placas_c" value="{{old('placas_c')}}">
                  @error('placas_c')
                    <p>{{$message}}</p>
                  @enderror
                </div>
            </div>

            <div class="text-center">
              <button type="submit" class="btn btn-primary">Enviar</button>
              <button type="reset" class="btn btn-secondary">Limpiar</button>
            </div>
          </form><!-- End Horizontal Form -->

        </div>
      </div>
    </section>

</x-menu>