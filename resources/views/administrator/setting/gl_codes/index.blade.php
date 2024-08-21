@extends('administrator.master')
@section('title', __('GL Code List'))

@section('main_content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>{{ __('GL Code List') }}</h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> {{ __('Dashboard') }}</a></li>
            <li><a>{{ __('GL Code Management') }}</a></li>
            <li class="active">{{ __('GL Code List') }}</li>
        </ol>
    </section>

    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">{{ __('GL Code List') }}</h3>
                <div class="box-tools pull-right">
                    <a href="{{ route('gl_codes.create') }}" class="btn btn-primary">{{ __('Add GL Code') }}</a>
                </div>
            </div>
            <div class="box-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">{{ $message }}</div>
                @endif
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>{{ __('GL Code') }}</th>
                            <th>{{ __('GL Name') }}</th>
                            <th>{{ __('Status') }}</th>
                            <th>{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($glCodes as $glCode)
                            <tr>
                                <td>{{ $glCode->gl_code }}</td>
                                <td>{{ $glCode->gl_name }}</td>
                                <td>{{ $glCode->status == 1 ? __('Active') : __('Inactive') }}</td>
                                <td>
                                    <a href="{{ route('gl_codes.edit', $glCode->id) }}" class="btn btn-sm btn-info">{{ __('Edit') }}</a>
                                    <form action="{{ route('gl_codes.destroy', $glCode->id) }}" method="POST" style="display:inline;">
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
