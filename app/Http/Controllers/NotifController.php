<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DetailKredit;
use App\Pelanggan;

class NotifController extends Controller
{
    //
    public function index(){
        $status = 'awal';
        return view('pemilik.notif.index', compact('status'));
    }
    public function cari(request $request){
        $status = 'lanjut';
        $date = (int)date('d', strtotime($request->date));
        $date2 = (int)date('d', strtotime($request->date2));
        $kredit = DetailKredit::join('kredits', 'kredit_details.kredit_id', 'kredits.id')
                                ->join('pelanggans','pelanggans.id','kredits.pelanggan_id')
                                ->whereRaw('DAY(kredit_details.jatuh_tempo)>='.$date)
                                ->whereRaw('DAY(kredit_details.jatuh_tempo)<='.$date2)
                                ->selectRaw('pelanggans.nama,pelanggans.id')
                                ->get();
        return view('pemilik.notif.index', compact('status','kredit'));
        
    }
    public function kirim(request $request){
        $input = $request->check;
        for ($i=0; $i < sizeof($input); $i++) { 
            # code...
            $pelanggan = Pelanggan::find($input[$i]);
            $msg = 'Pelanggan Yth pembayaran cicilan akan masuk jatuh tempo mohon untuk segera membayar angsuran melalui transfer dan segera upload pada website resmin UDWawaCollection.com Terima Kasih';
        $number=$pelanggan->tlpn;
        $deviceid = '109133';
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://smsgateway.me/api/v4/message/send",
          CURLOPT_SSL_VERIFYPEER=>false,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "[{\"phone_number\": \"$number\", \"message\": \"$msg\", \"device_id\": $deviceid}]",
          CURLOPT_HTTPHEADER => array(
            "Cache-Control: no-cache",
            "Postman-Token: 0dfb5acc-f0ae-415b-a5d3-ca12a2dfdfd3",
            "authorization: eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJhZG1pbiIsImlhdCI6MTU0OTE5NTQ2NCwiZXhwIjo0MTAyNDQ0ODAwLCJ1aWQiOjY3Njg2LCJyb2xlcyI6WyJST0xFX1VTRVIiXX0.inoC3TujoLUGMHMuqo_zwEhNDm38i-5m_DGoXA4tB_A"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        }
        return redirect()->route('notif.index');
    }
}
