@extends('layouts.app')

@section('title', 'Tambah Supplier')
@section('page-title', 'Tambah')

@section('content')
<div class="md-card" style="max-width: 640px; margin: 0 auto;">
    <div class="md-card-header">
        <div class="md-card-title">Supplier</div>
        <a href="{{ route('suppliers.index') }}" class="md-btn md-btn-outlined md-btn-sm">Kembali</a>
    </div>

    <form action="{{ route('suppliers.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label class="form-label" for="name">Nama Supplier</label>
            <input type="text" id="name" name="name" class="form-input {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name') }}" placeholder="PT / Koperasi / Petani" required>
        </div>

        <div class="form-group">
            <label class="form-label" for="phone">Nomor Telepon</label>
            <input type="text" id="phone" name="phone" class="form-input" value="{{ old('phone') }}" placeholder="08xxxxxxxxxx">
        </div>

        <div class="form-group">
            <label class="form-label" for="address">Alamat</label>
            <textarea id="address" name="address" rows="3" class="form-textarea" placeholder="Alamat gudang / tambak garam">{{ old('address') }}</textarea>
        </div>

        <div class="form-group">
            <label class="form-label" for="notes">Catatan</label>
            <textarea id="notes" name="notes" rows="2" class="form-textarea">{{ old('notes') }}</textarea>
        </div>

        <div class="form-actions">
            <button type="submit" class="md-btn md-btn-primary">
                <span>Simpan</span>
            </button>
            <a href="{{ route('suppliers.index') }}" class="md-btn md-btn-outlined">Batal</a>
        </div>
    </form>
</div>
@endsection
