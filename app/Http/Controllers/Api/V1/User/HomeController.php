<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Interfaces\V1\User\HomeRepositoryInterface;
use App\Http\Resources\V1\User\ServiceCarCategoryResources;
use App\Http\Requests\V1\User\CalculateBrandCostRequest;
use App\Http\Requests\V1\User\ServiceQuestionsRequest;
use App\Http\Resources\V1\User\QuestionsResources;
use App\Http\Resources\V1\User\ServicesResources;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    protected $homeRepo;

    public function __construct(HomeRepositoryInterface $homeRepo)
    {
        $this->homeRepo = $homeRepo;
    }

    public function services(Request $request)
    {
        $data = $this->homeRepo->services($request);
        $data = (ServicesResources::collection($data))->response()->getData(true);
        return response()->json(msgdata(success(), trans('lang.success'), $data));
    }

    public function serviceQuestions(ServiceQuestionsRequest $request)
    {
        $data = $this->homeRepo->serviceQuestions($request);
        $data = QuestionsResources::collection($data);
        return response()->json(msgdata(success(), trans('lang.success'), $data));
    }

    public function calculateBrandCost(CalculateBrandCostRequest $request)
    {
        $data = $this->homeRepo->calculateBrandCost($request);
        if ($data) {
            $data = new ServiceCarCategoryResources($data);
            return response()->json(msgdata(success(), trans('lang.success'), $data));

        }else{
            return response()->json(msg(failed(), trans('lang.no_price_for_this_car_model')));

        }

    }

}
