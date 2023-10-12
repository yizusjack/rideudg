<x-menu>
    <x-slot:title>
        Agregar imagenes
    </x-slot>
 
    <div class="pagetitle">
        <h1>Agregar imagenes</h1>
    </div>
    
    <section class="section">
    <div class="card">
        <div class="card-body">
          <h5 class="card-title"></h5>

          <!-- Horizontal Form -->
          <form action="{{route('car.storep', $car)}}" method="POST" enctype = "multipart/form-data">
            @csrf

            <div class="mb-3">
              <label for="picture_f" class="form-label">Vista delantera</label>
              <input class="form-control" type="file" id="picture_f" name="picture_f">
                @error('picture_f')
                    <h5>{{$message}}</h5>
                @enderror
            </div>

           <div class="mb-3">
                <label for="picture_b" class="form-label">Vista trasera</label>
                <input class="form-control" type="file" id="picture_b" name="picture_b" multiple>
                  @error('picture_b')
                      <h5>{{$message}}</h5>
                  @enderror
            </div>

            <div class="mb-3">
                <label for="picture_s" class="form-label">Vista lateral</label>
                <input class="form-control" type="file" id="picture_s" name="picture_s" multiple>
                  @error('picture_s')
                      <h5>{{$message}}</h5>
                  @enderror
            </div>

            <div class="mb-3">
                <label for="picture_c" class="form-label">Vista delantera (censura la placa)</label>
                <input class="form-control" type="file" id="picture_c" name="picture_c" multiple>
                  @error('picture_c')
                      <h5>{{$message}}</h5>
                  @enderror
            </div>

            <div class="text-center">
              <button type="submit" class="btn btn-primary">Enviar</button>
              <button type="reset" class="btn btn-secondary">Limpiar</button>
            </div>
          </form><!-- End Horizontal Form -->

        </div>
      </div>
    </section>

</x-menu>