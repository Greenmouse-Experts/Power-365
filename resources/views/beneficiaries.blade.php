@extends('layouts.frontend')

@section('page-content')
<!--header of the index page-->
<div class="top-part">
    <!-- header -->
    @includeIf('layouts.frontend-header')
    <!-- end-header -->
</div>
<!-- coming soon section -->
<section class="section">
    <div class="container">
        <div class="text-center">
            <div style="padding-top: 5rem;">
                <h1>Power-365 Beneficiaries</h1>
            </div>
            <div class="pt-5">
                <h5>Latest Beneficiaries</h5>
            </div>
            <div class="py-5">
                <table class="table table-responsive">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">s/n</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Joined Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($beneficiaries as $beneficiary)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$beneficiary->first_name}}</td>
                            <td>{{$beneficiary->last_name}}</td>
                            <td>{{$beneficiary->created_at->toDayDateTimeString()}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection