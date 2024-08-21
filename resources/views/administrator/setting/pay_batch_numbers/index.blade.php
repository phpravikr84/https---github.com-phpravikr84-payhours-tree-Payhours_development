@extends('administrator.master')
@section('title', __('Pay Batch Number List'))

@section('main_content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>{{ __('Pay Batch Number List') }}</h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> {{ __('Dashboard') }}</a></li>
            <li><a>{{ __('Pay Batch Management') }}</a></li>
            <li class="active">{{ __('Pay Batch Number List') }}</li>
        </ol>
    </section>

    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">{{ __('Pay Batch Number List') }}</h3>
                <div class="box-tools pull-right">
                    <a href="{{ route('pay_batch_numbers.create') }}" class="btn btn-primary">{{ __('Add Pay Batch Number') }}</a>
                </div>
            </div>
            <div class="box-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">{{ $message }}</div>
                @endif
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>{{ __('Batch Number Code') }}</th>
                            <th>{{ __('Batch Number Name') }}</th>
                            <th>{{ __('Publication Status') }}</th>
                            <th>{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($payBatchNumbers as $payBatchNumber)
                            <tr>
                                <td>{{ $payBatchNumber->pay_batch_number_code }}</td>
                                <td>{{ $payBatchNumber->pay_batch_number_name }}</td>
                                <td>{{ $payBatchNumber->status == 1 ? __('Published') : __('Unpublished') }}</td>
                                <td>
                                    <a href="{{ route('pay_batch_numbers.edit', $payBatchNumber->id) }}" class="btn btn-sm btn-info">{{ __('Edit') }}</a>
                                    <form action="{{ route('pay_batch_numbers.destroy', $payBatchNumber->id) }}" method="POST" style="display:inline;">
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
