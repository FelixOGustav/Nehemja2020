@extends('Layouts/template')
@section('content')
    
    

    @if($camp->open > 0)
        <!-- Modal normal registration-->
        <div class="modal fade" id="registerChoiseModal" role="dialog">
            <div class="modal-dialog modal-dialog-centered">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header justify-content-center">
                        <h4 class="text-center">Deltagare Eller Ledare?</h4>
                    </div>
                    <div class="modal-body ">
                        <div class="row">
                            <a href="/registration" class="col modalButtonStyle"><h3 class="whiteColor">Deltagare</h3></a>
                            <a href="/registration/leader" class="col modalButtonStyle"><h3 class="whiteColor">Ledare</h3></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else 
        <!-- Modal efter registration-->
        <div class="modal fade" id="registerChoiseModal" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header justify-content-center">
                        <h4 class="text-center" style="font-size: 3rem;">Intresseanmälan</h4>
                    </div>
                    <div class="modal-body ">
                        <div class="row" style="padding: 10px; text-align:center;">
                            <p>Platserna är slut, men det går att skriva upp sig på kö ifall det blir en ledig plats.<p>
                            <p>Vi Kontaktar er via email för vidare instruktioner för riktiga anmälan om en plats skulle bli ledig.</p>
                        </div>
                        <div class="row" style="padding: 10px;">
                            <form style="width: 100%" method="POST" action="/lateregistrationsignup">
                                {{ csrf_field() }}
                                <table style="width: 100%">
                                    <tbody>
                                        <tr>
                                            <td style="width: 15%;">
                                                    <label for="name" style="float:right">Namn</label>
                                            </td>
                                            <td style="width: 85%; padding-right: 40px;">
                                                    <input type="text" id="name" name="name" style="width: 100%" placeholder="Namn Namnsson">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 15%;">
                                                <label for="email" style="float:right">Epost</label>
                                            </td>
                                            <td style="width: 85%; padding-right: 40px;">
                                                <input type="email" name="email" id="email"  style="width: 100%" placeholder="namn.namnsson@namn.se">
                                            </td>
                                        </tr>
                                    </tbody>                                    
                                </table>
                                <div class="container-fluid" style="text-align: center;">
                                    <i style="color: #606569;">OBS!!! Se till epost addressen är rätt ifylld! Om den är fel kommer vi inte kunna kontakta er och ni kommer förlora platsen</i>
                                </div>
                                <div class="container-fluid d-flex justify-content-center">
                                    <button type="submit" class="buttonStyle" style="background-color: #606569; margin-top: 1rem;">
                                        <p>Efteranmäl mig!</p>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
        
        <div class="landingDiv">            
            <div class="landingContentContainer">
                <!-- Logo btns -->
                <div class="logoTxt hideOnMobile">
                    <h1 style="text-shadow: 0px 0px 11px #bcbcbc78;">{{$camp->name}}</h1>
                </div>
                <!-- Logo btns -->
                
                <div class="landingInfo">
                    <!-- Registration btns -->
                    <div class="container-fluid d-flex justify-content-center mobileRegistrationBtn">
                        @if($camp->open > 0)
                            <button class="buttonStyle linkHover" data-toggle="modal" data-target="#registerChoiseModal"><p>Anmäl dig</p></button>
                        @elseif($camp->late_open > 0)
                            <button class="buttonStyle linkHover" data-toggle="modal" data-target="#registerChoiseModal"><p>Efteranmälan</p></button>
                        @else
                            <p class="buttonStyle" style="color: white; cursor: default;">Anmälan är stängd</p>
                        @endif
                    </div>
                    <!-- Registration btns end -->

                    <div class="mobileDate">
                        <p>{{$camp->dates}}</p>
                    </div>
                </div>

                <div class="chevronContainer" onclick="(function(){$('html,body').animate({scrollTop: $('#nehemja2020Info').offset().top},'1300');})();">
                    <div class="chevron"></div> 
                </div>
                

                
                
            </div>
        </div>
        @php $counter = 1 @endphp
        @php $placedID = false @endphp
        @foreach ($infos as $info)
            @if($info->type == "sidebyside")
                <!-- Explore info row -->
                <div class="ContentRow">
                    <div class="contentContainer">
                        <div class="containerItem contentImg" style="order: {{$counter % 2}}">
                                @php $counter++ @endphp
                            <img  src="{{URL::asset($info->img)}}">
                        </div>
                        <div class="containerItem contentTxt"  style="order: {{$counter % 2}}" id="nehemja2020Info">
                            <h2>{{$info->title}}</h2>
                            <p> {!! $info->body !!}</p>
                        </div>
                    </div>
                </div>
                <!-- Explore info row end -->

            @else
                <div class="ContentRow" @if(!$placedID) id="ParentsInfo" @endif 
                @php $placedID = true @endphp>
                    <div class="contentTxt" style="background-color: #EBEBEB;">
                        <h2>{{$info->title}}</h2>
                        <p>{{$info->body}}</p>
                    </div>
                    
                </div>
                <div class="inlineImgBanner">
                    <img src="{{URL::asset($info->img)}}">
                </div>
                @php $counter++ @endphp
            @endif
        @endforeach

        <!-- QnA -->

        <div class="ContentRow">
            <div class="contentTxt" id="faqInfo">
                <h2>Frågor och svar</h2>
            </div>
            <div class="">
                <div class="qnaRow">
                    <!-- Left row -->
                   <div class="qnaBound">
                        @php $counter = 0 @endphp
                        @foreach($faqs as $faq)
                            @if($counter % 2 == 0)
                                <!-- Question {{$counter}}-->
                                <div class="col qnaBtnSize">
                                    <div class="">
                                        <div>
                                            <h2 data-toggle="collapse" href="#question{{$counter}}" aria-expanded="false" aria-controls="collapseExample" class="faqTitle" style="cursor: pointer;">{{$faq->question}}</h2>
                                        </div>
                                        <div class="collapse faqBody" id="question{{$counter}}">
                                            <p>{{$faq->answer}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Question {{$counter}} end-->
                            @endif
                        @php $counter++ @endphp                        
                        @endforeach
                        <!-- Add more questions here. Dont forget to change href and id for the collapse-->
                    </div>
                    <!-- Left row end-->
                    <!-- Right row-->
                    <div  class="qnaBound">
                        @php $counter = 0 @endphp
                        @foreach($faqs as $faq)
                            @if($counter % 2 == 1)
                                <!-- Question {{$counter}}-->
                                <div class="col qnaBtnSize">
                                    <div class="">
                                        <div>
                                            <h2 data-toggle="collapse" href="#question{{$counter}}" aria-expanded="false" aria-controls="collapseExample" class="faqTitle" style="cursor: pointer;">{{$faq->question}}</h2>
                                        </div>
                                        <div class="collapse" id="question{{$counter}}">
                                            <p class="">{{$faq->answer}}</p>
                                        </div>
                                    </div>
                                </div>  
                                <!-- Question {{$counter}} end-->
                            @endif
                        @php $counter++ @endphp                        
                        @endforeach
                    </div>
                    <!-- Right row end -->

                </div>
            </div>
        </div>

        <!-- QnA End -->
        
        <!-- Kontakt info -->
        <div class="ContentRow" id="KontaktInfo">
                <div class="contentTxt centerTextInDiv">
                    <h2>Kontakt</h2>
                    <div>
                        <h1>info@nehemja2020.se</h1>
                    </div>
                    <!-- Kontakt -->
                    <div>
                        @foreach ($groups as $group)
                            <h2><br>{{$group}}</h2>
                            <table style="display: flex; justify-content: center;">
                                <tbody>
                                    @foreach ($contacts as $contact)
                                        @if($contact->group == $group)
                                        <tr>
                                            <td>
                                                <h5 style="margin-right: 5px;">{{$contact->name}}</h5>
                                            </td>
                                            <td>
                                                <p style="margin-top: 8px; margin-left: 5px;">{{$contact->contact_info}}</p>
                                            </td>
                                        </tr>
                                        @endif
                                    @endforeach                                    
                            </tbody>
                            </table>  
                        @endforeach                        
                    </div>
                    <!-- Kontakt end -->

                </div>
            </div>
            <!-- Kontakt info end -->

    </div>

    <!-- Main Site Content End -->

   

    <!-- scroll to top btn -->

    <script>

        // Called every time the window is resized.
        // Makes sure the info blocks with images aligns properly
        $(window).resize(CheckOrder);

        function CheckOrder() {            
            var infoBlocks = $('.ContentRow');
            var i = 0;

            infoBlocks.each(function(){
                if(i % 2 == 0){
                    if(window.innerWidth < 992){
                        $(this).find('.contentImg').css("order", "0");
                        $(this).find('.contentTxt').css("order", "1");
                    }
                    else {
                        $(this).find('.contentImg').css("order", "1");
                        $(this).find('.contentTxt').css("order", "0");
                    }
                }
                i++; 
            });
        }
       

        // Scroll to top logo
        $(function(){
            $(".scrollToTop").click(function(){
                $("html,body").animate({scrollTop:0},"1300");
                toggleHiddenSidebarClass();
                return false
            })
        })
        
        // Scroll to "var är explore?"
        $(function(){
            $("#scrollToInfoBtn").click(function(){
                $("html,body").animate({scrollTop: $("#nehemja2020Info").offset().top},"1300");
                toggleHiddenSidebarClass();
                return false
            })
        })
        
        // Scroll to Regler
        $(function(){
            $("#scrollToParentsBtn").click(function(){
                $("html,body").animate({scrollTop: $("#ParentsInfo").offset().top},"1300");
                toggleHiddenSidebarClass();
                return false 
            })
        })

        
        // Scroll to faq
        $(function(){
            $("#scrollTofaqBtn").click(function(){
                $("html,body").animate({scrollTop: $("#faqInfo").offset().top},"1300");
                toggleHiddenSidebarClass();
                return false
            })
        })

        
        // Scroll to kontakt
        $(function(){
            $("#scrollToKontaktBtn").click(function(){
                $("html,body").animate({scrollTop: $("#KontaktInfo").offset().top},"1000");
                toggleHiddenSidebarClass();
                return false
            })
        })

        $(document).ready(function(){
            CheckOrder();
        });
    </script>
    <!-- scroll to top btn end -->
    
    @endsection