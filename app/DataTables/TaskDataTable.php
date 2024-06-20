<?php
namespace App\DataTables;

use App\Models\UserTaskList;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable as Db;
use App\Services\UserTaskServices;
use Yajra\DataTables\DataTableAbstract;

/**
 * Class TaskDataTable
 *
 * DataTable class for rendering tasks data.
 *
 * @package App\DataTables
 */
class TaskDataTable extends Db
{
    /**
     * @var UserTaskServices The service for handling task-related operations.
     */
    protected $taskService;

    /**
     * TaskDataTable constructor.
     *
     * @param UserTaskServices $taskService The service for handling task-related operations.
     */
    public function __construct(UserTaskServices $taskService)
    {
        $this->taskService = $taskService;
    }

    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return DataTableAbstract
     */
    public function dataTable(QueryBuilder $query): DataTableAbstract
    {
        return DataTables::eloquent($query)
            ->addColumn(
                'actions',
                function (UserTaskList $task) {
                    return view('admin.task.actions')
                        ->with('taskId', $task->id)
                        ->with('taskUuid', $task->uuid);
                }
            )
            ->editColumn(
                'status',
                function (UserTaskList $task) {
                    return view('admin.layouts.partials.status')->with([
                        'status' => $task->status,
                        'tableId' => 'tasks-table',
                        'url' => route('tasks.update-status', ['task' => $task->id]),
                    ]);
                }
            )
            ->editColumn(
                'due_date',
                function (UserTaskList $task) {
                    return date('d-m-Y', strtotime($task->due_date));
                }
            )
            ->editColumn(
                'created_at',
                function (UserTaskList $task) {
                    return $task->created_at->format('Y-m-d H:i:s');
                }
            )
            ->editColumn(
                'updated_at',
                function (UserTaskList $task) {
                    return $task->updated_at->format('Y-m-d H:i:s');
                }
            );
    }

    /**
     * Build the query source of dataTable.
     *
     * @return QueryBuilder
     */
    public function query(): QueryBuilder
    {

        // return $this->taskService->getTasksQuery();
    }

    /**
     * Optional method if you want to use the html builder for task listing.
     *
     * @return HtmlBuilder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()->setTableId('tasks-table')->columns($this->getColumns())
            ->dom('lfrtip')->minifiedAjax()->orderBy(0);
    }

    /**
     * Get the dataTable columns definition for tasks.
     *
     * @return array
     */
    protected function getColumns(): array
    {
        return [
            Column::make('id')->title('Sr.no'),
            Column::make('task_name')->title('Task Name'),
            Column::make('description')->title('Description'),
            Column::make('due_date')->title('Due Date'),
            Column::make('status')->title('Status'),
            Column::make('actions')->title('Action')->searchable(false)->orderable(false),
        ];
    }
}
