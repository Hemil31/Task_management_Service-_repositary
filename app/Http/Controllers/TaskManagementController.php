<?php
namespace App\Http\Controllers;

use App\Http\Requests\TaskCreateRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Services\UserTaskServices;
use Illuminate\Http\Request;

/**
 * Summary of TaskManagementController
 */
class TaskManagementController extends Controller
{
    /**
     * Summary of userTaskServices
     * @var
     */
    protected $userTaskServices;

    /**
     * Summary of __construct
     * @param \App\Services\UserTaskServices $userTaskServices
     */
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
     *
     */
    public function create()
    {
        return view('showaddformtask ');
    }

    /**
     * Store a newly created resource in storage.
     * @param TaskCreateRequest $request
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
     * @param string $uuid
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
     * @param TaskUpdateRequest $request
     */
    public function update(TaskUpdateRequest $request, string $uuid)
    {
        $data = $request->validated();
        try {
            $this->userTaskServices->updateTask($uuid, $data);
            return redirect()->route('home')->with('success', 'Task updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param string $uuid
     */
    public function destroy(string $uuid)
    {
        try {
            $this->userTaskServices->deleteTask($uuid);
            return redirect()->route('home')->with('success', 'Task deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Update the task status.
     * @param string $uuid
     * @param Request $request
     */
    public function updateTaskStatus(string $uuid, Request $request)
    {
        $status = $request->status;
        try {
            $this->userTaskServices->updateTaskStatus($uuid, $status);
            return redirect()->route('home')->with('success', 'Task status updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

}
