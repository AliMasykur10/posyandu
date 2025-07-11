    @extends('layouts.app')

    @section('title', 'Data Penimbangan Anak')

    @push('style')
        <link href="{{ asset('library/selectric/public/selectric.css') }}" rel="stylesheet">
        <link href="{{ asset('library/select2/dist/css/select2.min.css') }}" rel="stylesheet">
        <link href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
        <link href="{{ asset('library/summernote/dist/summernote-bs4.css') }}" rel="stylesheet">
    @endpush

    @section('main')
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>Data Penimbangan Anak</h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item"><a href="#">Layanan</a></div>
                        <div class="breadcrumb-item">Data Penimbangan Anak</div>
                    </div>
                </div>

                <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <form action="{{ route('store.weighing') }}" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <input id="user_id" name="user_id" type="hidden"
                                                value="{{ Auth::user()->id }}">

                                            <div class="form-group col-6">
                                                <label for="child_id">Nama Anak</label>
                                                <select class="form-control select2" id="child_id" name="child_id">
                                                    <option disabled selected value="">-- Nama Anak --</option>
                                                    @foreach ($children as $child)
                                                        <option data-birthdate="{{ $child->date_of_birth }}"
                                                            data-father="{{ $child->parent->nama_ayah }}"
                                                            data-gender="{{ $child->gender }}"
                                                            data-mother="{{ $child->parent->nama_ibu }}"
                                                            value="{{ $child->id }}">
                                                            {{ $child->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('child_id')
                                                    <span class="text-danger text-small">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group col-6">
                                                <label for="gender">Jenis Kelamin</label>
                                                <input class="form-control" id="gender" readonly type="text">
                                            </div>

                                            <div class="form-group col-6">
                                                <label for="mother">Nama Ibu</label>
                                                <input class="form-control" id="mother" readonly type="text">
                                            </div>

                                            <div class="form-group col-6">
                                                <label for="father">Nama Ayah</label>
                                                <input class="form-control" id="father" readonly type="text">
                                            </div>

                                            <div class="form-group col-6">
                                                <label for="birthdate">Tanggal Lahir</label>
                                                <input class="form-control" id="birthdate" readonly type="text">
                                            </div>

                                            <div class="form-group col-6">
                                                <label for="age">Usia</label>
                                                <input class="form-control" id="age" name="age" readonly
                                                    type="text" value="{{ old('age') }}">
                                                @error('age')
                                                    <span class="text-danger text-small">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group col-6">
                                                <label for="weigh_date">Tanggal Penimbangan</label>
                                                <input class="form-control datepicker" id="weigh_date" name="weigh_date"
                                                    type="text" value="{{ old('weigh_date') }}">
                                                @error('weigh_date')
                                                    <span class="text-danger text-small">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group col-6">
                                                <label for="body_weight">Berat Badan (BB)</label>
                                                <input class="form-control" id="body_weight" name="body_weight"
                                                    step="0.01" type="number">
                                                @error('body_weight')
                                                    <span class="text-danger text-small">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group col-6">
                                                <label for="height">Tinggi Badan (TB)</label>
                                                <input class="form-control" id="height" name="height" type="number">
                                                @error('height')
                                                    <span class="text-danger text-small">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group col-6">
                                                <label for="in_accordance">Perkembangan</label>
                                                <select class="form-control selectric" id="in_accordance"
                                                    name="in_accordance">
                                                    <option disabled selected value="">-- Perkembangan --
                                                    </option>
                                                    <option {{ old('in_accordance') == 'Y' ? 'selected' : '' }}
                                                        value="Y">
                                                        Sesuai
                                                    </option>
                                                    <option {{ old('in_accordance') == 'T' ? 'selected' : '' }}
                                                        value="T">
                                                        Tidak
                                                    </option>
                                                </select>
                                                @error('in_accordance')
                                                    <span class="text-danger text-small">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group col-6" id="keterangan-container"
                                                style="display: none;">
                                                <label for="information">Keterangan</label>
                                                <div>
                                                    <textarea class="summernote-simple" id="information" name="information"></textarea>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button class="btn btn-primary" type="submit">Kirim</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    @endsection

    @push('scripts')
        <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
        <script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
        <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
        <script src="{{ asset('library/summernote/dist/summernote-bs4.js') }}"></script>
        <script>
            $(document).ready(function() {
                $('#child_id').change(function() {
                    var selectedOption = $('option:selected', this);
                    var selectedGender = selectedOption.data('gender');
                    var selectedMother = selectedOption.data('mother');
                    var selectedFather = selectedOption.data('father');
                    var selectedBirthdate = new Date(selectedOption.data('birthdate'));

                    // Ubah jenis kelamin jika "L" menjadi "Laki-laki", jika "P" menjadi "Perempuan"
                    selectedGender = (selectedGender === 'L') ? 'Laki-laki' : (selectedGender === 'P') ?
                        'Perempuan' : selectedGender;

                    // Ubah format tanggal lahir
                    var formattedBirthdate = formatDate(selectedBirthdate);

                    // Hitung umur
                    var age = calculateAge(selectedBirthdate);

                    // Tampilkan hasil perhitungan umur pada input atau tempat yang sesuai
                    $('#gender').val(selectedGender);
                    $('#mother').val(selectedMother);
                    $('#father').val(selectedFather);
                    $('#birthdate').val(formattedBirthdate);
                    $('#age').val(formatAge(age));
                });

                function formatDate(date) {
                    var options = {
                        day: 'numeric',
                        month: 'long',
                        year: 'numeric'
                    };
                    return date.toLocaleDateString('id-ID', options);
                }

                function calculateAge(birthdate) {
                    var currentDate = new Date();

                    var ageInMilliseconds = currentDate - birthdate;

                    // Hitung umur dalam tahun, bulan, dan hari
                    var ageInYears = Math.floor(ageInMilliseconds / (365.25 * 24 * 60 * 60 * 1000));
                    var ageInMonths = Math.floor((ageInMilliseconds % (365.25 * 24 * 60 * 60 * 1000)) / (30.44 * 24 *
                        60 * 60 * 1000));
                    var ageInDays = Math.floor((ageInMilliseconds % (30.44 * 24 * 60 * 60 * 1000)) / (24 * 60 * 60 *
                        1000));

                    return {
                        years: ageInYears,
                        months: ageInMonths,
                        days: ageInDays
                    };
                }

                function formatAge(age) {
                    var formattedAge = '';

                    if (age.years > 0) {
                        formattedAge += age.years + ' tahun ';
                    }

                    if (age.months > 0) {
                        formattedAge += age.months + ' bulan ';
                    }

                    if (age.days > 0) {
                        formattedAge += age.days + ' hari';
                    }

                    return formattedAge.trim();
                }
            });

            $(document).ready(function() {
                // Menggunakan event change untuk mendeteksi perubahan pada dropdown Perkembangan
                $('#in_accordance').change(function() {
                    // Mendapatkan nilai dropdown yang dipilih
                    var selectedValue = $(this).val();

                    // Menampilkan atau menyembunyikan elemen keterangan berdasarkan nilai dropdown
                    if (selectedValue === 'T') {
                        $('#keterangan-container').show();
                    } else {
                        $('#keterangan-container').hide();
                    }
                });
            });
        </script>
    @endpush
