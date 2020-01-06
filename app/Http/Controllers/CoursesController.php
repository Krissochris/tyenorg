<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Course $model)
    {
        return view('pages.course.index', ['courses' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.course.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => ['required', 'string', 'max:255', 'unique:courses'],
            'body' => ['required', 'string'],
            'category_id' => ['integer', 'required'],
            'tutor_id' => ['integer', 'required'],
            'total_no_of_users_in_batch' => ['required', 'integer'],
            'total_no_of_referrals' => ['required', 'integer'],
            'price' => ['required', 'integer'],
            'status' => ['required', 'integer'],
            'photo' => 'image|nullable|max:1999'
        ]);

        //Create Course
        $postData = new Course();
        $postData->title = $request->input('title');
        $postData->description = $request->input('description');
        $postData->category_id = $request->input('category');
        $postData->tutor_id = auth()->user()->id;
        $postData->total_no_of_referrals = $request->input('referrals');
        $postData->price = $request->input('price');
        $postData->status = (0);
        //$postData->photo = $fileNameToStore;
        $postData->save();

        return redirect('/course');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return view('pages.course.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $course)
    {
        $this->validate($request, [
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string'],
            'category_id' => ['integer', 'required'],
            'tutor_id' => ['integer', 'required'],
            'total_no_of_users_in_batch' => ['required', 'integer'],
            'total_no_of_referrals' => ['required', 'integer'],
            'price' => ['required', 'integer'],
            'status' => ['required', 'integer'],
            'photo' => 'image|nullable|max:1999'
        ]);

        //Create Course
        $postData = new Course();
        $postData->title = $request->input('title');
        $postData->description = $request->input('description');
        $postData->category_id = $request->input('category');
        $postData->tutor_id = auth()->user()->id;
        $postData->total_no_of_referrals = $request->input('referrals');
        $postData->price = $request->input('price');
        $postData->status = (0);
        //$postData->photo = $fileNameToStore;
        $postData->save();

        return redirect()->route('course.index')->withStatus(__('Course successfully updated.'));
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
