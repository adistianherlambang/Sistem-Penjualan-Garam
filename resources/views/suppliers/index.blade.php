@extends('layouts.app')

@section('title', 'Supplier')
@section('page-title', 'Supplier')

@section('topbar-actions')
    @if(auth()->user()->isAdmin())
        <a href="{{ route('suppliers.create') }}" class="md-btn md-btn-primary md-btn-sm">
            <span class="material-symbols-outlined">add</span>
            <span>Tambah</span>
        </a>
    @endif
@endsection

@section('content')
<div class="md-card">
    <div class="md-card-header">
        <div>
            <div class="md-card-title">Daftar Supplier</div>
            <div class="md-card-subtitle">Pemasok garam mentah</div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="md-table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Telepon</th>
                    <th>Alamat</th>
                    <th>Transaksi</th>
                    <th>Catatan</th>
                    @if(auth()->user()->isAdmin())
                    <th style="text-align: right;">Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @forelse($suppliers as $supplier)
                <tr>
                    <td><strong>{{ $supplier->name }}</strong></td>
                    <td>{{ $supplier->phone ?? '-' }}</td>
                    <td>{{ $supplier->address ?? '-' }}</td>
                    <td>{{ $supplier->purchases_count }} kali</td>
                    <td>{{ $supplier->notes ?? '-' }}</td>
                    @if(auth()->user()->isAdmin())
                    <td style="text-align: right;">
                        <a href="{{ route('suppliers.edit', $supplier) }}" class="md-btn md-btn-text md-btn-sm">Ubah</a>
                        @if($supplier->purchases_count == 0)
                        <form action="{{ route('suppliers.destroy', $supplier) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Hapus supplier ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="md-btn md-btn-text md-btn-sm" style="color: var(--md-sys-color-error);">Hapus</button>
                        </form>
                        @endif
                    </td>
                    @endif
                </tr>
                @empty
                <tr>
                    <td colspan="{{ auth()->user()->isAdmin() ? 6 : 5 }}" style="text-align: center; color: var(--md-sys-color-on-surface-variant); padding: 24px;">Belum ada data supplier</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pagination-wrapper">
        {{ $suppliers->links() }}
    </div>
</div>
@endsection
