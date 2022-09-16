@extends('layouts.admin_frontend')

@section('page-content')
<!--APP-CONTENT OPEN-->
<div class="app-content main-content mt-0">
    <div class="side-app">
        <!-- CONTAINER -->
        <div class="main-container container-fluid">
            <!-- PAGE-HEADER -->
            <div class="page-header">
                <div>
                    <h1 class="page-title">All Deposits</h1>
                </div>
                <div class="ms-auto pageheader-btn">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Deposits</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- Row -->
            <div class="row row-sm">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header border-bottom">
                            <h3 class="card-title">All Deposits</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="data-table" class="table table-bordered text-nowrap border-bottom">
                                    <thead>
                                        <tr> 
                                            <th class="border-bottom-0">S/N</th>
                                            <th class="border-bottom-0">Name</th>
                                            <th class="border-bottom-0">Email</th>
                                            <th class="border-bottom-0">Amount</th>
                                            <th class="border-bottom-0">Transaction ID</th>
                                            <th class="border-bottom-0">Ref ID</th>
                                            <th class="border-bottom-0">Paid At</th>
                                            <th class="border-bottom-0">Channel</th>
                                            <th class="border-bottom-0">IP Address</th>
                                            <th class="border-bottom-0">Status</th>
                                        </tr>
                                    </thead>
                                    @if($deposits->isEmpty())
                                    <tbody>
                                        <tr>
                                            <td class="align-enter text-dark font-15" colspan="8">No Deposits.</td>
                                        </tr>
                                    </tbody>
                                    @else
                                    @foreach($deposits as $key => $deposit)
                                    <tbody>
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>
                                                {{$deposit->first_name}} {{$deposit->last_name}}
                                            </td>
                                            <td>
                                                {{$deposit->email}}
                                            </td>
                                            <td>₦{{number_format($deposit->amount, 2)}}</td>
                                            <td>{{$deposit->transaction_id}}</td>
                                            <td>{{$deposit->ref_id}}</td>
                                            <td>{{$deposit->paid_at}}</td>
                                            <td>{{$deposit->channel}}</td>
                                            <td>{{$deposit->ip_address}}</td>
                                            <td class="bg-success text-white">{{$deposit->status}}</td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Row -->
        </div>
        <!-- CONTAINER END -->
    </div>
</div>
@endsection