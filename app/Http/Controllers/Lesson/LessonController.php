<?php

namespace App\Http\Controllers\Lesson;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Lesson;
use App\Models\Group;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $lesson = Lesson::where('name', 'LIKE', "%$keyword%")
                ->orWhere('group_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $lesson = Lesson::latest()->paginate($perPage);
        }

        return view('lesson.index', compact('lesson'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $groups = Group::all();

        return view('lesson.create', compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'name' => 'required',
			'group_id' => 'required'
		]);
        $requestData = $request->all();
        
        Lesson::create($requestData);

        return redirect('lesson/lesson')->with('flash_message', 'Lesson added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $lesson = Lesson::findOrFail($id);

        return view('lesson.show', compact('lesson'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $lesson = Lesson::findOrFail($id);
        $groups = Group::all();


        return view('lesson.edit', compact('lesson','groups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'name' => 'required',
			'group_id' => 'required'
		]);
        $requestData = $request->all();
        
        $lesson = Lesson::findOrFail($id);
        $lesson->update($requestData);

        return redirect('lesson/lesson')->with('flash_message', 'Lesson updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Lesson::destroy($id);

        return redirect('lesson/lesson')->with('flash_message', 'Lesson deleted!');
    }
    public function filter($id)
    {
        $lesson = Lesson::where('group_id', $id)->paginate(20);
        
        return view('lesson.index',  compact('lesson'));
    }
}
