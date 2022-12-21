<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Traits\ApiHelperTrait as TraitsApiHelperTrait;
use App\Models\Governorate;
use Illuminate\Http\Request;

class GovernoratesController extends Controller
{
    use TraitsApiHelperTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Governorates = Governorate::select('id', 'status', 'governorate_name_' . app()->getLocale() . ' as name')->get();
        if ($Governorates) {
            return $this->successResponse('Governorates', $Governorates, 200, 'done');
        } else {

            return $this->errorResponse('Governorate not found', 404);
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $Governorate = Governorate::select('id', 'status', 'governorate_name_' . app()->getLocale() . ' as name')->find($request->id);
        if ($Governorate) {
            return $this->successResponse("Governorate", $Governorate, 200, 'done');
        } else {

            return $this->errorResponse('Governorate not found', 404);
        }
    }
    public function active(Request $request)
    {
        try {
            $Governorate = Governorate::findOrFail($request->id);
            $Governorate->status = $request->active;
            $Governorate->save();
            return $this->successMessage('تم التحديث بنجاح');
        } catch (\Throwable $th) {
            return $this->errorResponse('حدث خطا ما ', 404);
        }
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
