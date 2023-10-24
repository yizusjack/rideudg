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
                      <th scope="col">Carro</th>
                      <th scope="col">Origen</th>
                      <th scope="col">Destino</th>
                      <th scope="col"></th>
                      <th scope="col"></th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($rides as $ride)
                        <tr>
                            <td>{{$ride->id}}</th>
                            <td>{{$ride->date_t}}</td>
                            <td>{{$ride->cars->marcas->name_m}} {{$ride->cars->model_c}} {{$ride->cars->colors->name_co}}</td>
                            <td>{{$ride->placesB->name_p}}</td>
                            <td>{{$ride->placesF->name_p}}</td>
                            <td>
                                <a href="{{route('ride.edit', $ride)}}">
                                  <button class="btn btn-primary">
                                      <i class="bx bx-edit"></i>
                                  </button>
                                </a>
                            </td>
                            <td>
                              <form action="{{route('ride.destroy', $ride)}}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button class="btn btn-danger">
                                    <i class="bx bx-trash"></i>
                                  </button>
                              </form>
                          </td>
                          <td>
                            <a href="{{route('ride.show', $ride)}}">
                                <button class="btn btn-secondary">
                                    <i class="bx bxs-info-circle"></i>
                                </button>
                            </a>
                          </td>
                        </tr>
                    @endforeach
                  </tbody>
              </table>
              <div class="row text-center">
                  <div class="col-12">
                    <a href="{{route('ride.create')}}">
                        <button class="btn btn-success">+</button>
                    </a>
                  </div>
              </div>
            </div>
          </div>
    </section>
</x-menu>
