<?php

namespace App\Http\Controllers;

use App\Year;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class YearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        //
        //$years = new Year();
        $years = Year::all();
//        $years = DB::table('years')->get();
        return $years;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        return "is alo woring";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
        $year = new Year();
        $year->year = $request->year;
        if( $year->save())
            return "success";
        else
            return "failed";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Year  $year
     * @return Response
     */
    public function show(Year $year)
    {
        //
        return "hello";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Year  $year
     * @return Response
     */
    public function edit(Year $year): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  \App\Year  $year
     * @return Response
     */
    public function update(Request $request, Year $year): Response
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Year  $year
     * @return Response
     */
    public function destroy(Year $year): Response
    {
        //
    }
}
