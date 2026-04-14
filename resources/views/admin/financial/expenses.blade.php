@extends('layouts.admin')

@section('title', 'النفقات')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3 mb-0">النفقات</h1>
                <div>
                    <button class="btn btn-primary">
                        <i class="fas fa-plus ms-2"></i>
                        إضافة نفقة جديدة
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card bg-danger text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="mb-0">{{ number_format(array_sum(array_column($monthlyExpenses, 'amount'))) }}</h4>
                            <p class="mb-0">إجمالي النفقات</p>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-money-bill-wave fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-warning text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="mb-0">{{ number_format(end($monthlyExpenses)['amount']) }}</h4>
                            <p class="mb-0">نفقات هذا الشهر</p>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-calendar fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="mb-0">{{ number_format(array_sum(array_column($monthlyExpenses, 'amount')) / count($monthlyExpenses)) }}</h4>
                            <p class="mb-0">متوسط النفقات</p>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-chart-line fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="mb-0">15%</h4>
                            <p class="mb-0">نسبة النمو</p>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-arrow-up fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Monthly Expenses Chart -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">النفقات الشهرية</h5>
                </div>
                <div class="card-body">
                    <canvas id="monthlyExpensesChart" height="300"></canvas>
                </div>
            </div>
        </div>

        <!-- Expense Categories -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">فئات النفقات</h5>
                </div>
                <div class="card-body">
                    <canvas id="expenseCategoriesChart" height="300"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Transactions -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">المعاملات الأخيرة</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>التاريخ</th>
                                    <th>الوصف</th>
                                    <th>الفئة</th>
                                    <th>المبلغ</th>
                                    <th>الإجراءات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentTransactions as $transaction)
                                <tr>
                                    <td>{{ $transaction['date'] }}</td>
                                    <td>{{ $transaction['description'] }}</td>
                                    <td>
                                        <span class="badge bg-secondary">{{ $transaction['type'] == 'expense' ? 'نفقة' : 'إيراد' }}</span>
                                    </td>
                                    <td class="{{ $transaction['type'] == 'expense' ? 'text-danger' : 'text-success' }}">
                                        {{ $transaction['type'] == 'expense' ? '-' : '+' }}{{ number_format($transaction['amount']) }} ريال
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <button class="btn btn-outline-primary">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-outline-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .card {
        border: none;
        box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
        transition: all 0.3s ease;
    }
    .card:hover {
        box-shadow: 0 0.25rem 2.25rem 0 rgba(58, 59, 69, 0.2);
    }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Monthly Expenses Chart
    const monthlyExpensesCtx = document.getElementById('monthlyExpensesChart').getContext('2d');
    new Chart(monthlyExpensesCtx, {
        type: 'line',
        data: {
            labels: @json(array_column($monthlyExpenses, 'month')),
            datasets: [{
                label: 'النفقات',
                data: @json(array_column($monthlyExpenses, 'amount')),
                borderColor: 'rgb(220, 53, 69)',
                backgroundColor: 'rgba(220, 53, 69, 0.1)',
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Expense Categories Chart
    const expenseCategoriesCtx = document.getElementById('expenseCategoriesChart').getContext('2d');
    new Chart(expenseCategoriesCtx, {
        type: 'doughnut',
        data: {
            labels: @json(array_column($expenseCategories, 'name')),
            datasets: [{
                data: @json(array_column($expenseCategories, 'amount')),
                backgroundColor: [
                    '#FF6384',
                    '#36A2EB',
                    '#FFCE56',
                    '#4BC0C0',
                    '#9966FF'
                ]
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
</script>
@endpush
