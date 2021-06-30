@extends('layouts.layout-admin')

@section('breadcrumb')
    {{ Breadcrumbs::render('dashboard') }}
@endsection

@push('page-styles')

@endpush

@section('content')
<div class="container-fluid">
    {{-- Validation error --}}
    @if (count($errors) > 0)
        <div class="error">
            @foreach ($errors->all() as $error)
                <div class="alert alert-custom alert-light-danger fade show mb-3" role="alert">
                    <div class="alert-text">{{ $error }}</div>
                    <div class="alert-close">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="ki ki-close"></i></span>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    @endif  
    <!--begin::Card-->
    <div class="card card-custom" id="kt_page_sticky_card">
        <div class="card-header" style="">
            <div class="card-title">
                <h3 class="card-label">Tambah Data User 
                <i class="mr-2"></i>
                <small class="">Data User</small></h3>
                <a href="{{ route('admin.master.users.index') }}" class="btn btn-light-primary font-weight-bolder">
                    Back
                </a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.master.users.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label class="font-size-h4">Nama <span class="text-danger font-size-sm">*</span></label>
                    <input type="text" class="form-control mt-3" name="name">
                </div>
                <div class="form-group">
                    <label class="font-size-h4">Email <span class="text-danger font-size-sm">*</span></label>
                    <input type="email" class="form-control mt-3" name="email">
                </div>
                <div class="form-group">
                    <label class="font-size-h4">Password <span class="text-danger font-size-sm">*</span></label>
                    <input type="password" class="form-control mt-3" name="password">
                </div>
            </form>
        </div>
    </div>
    <!--end::Card-->
</div>
@endsection

@push('page-scripts')
@endpush
