@extends('layouts.admin')
@section('title', 'Pengaturan Beranda')
@section('page-title', 'Pengaturan Beranda')

@section('content')
<div class="admin-card">
    <div class="admin-card-header">
        <h2>Form Pengaturan Beranda</h2>
    </div>
    <div class="admin-card-body">
        <form action="{{ route('admin.home.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <h3 style="color:var(--green-400);font-size:1rem;margin-bottom:1rem;border-bottom:1px solid rgba(255,255,255,0.1);padding-bottom:0.5rem;">Hero Section</h3>
            
            <div class="form-group">
                <label class="form-label">Hero Title</label>
                <input type="text" name="hero_title" class="form-input" value="{{ old('hero_title', $home->hero_title) }}" required>
            </div>

            <div class="form-group">
                <label class="form-label">Hero Tagline (Kata setelah judul)</label>
                <input type="text" name="hero_tagline" class="form-input" value="{{ old('hero_tagline', $home->hero_tagline) }}">
            </div>
            
            <div class="form-group">
                <label class="form-label">Hero Subtitle</label>
                <textarea name="hero_subtitle" class="form-input" rows="3">{{ old('hero_subtitle', $home->hero_subtitle) }}</textarea>
            </div>

            <div class="form-group">
                <label class="form-label">Hero Image (Logo Tengah)</label>
                @if($home->hero_image)
                <div style="margin-bottom:10px;">
                    <img src="{{ Storage::url($home->hero_image) }}" alt="Hero Image" style="height:100px;border-radius:8px;object-fit:cover;">
                </div>
                @endif
                <input type="file" name="hero_image" class="form-input" accept="image/*" data-crop="1.7778">
            </div>

            <h3 style="color:var(--green-400);font-size:1rem;margin:2rem 0 1rem;border-bottom:1px solid rgba(255,255,255,0.1);padding-bottom:0.5rem;">Section Sambutan</h3>

            <div class="form-group">
                <label class="form-label">Judul Sambutan</label>
                <input type="text" name="welcome_title" class="form-input" value="{{ old('welcome_title', $home->welcome_title) }}">
            </div>

            <div class="form-group">
                <label class="form-label">Nama Ketua/Penulis Sambutan</label>
                <input type="text" name="welcome_name" class="form-input" value="{{ old('welcome_name', $home->welcome_name) }}">
            </div>

            <div class="form-group">
                <label class="form-label">Pesan Sambutan</label>
                <textarea name="welcome_message" class="form-input" rows="5">{{ old('welcome_message', $home->welcome_message) }}</textarea>
            </div>

            <div class="form-group">
                <label class="form-label">Foto Ketua/Penulis</label>
                @if($home->welcome_photo)
                <div style="margin-bottom:10px;">
                    <img src="{{ Storage::url($home->welcome_photo) }}" alt="Welcome Photo" style="height:100px;border-radius:8px;object-fit:cover;">
                </div>
                @endif
                <input type="file" name="welcome_photo" class="form-input" accept="image/*" data-crop="0.75">
            </div>

            <h3 style="color:var(--green-400);font-size:1rem;margin:2rem 0 1rem;border-bottom:1px solid rgba(255,255,255,0.1);padding-bottom:0.5rem;">Nama & Logo OMK</h3>

            <div class="form-group">
                <label class="form-label">Nama OMK</label>
                <input type="text" name="brand_name" class="form-input" value="{{ old('brand_name', $home->brand_name) }}">
            </div>

            <div class="form-group">
                <label class="form-label">Logo OMK</label>
                @if($home->brand_logo)
                <div style="margin-bottom:10px;">
                    <img src="{{ Storage::url($home->brand_logo) }}" alt="Logo" style="height:60px;border-radius:8px;object-fit:contain;">
                </div>
                @endif
                <input type="file" name="brand_logo" class="form-input" accept="image/*" data-crop="1" data-crop-format="png">
            </div>

            <div class="form-group">
                <label class="form-label">Deskripsi Footer</label>
                <textarea name="footer_description" class="form-input" rows="3">{{ old('footer_description', $home->footer_description) }}</textarea>
            </div>

            <div class="form-group">
                <label class="form-label">Teks Copyright Footer</label>
                <input type="text" name="footer_copyright" class="form-input" value="{{ old('footer_copyright', $home->footer_copyright) }}">
            </div>

            <div style="margin-top:2rem;">
                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection
