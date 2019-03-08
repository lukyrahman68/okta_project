<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kredit;
use App\Pelanggan;
use App\Survey;
use App\Pembayaran;
use App\DetailKredit;
use Response;
use SMSGateway;
use SMSGatewayMe\Client\ApiClient;
use SMSGatewayMe\Client\Configuration;
use SMSGatewayMe\Client\Api\DeviceApi;

class ApproveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $kredits = Kredit::where('kredits.sts',1)
                                ->join('pelanggans','kredits.pelanggan_id','=','pelanggans.id')
                                ->join('barangs','kredits.barang_id','=','barangs.id')
                                ->join('vendors','vendors.id','=','barangs.vendor_id')
                                ->selectRaw('pelanggans.*,kredits.id as kredit_id, vendors.nama as vendor_nama, barangs.harga,barangs.nama as nama_brng')
                                ->get();
        return view('pemilik.index',compact('kredits'));
        // return $kredits;
    }
    public function update($id){
        $kredit = Kredit::findOrFail($id);
        $pelanggan = Pelanggan::findOrFail($kredit->pelanggan_id);
        $panjang = strlen($pelanggan->nik);
        $mulai = $panjang - 5;
        $nik = substr($pelanggan->nik, $mulai, $panjang);
        $no_kontrak = $nik.'-'.$id;
        $kredit->no_kontrak = $no_kontrak;
        $kredit->sts = 3;
        $pelanggan->sts = 3;
        $kredit->save();
        $pelanggan->save();
        return redirect()->route('approve.index')->with('alert','Berhasil diubah');
        // return $kredit;
    }
    public function destroy($id){
        $kredit = Kredit::findOrFail($id);
        $pelanggan = Pelanggan::findOrFail($kredit->pelanggan_id);
        $pelanggan->sts = 0;
        $kredit->sts = 2;
        $kredit->save();
        $pelanggan->save();
        return redirect()->route('approve.index');
        // return $kredit;
    }
    public function cari_img($id){
        $media = Pelanggan::where('media.pelanggan_id','=',$id)
                            ->join('media','media.pelanggan_id','=','pelanggans.id')
                            ->selectRaw('media.*')
                            ->get();
        return response()->json($media);
    }
    public function detail($id){
        $kredit = Kredit::where('kredits.id',$id)
                                ->join('pelanggans','kredits.pelanggan_id','=','pelanggans.id')
                                ->join('barangs','kredits.barang_id','=','barangs.id')
                                ->join('vendors','vendors.id','=','barangs.vendor_id')
                                ->selectRaw('pelanggans.*,kredits.id as kredit_id, vendors.nama as vendor_nama, barangs.harga,barangs.nama as nama_brng')
                                ->first();
        $surveys = Survey::join('hasil_surveys','hasil_surveys.survey_id','surveys.id')
                            ->where('hasil_surveys.pelanggan_id','=',$kredit->id)
                            ->selectRaw('hasil_surveys.jawaban,surveys.pertanyaan')
                            ->get();

        //pelanggan history
        // $histories = Kredit::join('kredit_details','kredit_details.kredit_id','kredits.id')
        //                     ->join('vendors','vendors.id','kredits.vendor_id')
        //                     ->join('barangs','barangs.id','kredits.barang_id')
        //                     ->where('kredits.pelanggan_id',$kredit->id)
        //                     ->selectRaw('kredits.no_kontrak,vendors.nama as nama_vendor,barangs.nama as nama_barang,kredit_details.suku_bunga,kredit_details.lama_cicilan')
        //                     ->get();

        $histories = Kredit::join('kredit_details','kredit_details.kredit_id','kredits.id')
                            // ->join('vendors','vendors.id','kredits.vendor_id')
                            ->join('barangs','barangs.id','kredits.barang_id')
                            ->join('pembayarans','pembayarans.kredit_id','kredits.id')
                            ->where('kredits.pelanggan_id',$kredit->id)
                            ->selectRaw('kredits.no_kontrak,barangs.nama,barangs.harga,pembayarans.angsuran_ke,pembayarans.created_at,kredit_details.lama_cicilan,kredit_details.cicilan,kredit_details.jatuh_tempo')
                            ->get();
                            $idx=0;
        foreach ($histories as $item) {
            $d = substr($item->jatuh_tempo, strrpos($item->jatuh_tempo, '-') + 1);
            $item->jatuh_tempo=$d;
            if($item->angsuran_ke==$idx+1)
                $cicilan = unserialize($item->cicilan);
                $item->cicilan = $cicilan[$idx];
            $idx++;
        }
        return view('pemilik.detail',compact('kredit','surveys','histories'));
        // return $kredits;
    }
    public function pembayaran_index(){
        $pembayarans = Pembayaran::where('status','=','0')
                                    ->join('pelanggans','pelanggans.id','pembayarans.pelanggan_id')
                                    ->join('kredits','kredits.pelanggan_id','pelanggans.id')
                                    ->join('vendors','vendors.id','kredits.vendor_id')
                                    ->join('barangs','barangs.id','kredits.barang_id')
                                    ->selectRaw('pelanggans.nama as nama_pelanggan,vendors.nama as nama_vendor,barangs.nama as nama_barang,pembayarans.*')
                                    ->get();
        return view('pemilik.pembayaran.index', compact('pembayarans'));
        // return $pembayarans;
    }
    public function pembayaran_approve($id){
        //status 1 diterima
        $pembayaran = Pembayaran::find($id);
        $pelanggan = Pelanggan::find($pembayaran->pelanggan_id);
        $kredit = Kredit::join('kredit_details','kredit_details.kredit_id','kredits.id')
                        ->join('barangs','barangs.id','kredits.barang_id')
                        ->where('kredits.pelanggan_id','=',$pelanggan->id)
                        ->where('kredits.sts','=','4')
                        ->selectRaw('kredits.id,kredits.no_kontrak,kredit_details.cicilan,barangs.harga,kredit_details.lama_cicilan')
                        ->first();
        if($pembayaran->angsuran_ke==$kredit->lama_cicilan){
            $kredit_updt = Kredit::find($kredit->id);
            $kredit_updt->sts='5';
            $kredit_updt->save();
            $pelanggan->sts = '0';
            $pelanggan->save();

        }
        $cicilan = unserialize($kredit->cicilan);
        $harga = $kredit->harga/$kredit->lama_cicilan;
        $total = $cicilan[$pembayaran->angsuran_ke-1]+$harga;
        $pembayaran->status = '1';
        $pembayaran->save();
        $msg = 'Kami telah menerima pembayaran cicilan sebesar Rp.'.$total.' untuk nomer kontrak '.$kredit->no_kontrak;
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
        return redirect()->route('pembayaran.index');
    }
    public function pembayaran_tolak($id){
        //status 2 ditolak
        $pembayaran = Pembayaran::find($id);
        $pelanggan = Pelanggan::find($pembayaran->pelanggan_id);
        $pembayaran->status = '2';
        $pembayaran->save();
        $kredit = Kredit::join('kredit_details','kredit_details.kredit_id','kredits.id')
                        ->join('barangs','barangs.id','kredits.barang_id')
                        ->where('kredits.pelanggan_id','=',$pelanggan->id)
                        ->where('kredits.sts','=','4')
                        ->selectRaw('kredits.no_kontrak,kredit_details.cicilan,barangs.harga,kredit_details.lama_cicilan')
                        ->first();
        $cicilan = unserialize($kredit->cicilan);
        $harga = $kredit->harga/$kredit->lama_cicilan;
        $total = $cicilan[$pembayaran->angsuran_ke-1]+$harga;
        $msg = 'Kami menolak pembayaran nomer kontrak '.$kredit->no_kontrak;
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
        return redirect()->route('pembayaran.index');
    }
}
