<!DOCTYPE html>
<html lang="zxx">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
       <meta name="csrf-token" content="{{ csrf_token() }}" />
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="shortcut icon" href="images/favicon.png">
      <title>Dijital Mentor</title>
      <link href="css/bootstrap.css" rel="stylesheet">
      <link href="css/fontawesome.css" rel="stylesheet">
      <link href="css/smooth-scrollbar.css" rel="stylesheet">
      <link href="css/style.css" rel="stylesheet">
      <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
      <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>

      <![endif]-->
       <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
       <meta name="csrf-token" content="{{ csrf_token() }}" />


   </head>
   <body>
      <div class="menu-ovelay"></div>
      <div class="dash">



            <div class="dash-content">
               <div class="maintitlesec bluebg">
                  <h1><img src="images/pot-icon.svg" alt="" /> STATIONARY COMBUSTION</h1>
               </div>
               <div class="middlesection">
                  <div class="container">
                     <div class="formboxsec">
                        <form id="stationaryCombustionForm" method="post" action="{{ route('stationary.save') }}">
                            @csrf
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="formtitle">
                                    <h3>GİRDİ ALANI</h3>
                                    <p>Lütfen salınım değerlerini hesaplamak için aşağıdaki alanları doldurun:</p>
                                 </div>
                                <script>
                                    $.ajaxSetup({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        }
                                    });


                                    function  kaydet()
                                    {
                                        let facility_id =  $("#facility_id").val();
                                        let year = $("#year").val();
                                        let fuel = $("#fuel").val();
                                        let amount_of_fuel = $("#amount_of_fuel").val();
                                        let units = $("#units").val();
                                        let _token = $('#csrf-token').attr('content');
                                        if ((facility_id != '') && (year != '')  && (fuel != '')  && (amount_of_fuel != '') && (units != ''))
                                        {
                                            // $("#stationaryCombustionForm").submit();

                                            $.ajax({
                                                url: "/ajax-kaydet",
                                                type: "POST",
                                                data: {
                                                    facility_id: facility_id,
                                                    year: year,
                                                    fuel: fuel,
                                                    amount_of_fuel: amount_of_fuel,
                                                    units: units,
                                                    _token: _token
                                                },
                                                success: function (response) {
                                            document.getElementById('tablo_alani').innerHTML=response;



                                                },
                                                error: function (error) {
                                                    console.log(error);

                                                }
                                            });



                                        }
                                        else {

                                            alert('Eksik bilgi Girişi');


                                        }




                                    }


                                    function sil(pid)
                                          {
                                            let _token = $('#csrf-token').attr('content');
                                            let id = pid;

                                            $.ajax({
                                                url: "/ajax-sil",
                                                type: "POST",
                                                data: {
                                                    hesaplama_id: id,
                                                    _token: _token
                                                },
                                                success: function (response) {
                                                    document.getElementById('tablo_alani').innerHTML=response;
                                                },
                                                error: function (error) {
                                                    console.log(error);

                                                }
                                            });
                                    }



                                function  sifirla()
                                {

                                    $("#co2deger").val('');
                                    $("#co2edeger").val('');
                                    $("#ch4deger").val('');
                                    $("#n2odeger").val('');

                                    let _token = $('#csrf-token').attr('content');

                                    $.ajax({
                                        url: "/ajax-temizle",
                                        type: "POST",
                                        data: {
                                            _token: _token
                                        },
                                        success: function (response) {
                                            document.getElementById('girdi_alani').innerHTML=response;
                                        },
                                        error: function (error) {
                                            console.log(error);

                                        }
                                    });

                                }

                                function veri_getir() {
                                        let facility_id =  $("#facility_id").val();
                                        let year = $("#year").val();
                                        let fuel = $("#fuel").val();
                                        let amount_of_fuel = $("#amount_of_fuel").val();
                                        let units = $("#units").val();
                                        let _token = $('#csrf-token').attr('content');


                                    if ((facility_id != '') && (year != '')  && (fuel != '')  && (amount_of_fuel != '') && (units != ''))
                                        {

                                            $.ajax({
                                                url: "/ajax-request",
                                                type: "POST",
                                                data: {
                                                    facility_id: facility_id,
                                                    year: year,
                                                    fuel: fuel,
                                                    amount_of_fuel: amount_of_fuel,
                                                    units: units,
                                                    _token: _token
                                                },
                                                success: function (response) {

                                                    if (response) {
                                                        $("#co2deger").val(response.co2);
                                                        $("#co2edeger").val(response.co2e);
                                                        $("#ch4deger").val(response.ch4);
                                                        $("#n2odeger").val(response.n20);
                                                    }
                                                },
                                                error: function (error) {
                                                    console.log(error);

                                                }
                                            });

                                        }

                                    }


                                 </script>



                    <div id="girdi_alani">
                                 <div class="alaniform formmaxwid">
                                    <div class="mb-3">
                                       <label class="form-label">Facilty ID</label>




                                        <div class="selct-dropdown fullwidthselectbox selroundbox">
                                          <select name="facility_id" id="facility_id" onchange="veri_getir();">

                                              <option value="">Facility</option>
                                              @foreach($tesisler as $tesis)
                                              <option value="{{$tesis->id}}">{{$tesis->tesisAdi}}</option>

                                              @endforeach


                                          </select>
                                       </div>
                                    </div>
                                    <div class="mb-3">
                                       <label class="form-label">Year</label>
                                       <div class="selct-dropdown fullwidthselectbox selroundbox">
                                          <select name="year" id="year" >
                                             <option value="">Year</option>
                                              @foreach($yillar as $yil)
                                                  <option value="{{$yil->yil}}">{{$yil->yil}}</option>

                                              @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div class="mb-3">
                                       <label class="form-label">Fuel</label>
                                       <div class="selct-dropdown fullwidthselectbox selroundbox">
                                          <select name="fuel" id="fuel"  onchange="veri_getir();">
                                             <option value="">Fuel</option>
                                              @foreach($yakitlar as $yakit)
                                                  <option value="{{$yakit->yakit_id}}" >{{$yakit->yakit_cinsi}}</option>

                                              @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div class="mb-3">
                                       <label class="form-label">Amount of fuel</label>
                                       <div>
                                          <div class="selroundbox amountoffuelbox">
                                             <div class="inputselectflex">
                                                <div class="griinput">
                                                   <input
                                                       onkeyup="veri_getir();" class="borinput" name="amount_of_fuel" id="amount_of_fuel" type="text" name="" placeholder="Giriniz">
                                                </div>
                                                <div class="selct-dropdown fullwidthselectbox">
                                                   <label class="form-label">Units</label>
                                                   <select id="units" name="units" onchange="veri_getir();">
                                                      <option value="">Seçiniz</option>
                                                       @foreach($birimler as $birim)
                                                           <option value="{{$birim->birim_id}}">{{$birim->birim_adi}}</option>

                                                       @endforeach
                                                   </select>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                        <div id="mesaj"></div>
                                    </div>
                                 </div>
                              </div>
                              </div>


                              <div class="col-md-6">
                                 <div class="rightformPL">
                                    <div class="formtitle">
                                       <h3>SONUÇ ALANI</h3>
                                       <p>Girdi Alanı'nda girdiğiniz değerlere göre salınan gaz miktarları aşağıdaki gibidir:</p>
                                    </div>
                                    <div class="sonucalaniformlist">
                                       <ul>
                                          <li>
                                             <div>
                                                <span>CO<sub>2</sub></span>
                                                <input  readonly type="text" name="co2deger" id="co2deger" placeholder="" value="">
                                             </div>
                                          </li>
                                          <li>
                                             <div>
                                                <span>CH<sub>4</sub></span>
                                                <input readonly type="text" name="ch4deger" id="ch4deger" placeholder="">
                                             </div>
                                          </li>
                                          <li>
                                             <div>
                                                <span>N<sub>2</sub>O</span>
                                                <input readonly type="text" name="n2odeger" id="n2odeger" placeholder="">
                                             </div>
                                          </li>
                                          <li>
                                             <div>
                                                <span>CO<sub>2</sub><sup>e</sup></span>
                                                <input readonly type="text" name="co2edeger" id="co2edeger" placeholder="">
                                             </div>
                                          </li>
                                       </ul>
                                    </div>
                                    <div class="sublinkbnt">
                                       <input onclick="sifirla();" type="button" id="resetDataConfirmBtn" name="sil" value="Sıfırla">
                                       <input onclick="kaydet();" type="button" id="storeFormData" name="Kaydet" value="Kaydet">
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </form>
                     </div>
                 <div id="tablo_alani">

                     <div class="formtablesec">
                        <h4>Hesaplamalar</h4>
                        <div class="table-responsive fortab samwd">
                           <table id="storeDataTable" class="table table-bordered cstmTable basicTable cusrmrTable tablehovetr">
                              <thead>
                                 <tr>
                                    <th class="smw fnt14">Facilty ID</th>
                                    <th class="fnt14">Year</th>
                                    <th class="fnt14">Fuel</th>
                                    <th class="lefttext fnt14">Amount of <br>Fuel</th>
                                    <th class="fnt14">Units</th>
                                    <th class="fnt15"><span>CO<sub>2</sub></span></th>
                                    <th class="fnt15"><span>CH<sub>4</sub></span></th>
                                    <th class="fnt15"><span>N<sub>2</sub>O</span></th>
                                    <th class="fnt15"><span>CO<sub>2</sub><sup>e</sup></span></th>
                                    <th class="smw">&nbsp;</th>
                                 </tr>
                              </thead>
                              <tbody class="boxr">
                              @foreach($hesaplamalar as $hesap)
                                 <tr class="boxr">
                                    <td class="boxr">{{$hesap->Tesis->tesisAdi}}</td>
                                    <td>{{$hesap->yil}}</td>
                                    <td>{{$hesap->Yakit->yakit_cinsi}}</td>
                                    <td>{{$hesap->yakit_miktari}}</td>
                                    <td>{{$hesap->Birim->birim_adi}}</td>
                                    <td>{{$hesap->co2}}</td>
                                    <td>{{$hesap->ch4}}</td>
                                    <td>{{$hesap->n20}}</td>
                                     <td>{{$hesap->co2e}}</td>
                                     <form method="post"> <td class="tableright smw">
                                             <a class="tabbtn" onclick="sil({{$hesap->hesaplama_id}}); " href="#">Sil</a><br>
                                       <a class="tabbtn" href="">Düzenle</a><br></form>
                                    </td>
                                 </tr>
                              @endforeach
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>


               </div>
            </div>

      </div>


      <script src="js/popper.min.js"></script>
      <script src="js/spur.js"></script>
      <script src="js/bootstrap.js"></script>
      <script src="js/slectdropdown.js"></script>


      <script>
         $(document).ready(function() {
             $('.usericonTigger').click(function(evt) {
                 $('.topuserDropdown').toggleClass('showtopuserDropdown');
             });

             $('body').click(function(evt){
               if($(evt.target).closest('.usericonTigger, .topuserDropdown').length)
               return;
               $('.topuserDropdown').removeClass('showtopuserDropdown');
            });
         });
      </script>

      <script src="js/jquery.basictable.min.js"></script>
      <script>
          $(document).ready(function() {
            $('.basicTable').basictable({
              breakpoint: 767
            });
          });
      </script>
      <script src="js/form-data.js"></script>

      <script src="js/jquery.nicescroll.min.js"></script>
      <script>
        $(document).ready(function() {
          $(".boxscroll").niceScroll({cursorborder:"",cursorcolor:"#0D1840",cursoropacitymax:0.7,boxzoom:true,touchbehavior:true}); //
        });
      </script>

   </body>
</html>

