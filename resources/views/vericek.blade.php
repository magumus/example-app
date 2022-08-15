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
