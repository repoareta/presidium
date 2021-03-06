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
                            <label class="font-size-h4">Kelas <span class="text-danger font-size-sm">*</span></label>
                            <select class="kt-select2 form-control" name="kelas_id" id="kelasSelect2">
                                <option value="">Pilih Kelas</option>
                                @foreach ($kelas as $kls)
                                    <option value="{{ $kls->id }}" {{ old('kelas_id') == $kls->id ? 'selected' : '' }}>
                                        {{ $kls->nama }}
                                    </option>
                                @endforeach
                            </select>
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
                            <label class="font-size-h4">Nama Lengkap <span class="text-danger font-size-sm">*</span></label>
                            <select class="kt-select2 form-control" name="nama" id="namaSelect2" >
                                <option value="">Pilih Nama</option>
                            </select>
                        </div>
                        <span class="text-primary text-justify font-weight-bold">
                            Jika nama tidak ada dalam list, maka anda bisa mengetikkan nama anda lalu klik enter, maka nama anda akan ada dalam list.
                        </span>
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
                                    <input type="radio" name="jenkel" value="L" {{ old('jenkel') == 'L' ? 'checked' : '' }}>
                                    <span></span>Laki - laki
                                </label>
                                <label class="radio">
                                    <input type="radio" name="jenkel" value="P" {{ old('jenkel') == 'P' ? 'checked' : '' }}>
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
                            <input type="text" class="form-control mt-3" name="goldar" placeholder="Jawaban anda" value="{{ old('goldar') }}">
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
                            <input type="text" class="form-control mt-3" name="rhesus" placeholder="Jawaban anda" value="{{ old('rhesus') }}">
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
                            <label class="font-size-h4">Emergency Number</label>
                            <div class="input-icon">
                                <span>
                                    (62)
                                </span>
                                <input type="text" class="form-control mt-3 phone_with_ddd" name="emergency_number" placeholder="Jawaban anda" value="{{ old('emergency_number') }}">
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
                            <label class="font-size-h4">Provinsi <span class="text-danger font-size-sm">*</span></label>
                            <select class="kt-select2 form-control" name="province_id" id="provinceSelect2">
                                <option value="">Pilih Provinsi</option>
                                @foreach ($provinces as $province)
                                    <option value="{{ $province->id }}" {{ old('province_id') == $province->id ? 'selected' : '' }}>{{ $province->name }}</option>
                                @endforeach
                            </select>
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
                            <label class="font-size-h4">Kabupaten <span class="text-danger font-size-sm">*</span></label>
                            <select class="kt-select2 form-control" name="regency_id" id="regencySelect2">
                                <option value="">Pilih Kabupaten</option>
                            </select>
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
                            <label class="font-size-h4">Kecamatan</label>
                            <select class="kt-select2 form-control" name="district_id" id="districtSelect2">
                                <option value="">Pilih Kabupaten</option>
                            </select>
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
                            <label class="font-size-h4">Desa</label>
                            <select class="kt-select2 form-control" name="village_id" id="villageSelect2">
                                <option value="">Pilih Desa</option>
                            </select>
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
                                    <input type="radio" name="kondisi" value="Isolasi Mandiri" {{ old('kondisi') == 'Isolasi Mandiri' ? 'checked' : '' }}>
                                    <span></span>Isolasi Mandiri
                                </label>
                                <label class="radio">
                                    <input type="radio" name="kondisi" value="Isolasi di tempat khusus isolasi" {{ old('kondisi') == 'Isolasi di tempat khusus isolasi' ? 'checked' : '' }}>
                                    <span></span>Isolasi di tempat khusus isolasi
                                </label>                                
                                <label class="radio">
                                    <input type="radio" name="kondisi" value="Dirawat di rumah sakit (ruang isolasi)" {{ old('kondisi') == 'Dirawat di rumah sakit (ruang isolasi)' ? 'checked' : '' }}>
                                    <span></span>Dirawat di rumah sakit (ruang isolasi)
                                </label>                                
                                <label class="radio">
                                    <input type="radio" name="kondisi" value="Dirawat di rumah sakit (ICU)" {{ old('kondisi') == 'Dirawat di rumah rumah sakit (ICU)' ? 'checked' : '' }}>
                                    <span></span>Dirawat di rumah sakit (ICU)
                                </label>                                
                                <label class="radio">
                                    <input type="radio" name="kondisi" value="T" {{ old('kondisi') == 'T' ? 'checked' : '' }}>
                                    <span></span>Yang lain:
                                </label>                                
                                <input type="text" class="form-control" name="kondisi_sendiri" placeholder="Jawaban anda" value="{{ old('kondisi_sendiri') }}">
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
                                    <input type="checkbox" name="support[]" value="Obat-obatan dan vitamin" {{ old('support') == 'Obat-obatan dan vitamin' ? 'checked' : '' }}>
                                    <span></span>Obat-obatan dan vitamin
                                </label>
                                <label class="checkbox">
                                    <input type="checkbox" name="support[]" value="Oksigen" {{ old('support') == 'Oksigen' ? 'checked' : '' }}>
                                    <span></span>Oksigen
                                </label>
                                <label class="checkbox">
                                    <input type="checkbox" name="support[]" value="Makanan utama siap makan" {{ old('support') == 'Makanan utama siap makan' ? 'checked' : '' }}>
                                    <span></span>Makanan utama siap makan
                                </label>
                                <label class="checkbox">
                                    <input type="checkbox" name="support[]" value="Buah-buahan" {{ old('support') == 'Buah-buahan' ? 'checked' : '' }}>
                                    <span></span>Buah-buahan
                                </label>
                                <label class="checkbox">
                                    <input type="checkbox" name="support[]" value="T" {{ old('support') == 'T' ? 'checked' : '' }}>
                                    <span></span>Yang lain:
                                </label>
                                <input type="text" class="form-control" name="support_sendiri" placeholder="Jawaban anda" value="{{ old('support_sendiri') }}">
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
<script>
    $(document).ready(function () {
        $('.kt-select2').select2();

        $("#namaSelect2").select2({
            tags: true
        });

        $('.phone_with_ddd').mask('000-0000-0000-00');
    });

    $("#kelasSelect2").select2().on('change', function() {
        var kelas = $('#kelasSelect2');
        $.ajax({
            url:"../api/alumni/" + kelas.val(),
            type:'GET',
            success:function(data) {
                    var alumni = $("#namaSelect2");
                    alumni.empty();
                    alumni.append($("<option></option>").attr("value", '').text('Pilih Nama'));
                    $.each(data, function(value, key) {
                        alumni.append($("<option></option>").attr("value", value.trim()).text(value.trim()));
                    }); 
                    alumni.select2();
                    var oldAlumni = "{{ old('nama') ? old('nama') : ''}} ";
                    if(oldAlumni){
                        console.log("{{ old('nama') }}");
                        alumni.val("{{ rtrim(old('nama')) }}").trigger('change');
                    }
                    $("#namaSelect2").select2({
                        tags: true
                    });
                }
            });
        }).trigger('change');

    $("#provinceSelect2").select2().on('change', function() {
        var province = $('#provinceSelect2');
        $.ajax({
                url:"../api/regency/" + province.val(),
                type:'GET',
                success:function(data) {
                    var regency = $("#regencySelect2");
                    var district = $("#districtSelect2");
                    var village = $("#villageSelect2");
                    regency.empty();
                    district.empty();
                    village.empty();
                    regency.append($("<option></option>").attr("value", '').text('Pilih Kabupaten'));
                    district.append($("<option></option>").attr("value", '').text('Pilih Kecamatan'));
                    village.append($("<option></option>").attr("value", '').text('Pilih Desa'));
                    $.each(data, function(value, key) {
                        regency.append($("<option></option>").attr("value", key).text(value));
                    });
                    regency.select2();
                    var oldRegency = "{{ old('regency_id') ? old('regency_id') : '' }}";
                    if(oldRegency){
                        $("#regencySelect2").val("{{ old('regency_id') }}").trigger('change');
                    }
                }
            });
    }).trigger('change');

    $("#regencySelect2").select2().on('change', function() {
        var oldRegency2 = "{{ old('regency_id') ? old('regency_id') : ''}} ";
        if(oldRegency2 > 0){
            var regency = "{{ old('regency_id') }}";
        }else{
            var regency = $("#regencySelect2").val();    
        }
        $.ajax({
                url:"../api/district/" + regency,
                type:'GET',
                success:function(data) {
                    var district = $("#districtSelect2");
                    var village = $("#villageSelect2");
                    district.empty();
                    village.empty();
                    district.append($("<option></option>").attr("value", '').text('Pilih Kecamatan'));
                    village.append($("<option></option>").attr("value", '').text('Pilih Desa'));
                    $.each(data, function(value, key) {
                        district.append($("<option></option>").attr("value", key).text(value));
                    }); 
                    district.select2();
                    var oldDistrict = "{{ old('district_id') ? old('district_id') : '' }}";
                    if(oldDistrict){
                        $("#districtSelect2").val("{{ old('district_id') }}").trigger('change');
                    }
                }
            });
    }).trigger('change');

    $("#districtSelect2").select2().on('change', function() {
        var oldDistrict2 = "{{ old('district_id') ? old('district_id') : ''}} ";
        if(oldDistrict2 > 0){
            var district = "{{ old('district_id') }}";
        }else{
            var district = $("#districtSelect2").val();    
        }
        $.ajax({
                url:"../api/village/" + district,
                type:'GET',
                success:function(data) {
                    var village = $("#villageSelect2");
                    village.empty();
                    village.append($("<option></option>").attr("value", '').text('Pilih Desa'));
                    $.each(data, function(value, key) {
                        village.append($("<option></option>").attr("value", key).text(value));
                    }); 
                    village.select2();
                    var oldVillage = "{{ old('village_id') ? old('village_id') : '' }}";
                    if(oldVillage){
                        $("#villageSelect2").val("{{ old('village_id') }}").trigger('change');
                    }
                }
            });
    }).trigger('change');
</script>
@endpush