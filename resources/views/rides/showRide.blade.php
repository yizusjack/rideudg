<x-menu>
    <x-slot:title>
        Ver viaje
    </x-slot>
 
    <div class="pagetitle">
        <h1>Ver viaje</h1>
    </div>
    
    <section class="section">
        <div class="row">
            <div class = "col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Detalles</h5>
                        <img src="{{Storage::url($pic->hash)}}" alt="">
                        <p>Lugares disponibles: {{$leftSits}}</p>
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

            <div class = "col-sm-8">
                <div class="card"> 
                    <div class="card-body">
                        <h5 class="card-title">Paradas</h5>
                        <div class="row">
                            <div class = "col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title text-center">Origen: </h5>
                                        <h5 class="text-center">{{$ride->placesB->name_p}}</h5>
                                        <div class="row text-center">
                                            <div class="col-12">
                                                @if (Auth::user()->id == $ride->cars->users_id)
                                                    @foreach ($ride->users as $rideU)
                                                        @if ($rideU->pivot->places_id == $ride->places_id)
                                                            <p>{{$rideU->name}}
                                                                @if ($rideU->pivot->approved_u != true)
                                                                    <a href="{{route('ride.approveStop', ['ride'=>$ride, 'place'=>$ride->placesB, 'user'=>$rideU])}}">
                                                                        <button class="btn btn-sm btn-success">✔</button>
                                                                    </a>
                                                                    <a href="{{route('ride.denyStop', ['ride'=>$ride, 'user'=>$rideU])}}">
                                                                        <button class="btn btn-sm btn-danger">✘</button>
                                                                    </a>
                                                                @endif
                                                            </p>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    @if ($pass == 0 and $leftSits>0)
                                                        <form action="{{route('ride.requestStop', $ride)}}" method="POST">
                                                            @csrf
                                                            <input  name="places_id" id="places_id" type="hidden" value="{{$ride->placesB->id}}">
                                                            <button type="submit" class="btn btn-success">+</button>
                                                        </form>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
        
                            <div class = "col-md-6">
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
                                <div class = "col-md-6 col-lg-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title text-center"></h5>
                                            <h5 class="text-center">{{$stop->name_p}}</h5>
                                            <div class="row text-center">
                                                <div class="col-12">
                                                    @if (Auth::user()->id == $ride->cars->users_id)
                                                        @foreach ($ride->users as $rideU)
                                                            @if ($rideU->pivot->places_id == $stop->id)
                                                                <p>{{$rideU->name}}
                                                                    @if ($rideU->pivot->approved_u != true)
                                                                        <a href="{{route('ride.approveStop', ['ride'=>$ride, 'place'=>$stop, 'user'=>$rideU])}}">
                                                                            <button class="btn btn-sm btn-success">✔</button>
                                                                        </a>
                                                                        <a href="{{route('ride.denyStop', ['ride'=>$ride, 'user'=>$rideU])}}">
                                                                            <button class="btn btn-sm btn-danger">✘</button>
                                                                        </a>
                                                                    @endif
                                                                </p>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        @if ($pass == 0 and $leftSits>0)
                                                            <form action="{{route('ride.requestStop', $ride)}}" method="POST">
                                                                @csrf
                                                                <input  name="places_id" id="places_id" type="hidden" value="{{$stop->id}}">
                                                                <button type="submit" class="btn btn-success">+</button>
                                                            </form>
                                                        @endif
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @if ($pass > 0)
                            <p>Ya has sido registrado a este viaje. Espera tu confirmación</p>
                        @endif
                        @if (Auth::user()->id == $ride->cars->users_id)
                        <div class="row text-center">
                            <a href="{{route('ride.seeStops', $ride)}}">
                                <button class="btn btn-success">Agregar paradas</button>
                            </a>
                        </div>
                        @endif
                    </div>
              </div>
            </div>

            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Mapa</h5>
                        <div class="row text-center">
                            <div id="map"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    @section('js')
        <script>
            var map = L.map('map').setView([{{$ride->placesB->latitude_p}}, {{$ride->placesB->longitude_p}}], 13);

            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);

            let marker, circle, zoomed;

            navigator.geolocation.watchPosition(success, error);

            

            function success(position){
                const latitude = position.coords.latitude;
                const longitude = position.coords.longitude;
                const accuracy = position.coords.accuracy;

                if(marker){
                    map.removeLayer(marker);
                    map.removeLayer(circle);
                }

                marker = L.marker([latitude, longitude], {title:"Ubicación actual"}).addTo(map);
                circle = L.circle([latitude, longitude], { radius: accuracy }).addTo(map);

                L.marker([{{$ride->placesB->latitude_p}}, {{$ride->placesB->longitude_p}}], {title:"Punto de partida: {{$ride->placesB->name_p}}"}).addTo(map);
                L.marker([{{$ride->placesF->latitude_p}}, {{$ride->placesF->longitude_p}}], {title:"Punto de fin: {{$ride->placesF->name_p}}"}).addTo(map);

                @foreach($ride->stops as $stop)
                    L.marker([{{$stop->latitude_p}}, {{$stop->longitude_p}}], {title:"Parada: {{$stop->name_p}}"}).addTo(map);
                @endforeach

                if(!zoomed){
                    zoomed = map.fitBounds(circle.getBounds());
                }

                map.setView([latitude, longitude]);
            }

            function error(error){
                if(error.code === 1){
                    alert('Se requieren permisos de ubicación');
                }
                else{
                    //alert('No se pudo mijo');
                }
            }

        </script>
    @endsection

</x-menu>