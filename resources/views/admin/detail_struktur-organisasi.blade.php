@extends('components.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detail Struktur Organisasi</div>

                <div class="card-body">
                    <div class="text-center mb-4">
                        <img src="{{ $strukturOrganisasi->foto_url }}" alt="{{ $strukturOrganisasi->nama }}" class="rounded-circle" width="150" height="150">
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-4 col-form-label text-md-end">Nama</label>
                        <div class="col-md-6">
                            <p class="form-control-plaintext">{{ $strukturOrganisasi->nama }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-4 col-form-label text-md-end">Jabatan</label>
                        <div class="col-md-6">
                            <p class="form-control-plaintext">{{ $strukturOrganisasi->jabatan }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-4 col-form-label text-md-end">WhatsApp</label>
                        <div class="col-md-6">
                            <p class="form-control-plaintext">
                                @if($strukturOrganisasi->whatsapp)
                                    <a href="{{ $strukturOrganisasi->whatsapp_link }}" target="_blank">{{ $strukturOrganisasi->whatsapp }}</a>
                                @else
                                    -
                                @endif
                            </p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-4 col-form-label text-md-end">Email</label>
                        <div class="col-md-6">
                            <p class="form-control-plaintext">
                                @if($strukturOrganisasi->email)
                                    <a href="{{ $strukturOrganisasi->email_link }}">{{ $strukturOrganisasi->email }}</a>
                                @else
                                    -
                                @endif
                            </p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-4 col-form-label text-md-end">Urutan</label>
                        <div class="col-md-6">
                            <p class="form-control-plaintext">{{ $strukturOrganisasi->urutan }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-4 col-form-label text-md-end">Status</label>
                        <div class="col-md-6">
                            <span class="badge bg-{{ $strukturOrganisasi->status == 'aktif' ? 'success' : 'danger' }}">
                                {{ ucfirst($strukturOrganisasi->status) }}
                            </span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 offset-md-4">
                            <a href="{{ route('struktur-organisasi.index') }}" class="btn btn-secondary">
                                Kembali
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection