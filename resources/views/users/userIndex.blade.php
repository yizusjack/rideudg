<x-menu>
    <x-slot:title>
        Usuarios
    </x-slot>
 
    <div class="pagetitle">
        <h1>Usuarios</h1>
    </div>
    
    <section class="section">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title"></h5>
              <table class="table table-hover table-striped table-responsive">
                <thead>
                    <tr>
                      <th scope="col">Nombre</th>
                      <th scope="col">Correo</th>
                      <th scope="col" class="text-center">Conductor</th>
                      <th scope="col" class="text-center">Administrador</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->name}}</th>
                            <td>{{$user->email}}</td>
                            <td>
                                <div class="row text-center">
                                    <div class="col-12">
                                        @if ($user->type_u !=7 and $user->type_u != 3)
                                            <form action="{{route('user.addD', $user)}}" method="POST">
                                                @csrf
                                                <button type="submit"
                                                @if ($user->waiting_u == true)
                                                    class="btn btn-warning"
                                                @else
                                                    class="btn btn-success"
                                                @endif
                                                >+</button>
                                            </form>
                                        @else
                                            <form action="{{route('user.quitD', $user)}}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-danger">--</button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="row text-center">
                                    <div class="col-12">
                                        @if ($user->type_u < 5)
                                            <form action="{{route('user.addA', $user)}}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-success">+</button>
                                            </form>
                                        @else
                                            <form action="{{route('user.quitA', $user)}}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-danger">--</button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
              </table>
            </div>
          </div>
    </section>

</x-menu>