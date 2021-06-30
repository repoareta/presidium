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
            <form action="{{ route('pasien_covid.store') }}" method="post" id="formPasien">
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
                            <label class="font-size-h4">Kondisi Saat Ini <span class="text-danger font-size-sm">*</span></label>
                            <div class="radio-list mt-3">
                                <label class="radio">
                                    <input type="radio" name="kondisi" value="Isolasi Mandiri">
                                    <span></span>Isolasi Mandiri
                                </label>
                                <label class="radio">
                                    <input type="radio" name="kondisi" value="Isolasi di tempat khusus isolasi">
                                    <span></span>Isolasi di tempat khusus isolasi
                                </label>                                
                                <label class="radio">
                                    <input type="radio" name="kondisi" value="Dirawat di rumah sakit (ruang isolasi)">
                                    <span></span>Dirawat di rumah sakit (ruang isolasi)
                                </label>                                
                                <label class="radio">
                                    <input type="radio" name="kondisi" value="Dirawat di rumah sakit (ICU)">
                                    <span></span>Dirawat di rumah sakit (ICU)
                                </label>                                
                                <label class="radio">
                                    <input type="radio" name="kondisi" value="T">
                                    <span></span>Yang lain:
                                </label>                                
                                <input type="text" class="form-control" name="kondisi_sendiri" placeholder="Jawaban anda">
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
                            <label class="font-size-h4">Support yang Diperlukan Saat Ini <span class="text-danger font-size-sm">*</span></label>
                            <div class="checkbox-list mt-3">
                                <label class="checkbox">
                                    <input type="checkbox" name="support[]" value="Obat-obatan dan vitamin">
                                    <span></span>Obat-obatan dan vitamin
                                </label>
                                <label class="checkbox">
                                    <input type="checkbox" name="support[]" value="Oksigen">
                                    <span></span>Oksigen
                                </label>
                                <label class="checkbox">
                                    <input type="checkbox" name="support[]" value="Makanan utama siap makan">
                                    <span></span>Makanan utama siap makan
                                </label>
                                <label class="checkbox">
                                    <input type="checkbox" name="support[]" value="Buah-buahan">
                                    <span></span>Buah-buahan
                                </label>
                                <label class="checkbox">
                                    <input type="checkbox" name="support[]" value="T">
                                    <span></span>Yang lain:
                                </label>
                                <input type="text" class="form-control" name="support_sendiri" placeholder="Jawaban anda">
                            </div>
                        </div>
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Card-->
                <button type="submit" class="btn btn-bg-danger text-white font-weight-bold px-3">Kirim</button>
            </form>
            <!--end::Form-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->
</div>
@endsection

@push('page-scripts')
@endpush