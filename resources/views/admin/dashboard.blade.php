@extends('layouts.admin_frontend')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    // Load google charts
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    // Draw the chart and set the chart values
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Dashboard', 'OverAll Statistics'],
            ['All Subscribers', {{$statisticstotalusers}}],
            ['Active Subscribers', {{$statisticstotalactiveusers}}],
            ['InActive Subscribers', {{$statisticstotalinactiveusers}}],
        ]);

        // Optional; add a title and set the width and height of the chart
        var options = {
            'width': 550,
            'height': 400
        };

        // Display the chart inside the <div> element with id="piechart"
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
    }
</script>
@section('page-content')
<!--APP-CONTENT OPEN-->
<div class="app-content main-content mt-0">
    <div class="side-app">
        <!-- CONTAINER -->
        <div class="main-container container-fluid">
            <!-- PAGE-HEADER -->
            <div class="page-header">
                <div>
                    <h1 class="page-title">Dashboard</h1>
                </div>
                <div class="ms-auto pageheader-btn">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- ROW-1 -->
            <div class="row">
                <div class="col-lg-6 col-sm-12 col-md-6 col-xl-4">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h3 class="mb-2 fw-semibold">{{$totalactiveusers->count()}}</h3>
                                    <p class="text-muted fs-13 mb-0">Total Active Users</p>
                                </div>
                                <div class="col col-auto top-icn dash">
                                    <div class="counter-icon bg-primary dash ms-auto box-shadow-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="full-white" enable-background="new 0 0 24 24" viewBox="0 0 24 24">
                                            <path d="M14.6650391,13.3672485C16.6381226,12.3842773,17.9974365,10.3535767,18,8c0-3.3137207-2.6862793-6-6-6S6,4.6862793,6,8c0,2.3545532,1.3595581,4.3865967,3.3334961,5.3690186c-3.6583862,1.0119019-6.5859375,4.0562134-7.2387695,8.0479736c-0.0002441,0.0013428-0.0004272,0.0026855-0.0006714,0.0040283c-0.0447388,0.272583,0.1399536,0.5297852,0.4125366,0.5745239c0.272522,0.0446777,0.5297241-0.1400146,0.5744629-0.4125366c0.624939-3.8344727,3.6308594-6.8403931,7.465332-7.465332c4.9257812-0.8027954,9.5697632,2.5395508,10.3725586,7.465332C20.9594727,21.8233643,21.1673584,21.9995117,21.4111328,22c0.0281372,0.0001831,0.0562134-0.0021362,0.0839844-0.0068359h0.0001831c0.2723389-0.0458984,0.4558716-0.303833,0.4099731-0.5761719C21.2677002,17.5184937,18.411377,14.3986206,14.6650391,13.3672485z M12,13c-2.7614136,0-5-2.2385864-5-5s2.2385864-5,5-5c2.7600708,0.0032349,4.9967651,2.2399292,5,5C17,10.7614136,14.7614136,13,12,13z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12 col-md-6 col-xl-4">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h3 class="mb-2 fw-semibold">{{$totalinactiveusers->count()}}</h3>
                                    <p class="text-muted fs-13 mb-0">Total Inactive Users</p>
                                </div>
                                <div class="col col-auto top-icn dash">
                                    <div class="counter-icon bg-primary dash ms-auto box-shadow-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="full-white" enable-background="new 0 0 24 24" viewBox="0 0 24 24">
                                            <path d="M14.6650391,13.3672485C16.6381226,12.3842773,17.9974365,10.3535767,18,8c0-3.3137207-2.6862793-6-6-6S6,4.6862793,6,8c0,2.3545532,1.3595581,4.3865967,3.3334961,5.3690186c-3.6583862,1.0119019-6.5859375,4.0562134-7.2387695,8.0479736c-0.0002441,0.0013428-0.0004272,0.0026855-0.0006714,0.0040283c-0.0447388,0.272583,0.1399536,0.5297852,0.4125366,0.5745239c0.272522,0.0446777,0.5297241-0.1400146,0.5744629-0.4125366c0.624939-3.8344727,3.6308594-6.8403931,7.465332-7.465332c4.9257812-0.8027954,9.5697632,2.5395508,10.3725586,7.465332C20.9594727,21.8233643,21.1673584,21.9995117,21.4111328,22c0.0281372,0.0001831,0.0562134-0.0021362,0.0839844-0.0068359h0.0001831c0.2723389-0.0458984,0.4558716-0.303833,0.4099731-0.5761719C21.2677002,17.5184937,18.411377,14.3986206,14.6650391,13.3672485z M12,13c-2.7614136,0-5-2.2385864-5-5s2.2385864-5,5-5c2.7600708,0.0032349,4.9967651,2.2399292,5,5C17,10.7614136,14.7614136,13,12,13z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12 col-md-6 col-xl-4">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h3 class="mb-2 fw-semibold">₦{{number_format($deposits, 2)}}</h3>
                                    <p class="text-muted fs-13 mb-0">Total Deposits</p>
                                </div>
                                <div class="col col-auto top-icn dash">
                                    <div class="counter-icon bg-secondary dash ms-auto box-shadow-secondary">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" enable-background="new 0 0 24 24" viewBox="0 0 24 24">
                                            <path d="M9,10h2.5c0.276123,0,0.5-0.223877,0.5-0.5S11.776123,9,11.5,9H10V8c0-0.276123-0.223877-0.5-0.5-0.5S9,7.723877,9,8v1c-1.1045532,0-2,0.8954468-2,2s0.8954468,2,2,2h1c0.5523071,0,1,0.4476929,1,1s-0.4476929,1-1,1H7.5C7.223877,15,7,15.223877,7,15.5S7.223877,16,7.5,16H9v1.0005493C9.0001831,17.2765503,9.223999,17.5001831,9.5,17.5h0.0006104C9.7765503,17.4998169,10.0001831,17.276001,10,17v-1c1.1045532,0,2-0.8954468,2-2s-0.8954468-2-2-2H9c-0.5523071,0-1-0.4476929-1-1S8.4476929,10,9,10z M21.5,12H17V2.5c0.000061-0.0875244-0.0228882-0.1735229-0.0665283-0.2493896c-0.1375732-0.2393188-0.4431152-0.3217773-0.6824951-0.1842041l-3.2460327,1.8603516L9.7481079,2.0654297c-0.1536865-0.0878906-0.3424072-0.0878906-0.4960938,0l-3.256897,1.8613281L2.7490234,2.0664062C2.6731567,2.0227661,2.5871582,1.9998779,2.4996338,1.9998779C2.2235718,2.000061,1.9998779,2.223938,2,2.5v17c0.0012817,1.380188,1.119812,2.4987183,2.5,2.5H19c1.6561279-0.0018311,2.9981689-1.3438721,3-3v-6.5006104C21.9998169,12.2234497,21.776001,11.9998169,21.5,12z M4.5,21c-0.828064-0.0009155-1.4990845-0.671936-1.5-1.5V3.3623047l2.7412109,1.5712891c0.1575928,0.0872192,0.348877,0.0875854,0.5068359,0.0009766L9.5,3.0761719l3.2519531,1.8583984c0.157959,0.0866089,0.3492432,0.0862427,0.5068359-0.0009766L16,3.3623047V19c0.0008545,0.7719116,0.3010864,1.4684448,0.7803345,2H4.5z M21,19c0,1.1045532-0.8954468,2-2,2s-2-0.8954468-2-2v-6h4V19z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ROW-1 END-->

            <!-- ROW-4 -->
            <div class="row">
                <div class="col-12 col-sm-12">
                    <div class="card product-sales-main">
                        <div class="card-header border-bottom">
                            <h3 class="card-title mb-0">Latest Registered Subscribers</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="data-table" class="table text-nowrap mb-0 table-bordered">
                                    <thead class="table-head">
                                        <tr>
                                            <th class="bg-transparent border-bottom-0">S/N</th>
                                            <th class="bg-transparent border-bottom-0">Full Name</th>
                                            <th class="bg-transparent border-bottom-0">Email</th>
                                            <th class="bg-transparent border-bottom-0">Gender</th>
                                            <th class="bg-transparent border-bottom-0">Phone Number</th>
                                            <th class="bg-transparent border-bottom-0">Subscription Status</th>
                                            <th class="bg-transparent border-bottom-0">Created At</th>
                                        </tr>
                                    </thead>
                                    @if($latestusers->isEmpty())
                                    <tbody>
                                        <tr>
                                            <td class="align-enter text-dark font-15" colspan="7">No Registered User.</td>
                                        </tr>
                                    </tbody>
                                    @else
                                    @foreach($latestusers as $key => $latestuser)
                                    <tbody class="table-body">
                                        <tr>
                                            <td class="text-dark fs-14 fw-semibold">{{$loop->iteration}}</td>
                                            <td class="text-success fs-14 fw-semibold">{{$latestuser->first_name}} {{$latestuser->last_name}}</td>
                                            <td class="text-success fs-14 fw-semibold">{{$latestuser->email}}</td>
                                            <td class="text-success fs-14 fw-semibold">{{$latestuser->gender}}</td>
                                            <td class="text-success fs-14 fw-semibold">{{$latestuser->phone_number}}</td>
                                            <td class="text-dark fs-14 fw-semibold">{{$latestuser->subscription_status}}</td>
                                            <td class="text-success fs-14 fw-semibold">{{$latestuser->created_at->toDayDateTimeString()}}</td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>
                </div><!-- COL END -->
            </div>
            <!-- ROW-4 END -->

            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="card overflow-hidden">
                                <div class="card-header border-bottom">
                                    <h4 class="card-title fw-semibold">Latest Transactions</h4>
                                    <a href="{{route('admin.deposits')}}" class="ms-auto">View All</a>
                                </div>
                                <div class="card-body p-0 customers mt-1">
                                    <div class="list-group py-1">
                                        @foreach($latestdeposits as $latestdeposit)
                                        <a href="javascript:void(0);" class="border-0">
                                            <div class="list-group-item border-0">
                                                <div class="media mt-0 align-items-center">
                                                    <div class="transaction-icon"><i class="fe fe-chevrons-right"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="d-flex align-items-center">
                                                            <div class="mt-0">
                                                                <h5 class="mb-1 fs-13 fw-normal text-dark">{{$latestdeposit->first_name}} {{$latestdeposit->last_name}}<span class="fs-13 fw-semibold ms-1">Subscription Fee</span></h5>
                                                                <p class="mb-0 fs-12 text-muted">{{$latestdeposit->channel}}</p>
                                                            </div>
                                                            <span class="ms-auto fs-13">
                                                                <span class="float-end text-dark">+₦{{number_format($latestdeposit->amount, 2)}}</span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card">
                        <div class="card-header border-bottom">
                            <h4 class="card-title fw-semibold">OverAll Statistics</h4>
                        </div>
                        <div class="card-body p-0 customers mt-1">
                            <div id="my-pie-chart-container">
                                <div id="piechart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- CONTAINER END -->
        </div>
    </div>
    @endsection