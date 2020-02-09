@extends('Layouts/template')
@section('content')
<div>
    
    @if($key)
    <form method="POST" action="/registration/leader/{{$key}}/done">
    @else
    <form method="POST" action="/registration/leader/done">
    @endif
        {{ csrf_field() }}
        <div class="container" style="margin-top:10%">
            <div class="BGGrey">
                <h1 style=" margin-top: 3rem; text-align: center; color:#EAC15B;" class="anmalan">Anmälan</h1>
                <h2 style="text-align: center; color: #EBEBEB;" class="rubrikerAnmalan whiteColor">Ledarsidan</h2>
            </div>
            <div style="margin-top: 3%;">
                <ul class="progressbar" style="padding-inline-start: 0px;">
                    <li class="active">Info deltagare</li>
                    <li>Adress</li>
                    <li>Övrigt</li>
                    <li>Anhörig</li>
                    <li>Vilkor och pris</li>
                </ul>
            </div>
            <div class="register">
                <div id="formPageContainer">
                    <div class="formPage current" form-index="0">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="registerLabel" for="firstName">Förnamn</label>
                                <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Namn" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="registerLabel" for="lastName">Efternamn</label>
                                <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Namnsson" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12">
                                    <label class="registerLabel" for="year">Personnummer</label>
                                <input type="text" class="form-control" maxlength="10" id="socialSecurityNumber" name="socialSecurityNumber" placeholder="ÅÅMMDDXXXX" required>
                            </div>
                        </div>
                        <div>
                            <label class="registerLabel" for="inputState">Vilken ort vill du åka med?</label>
                            <select id="place" name="place" class="form-control"  required>
                                    <option value="">Välj...</option>
                                @foreach($places as $place)
                                    <option value="{{$place->placeID}}">{{$place->placename}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="formPage" form-index="1">
                        <div class="form-group container-fluid noPadding">
                            <label class="registerLabel" for="inputCity">Adress</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Sommargatan 42" required> 
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                        <label class="registerLabel" for="inputZip">Postnummer</label>
                                        <input type="text" class="form-control" id="zip" name="zip" placeholder="13337" required>
                            </div>
                            <div class="form-group col-md-8">
                                <label class="registerLabel" for="inputCity">Postort</label>
                                <input type="text" class="form-control" id="city" name="city" placeholder="Sommargårda" required>
                            </div>
                        </div>
                            <div class="form-group col-md-12 noPadding">
                                <label class="registerLabel" for="firstName">E-post</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="namn.namnsson@mail.se" required>
                            </div>
                            <div class="form-group col-md-12 noPadding">
                                <label class="registerLabel" for="firstName">Bekräfta E-post</label>
                                <input type="email" class="form-control" id="emailConfirm" name="emailConfirm" placeholder="namn.namnsson@mail.se" onpaste="return false;" required>
                            </div>
                            <div class="form-group container-fluid noPadding">
                                    <label class="registerLabel" for="inputCity">Telefon</label>
                                    <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="0713-371337" required>
                            </div>
                    </div>
                    <div class="formPage" form-index="2">
                            <div class="form-group container-fluid noPadding" >
                                    <label class="registerLabel" for="member">Är du med i en Equmeniaförening</label>
                                    <select id="memberPlace" name="memberPlace" class="form-control" required>
                                            <option value="null">Nej, jag är inte medlem i någon Equmeniaförening</option>
                                        @foreach($places as $place)
                                            <option value="{{$place->placeID}}">Ja, jag är med i {{$place->placename}}</option>
                                        @endforeach
                                    </select>
                            </div>
                        <div>
                            <label class="registerLabel" for="allergy">Allergi</label>
                            <textarea class="form-control container-fluid" name="allergy" id="allergy" cols="165" rows="5"></textarea>
                        </div>
                        <div>
                            <label class="registerLabel" for="other">Övrigt</label>
                            <textarea class="form-control container-fluid" name="other" id="other" cols="165" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="formPage" form-index="3">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="registerLabel" for="firstNameAdvocate">Förnamn anhörig</label>
                                <input type="text" class="form-control" id="firstNameAdvocate" name="firstNameAdvocate" placeholder="Namn" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="registerLabel" for="lastNameAdvocate">Efternamn anhörig</label>
                                <input type="text" class="form-control" id="lastNameAdvocate" name="lastNameAdvocate" placeholder="Namnsson" required>
                            </div>
                        </div>
                        <div class="form-group col-md-12 noPadding">
                                <label class="registerLabel" for="firstName">E-post</label>
                                <input type="email" class="form-control" id="emailAdvocate" name="emailAdvocate" placeholder="namn.namnsson@namn.se" required>
                        </div>
                        <div class="form-group col-md-12 noPadding">
                                <label class="registerLabel" for="firstName">Berkäfta E-post</label>
                                <input type="email" class="form-control" id="emailAdvocateConfirm" name="emailAdvocateConfirm" placeholder="namn.namnsson@namn.se" onpaste="return false;" required>
                        </div>
                        <div class="form-group container-fluid noPadding">
                                <label class="registerLabel" for="inputCity">Telefon</label>
                                <input type="text" class="form-control" id="phoneNumberAdvocate" name="phoneNumberAdvocate" placeholder="0713-371337" required> 
                        </div>
                        <div class="form-group container-fluid noPadding">
                                <label class="registerLabel" for="inputCity">Hemtelefon</label>
                                <input type="text" class="form-control" id="homeNumberAdvocate" name="homeNumberAdvocate" placeholder="0713-371337"> 
                        </div>
                    </div>

                    <div class="formPage" form-index="last">
                        <div class="form-row">    
                            <div class="form-group col-md-6">   
                                <h4 style="color: #EAC15B;">
                                    <ul>
                                        <li>TIDER SKA FÖLJAS</li>
                                        <li>LEDARNA ÄR DE SOM BESTÄMMER</li>
                                        <li>KILLAR OCH TJEJER SOVER ÅTSKILJT </li>
                                        <li>DU SKA VARA MED På DE OBLIGATORISKA AKTIVITETERNA </li>
                                        <li>NOLLTOLERANS MOT ALKOHOL OCH DROGER</li>
                                        <li>DET GÅR EJ AVANMÄLAN EFTER SISTA ANMÄLNINGSDAGEN UTAN GILTIGT LÄKARINTYG </li>
                                        <li>ANMÄLAN ÄR BINDANDE </li>
                                        <li>ATT DELTAGAREN ÄR MED I BILD OCH VIDEO SOM SEDAN PUBLICERAS PÅ SOCIALMEDIER (OM DETTA SKULLE VARA ETT PROBLEM, KONTAKTA INFO@NEHEMJA2020.SE)</li>
                                    </ul>
                                </h4>
                            </div>
                            <div class="form-group col-md-6">
                                <div>
                                    <h1 style=" color:#EAC15B;">Priset för lägret:<br>600kr</h1>
                                </div>
                                <div>
                                        <p style=" color:#EAC15B; ">Jag vill ansöka om syskonrabatt</p>
                                        <label class="switch">
                                            <input type="checkbox" id="discount" name="discount" value="1">
                                            <span class="slider round"></span>
                                        </label>
                                        </div>
                                <div>
                                <p style=" color:#EAC15B; ">Jag har läst förstått och godkänt vilkoren och <a href="https://equmenia.se/personuppgiftspolicy/" target="_blank">hanteringen</a> av personuppgifter inför lägret</p>
                                <label class="switch">
                                    <input type="checkbox" id="terms" name="terms" value="1" required>
                                    <span class="slider round"></span>
                                </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="text-align:center">
                    <span>
                        <button type="back" style="background-color: white; display: none;"class="bottonRegister" id="formPrevPage">Bak</button>
                        <button type="next" class="bottonRegister" id="formNextPage">Nästa</button>
                    </span>
                </div>
                    
            </div>
        </div>  
        </form>
    
</div>
<script src="{{URL::asset('js/registrationHelper.js')}}"></script>
      
@endsection
