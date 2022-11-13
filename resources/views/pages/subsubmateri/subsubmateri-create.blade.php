@extends('partials.master') 
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Subsubmateri</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-lg btn-success shadow-sm mr-2" onclick="history.back()">
            <i class="fas fa-backward fa-sm text-white-50"></i> Detail Submateri
        </a>
    </div>
    <div class="row">
        <div class="col-8">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="/subsubmateri" method="POST" enctype="multipart/form-data">
                        @csrf
                        <p class="alert alert-warning">Icon/logo, header, judul, photo 1, paragraf 1, photo 2, paragraf 5 harus diisi.</p>
                        <p class="alert alert-warning">Photo 1 dan photo 2 yang diuploadkan harus berupa gambar dan berekstensi .jpg .png .jpeg .gif dan ukuran file maksimal 2 mb.</p>

                        <input type="hidden" value="{{ $submateriId }}" name="submateriId">

                        <div class="form-group">
                            <label>Icon/logo Materi</label>
                            <img class="img-icon img-fluid mb-3" style="max-height: 150px;">
                            <input type="file" accept="image/*" class="form-control @error('icon') is-invalid @enderror" name="icon" id="image-icon" onchange="previewIcon()" required>
                            @error('icon')
                                <div class="invalid-feedback">
                                    File icon tidak sesuai ketentuan.
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Header</label>
                            <img class="img-header img-fluid mb-3" style="max-width: 500px;">
                            <input type="file" accept="image/*" class="form-control @error('header') is-invalid @enderror" name="header" id="image-header" onchange="previewHeader()" required>
                            @error('header')
                                <div class="invalid-feedback">
                                    File header tidak sesuai ketentuan.
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Judul Subsubmateri</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" required>
                            @error('judul')
                                <div class="invalid-feedback">
                                    Input judul minimal 5 karakter.
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Photo 1</label>
                            <img class="img-photo1 img-fluid mb-3" style="max-width: 500px;">
                            <input type="file" accept="image/*" class="form-control @error('photo1') is-invalid @enderror" name="photo1" id="image-photo1" onchange="previewPhoto1()" required>
                            @error('photo1')
                                <div class="invalid-feedback">
                                    File photo 1 tidak sesuai ketentuan.
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Paragraf 1</label>
                            <textarea class="form-control " name="paragraf1" rows="7" required></textarea>
                        </div>

                        <p class="alert alert-warning">Untuk Paragraf 2, 3, 4 boleh dikosongkan dan disii sesuai kebutuhan.</p>
                        <div class="form-group">
                            <label>Paragraf 2</label>
                            <textarea class="form-control" name="paragraf2" rows="7"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Paragraf 3</label>
                            <textarea class="form-control " name="paragraf3" rows="7"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Paragraf 4</label>
                            <textarea class="form-control" name="paragraf4" rows="7"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Photo 2</label>
                            <img class="img-photo2 img-fluid mb-3" style="max-width: 500px;">
                            <input type="file" accept="image/*" class="form-control @error('photo2') is-invalid @enderror" name="photo2" id="image-photo2" onchange="previewPhoto2()" required>
                            @error('photo2')
                                <div class="invalid-feedback">
                                    File photo 2 tidak sesuai ketentuan.
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Paragraf 5</label>
                            <textarea class="form-control " name="paragraf5" rows="7" required></textarea>
                        </div>

                        <p class="alert alert-warning">Untuk Paragraf 6, 7, 8 boleh dikosongkan dan disii sesuai kebutuhan.</p>
                        <div class="form-group">
                            <label>Paragraf 6</label>
                            <textarea class="form-control" name="paragraf6" rows="7"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Paragraf 7</label>
                            <textarea class="form-control " name="paragraf7" rows="7"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Paragraf 8</label>
                            <textarea class="form-control" name="paragraf8" rows="7"></textarea>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <h5>Panduan pengisian subsubmateri</h5>
                    <img src="{{ asset('keperluan/panduan-subsubmateri.png') }}" style="max-width: 480px">
                </div>
            </div>
        </div>
    </div>

    
</div>

<script>

function previewIcon() {
        const imageIcon = document.querySelector('#image-icon');
        const imgIcon = document.querySelector('.img-icon');

        imgIcon.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(imageIcon.files[0]);

        oFReader.onload = function(oFREvent) {
            imgIcon.src = oFREvent.target.result;
        }
    }

    function previewHeader() {
        const imageHeader = document.querySelector('#image-header');
        const imgHeader = document.querySelector('.img-header');

        imgHeader.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(imageHeader.files[0]);

        oFReader.onload = function(oFREvent) {
            imgHeader.src = oFREvent.target.result;
        }
    }

    function previewPhoto1() {
        const imagePhoto1 = document.querySelector('#image-photo1');
        const imgPhoto1 = document.querySelector('.img-photo1');

        imgPhoto1.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(imagePhoto1.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPhoto1.src = oFREvent.target.result;
        }
    }

    function previewPhoto2() {
        const imagePhoto2 = document.querySelector('#image-photo2');
        const imgPhoto2 = document.querySelector('.img-photo2');

        imgPhoto2.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(imagePhoto2.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPhoto2.src = oFREvent.target.result;
        }
    }
    
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@endsection
