<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreUpdateDetailPlan;
use App\Http\Controllers\Controller;
use App\Models\DetailPlan;
use App\Models\Plan;
use Illuminate\Http\Request;

class DetailPlanController extends Controller
{
    protected $repository, $plan;

    // No construtor é utilizado o Model para atribuir a variável
    public function __construct(DetailPlan $detailPlan, Plan $plan)
    {
        $this->repository = $detailPlan;
        $this->plan = $plan; 
    }
    public function index($urlPlan)
    {
        //Carrega o plan de acordo com a url, se não existir, volta de onde veio
        if(!$plan = $this->plan->where('url', $urlPlan)->first()){
            return redirect()->back();
        }

        // carrega a variável $details do plano usando o relacionamento no model Plan details() 
        $details = $plan->details()->paginate();

        return view('admin.pages.plans.details.index', [
            'plan' => $plan,
            'details' => $details,
        ]);
    }

    public function create($urlPlan)
    {
        if(!$plan = $this->plan->where('url', $urlPlan)->first()){
            return redirect()->back();
        }
        return view('admin.pages.plans.details.create', ['plan' => $plan]);
    }

    public function store(StoreUpdateDetailPlan $request, $urlPlan)
    {
        if(!$plan = $this->plan->where('url', $urlPlan)->first())
        {
            return redirect()->back();
        }

        // $data = $request->all();
        // $data['plan_id'] = $plan->id;
        // $this->repository->create($data);

        // Pega o resultado do relacionamento details(), cria o que foi recebido request
        
        // retorna para a rota de listar os detalhes, passado a url
        // return redirect()->route('details.plan.index', $plan->url);
        //dd($response);
        
        $response = $plan->details()->create($request->all());
        if ($response['success'])
            return redirect()
                        ->route('details.plan.index', $plan->url)
                        ->with('success', $response['message']);


        return redirect()
                    ->back()
                    ->with('error', $response('message'));


    }

    public function edit($urlPlan, $idDetail)
    {
        $plan = $this->plan->where('url', $urlPlan)->first();
        $detail = $this->repository->find($idDetail);

        if(!$plan || !$detail){
            return redirect()->back();
        }

        return view('admin.pages.plans.details.edit', [
            'plan' => $plan,
            'detail' => $detail,
            ]);
    }

    public function update(StoreUpdateDetailPlan $request, $urlPlan, $idDetail)
    {
        $plan = $this->plan->where('url', $urlPlan)->first();
        $detail = $this->repository->find($idDetail);

        if(!$plan || !$detail){
            return redirect()->back();
        }
        // dd($request->all());
        $detail->update($request->all());

        // retorna para a rota de listar os detalhes, passado a url
        return redirect()->route('details.plan.index', $plan->url);
    }

    public function show($urlPlan, $idDetail)
    {
        $plan = $this->plan->where('url', $urlPlan)->first();
        $detail = $this->repository->find($idDetail);

        if(!$plan || !$detail){
            return redirect()->back();
        }

        return view('admin.pages.plans.details.show', [
            'plan' => $plan,
            'detail' => $detail,
            ]);
    }

    public function destroy($urlPlan, $idDetail)
    {
        $plan = $this->plan->where('url', $urlPlan)->first();
        $detail = $this->repository->find($idDetail);

        if(!$plan || !$detail){
            return redirect()->back();
        }
        // dd($request->all());
        $detail->delete();

        // retorna para a rota de listar os detalhes, passado a url
        return redirect()
                    ->route('details.plan.index', $plan->url)
                    ->with('message');
    }


}
