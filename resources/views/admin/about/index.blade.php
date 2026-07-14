@extends('layouts.admin')
@section('title', 'Pengaturan Tentang')
@section('page-title', 'Pengaturan Tentang OMK')

@section('content')
<div class="admin-card">
    <div class="admin-card-header">
        <h2>Form Informasi Tentang OMK</h2>
    </div>
    <div class="admin-card-body">
        <form action="{{ route('admin.about.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <h3 style="color:var(--green-400);font-size:1rem;margin-bottom:1rem;border-bottom:1px solid rgba(255,255,255,0.1);padding-bottom:0.5rem;">Identitas Organisasi</h3>

            <div class="form-group">
                <label class="form-label">Sejarah</label>
                <textarea name="history" class="form-input" rows="6">{{ old('history', $about->history) }}</textarea>
            </div>

            <div style="display:flex;flex-direction:column;gap:1.5rem;">
                <div class="form-group">
                    <label class="form-label">Visi</label>
                    <textarea name="vision" id="vision" class="form-input" rows="4">{{ old('vision', $about->vision) }}</textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">Misi</label>
                    <textarea name="mission" id="mission" class="form-input" rows="4">{{ old('mission', $about->mission) }}</textarea>
                </div>
            </div>



            <h3 style="color:var(--green-400);font-size:1rem;margin:2rem 0 1rem;border-bottom:1px solid rgba(255,255,255,0.1);padding-bottom:0.5rem;">Bapak Pendamping</h3>

            <div class="form-group">
                <label class="form-label">Nama Bapak Pendamping</label>
                <input type="text" name="pastor_name" class="form-input" value="{{ old('pastor_name', $about->pastor_name) }}">
            </div>

            <div class="form-group">
                <label class="form-label">Biografi Singkat Bapak</label>
                <textarea name="pastor_bio" class="form-input" rows="3">{{ old('pastor_bio', $about->pastor_bio) }}</textarea>
            </div>

            <div class="form-group">
                <label class="form-label">Foto Bapak</label>
                @if($about->pastor_photo)
                <div style="margin-bottom:10px;">
                    <img src="{{ Storage::url($about->pastor_photo) }}" alt="Bapak Photo" style="height:100px;border-radius:8px;object-fit:cover;">
                </div>
                @endif
                <input type="file" name="pastor_photo" class="form-input" accept="image/*">
            </div>

            <div style="margin-top:2rem;">
                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
</div>

<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.config.versionCheck = false;
    CKEDITOR.replace('vision');
    CKEDITOR.replace('mission');
</script>
@endsection
