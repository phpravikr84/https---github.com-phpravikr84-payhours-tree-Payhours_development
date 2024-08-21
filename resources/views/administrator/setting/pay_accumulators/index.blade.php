@extends('administrator.master')
@section('title', __('Pay Accumulator List'))

@section('main_content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>{{ __('Pay Accumulator List') }}</h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> {{ __('Dashboard') }}</a></li>
            <li><a>{{ __('Pay Accumulator Management') }}</a></li>
            <li class="active">{{ __('Pay Accumulator List') }}</li>
        </ol>
    </section>

    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">{{ __('Pay Accumulator List') }}</h3>
                <div class="box-tools pull-right">
                    <a href="{{ route('pay_accumulators.create') }}" class="btn btn-primary">{{ __('Add Pay Accumulator') }}</a>
                </div>
            </div>
            <div class="box-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">{{ $message }}</div>
                @endif
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>{{ __('Pay Accumulator Code') }}</th>
                            <th>{{ __('Pay Accumulator Name') }}</th>
                            <th>{{ __('Status') }}</th>
                            <th>{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($payAccumulators as $payAccumulator)
                            <tr>
                                <td>{{ $payAccumulator->pay_accumulator_code }}</td>
                                <td>{{ $payAccumulator->pay_accumulator_name }}</td>
                                <td>{{ $payAccumulator->status == 1 ? __('Active') : __('Inactive') }}</td>
                                <td>
                                    <a href="{{ route('pay_accumulators.edit', $payAccumulator->id) }}" class="btn btn-sm btn-info">{{ __('Edit') }}</a>
                                    <form action="{{ route('pay_accumulators.destroy', $payAccumulator->id) }}" method="POST" style="display:inline;">
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
