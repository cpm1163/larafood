<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DetailPlan;
use App\Models\Plan;
use Illuminate\Http\Request;

class DetailPlanController extends Controller
{
    protected $repository, $plan;

    public function __construct(DetailPlan $detailPlan, Plan $plan)
    {
        $this->repository = $detailPlan;
        $this->plan = $plan; 
    }
    public function index($urlPlan)
    {
        //Carrega o plan com o detalhe de url = informado na rota 
        if(!$plan = $this->plan->where('url', $urlPlan)->first())
        {
            // Não achou o detalhe e volta
            return redirect()->back();
        }

        // Localizou
        // $details = $plan->details();
        $details = $plan->details()->paginate();


        return view('admin.pages.plans.details.index', [
            'plan' => $plan,
            'details' => $details,
        ]);
    }

    public function create($urlPlan)
    {
        //Carrega o plan com o detalhe de url = informado na rota 
        if(!$plan = $this->plan->where('url', $urlPlan)->first())
        {
            // Não achou o detalhe e volta
            return redirect()->back();
        }
        // Localizou
        return view('admin.pages.plans.details.create', [
            'plan' => $plan,
        ]);

    }

    public function store(Request $request)
    {
        dd($request->all());
    }
}
