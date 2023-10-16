<?php

namespace App\Http\Controllers;

use App\Models\TicketSupport;
use App\Http\Requests\StoreTicketSupportRequest;
use App\Http\Requests\UpdateTicketSupportRequest;

class TicketSuportController extends Controller
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
     * @param  \App\Http\Requests\StoreTicketSupportRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTicketSupportRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TicketSupport  $ticketSupport
     * @return \Illuminate\Http\Response
     */
    public function show(TicketSupport $ticketSupport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TicketSupport  $ticketSupport
     * @return \Illuminate\Http\Response
     */
    public function edit(TicketSupport $ticketSupport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTicketSupportRequest  $request
     * @param  \App\Models\TicketSupport  $ticketSupport
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTicketSupportRequest $request, TicketSupport $ticketSupport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TicketSupport  $ticketSupport
     * @return \Illuminate\Http\Response
     */
    public function destroy(TicketSupport $ticketSupport)
    {
        //
    }
}
