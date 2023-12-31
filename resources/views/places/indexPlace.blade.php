<x-menu>
    <x-slot:title>
        Lugares
    </x-slot>
 
    <div class="pagetitle">
        <h1>Lugares</h1>
    </div>
    
    <section class="section">
    <div class="card">
        <div class="card-body">
          <h5 class="card-title"></h5>
          <table class="table table-hover table-striped table-responsive">
            <thead>
                <tr>
                  <th scope="col">Nombre</th>
                  <th scope="col">Dirección</th>
                  <th scope="col">Latitud</th>
                  <th scope="col">Longitud</th>
                  @if (Auth::user()->type_u >= 5)
                    <th scope="col"></th>
                    <th scope="col"></th>
                  @endif
                </tr>
              </thead>
              <tbody>
                @foreach ($places as $place)
                    <tr>
                        <td>{{$place->name_p}}</th>
                        <td>{{$place->address_p}}</td>
                        <td>{{$place->latitude_p}}</td>
                        <td>{{$place->longitude_p}}</td>
                        @if (Auth::user()->type_u >= 5)
                          <td>
                              <a href="{{route('place.edit', $place)}}">
                                <button class="btn btn-primary">
                                    <i class="bx bx-edit"></i>
                                </button>
                              </a>
                          </td>
                          <td>
                            <form action="{{route('place.destroy', $place)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">
                                  <i class="bx bx-trash"></i>
                                </button>
                            </form>
                          </td>
                        @endif
                    </tr>
                @endforeach
              </tbody>
          </table>
          @if (Auth::user()->type_u >= 3)
            <div class="row text-center">
                <div class="col-12">
                  <a href="{{route('place.create')}}">
                      <button class="btn btn-success">+</button>
                  </a>
                </div>
            </div>
          @endif
        </div>
      </div>
    </section>

</x-menu>