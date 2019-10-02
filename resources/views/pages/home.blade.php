<b>Brands</b> <br />
@foreach($brands as $brand)
    {!! $brand->name , "<br />" !!}
@endforeach

<br /><b>Models</b> <br />
@foreach($models as $model)
    {!! $model->name , "<br />" !!}
@endforeach

<br /><b>Body Types</b> <br />
@foreach($body_types as $body_type)
    {!! $body_type->name , "<br />" !!}
@endforeach

<br /><b>Driving Wheels</b> <br />
@foreach($driving_wheels as $driving_wheel)
    {!! $driving_wheel->name , "<br />" !!}
@endforeach

<br /><b>Transmissions</b> <br />
@foreach($transmissions as $transmission)
    {!! $transmission->name , "<br />" !!}
@endforeach

<br /><b>Fuels</b> <br />
@foreach($fuels as $fuel)
    {!! $fuel->name , "<br />" !!}
@endforeach

<br /><b>Colors</b> <br />
@foreach($colors as $color)
    {!! $color->name , "<br />" !!}
@endforeach

<br /><b>Cars</b> <br />
@foreach($cars as $car)
    {!! $car->brands->name . " " . $car->models->name . " " . $car->models->transmission  . "<br />" !!}
@endforeach
{{ $cars->links() }}