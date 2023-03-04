<?php

namespace App\Http\Controllers\monitoring;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Monitoring;
use Illuminate\Http\Request;

class MonitoringController extends Controller
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
            $monitoring = Monitoring::where('status', 'LIKE', "%$keyword%")
                ->orWhere('reating', 'LIKE', "%$keyword%")
                ->orWhere('lesson_id', 'LIKE', "%$keyword%")
                ->orWhere('student_id', 'LIKE', "%$keyword%")
                ->orWhere('group_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $monitoring = Monitoring::latest()->paginate($perPage);
        }

        return view('monitoring.index', compact('monitoring'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('monitoring.create');
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
			'status' => 'required',
			'reating' => 'required',
			'lesson_id' => 'required',
			'student_id' => 'required',
			'group_id' => 'required'
		]);
        $requestData = $request->all();
        
        Monitoring::create($requestData);

        return redirect('monitoring/monitoring')->with('flash_message', 'Monitoring added!');
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
        $monitoring = Monitoring::findOrFail($id);

        return view('monitoring.show', compact('monitoring'));
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
        $monitoring = Monitoring::findOrFail($id);

        return view('monitoring.edit', compact('monitoring'));
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
			'status' => 'required',
			'reating' => 'required',
			'lesson_id' => 'required',
			'student_id' => 'required',
			'group_id' => 'required'
		]);
        $requestData = $request->all();
        
        $monitoring = Monitoring::findOrFail($id);
        $monitoring->update($requestData);

        return redirect('monitoring/monitoring')->with('flash_message', 'Monitoring updated!');
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
        Monitoring::destroy($id);

        return redirect('monitoring/monitoring')->with('flash_message', 'Monitoring deleted!');
    }
}
