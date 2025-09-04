@extends('layouts.app')

@section('content')
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
<!-- DataTables CSS -->
<link href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" />

<style>
    .main-content {
        background-color: #121F31 !important;
        color: #cbd5e1 !important;
        font-family: Arial, sans-serif;
        padding: 20px;
        min-height: 100vh;
    }
    .main-content a {
        color: #3b82f6;
        text-decoration: none;
        font-weight: 500;
    }
    .main-content a:hover {
        text-decoration: underline;
    }
    .btn-filter {
        background-color: #f59e0b;
        border-color: #f59e0b;
        color: white;
    }
    .btn-filter:hover {
        background-color: #d97706;
        border-color: #d97706;
    }
    .date-range {
        border-left: 4px solid #3b82f6;
        padding-left: 15px;
        margin-bottom: 15px;
        font-weight: 700;
        color: #cbd5e1;
    }
    table.dataTable thead th {
        color: #94a3b8 !important;
        background-color: #1e293b !important;
    }
    table.dataTable {
        background-color: #1e293b !important;
        color: #cbd5e1 !important;
    }
    table.dataTable tbody tr {
        background-color: #1e293b !important;
    }
    table.dataTable tbody tr:nth-child(even) {
        background-color: #334155 !important;
    }
    tbody tr td {
        vertical-align: middle;
        color: #cbd5e1 !important;
    }
    /* Total row */
    .total-row {
        background-color: #164e63 !important;
        font-weight: 700;
        color: #22c55e !important;
    }
    .total-row .text-danger {
        color: #ef4444 !important;
    }
    .total-row td {
        color: #22c55e !important;
    }
    /* Gross Income row */
    .gross-income {
        background-color: #1e40af !important;
        font-weight: 700;
    }
    .gross-income .text-primary {
        color: #3b82f6 !important;
    }
    .gross-income td {
        color: #3b82f6 !important;
    }
    /* Text colors */
    .text-green {
        color: #22c55e !important;
    }
    .text-red {
        color: #ef4444 !important;
    }
    /* Note header */
    .note-header {
        border-left: 4px solid #f97316;
        padding-left: 15px;
        font-weight: 700;
        margin-bottom: 10px;
        color: #f97316;
    }
    /* DataTables styling */
    .dataTables_wrapper .dataTables_length,
    .dataTables_wrapper .dataTables_filter,
    .dataTables_wrapper .dataTables_info,
    .dataTables_wrapper .dataTables_paginate {
        color: #cbd5e1 !important;
    }
    .dataTables_wrapper .dataTables_filter input {
        background-color: #334155 !important;
        border: 1px solid #475569 !important;
        color: #cbd5e1 !important;
    }
    .dataTables_wrapper .dataTables_length select {
        background-color: #334155 !important;
        border: 1px solid #475569 !important;
        color: #cbd5e1 !important;
    }
    .page-link {
        background-color: #334155 !important;
        border-color: #475569 !important;
        color: #cbd5e1 !important;
    }
    .page-link:hover {
        background-color: #475569 !important;
        border-color: #64748b !important;
        color: #f1f5f9 !important;
    }
    .page-item.active .page-link {
        background-color: #3b82f6 !important;
        border-color: #3b82f6 !important;
    }
</style>

<div>
    <a href="{{ route('myshop') }}">My shop</a>
</div>

<div class="mt-3 mb-3">
    <div class="btn-group me-2">
        <button type="button" class="btn btn-filter dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            Select Filter
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Filter 1</a></li>
            <li><a class="dropdown-item" href="#">Filter 2</a></li>
            <li><a class="dropdown-item" href="#">Filter 3</a></li>
        </ul>
    </div>
    <button class="btn btn-primary">Default</button>
</div>

<div class="date-range mb-3">
    Monday, 1 September 2025 to Sunday, 7 September 2025
</div>

<table id="summaryTable" class="table table-bordered table-striped nowrap" style="width:100%">
    <thead>
        <tr>
            <th>NAME</th>
            <th>PEMASUKAN</th>
            <th>PENGELUARAN</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Service</td>
            <td class="text-green text-end">2,175,000.00</td>
            <td class="text-danger text-end">-</td>
        </tr>
        <tr>
            <td>Penjualan Sparepart</td>
            <td class="text-green text-end">0.00</td>
            <td class="text-danger text-end">-</td>
        </tr>
        <tr>
            <td>Penjualan Perangkat</td>
            <td class="text-green text-end">0.00</td>
            <td class="text-danger text-end">-</td>
        </tr>
        <tr>
            <td>Customer Debt</td>
            <td class="text-green text-end">0.00</td>
            <td class="text-danger text-end">0.00</td>
        </tr>
        <tr>
            <td>Percentage Technician</td>
            <td class="text-center">-</td>
            <td class="text-danger text-end">532,000.00</td>
        </tr>
        <tr>
            <td>Pengeluaran Toko</td>
            <td class="text-center">-</td>
            <td class="text-danger text-end">166,000.00</td>
        </tr>
        <tr>
            <td>Sparepart Luar</td>
            <td class="text-center">-</td>
            <td class="text-danger text-end">845,000.00</td>
        </tr>
    </tbody>
    <tfoot>
        <tr class="total-row">
            <td class="text-green">TOTAL</td>
            <td class="text-green text-end">2,175,000.00</td>
            <td class="text-danger text-end">1,543,000.00</td>
        </tr>
        <tr class="gross-income">
            <td class="text-primary">GROSS INCOME</td>
            <td colspan="2" class="text-primary text-end">632,000.00</td>
        </tr>
    </tfoot>
</table>

<div class="note-section mt-5">
    <div class="note-header mb-3">
        Note Service
    </div>
    <table id="noteTable" class="table table-bordered table-striped nowrap" style="width:100%">
        <thead>
            <tr>
                <th>INVOICE</th>
                <th>NAME</th>
                <th>NOTE</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>INV-20022025105530</td>
                <td>inel</td>
                <td>mmc dead</td>
            </tr>
        </tbody>
    </table>
</div>

<div class="mt-5 text-center" style="color: #64748b; font-size: 0.85rem;">
    Copyright &copy; 2025 <a href="#" style="color:#3b82f6">Borneo Worldwide Solution Pte. Ltd.</a> All rights reserved.
</div>

<!-- Bootstrap JS Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function () {
        $('#summaryTable').DataTable({
            paging: false,
            searching: false,
            info: false,
            ordering: true,
            order: [],
            columnDefs: [
                { targets: [1, 2], className: 'text-end' }
            ]
        });
        $('#noteTable').DataTable({
            lengthChange: true,
            searching: true,
            ordering: true,
            pageLength: 5,
            order: [],
            language: {
                lengthMenu: "Show _MENU_ entries",
                zeroRecords: "No matching records found",
                info: "Showing _START_ to _END_ of _TOTAL_ entries",
                infoEmpty: "Showing 0 to 0 of 0 entries",
                infoFiltered: "(filtered from _MAX_ total entries)",
                search: "Search:",
                paginate: {
                    previous: "Previous",
                    next: "Next"
                }
            }
        });
    });
</script>
@endsection