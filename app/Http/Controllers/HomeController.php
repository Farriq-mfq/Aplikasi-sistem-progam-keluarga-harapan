<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use App\Models\Criteria;
use App\Models\Result;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function Index()
    {
        $info = [
            'total_alternative'=>Alternative::count(),
            'total_survey'=>Result::count(),
            'total_criteria'=>Criteria::count(),
            'total_lulus'=>Result::lulus()->count(),
            'result'=>Result::limit(5)->orderBy('total','DESC')->join('alternative','alternative.id','=','result.alternative_id')->get()
        ];
        return Inertia::render('Index',['info'=>$info]);
    }
}
