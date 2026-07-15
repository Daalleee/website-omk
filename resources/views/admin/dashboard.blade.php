@extends('layouts.admin')
@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="stats-row">
    <div class="stat-card">
        <div class="stat-icon" style="background:rgba(3,52,3,0.15);color:var(--green-400);">
            <i class="bi bi-people-fill"></i>
        </div>
        <div class="stat-info">
            <div class="num">{{ $stats['leaders'] }}</div>
            <div class="label">Pengurus Aktif</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background:rgba(3,52,3,0.12);color:#033403;">
            <i class="bi bi-person-lines-fill"></i>
        </div>
        <div class="stat-info">
            <div class="num">{{ $stats['members'] }}</div>
            <div class="label">Total Anggota</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background:rgba(245,158,11,0.15);color:#fbbf24;">
            <i class="bi bi-calendar-check-fill"></i>
        </div>
        <div class="stat-info">
            <div class="num">{{ $stats['activities'] }}</div>
            <div class="label">Kegiatan</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background:rgba(168,85,247,0.15);color:#c084fc;">
            <i class="bi bi-images"></i>
        </div>
        <div class="stat-info">
            <div class="num">{{ $stats['galleries'] }}</div>
            <div class="label">Galeri Foto</div>
        </div>
    </div>
</div>

<div class="admin-card">
    <div class="admin-card-header">
        <h2><i class="bi bi-hand-index-thumb" style="color:var(--green-400);margin-right:8px;"></i> Selamat Datang</h2>
    </div>
    <div class="admin-card-body">
        <p style="color:rgba(255,255,255,0.75);line-height:1.7;margin:0;">
            Halo, Admin! Senang bertemu denganmu di panel OMK. Di sini kamu bisa mengelola seluruh konten website &mdash; mulai dari data pengurus, anggota, kegiatan, hingga galeri foto. Semoga harimu menyenangkan dan selamat bekerja!
        </p>
    </div>
</div>
@endsection
