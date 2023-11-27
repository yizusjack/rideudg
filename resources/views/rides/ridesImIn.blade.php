<x-menu>
    <x-slot:title>
        Mis viajes
    </x-slot>
 
    <div class="pagetitle">
        <h1>Mis viajes</h1>
    </div>
    
    <section class="section">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title"></h5>
              <table class="table table-hover table-striped table-responsive">
                <thead>
                    <tr>
                      <th scope="col">Id</th>
                      <th scope="col">Fecha</th>
                      <th scope="col">Hora</th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($user->rides as $ride)
                        @if($ride->pivot->approved_u == true)
                            <tr>
                                <td>{{$ride->id}}</th>
                                <td>{{$ride->date_t}}</td>
                                <td>{{$ride->hour_t}}</td>
                            <td>
                                <a href="{{route('ride.show', $ride)}}">
                                    <button class="btn btn-secondary">
                                        <i class="bx bxs-info-circle"></i>
                                    </button>
                                </a>
                            </td>
                            </tr>
                        @endif
                    @endforeach
                  </tbody>
              </table>
            </div>
          </div>
    </section>
</x-menu>
