<x-menu>
    <x-slot:title>
        Ver viaje
    </x-slot>
 
    <div class="pagetitle">
        <h1>Ver viaje</h1>
    </div>
    
    <section class="section">
        <div class="row">
            <div class = "col-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Detalles</h5>
                        <img src="{{Storage::url($pic->hash)}}" alt="">
                        <p><i class="bx bxs-car"></i> {{$ride->cars->marcas->name_m}} {{$ride->cars->model_c}}</p>
                        <p><i class="bx bxs-color-fill"></i> {{$ride->cars->colors->name_co}}</p>
                        <p><i class="bx bx-id-card"></i> {{$ride->cars->users->name}}</p>
                        <p><i class="bx bxl-slack-old"></i> {{$placa}}</p>
                        <p><i class="bx bx-calendar"></i> {{$ride->date_t}} </p>
                        <p><i class="bx bxs-time"></i> {{$ride->hour_t}} </p>
                        <p><i class="bx bx-map"></i> {{$ride->placesB->name_p}} </p>
                        <p><i class="bx bx-map-pin"></i> {{$ride->placesF->name_p}}</p>
                    </div>
                </div>
            </div>

            <div class = "col-8">
                <div class="card"> 
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <div class="row">
                            <div class = "col-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title text-center">Origen: </h5>
                                        <h5 class="text-center">{{$ride->placesB->name_p}}</h5>
                                        <div class="row text-center">
                                            <div class="col-12">
                                                <form action="{{route('ride.requestStop', $ride)}}" method="POST">
                                                    @csrf
                                                    <input  name="places_id" id="places_id" type="hidden" value="{{$ride->placesB->id}}">
                                                    <button type="submit" class="btn btn-success">+</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
        
                            <div class = "col-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title text-center">Destino: </h5>
                                        <h5 class="text-center">{{$ride->placesF->name_p}}</h5>
                                        <div class="row text-center">
                                            <div class="col-12">
                                                <form action="{{route('ride.requestStop', $ride)}}" method="POST">
                                                    @csrf
                                                    <input  name="places_id" id="places_id" type="hidden" value="{{$ride->placesF->id}}">
                                                    <button type="submit" class="btn btn-success">+</button>
                                                </form>
                                            </div>
                                        </div>
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
                                            <div class="row text-center">
                                                <div class="col-12">
                                                    <form action="{{route('ride.requestStop', $ride)}}" method="POST">
                                                        @csrf
                                                        <input  name="places_id" id="places_id" type="hidden" value="{{$stop->id}}">
                                                        <button type="submit" class="btn btn-success">+</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
              </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Mapa</h5>
                        <div class="row text-center">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29867.127089797075!2d-103.3240576!3d20.6536704!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428b23a9bbba80d%3A0xdacdb7fd592feb90!2sCentro%20Universitario%20de%20Ciencias%20Exactas%20e%20Ingenier%C3%ADas%20(CUCEI)!5e0!3m2!1ses!2smx!4v1697166252053!5m2!1ses!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

</x-menu>