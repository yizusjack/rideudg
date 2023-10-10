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
              <label for="marca_c" class="col-sm-2 col-form-label">Marca</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="marca_c" name="marca_c" value="{{old('marca_c')}}">
                @error('marca_c')
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
                <label for="color_c" class="col-sm-2 col-form-label">Color</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="color_c" name="color_c" value="{{old("color_c")}}">
                  @error("color_c")
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