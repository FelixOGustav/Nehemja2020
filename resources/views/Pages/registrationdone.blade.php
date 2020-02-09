@extends('Layouts/template')
@section('content')

<div class="centerTextInDiv container" style="padding: 80px 5px; background-color: #EBEBEB;">
    <h1>Du är anmäld!</h1>
    <h4>{{$recipient}} har fått ett mail ({{$mail}}) med en länk för att bekräfta anmälan. Länken måste alltså klickas på för att bekräfta anmälan!</h4>
    <p>Om ni inte fått mailet, kolla i skräppost ett kontakta någon i lägerledningen eller dins ungdomsledare</p>
</div>

@endsection