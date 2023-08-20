<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Interfaces\V1\User\HomeRepositoryInterface;
use App\Http\Requests\V1\User\Trip\HomepageRequest;
use App\Http\Requests\V1\User\Trip\TripsByDepartmentRequest;
use App\Http\Resources\V1\User\HomepageDepartmentResources;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\User\HomepageTripResources;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    protected $homeRepo;

    public function __construct(HomeRepositoryInterface $homeRepo)
    {
        $this->homeRepo = $homeRepo;
    }

    public function homePage(HomepageRequest $request)
    {
        $request->validated();

        $departments = HomepageDepartmentResources::collection($this->homeRepo->activeMainDepartments());

        $suggestedTrips = $this->homeRepo->suggestedTrips($departments,$request);

        return response()->json(msgdata(success(), trans('lang.success'),
            array_merge(['departments' => $departments], $suggestedTrips)
        ));

    }

    public function getTripsByDepartment(TripsByDepartmentRequest $request)
    {
        $request->validated();

        $trips = $this->homeRepo->getTripsByDepartment($request);

        return response()->json(msgdata(success(), trans('lang.success'),
            HomepageTripResources::collection($trips)
        ));

    }

}
