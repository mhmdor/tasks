@extends('layouts.app')

@section('content')
    <div class="content ps-3 pt-4 pe-5">
        <div class="graphs3 graphs  d-flex justify-content-between gap-4 mb-4">
            <div class="number-of-clients graph pie">
                <div class="d-flex flex-wrap gap-2 justify-content-between">
                    <div class="item">
                        <h2>Total Employees</h2>
                        <h3>216</h3>
                        <h4>Employees</h4>
                    </div>
                    <div class="item">
                        <h2>Talent Request</h2>
                        <h3>24</h3>
                        <h4>Requests</h4>
                    </div>
                    <div class="item">
                        <h2>Inquiries</h2>
                        <h3>24</h3>
                        <h4>Inquiries</h4>
                    </div>
                    <div class="item">
                        <h2>problems</h2>
                        <h3>24</h3>
                        <h4>problems</h4>
                    </div>
                </div>
            </div>
            <div class="number-of-clients bg-white py-4 px-3 graph pie">
                <h2>Number of client</h2>
                <canvas id="myChart1"></canvas>
            </div>
        </div>

    </div>
@endsection