@extends('layouts.master')
@section('title', 'Homepage')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            {{ $dataTable->table(['class' => 'table table-bordered']) }}
        </div>
    </div>
</div>
@endsection

@push('scripts')
{{ $dataTable->scripts() }}
@endpush
