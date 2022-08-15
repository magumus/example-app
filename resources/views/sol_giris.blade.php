
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





