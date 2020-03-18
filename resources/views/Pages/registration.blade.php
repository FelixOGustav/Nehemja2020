@extends('Layouts/template')
@section('content')
<div>
    <!-- TODO This error display is ugly AF.. -->
    @if($errors->any())
        @foreach ($errors->all() as $error)
            <li style="color: black;">{{$error}}</li> 
        @endforeach
    @endif

    @if($key)
    <form method="POST" action="/registration/{{$key}}/done">
    @else
    <form method="POST" action="/registration/done">
    @endif
    
        {{ csrf_field() }}
        <div class="container" style="margin-top:10%">
            <h1 style=" margin-top: 3rem; text-align: center; color:#EAC15B;" class="anmalan">Anmälan</h1>
            <div>
                <ul class="progressbar" style="padding-inline-start: 0px;">
                    <li class="active">Info deltagare</li>
                    <li>Adress</li>
                    <li>Övrigt</li>
                    <li>Målsman</li>
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
                            <label class="registerLabel" for="inputState">Vilken kår vill du åka med?</label>
                            <select id="kar" name="kar" class="form-control" required>
                                    <option value="">Välj...</option>
                                @foreach($kars as $kar)
                                    <option value="{{$kar->id}}">{{$kar->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="registerLabel" for="inputState">Vilken patrull vill du åka med?</label>
                            <select id="patrull" name="patrull" class="form-control" disabled required>
                                    <option value="">Välj...</option>
                                @foreach($patrulls as $patrull)
                                    <option value="{{$patrull->id}}">{{$patrull->name}}</option>
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
                                            <option value="">Välj..</option>
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
                                <label class="registerLabel" for="firstNameAdvocate">Förnamn målsman</label>
                                <input type="text" class="form-control" id="firstNameAdvocate" name="firstNameAdvocate" placeholder="Namn" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="registerLabel" for="lastNameAdvocate">Efternamn målsman</label>
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
                                    <h1 style=" color:#EAC15B;">Priset för lägret:<br>900kr</h1>
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
                                    <span class="slider round" id="termsSlider"></span>
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
    <!-- Reference to js helper-->
    <script src="{{URL::asset('js/registrationHelper.js')}}"></script>
    <script>
        patrulls = @json($patrulls);

        $(document).ready(function(){
            $("#kar").change(function(){
                var selectedKarId = $("#kar").val();
                relatedPatrulls = patrulls.filter(function(patrull){
                    return patrull.kar_id == selectedKarId;
                });
                var patrullsSelection = $("#patrull");
                patrullsSelection.html('<option value="">Välj...</option>');
                $.each(relatedPatrulls, function(index, patrull){
                    patrullsSelection.append(
                        $("<option>")
                            .attr("value", patrull.kar_id)
                            .text(patrull.name)
                    )
                })
                patrullsSelection.prop('disabled', false);
            });
        });
    </script>
</div>                 
@endsection
