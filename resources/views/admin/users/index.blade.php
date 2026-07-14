@extends('layouts.admin')
@section('title', 'Data Pengguna')
@section('page-title', 'Kelola Pengguna (Admin & Editor)')

@section('content')
<div class="admin-card">
    <div class="admin-card-header">
        <h2>Daftar Pengguna Sistem</h2>
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-sm"><i class="bi bi-person-plus-fill"></i> Tambah Pengguna</a>
    </div>
    <div class="admin-card-body" style="padding:0;overflow-x:auto;">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Terdaftar Pada</th>
                    <th width="150">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td><strong>{{ $user->name }}</strong>
                        @if(auth()->id() == $user->id) <span class="badge badge-gray" style="margin-left:5px;">Anda</span> @endif
                    </td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if($user->role == 'admin')
                        <span class="badge badge-green">Administrator</span>
                        @else
                        <span class="badge badge-gray">Editor</span>
                        @endif
                    </td>
                    <td>{{ $user->created_at->format('d M Y H:i') }}</td>
                    <td>
                        <div style="display:flex;gap:0.5rem;">
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-secondary btn-sm" title="Edit"><i class="bi bi-pencil-square"></i></a>
                            @if(auth()->id() != $user->id)
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pengguna ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" title="Hapus"><i class="bi bi-trash-fill"></i></button>
                            </form>
                            @else
                            <button disabled class="btn btn-danger btn-sm" style="opacity:0.3;cursor:not-allowed;" title="Tidak dapat hapus diri sendiri"><i class="bi bi-trash-fill"></i></button>
                            @endif
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
