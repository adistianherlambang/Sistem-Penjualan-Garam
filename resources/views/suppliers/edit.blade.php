@extends('layouts.app')

@section('title', 'Ubah Supplier')
@section('page-title', 'Ubah')

@section('content')
<div class="md-card" style="max-width: 640px; margin: 0 auto;">
    <div class="md-card-header">
        <div>
            <div class="md-card-title">Ubah Supplier</div>
            <div class="md-card-subtitle">{{ $supplier->name }}</div>
        </div>
        <a href="{{ route('suppliers.index') }}" class="md-btn md-btn-outlined md-btn-sm">Kembali</a>
    </div>

    <form action="{{ route('suppliers.update', $supplier) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label class="form-label" for="name">Nama Supplier</label>
            <input type="text" id="name" name="name" class="form-input {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name', $supplier->name) }}" required>
        </div>

        <div class="form-group">
            <label class="form-label" for="phone">Nomor Telepon</label>
            <input type="text" id="phone" name="phone" class="form-input" value="{{ old('phone', $supplier->phone) }}">
        </div>

        <div class="form-group">
            <label class="form-label" for="address">Alamat</label>
            <textarea id="address" name="address" rows="3" class="form-textarea">{{ old('address', $supplier->address) }}</textarea>
        </div>

        <div class="form-group">
            <label class="form-label" for="notes">Catatan</label>
            <textarea id="notes" name="notes" rows="2" class="form-textarea">{{ old('notes', $supplier->notes) }}</textarea>
        </div>

        <div class="form-actions">
            <button type="submit" class="md-btn md-btn-primary">
                <span class="material-symbols-outlined">save</span>
                <span>Simpan</span>
            </button>
            <a href="{{ route('suppliers.index') }}" class="md-btn md-btn-outlined">Batal</a>
        </div>
    </form>
</div>
@endsection
