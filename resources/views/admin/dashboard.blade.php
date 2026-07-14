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
        <h2><i class="bi bi-bar-chart-fill" style="color:var(--green-400);margin-right:8px;"></i> Statistik Pengunjung 7 Hari Terakhir</h2>
    </div>
    <div class="admin-card-body">
        <div style="height:300px;display:flex;align-items:flex-end;gap:2%;padding-top:2rem;">
            @php 
                $maxVisitor = $visitor_chart->max('count') ?? 1;
                $maxVisitor = $maxVisitor == 0 ? 1 : $maxVisitor; 
            @endphp
            @foreach($visitor_chart as $data)
            <div style="flex:1;display:flex;flex-direction:column;align-items:center;gap:0.5rem;">
                <div style="font-size:0.75rem;color:var(--green-400);font-weight:600;">{{ $data->count }}</div>
                <div style="width:100%;background:linear-gradient(to top, var(--green-800), var(--green-500));border-radius:4px 4px 0 0;height:{{ ($data->count / $maxVisitor) * 100 }}%;min-height:4px;transition:height 1s ease;"></div>
                <div style="font-size:0.7rem;color:rgba(255,255,255,0.5);text-align:center;">{{ \Carbon\Carbon::parse($data->date)->format('d M') }}</div>
            </div>
            @endforeach
            
            @if($visitor_chart->isEmpty())
            <div style="width:100%;text-align:center;color:rgba(255,255,255,0.4);align-self:center;">
                Belum ada data pengunjung.
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
