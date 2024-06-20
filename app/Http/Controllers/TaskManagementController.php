<?php
namespace App\Http\Controllers;
use App\Http\Requests\TaskCreateRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Services\UserTaskServices;
use Illuminate\Http\Request;

class TaskManagementController extends Controller
{
    protected $userTaskServices;

    public function __construct(UserTaskServices $userTaskServices)
    {
        $this->userTaskServices = $userTaskServices;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userdata = $this->userTaskServices->getAllTasksByUserId(auth()->id());
        return view('home', compact('userdata'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('showaddformtask ');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskCreateRequest $request)
    {
        $data = $request->validated();
        try {
            $data['user_id'] = auth()->id();
            $this->userTaskServices->createTask($data);
            return redirect()->route('home')->with('success', 'Task created successfully');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $uuid)
    {
        try {
            $task = $this->userTaskServices->findTaskByUuid($uuid);
            return view('showeditformtask', compact('task'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskUpdateRequest $request, string $id)
    {
        $data = $request->validated();
        try {
            $this->userTaskServices->updateTask($id, $data);
            return redirect()->route('home')->with('success', 'Task updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $this->userTaskServices->deleteTask($id);
            return redirect()->route('home')->with('success', 'Task deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Update the task status.
     */
    public function updateTaskStatus(int $id, Request $request)
    {
        $status = $request->status;
        try {
            $this->userTaskServices->updateTaskStatus($id, $status);
            return redirect()->route('home')->with('success', 'Task status updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

}
