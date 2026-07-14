@extends('layouts.admin')
@section('title', 'Pengaturan Kontak')
@section('page-title', 'Pengaturan Kontak OMK')

@section('content')
<div class="admin-card" style="max-width:800px;">
    <div class="admin-card-header">
        <h2>Informasi Kontak & Sosial Media</h2>
    </div>
    <div class="admin-card-body">
        <form action="{{ route('admin.contact.update') }}" method="POST">
            @csrf
            @method('PUT')

            <h3 style="color:var(--green-400);font-size:1rem;margin-bottom:1rem;border-bottom:1px solid rgba(255,255,255,0.1);padding-bottom:0.5rem;">Kontak Utama</h3>

            <div class="form-group">
                <label class="form-label">Alamat Lengkap Sekretariat / Gereja</label>
                <textarea name="address" class="form-input" rows="3">{{ old('address', $contact->address) }}</textarea>
            </div>

            <div style="display:grid;grid-template-columns:1fr 1fr;gap:1.5rem;">
                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-input" value="{{ old('email', $contact->email) }}" placeholder="contoh@gmail.com">
                </div>
                <div class="form-group">
                    <label class="form-label">Nomor WhatsApp / Telepon</label>
                    <input type="text" name="phone" class="form-input" value="{{ old('phone', $contact->phone) }}" placeholder="Contoh: 081234567890">
                </div>
            </div>

            <h3 style="color:var(--green-400);font-size:1rem;margin:2rem 0 1rem;border-bottom:1px solid rgba(255,255,255,0.1);padding-bottom:0.5rem;">Sosial Media & Maps</h3>

            <div style="display:grid;grid-template-columns:1fr 1fr;gap:1.5rem;">
                <div class="form-group">
                    <label class="form-label">Instagram Username</label>
                    <input type="text" name="instagram" class="form-input" value="{{ old('instagram', $contact->instagram) }}" placeholder="Contoh: @omk_paroki">
                </div>
                <div class="form-group">
                    <label class="form-label">Facebook Page Name</label>
                    <input type="text" name="facebook" class="form-input" value="{{ old('facebook', $contact->facebook) }}" placeholder="Contoh: OMK Paroki">
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Google Maps Embed URL (src)</label>
                <textarea name="maps" class="form-input" rows="3">{{ old('maps', $contact->maps) }}</textarea>
                <div class="form-hint">Cara mendapatkan: Cari lokasi di Google Maps > Share/Bagikan > Embed a map (Sematkan Peta) > Copy link di dalam atribut src="..." saja.</div>
            </div>

            <div style="margin-top:2rem;">
                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection
