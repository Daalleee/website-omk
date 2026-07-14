@extends('layouts.admin')
@section('title', 'Pengaturan Kontak')
@section('page-title', 'Pengaturan Kontak OMK')

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<style>
    #map-picker { height: 420px; border-radius: 12px; border: 2px solid var(--gray-200); z-index: 1; }
    .leaflet-container { border-radius: 12px; }
    .map-coords { font-size: 0.75rem; color: var(--gray-500); margin-top: 0.35rem; }
    #maps-address-display { font-size: 0.8rem; color: var(--green-700); background: var(--green-50); padding: 0.4rem 0.75rem; border-radius: 6px; margin-top: 0.35rem; border: 1px solid var(--green-200); display: none; }
    .map-loading { font-size: 0.75rem; color: var(--gray-400); margin-top: 0.35rem; }
    .map-toolbar { display: flex; gap: 0.5rem; margin-bottom: 0.75rem; flex-wrap: wrap; }
</style>
@endpush

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

            <div style="display:grid;grid-template-columns:1fr 1fr;gap:1.5rem;" class="mobile-stack">
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

            <div style="display:grid;grid-template-columns:1fr 1fr;gap:1.5rem;" class="mobile-stack">
                <div class="form-group">
                    <label class="form-label">Instagram Username</label>
                    <input type="text" name="instagram" class="form-input" value="{{ old('instagram', $contact->instagram) }}" placeholder="Contoh: @omk_paroki">
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Lokasi Maps</label>
                <div class="map-toolbar">
                    <input type="text" name="maps" id="maps-input" class="form-input" value="{{ old('maps', $contact->maps) }}" placeholder="Ketik alamat, klik peta, atau seret pin" style="flex:1;min-width:200px;">
                    <button type="button" id="btn-my-location" class="btn btn-secondary" title="Gunakan lokasi saya"><i class="bi bi-crosshair"></i> Lokasi Saya</button>
                </div>
                <div id="map-picker"></div>
                <div id="maps-address-display"></div>
                <div class="map-coords" id="map-coords"></div>
                <div class="map-loading" id="map-loading">Memuat peta...</div>
                <div class="form-hint">Klik pada peta, seret pin, ketik alamat, atau gunakan tombol "Lokasi Saya".</div>
            </div>

            <div style="margin-top:2rem;">
                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var mapInput = document.getElementById('maps-input');
    var addressDisplay = document.getElementById('maps-address-display');
    var coordsDisplay = document.getElementById('map-coords');
    var loadingEl = document.getElementById('map-loading');

    var defaultLat = -1.0045;
    var defaultLng = 116.6767;
    var currentAddress = mapInput.value;
    var busy = false;
    var geocodeTimer = null;

    var map = L.map('map-picker').setView([defaultLat, defaultLng], 13);

    L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
        attribution: '&copy; <a href="https://www.esri.com/">Esri</a>',
        maxZoom: 19
    }).addTo(map);

    var marker = L.marker([defaultLat, defaultLng], { draggable: true }).addTo(map);

    function updateAddressFromCoords(lat, lng) {
        if (busy) return;
        busy = true;
        coordsDisplay.textContent = lat.toFixed(6) + ', ' + lng.toFixed(6);

        fetch('https://nominatim.openstreetmap.org/reverse?format=json&lat=' + lat + '&lon=' + lng + '&accept-language=id', {
            headers: { 'User-Agent': 'OMK-CMS/1.0' }
        })
        .then(function(r) { return r.json(); })
        .then(function(data) {
            if (data && data.display_name) {
                mapInput.value = data.display_name;
                addressDisplay.textContent = data.display_name;
                addressDisplay.style.display = 'block';
            }
            busy = false;
        })
        .catch(function() {
            busy = false;
        });
    }

    function geocodeAddress(address) {
        if (!address) return;
        loadingEl.textContent = 'Mencari lokasi...';
        fetch('https://nominatim.openstreetmap.org/search?format=json&q=' + encodeURIComponent(address) + '&limit=1&accept-language=id', {
            headers: { 'User-Agent': 'OMK-CMS/1.0' }
        })
        .then(function(r) { return r.json(); })
        .then(function(data) {
            loadingEl.style.display = 'none';
            if (data && data.length > 0) {
                var lat = parseFloat(data[0].lat);
                var lng = parseFloat(data[0].lon);
                map.setView([lat, lng], 16);
                marker.setLatLng([lat, lng]);
                addressDisplay.textContent = data[0].display_name;
                addressDisplay.style.display = 'block';
                coordsDisplay.textContent = lat.toFixed(6) + ', ' + lng.toFixed(6);
            } else {
                loadingEl.textContent = 'Lokasi tidak ditemukan, geser pin untuk menentukan.';
            }
        })
        .catch(function() {
            loadingEl.style.display = 'none';
            loadingEl.textContent = 'Gagal mencari lokasi. Geser pin untuk menentukan.';
        });
    }

    marker.on('dragend', function(e) {
        var pos = e.target.getLatLng();
        updateAddressFromCoords(pos.lat, pos.lng);
    });

    map.on('click', function(e) {
        marker.setLatLng(e.latlng);
        updateAddressFromCoords(e.latlng.lat, e.latlng.lng);
    });

    document.getElementById('btn-my-location').addEventListener('click', function() {
        if (!navigator.geolocation) {
            alert('Geolokasi tidak didukung browser ini.');
            return;
        }
        this.disabled = true;
        this.innerHTML = '<i class="bi bi-arrow-repeat"></i> Mendeteksi...';
        navigator.geolocation.getCurrentPosition(function(pos) {
            var lat = pos.coords.latitude;
            var lng = pos.coords.longitude;
            map.setView([lat, lng], 17);
            marker.setLatLng([lat, lng]);
            updateAddressFromCoords(lat, lng);
            var btn = document.getElementById('btn-my-location');
            btn.disabled = false;
            btn.innerHTML = '<i class="bi bi-crosshair"></i> Lokasi Saya';
        }, function(err) {
            var msg = 'Gagal mendapatkan lokasi.';
            if (err.code === 1) msg = 'Izin lokasi ditolak. Izinkan akses lokasi di browser.';
            else if (err.code === 2) msg = 'Lokasi tidak tersedia. Coba aktifkan GPS.';
            else if (err.code === 3) msg = 'Waktu habis. Coba lagi.';
            else if (location.protocol !== 'https:' && location.hostname !== 'localhost' && location.hostname !== '127.0.0.1') msg += ' (butuh HTTPS)';
            alert(msg);
            var btn = document.getElementById('btn-my-location');
            btn.disabled = false;
            btn.innerHTML = '<i class="bi bi-crosshair"></i> Lokasi Saya';
        }, { enableHighAccuracy: false, timeout: 10000 });
    });

    mapInput.addEventListener('input', function() {
        if (geocodeTimer) clearTimeout(geocodeTimer);
        var val = this.value.trim();
        if (val.length < 3) return;
        geocodeTimer = setTimeout(function() {
            geocodeAddress(val);
        }, 800);
    });

    if (currentAddress) {
        geocodeAddress(currentAddress);
    } else {
        loadingEl.style.display = 'none';
    }
});
</script>
@endpush
