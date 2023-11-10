<div>
    <div class="pagetitle">
        <h1>Aprobar vehículo</h1>
    </div>
    
    <section class="section">
      @foreach ($cars as $car)
      <div class="card">
          <div class="card-body">
            <h5 class="card-title">{{$car->marcas->name_m}} {{$car->model_c}} {{$car->colors->name_co}}</h5>
            <p>Placas: {{ Crypt::decryptString($car->placas_c)}}</p>
          </div>
      </div>
          @if ($car->picset_c == true) 
            @php
                $picture1 = Picture::where('cars_id', $car->id)
                ->where('type_p', '1')
                ->first();

                $picture2 = Picture::where('cars_id', $car->id)
                ->where('type_p', '2')
                ->first();

                $picture3 = Picture::where('cars_id', $car->id)
                ->where('type_p', '3')
                ->first();

                $picture4 = Picture::where('cars_id', $car->id)
                ->where('type_p', '4')
                ->first();
            @endphp
            <div class="row">
              <div class="col-md-6">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Vista delantera</h5>
                    <img src="{{Storage::url($picture1->hash)}}" alt="">
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Vista trasera</h5>
                    <img src="{{Storage::url($picture2->hash)}}" alt="">
                  </div>
                </div>
              </div> 
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Vista lateral</h5>
                    <img src="{{Storage::url($picture3->hash)}}" alt="">
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Vista censurada</h5>
                    <img src="{{Storage::url($picture4->hash)}}" alt="">
                  </div>
                </div>
              </div> 
            </div>

          @endif
        <div class="row text-center">
          <div class="col-6">
            <form action="{{route('car.approveC', $car)}}" method="POST">
              @csrf
              <button type="submit" class="btn btn-success">✔Aprobar</button>
            </form>
          </div>

          <div class="col-6">
            <form action="{{route('car.denyC', $car)}}" method="POST">
              @csrf
              <button type="submit" class="btn btn-danger">✘Rechazar</button>
            </form>
          </div>

        </div>
      @endforeach
      {{ $cars->links() }}
    </section>
</div>
