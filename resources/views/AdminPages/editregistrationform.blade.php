@extends('Layouts/AdminTemplate')
@section('adminContent')
<div class="panel">
    <div class="sidescrollcontent">
        <h1>Redigera anmälan</h1>
        <h3>Hantera kårer och patruller</h3>
        @foreach ($kars as $kar)
            <div style="color: black;">
                {{$kar->name}} <button>Ta bort</button>
                <li>
                    @foreach ($patrulls as $patrull)
                        @if($patrull->kar_id == $kar->id)
                            <ul style="color: black;">{{$patrull->name}} <button>ta bort</button></ul>
                        @endif
                    @endforeach
                </li>
                <p>Lägg till patrull</p>
                <form action="">
                    <input type="text" name="name" id="name">
                    <input type="hidden" name="kar_id" value="{{$kar->id}}">
                    <button type="submit">Lägg till</button>
                </form>
            </div>
        @endforeach
    </div>
    <div>
        <p>Lägg till kår</p>
        <form action="">
            <input type="text" name="name" id="name">
            <button type="submit">Lägg till</button>
        </form>
    </div>
</div>

@endsection