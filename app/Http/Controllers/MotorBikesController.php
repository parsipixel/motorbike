<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMotorBikeRequest;
use App\Jobs\MotorBike\CreateMotorBikeJob;
use App\MotorBike;
use DB;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MotorBikesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $order    = $request->get('order') ?: 'id';
        $filter   = $request->get('color') ?: 'Null';
        $operator = $filter == 'Null' ? '<>' : '=';

        $motorbikes = Motorbike::with('image')->where('color', $operator, $filter)->orderBy($order)->paginate(5);

        $colors = array_unique(DB::table('motorbikes')->lists('color'));

        return view('home', compact('motorbikes', 'colors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('motorbike.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateMotorBikeRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateMotorBikeRequest $request)
    {
        $motorbike = $this->dispatch(new CreateMotorBikeJob(
            $request->only(['name', 'cc', 'color', 'weight', 'price']),
            $request->file('image')
        ));

        $request->session()->flash('status', 'Task was successful!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $motorbike = MotorBike::find($id);
        return view('motorbike.show', compact('motorbike'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
