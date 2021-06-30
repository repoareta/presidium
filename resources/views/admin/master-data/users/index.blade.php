@extends('layouts.layout-admin')

@section('breadcrumb')
    {{ Breadcrumbs::render('dashboard') }}
@endsection

@push('page-styles')
<link rel="stylesheet" href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" type="text/css">
@endpush

@section('content')
<div class="container-fluid">
    <!--begin::Card-->
    <div class="card card-custom card-sticky" id="kt_page_sticky_card">
        <div class="card-header" style="">
            <div class="card-title">
                <h3 class="card-label">User 
                <i class="mr-2"></i>
                <small class="">Data User</small></h3>
            </div>
            <div class="card-toolbar">
                <a href="{{ route('admin.master.users.create') }}" class="btn btn-light-primary font-weight-bolder">
                    Tambah Data
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-separate table-head-custom table-checkable nowrap" id="dataTable" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--end::Card-->
</div>
@endsection

@push('page-scripts')
    <!--Start::dataTable-->
<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<!--End::dataTable-->
<script type="text/javascript">
    $(document).ready( function () {
        var t = $('#dataTable').DataTable({
            
			scrollX   : true,
            processing: true,
            ordering: true,
            serverSide: true,
            ajax: {
                url : '{!! url()->current() !!}'
            },
            language: {
                processing: '<i class="fa fa-spinner fa-spin fa-2x fa-fw"></i> <br> Harap Tunggu...'
            },
            columns: [
                {
                    "data": 'DT_RowIndex',
                    orderable: false, 
                    searchable: false
                },
				{data: 'name', name: 'name'},
				{data: 'email', name: 'email'},
				{data: 'action', name: 'action'},
			]
		});
    } );
</script>
@endpush
