@extends('layouts.admin')
@section('admin-section')
<aside>
    <div class="tng-admin-section">
        <div class="admin-section-wrapper">
            <div class="top-row">
                <div class="row g-5">
                    <div class="col-4">
                        <div class="top-row-containers align-items-center d-flex justify-content-between fs-5">
                            <span>Total Users</span>
                            <span>{{ count($users) }}</span>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="top-row-containers align-items-center d-flex justify-content-between fs-5">
                            <span>Total Events</span><span>{{ count($events) }}</span>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="top-row-containers align-items-center d-flex justify-content-between fs-5">
                            <span>Total Visitors</span><span>10</span>
                        </div>
                    </div>
                </div>
            </div>
            <canvas id="chart"></canvas>
        </div>
    </div>
</aside>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const chartData = @json($values);
</script>
<script src="{{ asset('js/chart.js') }}"></script>
@endsection
