<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\survey;
use App\hasil_survey;
use App\Pelanggan;
use Illuminate\Support\facades\Session;
class SurveyController extends Controller
{
    //
    public function index(){
        // $kredits =Kredit::where('kredits.sts',1)
        //                                 ->join('pelanggans','kredits.pelanggan_id','=','pelanggans.id')
        //                                 ->join('barangs','kredits.barang_id','=','barangs.id')
        //                                 ->join('vendors','vendors.id','=','barangs.vendor_id')
        //                                 ->selectRaw('pelanggans.*,kredits.id as kredit_id, vendors.nama as vendor_nama, barangs.harga,barangs.nama as nama_brng')
        //                                 ->get();
        // return view('pemilik.survey.index',compact('kredits'));
        $surveys = survey::all();
        return view('karyawan.survey.index',compact('surveys'));
    }
    public function store(request $request){
        $survey = survey::create($request->all());
        if($survey){
            Session::flash('add','Data Berhasil Ditambahkan');
        }else{
            Session::flash('add_e','Data Gagal Ditambahkan');
        }
        return redirect('/survey');

    }
    public function update(request $request, $id){
        $survey = survey::find($id);
        if($survey->update($request->all())){
            Session::flash('edit','Data Berhasil Diubah');
        }else{
            Session::flash('edit_e','Data Gagal Diubah');
        }
        return redirect('/survey');

    }
    public function destroy($id){
        $survey = survey::find($id);
        if($survey->delete()){
            Session::flash('hapus','Data Berhasil Dihapus');
        }else{
            Session::flash('hapus_e','Data Gagal Dihapus');
        }
        return redirect('/survey');
    }
    public function pertayaan(){
        $pelanggans = Pelanggan::all()->where('sts','=','1');
        return view('karyawan.survey.pertanyaan',compact('pelanggans'));
    }
    public function olah($id){
        $pelanggan = Pelanggan::find($id);
        $hasilSurveys = hasil_survey::where('pelanggan_id','=',$id)
                                    ->join('surveys','surveys.id','hasil_surveys.survey_id')
                                    ->selectRaw('surveys.pertanyaan, hasil_surveys.jawaban, hasil_surveys.id')
                                    ->get();
        $surveys = survey::where('jenis','like',$pelanggan->pekerjaan)->get();
        
        return view('karyawan.survey.olah',compact('pelanggan','surveys','hasilSurveys'));
        // return $surveys;
    }
    public function simpan(request $request){
        $survey_id = $request->survey_id;
        $pertanyaan = $request->pertanyaan;
        // foreach ($request->survey_id as $item ) {
        //     $hasil_survey = new hasil_survey;
        //     $hasil_survey->pelanggan_id = $request->pelanggan_id;
        //     $hasil_survey->survey_id = $item->survey_id;
        // }
        for ($i=0; $i < sizeof($request->survey_id) ; $i++) {
            # code...
            $hasil_survey = new hasil_survey;
            $hasil_survey->pelanggan_id = $request->pelanggan_id;
            $hasil_survey->survey_id = $survey_id[$i];
            $hasil_survey->jawaban = $pertanyaan[$i];
            $hasil_survey->save();
        }
        return redirect()->route('survey.olah', $hasil_survey->pelanggan_id);
    }
    public function hapus_hasil($id){
        $survey = hasil_survey::find($id);
        $survey->delete();
        return redirect()->route('survey.olah', $survey->pelanggan_id);
    }
    public function edit_hasil(request $request, $id){
        $survey = hasil_survey::find($id);
        $survey->update($request->all());
        return redirect()->route('survey.olah', $survey->pelanggan_id);
    }
}
