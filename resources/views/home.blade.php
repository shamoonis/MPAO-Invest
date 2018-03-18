@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-2">
        <div class="card-header">Menu</div>
            <div class="card">
                <ul>
                    <li><a href="javascript:;" id="newFund">Fund</a></li>
                    <li><a href="javascript:;" id="newInstitution">Institution</a></li>
                    <li><a href="javascript:;" id="newType">Type</a></li>
                    <li><a href="javascript:;" id="newInvestment">Investments</a></li>
                    <li><a href="">Users</a></li>
                </ul>
            </div>
        </div>

        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div id="msg"></div>
                    <div id="mainBody"></div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
