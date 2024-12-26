<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRemunerationFormRequest;
use App\Http\Requests\UpdateRemunerationFormRequest;
use App\Http\Resources\Admin\RemunerationFormResource;
use App\RemunerationForm;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RemunerationFormsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('remuneration_form_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RemunerationFormResource(RemunerationForm::with(['status', 'created_by'])->get());
    }

    public function store(StoreRemunerationFormRequest $request)
    {
        $remunerationForm = RemunerationForm::create($request->all());

        return (new RemunerationFormResource($remunerationForm))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(RemunerationForm $remunerationForm)
    {
        abort_if(Gate::denies('remuneration_form_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RemunerationFormResource($remunerationForm->load(['status', 'created_by']));
    }

    public function update(UpdateRemunerationFormRequest $request, RemunerationForm $remunerationForm)
    {
        $remunerationForm->update($request->all());

        return (new RemunerationFormResource($remunerationForm))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(RemunerationForm $remunerationForm)
    {
        abort_if(Gate::denies('remuneration_form_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $remunerationForm->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
