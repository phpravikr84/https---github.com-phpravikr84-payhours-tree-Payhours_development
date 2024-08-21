@extends('administrator.master')
@section('title', __('Branch List'))

@section('main_content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>{{ __('Branch List') }}</h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> {{ __('Dashboard') }}</a></li>
            <li><a>{{ __('Branch Management') }}</a></li>
            <li class="active">{{ __('Branch List') }}</li>
        </ol>
    </section>

    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">{{ __('Branch List') }}</h3>
                <div class="box-tools pull-right">
                    <a href="{{ route('branches.create') }}" class="btn btn-primary">{{ __('Add Branch') }}</a>
                </div>
            </div>
            <div class="box-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">{{ $message }}</div>
                @endif
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>{{ __('Branch Code') }}</th>
                            <th>{{ __('Branch Name') }}</th>
                            <th>{{ __('Branch Address') }}</th>
                            <th>{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($branches as $branch)
                            <tr>
                                <td>{{ $branch->branch_code }}</td>
                                <td>{{ $branch->branch_name }}</td>
                                <td>{{ $branch->branch_address }}</td>
                                
                                <td>
                                    <a href="{{ route('branches.edit', $branch->id) }}" class="btn btn-sm btn-info">{{ __('Edit') }}</a>
                                    <form action="{{ route('branches.destroy', $branch->id) }}" method="POST" style="display:inline;">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-sm btn-danger">{{ __('Delete') }}</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection
