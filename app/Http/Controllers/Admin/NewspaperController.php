<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Newspaper;
use App\Http\Requests\NewspaperRequest;

class NewspaperController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Newspaper::class, 'newspaper');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $newspapers = Newspaper::latest()->get();
        return view('admin.newspapers.index', compact('newspapers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.newspapers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewspaperRequest $request)
    {
        //
        $data = $request->safe()->all();

        $newspaper = new Newspaper();
        $newspaper->fill($data);
        $newspaper->save();

        session()->flash('message', trans('newspapers/flash.store'));
        return to_route('admin.newspapers.edit', ['newspaper' => $newspaper->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Newspaper  $newspaper
     * @return \Illuminate\Http\Response
     */
    public function show(Newspaper $newspaper)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Newspaper  $newspaper
     * @return \Illuminate\Http\Response
     */
    public function edit(Newspaper $newspaper)
    {
        //
        return view('admin.newspapers.edit', compact('newspaper'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Newspaper  $newspaper
     * @return \Illuminate\Http\Response
     */
    public function update(NewspaperRequest $request, Newspaper $newspaper)
    {
        //
        $data = $request->safe()->all();

        $newspaper->fill($data);
        $newspaper->save();

        session()->flash('message', trans('newspapers/flash.update'));
        return to_route('admin.newspapers.edit', ['newspaper' => $newspaper->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Newspaper  $newspaper
     * @return \Illuminate\Http\Response
     */
    public function destroy(Newspaper $newspaper)
    {
        //
        $newspaper->delete();

        session()->flash('message', trans('newspapers/flash.delete'));
        return to_route('admin.newspapers.index');
    }
}
