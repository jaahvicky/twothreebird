<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        return view('questions.one');
    }
    public function indexTwo(Request $request)
    {

        return view('questions.two');
    }
    public function indexThree(Request $request)
    {

        return view('questions.three');
    }
    public function indexFour(Request $request)
    {

        return view('questions.four');
    }
    public function indexFive(Request $request)
    {

        return view('questions.five');
    }

    public function fileupload(Request $request)
    {
        $rules = [
            'file' => 'required|file|mimes:jpeg,png,jpg|max:10240',
        ];
        $inputs = $request->all();
        $validator = \Validator::make($inputs, $rules);
        if ($validator->fails())
        {
          return response()->json(array('status' => false,'inputs'=>$inputs, 'errors'=>$validator->errors()));
        }
        $imageName = time() . '.' . $request->file('file')->getClientOriginalExtension();
        $request->file('file')->move(
            base_path() . '/public/uploads/', $imageName
        );
        $imageFile = url('/').'/uploads/'.$imageName;
        return response()->json(array('status' => true,'image'=>$imageFile));

    }
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect()->route('question.one');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return redirect()->route('question.one');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->route('question.one');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return redirect()->route('question.one');
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
        return redirect()->route('question.one');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return redirect()->route('question.one');
    }
}
