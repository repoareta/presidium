@extends('layouts.layout-user')

@push('page-styles')
    
@endpush

@section('content')
<div class="container">
    <!--begin::Row-->
    <div class="row justify-content-center">
        <!--begin::Col-->
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
        <div class="col-lg-6 col-md-6">
            <!--begin::Card-->
            <div class="card card-custom gutter-b border-top-success" style="border-top-width: 5px; border-style: solid;">
                <!--begin::Body-->
                <div class="card-body pt-4">
                    <!--begin::User-->
                    <div class="d-flex align-items-center mb-7">
                        <!--begin::Pic-->
                        <div class="flex-shrink-0 mr-4">
                            <div class="symbol symbol-circle symbol-lg-90">
                                <img src="{{ asset('images/covid19/svg/007-clean.svg') }}" alt="image">
                            </div>
                        </div>
                        <!--end::Pic-->
                        <!--begin::Title-->
                        <div class="d-flex flex-column">
                            <a href="#" class="text-dark font-weight-bold text-hover-primary font-size-h1 mb-0">T194 - Data Penyintas Covid</a>
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
            <form action="{{ route('penyintas_covid.store') }}" method="post" id="formPenyintas">
                @csrf
                <!--begin::Card-->
                <div class="card card-custom gutter-b">
                    <!--begin::Body-->
                    <div class="card-body">
                        <div class="form-group">
                            <label class="font-size-h4">Nama Lengkap <span class="text-danger font-size-sm">*</span></label>
                            <input type="text" class="form-control mt-3" name="nama" placeholder="Jawaban anda">
                        </div>
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Card-->
                <!--begin::Card-->
                <div class="card card-custom gutter-b">
                    <!--begin::Body-->
                    <div class="card-body"> 
                        <div class="form-group">
                            <label class="font-size-h4">Kelas <span class="text-danger font-size-sm">*</span></label>
                            <div class="radio-list mt-3">
                                <label class="radio">
                                    <input type="radio" name="kelas" value="Maverick - Fis1">
                                    <span></span>Maverick - Fis1
                                </label>
                                <label class="radio">
                                    <input type="radio" name="kelas" value="Blitzkrieg - Fis2">
                                    <span></span>Blitzkrieg - Fis2
                                </label>
                                <label class="radio">
                                    <input type="radio" name="kelas" value="Scream - Fis3">
                                    <span></span>Scream - Fis3
                                </label>
                                <label class="radio">
                                    <input type="radio" name="kelas" value="Exist - Fis4">
                                    <span></span>Exist - Fis4
                                </label>
                                <label class="radio">
                                    <input type="radio" name="kelas" value="Strive - Fis5">
                                    <span></span>Strive - Fis5
                                </label>
                                <label class="radio">
                                    <input type="radio" name="kelas" value="Geteks - Fis6">
                                    <span></span>Geteks - Fis6
                                </label>
                                <label class="radio">
                                    <input type="radio" name="kelas" value="Toelalith - Fis7">
                                    <span></span>Toelalith - Fis7
                                </label>
                                <label class="radio">
                                    <input type="radio" name="kelas" value="Error - Fis8">
                                    <span></span>Error - Fis8
                                </label>
                                <label class="radio">
                                    <input type="radio" name="kelas" value="Boomers - Bio1">
                                    <span></span>Boomers - Bio1
                                </label>
                                <label class="radio">
                                    <input type="radio" name="kelas" value="Beerers - Bio2">
                                    <span></span>Beerers - Bio2
                                </label>
                                <label class="radio">
                                    <input type="radio" name="kelas" value="Solid - Sos">
                                    <span></span>Solid - Sos
                                </label>
                            </div>
                        </div>
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Card-->
                <!--begin::Card-->
                <div class="card card-custom gutter-b">
                    <!--begin::Body-->
                    <div class="card-body"> 
                        <div class="form-group">
                            <label class="font-size-h4">Jenis Kelamin <span class="text-danger font-size-sm">*</span></label>
                            <div class="radio-list mt-3">
                                <label class="radio">
                                    <input type="radio" name="jenkel" value="L">
                                    <span></span>Laki - laki
                                </label>
                                <label class="radio">
                                    <input type="radio" name="jenkel" value="P">
                                    <span></span>Perempuan
                                </label>                                
                            </div>
                        </div>
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Card-->
                <!--begin::Card-->
                <div class="card card-custom gutter-b">
                    <!--begin::Body-->
                    <div class="card-body">
                        <div class="form-group">
                            <label class="font-size-h4">Golongan Darah</label>
                            <input type="text" class="form-control mt-3" name="goldar" placeholder="Jawaban anda">
                        </div>
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Card-->
                <!--begin::Card-->
                <div class="card card-custom gutter-b">
                    <!--begin::Body-->
                    <div class="card-body">
                        <div class="form-group">
                            <label class="font-size-h4">Rhesus</label>
                            <input type="text" class="form-control mt-3" name="rhesus" placeholder="Jawaban anda">
                        </div>
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Card-->
                <!--begin::Card-->
                <div class="card card-custom gutter-b">
                    <!--begin::Body-->
                    <div class="card-body">
                        <div class="form-group">
                            <label class="font-size-h4">Tanggal Dinyatakan Sembuh</label>
                            <div class="input-group date mt-3">
                                <input type="text" id="tanggalSembuh" class="form-control" name="sembuh"readonly="readonly" placeholder="Pilih Tanggal">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-calendar-check-o"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Card-->
                <!--begin::Card-->
                <div class="card card-custom gutter-b">
                    <!--begin::Body-->
                    <div class="card-body">
                        <div class="form-group">
                            <label class="font-size-h4">Kota Domisili <span class="text-danger font-size-sm">*</span></label>
                            <input type="text" class="form-control mt-3" name="kota" placeholder="Jawaban anda">
                        </div>
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Card-->
                <!--begin::Card-->
                <div class="card card-custom gutter-b">
                    <!--begin::Body-->
                    <div class="card-body"> 
                        <div class="form-group">
                            <label class="font-size-h4">Bisa Donor Plasma</label>
                            <div class="radio-list mt-3">
                                <label class="radio">
                                    <input type="radio" name="donor_plasma" value="T">
                                    <span></span>Ya
                                </label>
                                <label class="radio">
                                    <input type="radio" name="donor_plasma" value="F">
                                    <span></span>Tidak
                                </label>                                
                            </div>
                        </div>
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Card-->
                <button type="submit" class="btn btn-bg-success text-white font-weight-bold px-3">Kirim</button>
            </form>
            <!--end::Form-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->
</div>
@endsection

@push('page-scripts')
<script>
    $(document).ready(function(){
        $('#tanggalSembuh').datepicker({
            format: 'dd-mm-yyyy',
            orientation: "left bottom",
            locale: 'id',
            language: 'id',
            maxDate: '0',
            date: new Date(),
            endDate: new Date()
        });
    });
</script>
@endpush