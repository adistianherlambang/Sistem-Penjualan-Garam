@extends('layouts.app')

@section('title', 'Pengaturan')
@section('page-title', 'Pengaturan')

@section('content')
<div class="md-card" style="max-width: 680px; margin: 0 auto;">
    <div class="md-card-header">
        <div>
            <div class="md-card-title">Pengaturan Dasar Sistem</div>
            <div class="md-card-subtitle">Profil toko, alamat, dan informasi dokumen cetak</div>
        </div>
    </div>

    <form action="{{ route('settings.update') }}" method="POST">
        @csrf
        <div class="form-group">
            <label class="form-label" for="store_name">Nama Toko / Usaha</label>
            <input type="text" id="store_name" name="store_name" class="form-input {{ $errors->has('store_name') ? 'is-invalid' : '' }}" value="{{ old('store_name', $settings['store_name']) }}" required>
        </div>

        <div class="form-group">
            <label class="form-label" for="store_address">Alamat Toko / Gudang</label>
            <textarea id="store_address" name="store_address" rows="3" class="form-textarea">{{ old('store_address', $settings['store_address']) }}</textarea>
        </div>

        <div class="form-group">
            <label class="form-label" for="store_phone">Nomor Kontak / Telepon</label>
            <input type="text" id="store_phone" name="store_phone" class="form-input" value="{{ old('store_phone', $settings['store_phone']) }}">
        </div>

        <div class="form-group">
            <label class="form-label" for="receipt_footer">Pesan Kaki Nota (Footer)</label>
            <input type="text" id="receipt_footer" name="receipt_footer" class="form-input" value="{{ old('receipt_footer', $settings['receipt_footer']) }}" placeholder="Terima kasih atas kunjungan Anda.">
        </div>

        <div class="form-actions">
            <button type="submit" class="md-btn md-btn-primary">
                <span>Simpan</span>
            </button>
        </div>
    </form>
</div>
@endsection
