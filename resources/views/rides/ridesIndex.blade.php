<x-menu>
    <x-slot:title>
        Viajes
    </x-slot>
 
    <div class="pagetitle">
        <h1>Viajes</h1>
    </div>
    
    <section class="section">
        <div class="row">
            @foreach ($rides as $ride)
                <div class = "col-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center"></h5>
                            <p><i class="bx bx-calendar"></i> {{$ride->date_t}} </p>
                            <p><i class="bx bxs-time"></i> {{$ride->hour_t}} </p>
                            <p><i class="bx bx-map"></i> {{$ride->placesB->name_p}} </p>
                            <p><i class="bx bx-map-pin"></i> {{$ride->placesF->name_p}}</p>
                            <div class="text-center">
                                <a href="{{route('ride.show', $ride)}}"><button class = 'btn btn-primary'>Ver</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </section>

</x-menu>