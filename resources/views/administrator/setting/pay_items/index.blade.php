@extends('administrator.master')
@section('title', __('Pay Items Management'))

@section('main_content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>{{ __('Pay Items Management') }}</h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> {{ __('Dashboard') }}</a></li>
            <li><a>{{ __('Settings') }}</a></li>
            <li class="active">{{ __('Pay Items') }}</li>
        </ol>
    </section>
</div>

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-6">
            <section class="content">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ __('Pay Items List') }}</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPayItemModal">{{ __('Add Pay Item') }}</button>
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
                                    <th>{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($payItems as $payItem)
                                    <tr>
                                        <td>{{ $payItem->code }}</td>
                                        <td>{{ $payItem->name }}</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#editPayItemModal" data-id="{{ $payItem->id }}" data-name="{{ $payItem->name }}" data-glaccount="{{ $payItem->gl_account_id }}" data-accumulator="{{ $payItem->accumulator_id }}">{{ __('Edit') }}</button>
                                            <button type="button" class="btn btn-sm btn-danger btn-delete" data-id="{{ $payItem->id }}">{{ __('Delete') }}</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
            <!-- Add Pay Item Modal -->
            <div class="modal fade" id="addPayItemModal" tabindex="-1" role="dialog" aria-labelledby="addPayItemModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form id="addPayItemForm" action="{{ route('pay_items.store') }}" method="POST">
                        {{ csrf_field() }}
                            <div class="modal-header">
                                <h4 class="modal-title" id="addPayItemModalLabel">{{ __('Add Pay Item') }}</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="code">{{ __('Code') }}</label>
                                    <input type="text" class="form-control" id="code" name="code" required>
                                </div>
                                <div class="form-group">
                                    <label for="name">{{ __('Pay Item Name') }}</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="gl_account_id">{{ __('GL Account') }}</label>
                                    <select class="form-control" id="gl_account_id" name="gl_account_id" required>
                                        @foreach($glCodes as $glAccount)
                                            <option value="{{ $glAccount->id }}">{{ $glAccount->gl_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="accumulator_id">{{ __('Accumulator') }}</label>
                                    <select class="form-control" id="accumulator_id" name="accumulator_id" required>
                                        @foreach($accumulators as $accumulator)
                                            <option value="{{ $accumulator->id }}">{{ $accumulator->pay_accumulator_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tax_rate">{{ __('Tax Rate') }}</label>
                                    <input type="number" step="0.01" class="form-control" id="tax_rate" name="tax_rate">
                                </div>
                                <div class="form-group">
                                    <label for="spread_code">{{ __('Spread Code') }}</label>
                                    <input type="text" class="form-control" id="spread_code" name="spread_code">
                                </div>
                                <div class="form-group">
                                    <label for="taxflag">{{ __('Tax Flag') }}</label>
                                    <select class="form-control" id="taxflag" name="taxflag">
                                        <option value="TA" selected="">Taxable Benefit</option>
                                        <option value="NA">Non-Taxable Benefit</option>
                                        <option value="NT">Notional Allowance</option>
                                        <option value="AI">Adjust Taxable Income</option>
                                        <option value="TR">Tax Adjustment</option>
                                        <option value="BC">Bank Credit</option>
                                        <option value="ND">After Tax Deduction</option>
                                        <option value="DD">Before Tax Deduction</option>
                                        <option value="NN">Notional Deduction</option>
                                        <option value="BD">Bank Deduction</option>
                                        <option value="GD">Gratuity Deduction</option>
                                        <option value="SE">Employee Default Super</option>
                                        <option value="SEA">Employee Additional Super</option>
                                        <option value="SS">Super Sacrifice</option>
                                        <option value="SR">Employer Default Super</option>
                                        <option value="SRA">Employer Additional Super</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="bank_id">{{ __('Bank') }}</label>
                                    <select class="form-control" id="bank_id" name="bank_id">
                                        @foreach($banks as $bank)
                                            <option value="{{ $bank->id }}">{{ $bank->bank_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="bank_detail_id">{{ __('Bank Detail') }}</label>
                                    <select class="form-control" id="bank_detail_id" name="bank_detail_id">
                                        @foreach($bankDetails as $bankDetail)
                                            <option value="{{ $bankDetail->id }}">{{ $bankDetail->bank_detail_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="superannuation_fund_id">{{ __('Superannuation Fund') }}</label>
                                    <select class="form-control" id="superannuation_fund_id" name="superannuation_fund_id">
                                        @foreach($supperannuations as $super)
                                            <option value="{{ $super->id }}">{{ $super->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="payment_mode">{{ __('Payment Mode') }}</label>
                                    <input type="text" class="form-control" id="payment_mode" name="payment_mode">
                                </div>
                                <div class="form-group">
                                    <label for="fixed_amount">{{ __('Fixed Amount') }}</label>
                                    <input type="number" step="0.01" class="form-control" id="fixed_amount" name="fixed_amount">
                                </div>
                                <div class="form-group">
                                    <label for="percentage">{{ __('Percentage') }}</label>
                                    <input type="number" step="0.01" class="form-control" id="percentage" name="percentage">
                                </div>
                                <div class="form-group">
                                    <label for="sequence">{{ __('Sequence') }}</label>
                                    <input type="text" class="form-control" id="sequence" name="sequence">
                                </div>
                                <div class="form-group">
                                    <label for="will_accure_leave">{{ __('Will Accrue Leave') }}</label>
                                    <select class="form-control" id="will_accure_leave" name="will_accure_leave">
                                        <option value="0">{{ __('No') }}</option>
                                        <option value="1">{{ __('Yes') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('Close') }}</button>
                                <button type="button"  id="addPayItem" class="btn btn-primary">{{ __('Add Pay Item') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <!-- Edit Pay Item Modal -->
            <div class="mogitdal fade" id="editPayItemModal" tabindex="-1" role="dialog" aria-labelledby="editPayItemModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form id="editPayItemForm" action="" method="POST">
                        {{ csrf_field() }}
                        
                            <div class="modal-header">
                                <h4 class="modal-title" id="editPayItemModalLabel">{{ __('Edit Pay Item') }}</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" id="edit_id" name="id">
                                <div class="form-group">
                                    <label for="edit_name">{{ __('Pay Item Name') }}</label>
                                    <input type="text" class="form-control" id="edit_name" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="edit_gl_account_id">{{ __('GL Account') }}</label>
                                    <select class="form-control" id="gl_account_id" name="gl_account_id" required>
                                        @foreach($glCodes as $glAccount)
                                            <option value="{{ $glAccount->id }}">{{ $glAccount->gl_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="edit_accumulator_id">{{ __('Accumulator') }}</label>
                                    <select class="form-control" id="edit_accumulator_id" name="accumulator_id" required>
                                        @foreach($accumulators as $accumulator)
                                            <option value="{{ $accumulator->id }}">{{ $accumulator->pay_accumulator_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('Close') }}</button>
                                @if(isset($payItem))
                                <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#editPayItemModal"
                                    data-id="{{ $payItem->id }}" data-name="{{ $payItem->name }}"
                                    data-glaccount="{{ $payItem->gl_account_id }}" data-accumulator="{{ $payItem->accumulator_id }}">
                                    {{ __('Edit') }}
                                </button>
                                @endif


                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection