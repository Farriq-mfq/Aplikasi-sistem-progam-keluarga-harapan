<?php

namespace App\Http\Controllers;
use App\Models\AlternativeValue;
use App\Models\Alternative;
use App\Models\Criteria;
use App\Models\CriteriaOption;
use App\Models\Result;
use Faker\Core\Number;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class PenilaianController extends Controller
{
    public function index(Request $request)
    {
        $penilaian = $this->get_nilai($request);
        return Inertia::render('Penilaian/Index',['penilaian'=>$penilaian]);
    }
    public function checkNik(Request $request)
    {
        $request->validate([
            'NIK'=>'required'
        ]);

        $check = Alternative::where('NIK',$request->NIK)->first();
        if($check == null){
            return back()->withErrors(['NIK'=>['NIK tidak di temukan']]);
        }else{
            session()->put('data_alternative',$check);
            return redirect()->route('penilaian.survey');
        }
    }
    public function insertPenilaian(Request $request)
    {
        $request->validate([
            'alternative_id'=>'required',
            'criteria_id'=>'required',
            'criteria_option_id'=>'required',
        ],
        [
            'criteria_option_id.required'=>'Criteria opsi belum dipilih'
        ]
    );
        $insert = AlternativeValue::create([
            'alternative_id'=>$request->alternative_id,
            'criteria_id'=>$request->criteria_id,
            'criteria_option_id'=>$request->criteria_option_id,
            'weight'=>DB::table('criteria')->where('id',$request->criteria_id)->select('weight')->first()->weight,
            'value'=> DB::table('criteria_option')->where('id',$request->criteria_option_id)->select('value')->first()->value
        ]);    
        if($insert){
            return session()->flash('alert',['type'=>'success','message'=>'Berhasil Menambahkan Alternative']);
        }   
    }
    public function survey()
    {
        if(session()->missing('data_alternative')){
            return redirect()->route('penilaian.index');
        }
        $criteria = Criteria::all();
        $arr = [];
        foreach($criteria as $cre){
            $arr[] = [
                'criteria'=>$cre,
                'criteria_options'=>CriteriaOption::where('criteria_id',$cre->id)->get(),
                'alternative_value'=>AlternativeValue::where('criteria_id',$cre->id)->where('alternative_id',session()->get('data_alternative')->id)->first(),
            ];
        }
        return Inertia::render('Penilaian/Survey',['criterias'=>$arr,'data_alternative'=> session()->get('data_alternative')]);
    }
    public function insertRes(Request $request)
    {
        foreach ($request->data as $res) {
            if($res['total'] != 0){
                if(Result::where('alternative_id',$res['id'])->first() == null){
                    Result::create([
                        'alternative_id'=>$res['id'],
                        'total'=>$res['total']
                    ]);
                }else{
                    Result::where('alternative_id',$res['id'])->update([
                        'alternative_id'=>$res['id'],
                        'total'=>$res['total']
                    ]);
                }
            }
        }
    }
    protected function get_nilai($rq){
        $criterias = Criteria::all();
        if($rq->search){
            $alternative = Alternative::where('name','LIKE','%'.$rq->search.'%')->get();
        }else{
            $alternative = Alternative::all();
        }
        $arr = [];
        foreach($criterias as $cr){
            $arr[$cr->id] = []; 
            foreach($alternative as $al){
                foreach($al->nilai as $nilai){
                    if($nilai->criteria->id == $cr->id){
                        $arr[$cr->id][] = $nilai->value; 
                    }
                }
            }
            if(count($arr[$cr->id])){
                if($cr->attribute == 'cost'){
                    $arr[$cr->id] = min($arr[$cr->id]); 
                }elseif($cr->attribute == 'benefit'){
                    $arr[$cr->id] = max($arr[$cr->id]); 
                }
            }
        }
        return [
            'criteria'=>$criterias,
            'alternative'=>$alternative,
            'nilai'=>$arr
        ];
    }   
}
