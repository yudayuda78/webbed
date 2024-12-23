<?php

namespace App\Http\Controllers;

use App\Models\Pretest_result;
use App\Http\Requests\StorePretest_resultRequest;
use App\Http\Requests\UpdatePretest_resultRequest;

class PretestResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StorePretest_resultRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePretest_resultRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pretest_result  $pretest_result
     * @return \Illuminate\Http\Response
     */
    public function show(Pretest_result $pretest_result)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pretest_result  $pretest_result
     * @return \Illuminate\Http\Response
     */
    public function edit(Pretest_result $pretest_result)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePretest_resultRequest  $request
     * @param  \App\Models\Pretest_result  $pretest_result
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePretest_resultRequest $request, Pretest_result $pretest_result)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pretest_result  $pretest_result
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pretest_result $pretest_result)
    {
        //
    }
}
