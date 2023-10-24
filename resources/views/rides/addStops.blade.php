<x-menu>
    <x-slot:title>
        Gestionar paradas
    </x-slot>
 
    <div class="pagetitle">
        <h1>Gestionar paradas</h1>
    </div>
    
    <section class="section">
        <div class="card"> 
            <div class="card-body">
                <h5 class="card-title"></h5>
                <div class="row">
                    <div class = "col-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-center">Origen: </h5>
                                <h5 class="text-center">{{$ride->placesB->name_p}}</h5>
                            </div>
                        </div>
                    </div>

                    <div class = "col-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-center">Destino: </h5>
                                <h5 class="text-center">{{$ride->placesF->name_p}}</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    @foreach ($ride->stops as $stop)
                        <div class = "col-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title text-center"></h5>
                                    <h5 class="text-center">{{$stop->name_p}}</h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
      </div>
      <div class="card">
            <div class="card-body">
                <h5 class="card-title"></h5>
                <form class="row g-3" action="{{route('ride.manageStops', $ride)}}" method="POST">
                    @csrf
                    <div class="col-12">
                        <select name="place_id[]" multiple class="form-control">
                            @foreach ($places as $place)
                                <option value="{{ $place->id }}"
                                    @selected(array_search($place->id, $ride->stops()->pluck('id')->toArray()) !== false)
                                >
                                    {{$place->name_p}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Enviar</button>
                      <button type="reset" class="btn btn-secondary">Limpiar</button>
                    </div>
                </form>
            </div>
      </div>
    </section>

</x-menu>