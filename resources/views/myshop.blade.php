@extends('layouts.app')

@section('content')
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
<!-- DataTables CSS -->
<link href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" />

<style>
    /* Force remove any gaps */
    body .main-content {
        background-color: #121F31 !important;
        color: #f8fafc !important;
        font-family: Arial, sans-serif;
        padding: 20px !important;
        margin: 0 !important;
        margin-left: 250px !important;
        margin-top: 30px !important;
        min-height: calc(100vh - 60px) !important;
        position: relative !important;
        top: 0 !important;
        font-weight: 600 !important;
    }
    
    /* Remove any container margins only in main content */
    .main-content .container, 
    .main-content .container-fluid {
        margin: 0 !important;
        padding: 0 !important;
    }
    
    /* Ensure sidebar stays intact */
    .sidebar {
        position: fixed !important;
        left: 0 !important;
        top: 60px !important;
        width: 250px !important;
        height: calc(100vh - 60px) !important;
        z-index: 1000 !important;
    }
    .main-content a {
        color: #3b82f6;
        text-decoration: none;
        font-weight: 500;
    }
    .main-content a:hover {
        text-decoration: underline;
    }
    /* Button Styling */
    .btn-filter {
        background-color: #f59e0b !important;
        border-color: #f59e0b !important;
        color: white !important;
        font-weight: 600 !important;
        padding: 8px 16px !important;
        border-radius: 6px !important;
        box-shadow: 0 2px 4px rgba(245, 158, 11, 0.3) !important;
        transition: all 0.3s ease !important;
    }
    .btn-filter:hover {
        background-color: #d97706 !important;
        border-color: #d97706 !important;
        color: white !important;
        transform: translateY(-1px) !important;
        box-shadow: 0 4px 8px rgba(245, 158, 11, 0.4) !important;
    }
    .btn-filter:focus {
        box-shadow: 0 0 0 3px rgba(245, 158, 11, 0.3) !important;
    }
    
    .btn-primary {
        background-color: #3b82f6 !important;
        border-color: #3b82f6 !important;
        color: white !important;
        font-weight: 600 !important;
        padding: 8px 16px !important;
        border-radius: 6px !important;
        box-shadow: 0 2px 4px rgba(59, 130, 246, 0.3) !important;
        transition: all 0.3s ease !important;
    }
    .btn-primary:hover {
        background-color: #2563eb !important;
        border-color: #2563eb !important;
        color: white !important;
        transform: translateY(-1px) !important;
        box-shadow: 0 4px 8px rgba(59, 130, 246, 0.4) !important;
    }
    .btn-primary:focus {
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.3) !important;
    }
    
    /* Dropdown Menu */
    .dropdown-menu {
        background-color: #1e293b !important;
        border: 1px solid #475569 !important;
        border-radius: 6px !important;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3) !important;
    }
    .dropdown-item {
        color: #cbd5e1 !important;
        padding: 8px 16px !important;
        transition: all 0.2s ease !important;
    }
    .dropdown-item:hover {
        background-color: #334155 !important;
        color: white !important;
    }
    .date-range {
        border-left: 4px solid #3b82f6;
        padding-left: 15px;
        margin-bottom: 15px;
        font-weight: 800;
        color: #ffffff;
        font-size: 1.1rem;
        text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
    }
    /* Table Styling */
    .table {
        border-radius: 8px !important;
        overflow: hidden !important;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3) !important;
        border: none !important;
    }
    
    table.dataTable thead th {
        color: #f1f5f9 !important;
        background: linear-gradient(135deg, #1e293b 0%, #334155 100%) !important;
        border: none !important;
        padding: 16px 12px !important;
        font-weight: 700 !important;
        font-size: 0.9rem !important;
        letter-spacing: 0.5px !important;
        text-transform: uppercase !important;
        border-bottom: 2px solid #3b82f6 !important;
    }
    
    table.dataTable {
        background-color: #ffffff !important;
        color: #1f2937 !important;
        border-collapse: separate !important;
        border-spacing: 0 !important;
        width: 100% !important;
    }
    
    table.dataTable tbody tr {
        background-color: #ffffff !important;
        border: none !important;
        transition: all 0.2s ease !important;
    }
    
    table.dataTable tbody tr:nth-child(even) {
        background-color: #f8fafc !important;
    }
    
    table.dataTable tbody tr:hover {
        background-color: #e2e8f0 !important;
        transform: scale(1.01) !important;
        box-shadow: 0 2px 8px rgba(59, 130, 246, 0.2) !important;
    }
    
    tbody tr td {
        vertical-align: middle !important;
        color: #1f2937 !important;
        padding: 14px 12px !important;
        border: none !important;
        border-bottom: 1px solid rgba(203, 213, 225, 0.5) !important;
        font-weight: 600 !important;
        font-size: 0.95rem !important;
    }
    
    /* Table borders */
    .table-bordered {
        border: 1px solid #475569 !important;
    }
    .table-bordered th,
    .table-bordered td {
        border: 1px solid #475569 !important;
    }
    /* Total row */
    .total-row {
        background: linear-gradient(135deg, #164e63 0%, #0f766e 100%) !important;
        font-weight: 700 !important;
        color: #22c55e !important;
        box-shadow: 0 2px 8px rgba(34, 197, 94, 0.3) !important;
        border-top: 2px solid #22c55e !important;
    }
    .total-row td {
        color: #22c55e !important;
        font-size: 1.1rem !important;
        padding: 16px 12px !important;
        font-weight: 700 !important;
        text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3) !important;
    }
    .total-row .text-danger {
        color: #ef4444 !important;
        text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3) !important;
    }
    
    /* Gross Income row */
    .gross-income {
        background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%) !important;
        font-weight: 700 !important;
        box-shadow: 0 2px 8px rgba(59, 130, 246, 0.4) !important;
        border-top: 2px solid #3b82f6 !important;
    }
    .gross-income td {
        color: #ffffff !important;
        font-size: 1.2rem !important;
        padding: 18px 12px !important;
        font-weight: 800 !important;
        text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3) !important;
    }
    .gross-income .text-primary {
        color: #ffffff !important;
    }
    /* Text colors */
    .text-green {
        color: #16a34a !important;
        font-weight: 700 !important;
    }
    .text-red {
        color: #dc2626 !important;
        font-weight: 700 !important;
    }
    .text-danger {
        color: #dc2626 !important;
        font-weight: 700 !important;
    }
    .text-end {
        text-align: right !important;
    }
    .text-center {
        text-align: center !important;
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
        color: #f8fafc !important;
        font-weight: 600 !important;
    }
    .dataTables_wrapper .dataTables_filter input {
        background-color: #334155 !important;
        border: 1px solid #475569 !important;
        color: #f8fafc !important;
        font-weight: 600 !important;
        padding: 6px 12px !important;
    }
    .dataTables_wrapper .dataTables_length select {
        background-color: #334155 !important;
        border: 1px solid #475569 !important;
        color: #f8fafc !important;
        font-weight: 600 !important;
        padding: 4px 8px !important;
    }
    .page-link {
        background-color: #334155 !important;
        border-color: #475569 !important;
        color: #f8fafc !important;
        font-weight: 600 !important;
    }
    .page-link:hover {
        background-color: #475569 !important;
        border-color: #64748b !important;
        color: #ffffff !important;
        font-weight: 700 !important;
    }
    .page-item.active .page-link {
        background-color: #3b82f6 !important;
        border-color: #3b82f6 !important;
        color: #ffffff !important;
        font-weight: 700 !important;
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