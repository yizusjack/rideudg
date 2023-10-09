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
          <h5 class="card-title">Yadayadayada</h5>
          <table class="table table-hover table-striped table-responsive">
            <thead>
                <tr>
                  <th scope="col">Nombre</th>
                  <th scope="col">Dirección</th>
                  <th scope="col">Latitud</th>
                  <th scope="col">Longitud</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($places as $place)
                    <tr>
                        <td>{{$place->name_p}}</th>
                        <td>{{$place->address_p}}</td>
                        <td>{{$place->latitude_p}}</td>
                        <td>{{$place->longitude_p}}</td>
                    </tr>
                @endforeach
              </tbody>
          </table>
        </div>
      </div>
    </section>

</x-menu>