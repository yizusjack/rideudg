<x-menu>
    <x-slot:title>
        Editar viaje
    </x-slot>
 
    <div class="pagetitle">
        <h1>Editar viaje</h1>
    </div>
    
    <section class="section">
    <div class="card">
        <div class="card-body">
          <h5 class="card-title"></h5>

          <!-- Horizontal Form -->
          <form action="{{route('ride.update', $ride)}}" method="POST">
            @csrf
            @method('PATCH')

            <div class="row mb-3">
                <label for="date_t" class="col-sm-2 col-form-label">Fecha</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" id="date_t" name="date_t" value="{{old('date_t') ?? $ride->date_t}}">
                  @error('date_t')
                    <p>{{$message}}</p>
                  @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="hour_t" class="col-sm-2 col-form-label">Hora</label>
                <div class="col-sm-10">
                  <input type="time" class="form-control" id="hour_t" name="hour_t" value="{{old('hour_t') ?? $ride->hour_t}}">
                  @error('hour_t')
                    <p>{{$message}}</p>
                  @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="passengers_t" class="col-sm-2 col-form-label"># asientos</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" id="passengers_t" name="passengers_t" value="{{old('passengers_t') ?? $ride->passengers_t}}">
                  @error('passengers_t')
                    <p>{{$message}}</p>
                  @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="places_id" class="col-sm-2 col-form-label">Punto de partida</label>
                <div class="col-sm-10">
                  <select class="form-control" id="places_id" name="places_id">
                      @foreach ($places as $place)
                          <option value="{{$place->id}}" @if(old('places_id') == $place->id or $ride->places_id == $place->id)
                            selected 
                           @endif>{{$place->name_p}}</option>
                      @endforeach
                  </select>
                  @error("places_id")
                    <p>{{$message}}</p>
                  @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="destiny_id" class="col-sm-2 col-form-label">Destino</label>
                <div class="col-sm-10">
                  <select class="form-control" id="destiny_id" name="destiny_id">
                      @foreach ($places as $place)
                          <option value="{{$place->id}}" @if(old('destiny_id') == $place->id or $ride->destiny_id == $place->id)
                            selected 
                           @endif>{{$place->name_p}}</option>
                      @endforeach
                  </select>
                  @error("destiny_id")
                    <p>{{$message}}</p>
                  @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="cars_id" class="col-sm-2 col-form-label">Vehículo</label>
                <div class="col-sm-10">
                  <select class="form-control" id="cars_id" name="cars_id">
                      @foreach ($cars as $car)
                          <option value="{{$car->id}}" @if(old('cars_id') == $car->id or $ride->cars_id == $car->id)
                            selected 
                           @endif>{{$car->marcas->name_m}} {{$car->model_c}} {{$car->colors->name_co}}</option>
                      @endforeach
                  </select>
                  @error("cars_id")
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