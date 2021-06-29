@extends('layouts.layout-user')

@section('content')
<div class="container">
    <!--begin::Row-->
    <div class="row">
        <!--begin::Col-->
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
            <!--begin::Card-->
            <div class="card card-custom gutter-b card-stretch">
                <!--begin::Body-->
                <div class="card-body text-center pt-4">                    
                    <!--begin::User-->
                    <div class="mt-7">
                        <div class="symbol symbol-circle symbol-lg-90">
                            <img src="{{ asset('images/covid19/svg/039-epi.svg') }}" alt="image">
                        </div>
                    </div>
                    <!--end::User-->
                    <!--begin::Name-->
                    <div class="my-4">
                        <a href="#" class="text-dark font-weight-bold text-hover-primary font-size-h4">Data Tenaga Kesehatan Ti94</a>
                    </div>
                    <!--end::Name-->
                    <!--begin::Label-->
                    <span class="btn btn-text btn-light-success btn-sm font-weight-bold">Aktif</span>
                    <!--end::Label-->
                    <!--begin::Buttons-->
                    <div class="mt-9">
                        <a href="{{ route('tenaga_kesehatan.create') }}" class="btn btn-light-primary font-weight-bolder btn-sm py-3 px-6 text-uppercase">Isi Formulir</a>
                    </div>
                    <!--end::Buttons-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
            <!--begin::Card-->
            <div class="card card-custom gutter-b card-stretch">
                <!--begin::Body-->
                <div class="card-body text-center pt-4">                    
                    <!--begin::User-->
                    <div class="mt-7">
                        <div class="symbol symbol-circle symbol-lg-90">
                            <img src="{{ asset('images/covid19/svg/007-clean.svg') }}" alt="image">
                        </div>
                    </div>
                    <!--end::User-->
                    <!--begin::Name-->
                    <div class="my-4">
                        <a href="#" class="text-dark font-weight-bold text-hover-primary font-size-h4">Data Penyintas Covid Ti94</a>
                    </div>
                    <!--end::Name-->
                    <!--begin::Label-->
                    <span class="btn btn-text btn-light-success btn-sm font-weight-bold">Aktif</span>
                    <!--end::Label-->
                    <!--begin::Buttons-->
                    <div class="mt-9">
                        <a href="{{ route('penyintas_covid.create') }}" class="btn btn-light-primary font-weight-bolder btn-sm py-3 px-6 text-uppercase">Isi Formulir</a>
                    </div>
                    <!--end::Buttons-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
            <!--begin::Card-->
            <div class="card card-custom gutter-b card-stretch">
                <!--begin::Body-->
                <div class="card-body text-center pt-4">                    
                    <!--begin::User-->
                    <div class="mt-7">
                        <div class="symbol symbol-circle symbol-lg-90">
                            <img src="{{ asset('images/covid19/svg/037-medical mask.svg') }}" alt="image">
                        </div>
                    </div>
                    <!--end::User-->
                    <!--begin::Name-->
                    <div class="my-4">
                        <a href="#" class="text-dark font-weight-bold text-hover-primary font-size-h4">Data Pasien Covid Ti94</a>
                    </div>
                    <!--end::Name-->
                    <!--begin::Label-->
                    <span class="btn btn-text btn-light-success btn-sm font-weight-bold">Aktif</span>
                    <!--end::Label-->
                    <!--begin::Buttons-->
                    <div class="mt-9">
                        <a href="{{ route('pasien_covid.create') }}" class="btn btn-light-primary font-weight-bolder btn-sm py-3 px-6 text-uppercase">Isi Formulir</a>
                    </div>
                    <!--end::Buttons-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->
</div>
@endsection