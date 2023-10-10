<x-menu>
    <x-slot:title>
        Vehículos
    </x-slot>
 
    <div class="pagetitle">
        <h1>Vehículos</h1>
    </div>
    
    <section class="section">
    <div class="card">
        <div class="card-body">
          <h5 class="card-title">Yadayadayada bom bom khakha</h5>
          <table class="table table-hover table-striped table-responsive">
            <thead>
                <tr>
                  <th scope="col">Conductor</th>
                  <th scope="col">Marca</th>
                  <th scope="col">Modelo</th>
                  <th scope="col">Color</th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($cars as $car)
                    <tr>
                        <td>{{$car->users->name}}</th>
                        <td>{{$car->marcas->name_m}}</td>
                        <td>{{$car->model_c}}</td>
                        <td>{{$car->colors->name_co}}</td>
                        <td>
                            <a href="">
                              <button class="btn btn-primary">
                                  <i class="bx bx-edit"></i>
                              </button>
                            </a>
                        </td>
                        <td>
                          <form action="" method="POST">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-danger">
                                <i class="bx bx-trash"></i>
                              </button>
                          </form>
                      </td>
                    </tr>
                @endforeach
              </tbody>
          </table>
        </div>
      </div>
    </section>

</x-menu>