<?php

namespace App\DataTables;

use App\Services\UserTaskServices;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Services\DataTable;

class TasksDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addIndexColumn()
            ->addColumn('status', function ($task) {
                return view('status', compact('task'));
            })
            ->addColumn('action', function ($task) {
                return view('action', compact('task'));
            })
            ->rawColumns(['action']);
    }

    public function query(UserTaskServices $userTaskServices)
    {
        return $userTaskServices->getAllTasksByUserId(auth()->user()->id);
    }

    public function html()
    {
        return $this->builder()
            ->setTableId('tasks-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(0) // Order by first column (id)
            ->buttons(
                Button::make('create'),
                Button::make('export'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            );
    }

    protected function getColumns()
    {
        return [
            Column::computed('DT_RowIndex') // Index column
                ->title('Index')
                ->exportable(false)
                ->printable(false)
                ->width(30)
                ->addClass('text-center'),
            Column::make('task_name'),
            Column::make('description'),
            Column::make('due_date')->title('Due Date'),
            Column::make('status'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    protected function filename(): string
    {
        return 'Tasks_' . date('YmdHis');
    }
}
