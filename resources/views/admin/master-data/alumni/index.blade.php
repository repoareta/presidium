@extends('layouts.layout-admin')

@section('breadcrumb')
    {{ Breadcrumbs::render('master') }}
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
                <h3 class="card-label">Alumni 
                <i class="mr-2"></i>
                <small class="">Data Alumni</small></h3>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-separate table-head-custom table-checkable nowrap" id="dataTable" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">TTL</th>
                            <th scope="col">Email</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">No HP</th>
                            <th scope="col">Pekerjaan</th>
                            <th scope="col">Perusahaan</th>
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
				{data: 'nama', name: 'nama'},
				{data: 'kelas', name: 'kelas'},
				{data: 'ttl', name: 'ttl'},
				{data: 'email', name: 'email'},
				{data: 'alamat', name: 'alamat'},
				{data: 'no_hp', name: 'no_hp'},
				{data: 'pekerjaan', name: 'pekerjaan'},
				{data: 'perusahaan', name: 'perusahaan'},
			]
		});
    } );

</script>
@endpush
