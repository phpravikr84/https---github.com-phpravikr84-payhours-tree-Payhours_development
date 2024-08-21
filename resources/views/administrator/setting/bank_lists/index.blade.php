@extends('administrator.master')
@section('title', __('Bank List'))

@section('main_content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>{{ __('Bank List') }}</h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> {{ __('Dashboard') }}</a></li>
            <li><a>{{ __('Bank Management') }}</a></li>
            <li class="active">{{ __('Bank List') }}</li>
        </ol>
    </section>

    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">{{ __('Bank List') }}</h3>
                <div class="box-tools pull-right">
                    <a href="{{ route('banks.create') }}" class="btn btn-primary">{{ __('Add Bank') }}</a>
                </div>
            </div>
            <div class="box-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">{{ $message }}</div>
                @endif
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>{{ __('Bank Code') }}</th>
                            <th>{{ __('Bank Name') }}</th>
                            <th>{{ __('Publication Status') }}</th>
                            <th>{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($banks as $bank)
                            <tr>
                                <td>{{ $bank->bank_code }}</td>
                                <td>{{ $bank->bank_name }}</td>
                                <td>{{ $bank->status == 1 ? __('Published') : __('Unpublished') }}</td>
                                <td>
                                    <a href="{{ route('banks.edit', $bank->id) }}" class="btn btn-sm btn-info">{{ __('Edit') }}</a>
                                    <form action="{{ route('banks.destroy', $bank->id) }}" method="POST" style="display:inline;">
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
