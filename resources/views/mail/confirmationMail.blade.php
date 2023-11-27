<x-mail::message> 
    # Viaje aprobado
    Su solicitud para el viaje #{{$id}} ha sido aprobada
    Conductor: {{$driver}}
    Fecha: {{$date}}
    Hora: {{$time}}
    Vehículo: {{$vehicle}}
    Lugar de salida: {{$place}}

    Gracias por su confianza.

    Atte: {{config('app.name')}}
</x-mail::message>