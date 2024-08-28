@extends('administrator.master')
@section('title', __('Period Definition Rates'))

@section('main_content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>{{ __('Period Definition Rates') }}</h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> {{ __('Dashboard') }}</a></li>
            <li><a>{{ __('Period Management') }}</a></li>
            <li class="active">{{ __('Period Definition Rates') }}</li>
        </ol>
    </section>

    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">{{ __('Period Definition Rates List') }}</h3>
                <div class="box-tools pull-right">
                    <a href="{{ route('period_defination_rates.create') }}" class="btn btn-primary">{{ __('Add Period Definition Rate') }}</a>
                </div>
            </div>
            <div class="box-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">{{ $message }}</div>
                @endif
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>{{ __('Code') }}</th>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Pay Unit') }}</th>
                            <th>{{ __('Pays Per Year') }}</th>
                            <th>{{ __('Hours Per Day') }}</th>
                            <th>{{ __('Rate Per Pay Unit Hours') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($periodDefinationRates as $rate)
                            <tr>
                                <td>{{ $rate->code }}</td>
                                <td>{{ $rate->name }}</td>
                                <td>{{ $rate->pay_unit }}</td>
                                <td>{{ $rate->pays_per_year }}</td>
                                <td>{{ $rate->hours_per_day }}</td>
                                <td>{{ $rate->rate_per_pay_unit_hours }}</td>
                                <td>
                                    <a href="{{ route('period_defination_rates.edit', $rate->id) }}" class="btn btn-sm btn-info">{{ __('Edit') }}</a>
                                    <form action="{{ route('period_defination_rates.destroy', $rate->id) }}" method="POST" style="display:inline;">
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
