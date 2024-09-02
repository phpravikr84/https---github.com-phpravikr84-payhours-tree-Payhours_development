@extends('administrator.master')
@section('title', __('Pay Reference Details'))

@section('main_content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>{{ __('Pay Reference Details') }}</h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> {{ __('Dashboard') }}</a></li>
            <li><a href="{{ route('pay_references.index') }}">{{ __('Pay References') }}</a></li>
            <li class="active">{{ __('Pay Reference Details') }}</li>
        </ol>
    </section>

    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">{{ __('Manage Pay Reference Details') }}</h3>
            </div>

            <table class="table table-bordered table-striped">
                    <tbody>
                        @foreach($pay_references as $pay_reference)
                            <tr>
                                <td>ID: {{ $pay_reference->id }}</td>
                                <td>{{ __('Pay Reference Name') }} : {{ $pay_reference->pay_reference_name }}</td>
                                <td>{{ __('Pay Period Start Date') }} : {{ $pay_reference->pay_period_start_date }}</td>
                                <td>{{ __('Pay Period End Date') }} : {{ $pay_reference->pay_period_end_date }}</td>
                                <td>{{ __('Branch') }} : {{ $pay_reference->branch_name }}</td>
                                <td>{{ __('Pay Batch') }} : {{ $pay_reference->payroll_number }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="box-body">
                <div class="col-xl-12">
                    <ul class="nav nav-pills" id="payreftab">
                        <li class="nav-item">
                            <a class="nav-link active" href="#refdata" id="2" onclick="changeActive(event)">Include/Exclude Employees</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#refdata" id="3" onclick="changeActive(event)">Update Pay Advances</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#refdata" id="6" onclick="changeActive(event)">Update Leave Requests</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#refdata" id="4" onclick="changeActive(event)">Pay Variations</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#refdata" id="5" onclick="changeActive(event)">Submit Pay</a>
                        </li>
                    </ul>
                    <hr>
                    <div id="refdata">
                        <div class="row" id="inc">
                            <div class="col-xl-5">
                                <strong>Included Employees</strong>
                                <div class="table-responsive">
                                    <div id="dt-inc_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6"></div>
                                            <div class="col-sm-12 col-md-6"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table class="table table-bordered dataTable no-footer" id="dt-inc" width="100%" cellspacing="0" role="grid" aria-describedby="dt-inc_info" style="width: 100%;">
                                                    <thead>
                                                        <tr role="row">
                                                            <th class="sorting_asc" tabindex="0" aria-controls="dt-inc" rowspan="1" colspan="1" aria-label="Id: activate to sort column descending" style="width: 62.6px;" aria-sort="ascending">Id</th>
                                                            <th class="sorting" tabindex="0" aria-controls="dt-inc" rowspan="1" colspan="1" aria-label="Code: activate to sort column ascending" style="width: 99.6px;">Code</th>
                                                            <th class="sorting" tabindex="0" aria-controls="dt-inc" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 108.6px;">Name</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot></tfoot>
                                                    <tbody>
                                                        <tr class="odd"><td valign="top" colspan="3" class="dataTables_empty">No data available in table</td></tr>
                                                    </tbody>
                                                </table>
                                                <div id="dt-inc_processing" class="dataTables_processing card" style="display: none;">Processing...</div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-5">
                                                <div class="dataTables_info" id="dt-inc_info" role="status" aria-live="polite">Showing 0 to 0 of 0 entries</div>
                                            </div>
                                            <div class="col-sm-12 col-md-7"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1">
                                <p></p>
                                <p class="text-justify">
                                    <button style="width:100%;" class="btn btn-danger" onclick="excludeEmp()"><i class="fa fa-fw fa-angle-right"></i></button>
                                    <br>
                                    <button style="width:100%;" class="btn btn-danger" onclick="excludeEmpAll()"><i class="fa fa-fw fa-angle-double-right"></i></button>
                                    <br><br>
                                    <button style="width:100%;" class="btn btn-success" onclick="includeEmp()"><i class="fa fa-fw fa-angle-left"></i></button>
                                    <br>
                                    <button style="width:100%;" class="btn btn-success" onclick="includeEmpAll()"><i class="fa fa-fw fa-angle-double-left"></i></button>
                                    <br>
                                </p>
                                <p><button style="width:100%;" class="btn btn-primary" onclick="onSaveIncluded('Ref Code 1')">Save</button></p>
                            </div>
                            <div class="col-xl-5">
                                <strong>Excluded Employees</strong>
                                <div class="table-responsive">
                                    <div id="dt-exc_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6"></div>
                                            <div class="col-sm-12 col-md-6"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table class="table table-bordered dataTable no-footer" id="dt-exc" width="100%" cellspacing="0" role="grid" aria-describedby="dt-exc_info" style="width: 100%;">
                                                    <thead>
                                                        <tr role="row">
                                                            <th class="sorting_asc" tabindex="0" aria-controls="dt-exc" rowspan="1" colspan="1" aria-label="Id: activate to sort column descending" style="width: 55.6px;" aria-sort="ascending">Id</th>
                                                            <th class="sorting" tabindex="0" aria-controls="dt-exc" rowspan="1" colspan="1" aria-label="Code: activate to sort column ascending" style="width: 90.6px;">Code</th>
                                                            <th class="sorting" tabindex="0" aria-controls="dt-exc" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 123.6px;">Name</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot></tfoot>
                                                    <tbody>
                                                        <tr role="row" class="odd"><td class="sorting_1">1</td><td>E-1</td><td>S Mathew</td></tr>
                                                        <tr role="row" class="even"><td class="sorting_1">2</td><td>E-2</td><td>S Jon</td></tr>
                                                        <tr role="row" class="odd"><td class="sorting_1">5</td><td>004</td><td>Tina Malu</td></tr>
                                                        <tr role="row" class="even"><td class="sorting_1">6</td><td>005</td><td>Shane Bon</td></tr>
                                                        <tr role="row" class="odd"><td class="sorting_1">7</td><td>006</td><td>Joycelyn Ben</td></tr>
                                                    </tbody>
                                                </table>
                                                <div id="dt-exc_processing" class="dataTables_processing card" style="display: none;">Processing...</div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-5">
                                                <div class="dataTables_info" id="dt-exc_info" role="status" aria-live="polite">Showing 1 to 5 of 5 entries</div>
                                            </div>
                                            <div class="col-sm-12 col-md-7"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    function changeActive(event) {
        // Logic to handle active tab change
        var tabs = document.querySelectorAll('.nav-link');
        tabs.forEach(function(tab) {
            tab.classList.remove('active');
        });
        event.target.classList.add('active');

        // Hide all tab content initially
        var tabContents = document.getElementById('refdata').children;
        for (var i = 0; i < tabContents.length; i++) {
            tabContents[i].style.display = 'none';
        }

        // Show the selected tab content based on its ID
        var selectedTab = event.target.id;
        if (selectedTab === "2") {
            document.getElementById('inc').style.display = 'block';
        } else {
            document.getElementById('inc').style.display = 'none';
            // Logic to display other tab contents can be added here
        }
    }

    // Call this function to initialize
    document.addEventListener('DOMContentLoaded', function() {
        changeActive({ target: document.getElementById('2') }); // Set default active tab
    });
</script>

@endsection
