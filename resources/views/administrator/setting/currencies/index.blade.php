@extends('administrator.master')
@section('title', __('Currency List'))

@section('main_content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>{{ __('Currency List') }}</h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> {{ __('Dashboard') }}</a></li>
            <li class="active">{{ __('Currencies') }}</li>
        </ol>
    </section>

    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">{{ __('Currency List') }}</h3>
                <a href="{{ route('currencies.create') }}" class="btn btn-primary pull-right">{{ __('Add Currency') }}</a>
            </div>
            <div class="box-body">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>{{ __('Code') }}</th>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Exchange Rate') }}</th>
                            <th>{{ __('Exchange Currency') }}</th>
                            <th>{{ __('Last ER Update') }}</th>
                            <th>{{ __('Status') }}</th>
                            <th>{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($currencies as $currency)
                        <tr>
                            <td>{{ $currency->currency_code }}</td>
                            <td>{{ $currency->currency_name }}</td>
                            <td>{{ $currency->exchange_rate }}</td>
                            <td>{{ $currency->exchange_currency }}</td>
                            <td>{{ $currency->last_er_update }}</td>
                            <td>{{ $currency->status ? __('Active') : __('Inactive') }}</td>
                            <td>
                                <a href="{{ route('currencies.edit', $currency->id) }}" class="btn btn-info">{{ __('Edit') }}</a>
                                <form action="{{ route('currencies.destroy', $currency->id) }}" method="POST" style="display:inline-block;">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('{{ __('Are you sure?') }}')">{{ __('Delete') }}</button>
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
