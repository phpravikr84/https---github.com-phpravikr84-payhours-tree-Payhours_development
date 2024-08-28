@extends('administrator.master')
@section('title', __('GL Interface Control Files'))

@section('main_content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>{{ __('GL Interface Control Files') }}</h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> {{ __('Dashboard') }}</a></li>
            <li><a>{{ __('GL Interface Management') }}</a></li>
            <li class="active">{{ __('Control Files List') }}</li>
        </ol>
    </section>

    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">{{ __('Control Files List') }}</h3>
                <div class="box-tools pull-right">
                    <a href="{{ route('gl_interface_control_files.create') }}" class="btn btn-primary">{{ __('Add Control File') }}</a>
                </div>
            </div>
            <div class="box-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">{{ $message }}</div>
                @endif
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>{{ __('Control Setup Name') }}</th>
                            <th>{{ __('GL Code Account Name') }}</th>
                            <th>{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($controlFiles as $controlFile)
                            <tr>
                                <td>{{ $controlFile->control_setup_name }}</td>
                                <td>{{ $controlFile->gl_code_account_name }}</td>
                                <td>
                                    <a href="{{ route('gl_interface_control_files.edit', $controlFile->id) }}" class="btn btn-sm btn-info">{{ __('Edit') }}</a>
                                    <form action="{{ route('gl_interface_control_files.destroy', $controlFile->id) }}" method="POST" style="display:inline;">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
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
