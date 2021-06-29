@extends('layouts.layout-user')

@section('content')
<div class="container">
    <!--begin::Row-->
    <div class="row justify-content-center">
        <!--begin::Col-->
        <div class="col-lg-6 col-md-6">
            <!--begin::Card-->
            <div class="card card-custom gutter-b border-top-danger" style="border-top-width: 5px; border-style: solid;">
                <!--begin::Body-->
                <div class="card-body pt-4">
                    <!--begin::User-->
                    <div class="d-flex align-items-center mb-7">
                        <!--begin::Pic-->
                        <div class="flex-shrink-0 mr-4">
                            <div class="symbol symbol-circle symbol-lg-90">
                                <img src="{{ asset('images/covid19/svg/037-medical mask.svg') }}" alt="image">
                            </div>
                        </div>
                        <!--end::Pic-->
                        <!--begin::Title-->
                        <div class="d-flex flex-column">
                            <a href="#" class="text-dark font-weight-bold text-hover-primary font-size-h1 mb-0">T194 - Data Pasien Covid</a>
                        </div>
                        <!--end::Title-->
                    </div>
                    <!--end::User-->
                    <!--begin::Label-->
                    <span class="text-danger font-weight-bold">* Wajib</span>
                    <!--end::Label-->
                    <!--begin::Buttons-->
                    <div class="mt-9">
                        <a href="{{ route('home') }}" class="btn btn-light-warning font-weight-bolder btn-sm font-size-lg py-3 px-6 text-uppercase">
                            <i class="fas fa-arrow-left fa-md"></i>
                            Back
                        </a>
                    </div>
                    <!--end::Buttons-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Card-->
            <!--begin::Form-->
            <form action="{{ route('pasien_covid.store') }}" method="post">
                @csrf
                <!--begin::Card-->
                <div class="card card-custom gutter-b">
                    <!--begin::Body-->
                    <div class="card-body">
                        <div class="form-group">
                            <label>Full Name:</label>
                            <input type="email" class="form-control" placeholder="Enter full name">
                        </div>
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Card-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->
</div>
@endsection