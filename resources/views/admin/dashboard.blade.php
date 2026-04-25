@extends('admin.layouts.master')
@section('content')
  <!-- Greeting -->
  <div class="page-heading">
    <h1>Welcome back, {{ Auth::guard('admin')->user()->name }} 👋</h1>
    <p>Here's what's happening today.</p>
  </div>

  <!-- Stat Cards -->
  <div class="row g-3 mb-4">
    <div class="col-12 col-sm-6 col-xl-3">
      <div class="card-custom">
        <div class="d-flex align-items-center gap-3">
          <div class="icon-box bg-blue-100 text-primary-600">
            <i class="fa-solid fa-dollar-sign"></i>
          </div>
          <div>
            <p class="text-sm text-gray-500 mb-0">Total Revenue</p>
            <p class="text-2xl fw-bold mb-0">$24,780</p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-xl-3">
      <div class="card-custom">
        <div class="d-flex align-items-center gap-3">
          <div class="icon-box bg-purple-100 text-purple-600">
            <i class="fa-solid fa-bag-shopping"></i>
          </div>
          <div>
            <p class="text-sm text-gray-500 mb-0">Total Orders</p>
            <p class="text-2xl fw-bold mb-0">1,463</p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-xl-3">
      <div class="card-custom">
        <div class="d-flex align-items-center gap-3">
          <div class="icon-box bg-orange-100 text-orange-600">
            <i class="fa-solid fa-users"></i>
          </div>
          <div>
            <p class="text-sm text-gray-500 mb-0">Total Customers</p>
            <p class="text-2xl fw-bold mb-0">3,897</p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-xl-3">
      <div class="card-custom">
        <div class="d-flex align-items-center gap-3">
          <div class="icon-box bg-green-100 text-green-600">
            <i class="fa-solid fa-arrow-trend-up"></i>
          </div>
          <div>
            <p class="text-sm text-gray-500 mb-0">Conversion Rate</p>
            <p class="text-2xl fw-bold mb-0">2.4%</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Sales Chart -->
  <div class="card-custom-p5 mb-4">
    <div class="d-flex align-items-center justify-content-between mb-3">
      <h2 class="section-title mb-0">Daily Sales — This Month</h2>
      <select id="monthSelect" class="select-gray">
        <option>March 2026</option>
        <option>February 2026</option>
        <option>January 2026</option>
      </select>
    </div>
    <div class="chart-container">
      <canvas id="salesChart"></canvas>
    </div>
  </div>

  <!-- Recent Orders -->
  <div class="card-custom-static">
    <div class="d-flex align-items-center justify-content-between p-4 pb-0">
      <h2 class="section-title mb-0">Recent Orders</h2>
      <a href="#" class="text-sm text-primary-600 hover-underline text-decoration-none">View all</a>
    </div>
    <div class="overflow-x-auto">
      <table class="table-custom mt-3">
        <thead>
        <tr>
          <th>Order</th>
          <th>Customer</th>
          <th>Amount</th>
          <th>Status</th>
        </tr>
        </thead>
        <tbody>
        <tr>
          <td class="fw-medium">#3210</td>
          <td>Sarah Johnson</td>
          <td>$245.00</td>
          <td><span class="badge-status bg-green-100 text-green-700">Completed</span></td>
        </tr>
        <tr>
          <td class="fw-medium">#3209</td>
          <td>Mike Peters</td>
          <td>$120.50</td>
          <td><span class="badge-status bg-yellow-100 text-yellow-700">Pending</span></td>
        </tr>
        <tr>
          <td class="fw-medium">#3208</td>
          <td>Emily Davis</td>
          <td>$89.99</td>
          <td><span class="badge-status bg-blue-100 text-blue-700">Processing</span></td>
        </tr>
        <tr>
          <td class="fw-medium">#3207</td>
          <td>James Wilson</td>
          <td>$432.00</td>
          <td><span class="badge-status bg-green-100 text-green-700">Completed</span></td>
        </tr>
        <tr>
          <td class="fw-medium">#3206</td>
          <td>Lisa Brown</td>
          <td>$67.20</td>
          <td><span class="badge-status bg-red-100 text-red-700">Cancelled</span></td>
        </tr>
        </tbody>
      </table>
    </div>
  </div>
@endsection




