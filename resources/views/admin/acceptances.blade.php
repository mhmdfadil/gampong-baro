@extends('components.app')

@section('title', 'Manajemen Sambutan')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">
<style>
    :root {
        --primary-gradient: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
        --danger-gradient: linear-gradient(135deg, #ff416c 0%, #ff4b2b 100%);
        --success-gradient: linear-gradient(135deg, #00b09b 0%, #96c93d 100%);
        --warning-gradient: linear-gradient(135deg, #ffb347 0%, #ffcc33 100%);
        --dark-color: #2c3e50;
        --light-color: #f8f9fa;
        --shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }
    
    body {
        background-color: #f5f7fa;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
  
    .setting-card {
        border-radius: 15px;
        box-shadow: var(--shadow);
        border: none;
        overflow: hidden;
        transition: transform 0.3s ease;
        background: white;
    }
    
    .setting-card:hover {
        transform: translateY(-5px);
    }
    
    .setting-header {
        background: var(--primary-gradient);
        color: white;
        border-bottom: none;
        padding: 20px;
        font-weight: 600;
    }
    
    .dataTables_wrapper {
        padding: 0 15px;
    }
    
    .dataTables_wrapper .dataTables_filter input {
        border-radius: 8px;
        padding: 5px 10px;
        border: 1px solid #ddd;
    }
    
    .dataTables_wrapper .dataTables_length select {
        border-radius: 8px;
        padding: 5px;
        border: 1px solid #ddd;
    }
    
    .dataTables_info {
        padding-left: 15px;
    }
    
    .dataTables_paginate {
        padding-right: 15px;
    }
    
    .dataTables_length {
        margin-bottom: 15px;
    }
    
    .dataTables_length select {
        min-width: 70px;
    }
    
    .table {
        margin-bottom: 0;
        border-collapse: separate;
        border-spacing: 0 10px;
        width: 100% !important;
    }
    
    .table thead th {
        border-top: none;
        border-bottom: 2px solid #eee;
        font-weight: 700;
        color: var(--dark-color);
        text-transform: uppercase;
        font-size: 0.8rem;
        letter-spacing: 0.5px;
        background-color: #f8f9fa;
        padding: 15px;
    }
    
    .table tbody tr {
        transition: all 0.2s;
        border-radius: 10px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.05);
    }
    
    .table tbody tr:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    
    .table tbody td {
        vertical-align: middle;
        padding: 15px;
        border-top: 1px solid #f0f0f0;
        border-bottom: 1px solid #f0f0f0;
    }
    
    .table tbody td:first-child {
        border-left: 1px solid #f0f0f0;
        border-top-left-radius: 10px;
        border-bottom-left-radius: 10px;
    }
    
    .table tbody td:last-child {
        border-right: 1px solid #f0f0f0;
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
    }
    
    .badge {
        font-weight: 600;
        padding: 6px 12px;
        font-size: 0.75rem;
        letter-spacing: 0.5px;
    }
    
    .bg-secondary {
        background: linear-gradient(135deg, #6c757d 0%, #868e96 100%) !important;
    }
    
    .bg-warning {
        background: var(--warning-gradient) !important;
    }
    
    .bg-success {
        background: var(--success-gradient) !important;
    }
    
    .bg-danger {
        background: var(--danger-gradient) !important;
    }
    
    .btn-sm {
        padding: 0.35rem 0.75rem;
        font-size: 0.8rem;
        border-radius: 8px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 32px;
        height: 32px;
    }
    
    .btn-sm i {
        font-size: 0.9rem;
    }
    
    .animate__animated.animate__fadeInUp {
        animation-duration: 0.5s;
    }
    
    .page-header h4 i {
        margin-right: 10px;
        font-size: 1.2rem;
    }
    
    .badge.rounded-pill {
        padding: 8px 16px;
    }
    
    .dt-buttons .btn {
        margin-right: 5px;
        border-radius: 8px !important;
        font-size: 0.75rem !important;
        padding: 0.5rem 0.75rem !important;
        min-width: auto;
    }
    
    .dt-buttons .btn i {
        margin-right: 3px;
    }
    
    .dt-button-collection .dropdown-item {
        padding: 0.5rem 1rem;
        font-size: 0.75rem;
    }
    
    .dt-buttons {
        display: flex;
        flex-wrap: wrap;
        gap: 5px;
    }
    
    .badge-container {
        display: flex;
        gap: 5px;
        flex-wrap: wrap;
    }
    
    .alert-success {
        background: var(--success-gradient);
        color: white;
        border: none;
        border-radius: 8px;
        box-shadow: var(--shadow);
    }
    
    .modal-content {
        border-radius: 15px;
        overflow: hidden;
        border: none;
        box-shadow: var(--shadow);
    }
    
    .modal-header {
        background: var(--primary-gradient);
        color: white;
    }
    
    @media screen and (max-width: 767px) {
        .dt-buttons .btn {
            margin-bottom: 5px;
            flex-grow: 1;
        }
    }
</style>

@section('content')
<div class="py-2">
    <div class="row justify-content-center animate__animated animate__fadeInUp">
        <div class="col-lg-12">
            <div class="page-header">
                <div class="d-flex justify-content-between align-items-center flex-wrap">
                    <div class="mb-3">
                        <h4 class="m-0 font-weight-bold text-primary">
                            <i class=""></i> Manajemen Sambutan
                        </h4>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="badge bg-primary rounded-pill px-3 py-2">
                            <i class="fas fa-list mr-1"></i> Daftar Sambutan
                        </span>
                    </div>
                </div>
            </div>
            
           
            <div class="card setting-card mb-4">
                <div class="card-header setting-header text-white d-flex justify-content-between align-items-center flex-wrap">
                    <p class="mb-2 mb-md-0">Kelola semua sambutan yang tersedia</p>
                    <div>
                        <button type="button" class="btn btn-light btn-sm" onclick="window.location='{{ route('acceptances.create') }}'">
                            <i class="fas fa-plus mr-1"></i> 
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="acceptanceTable" class="table table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Judul</th>
                                    <th>Pejabat</th>
                                    <th>Status</th>
                                    <th>Terakhir Diubah</th>
                                    <th width="15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($acceptances as $item)
                                <tr class="{{ $item->trashed() ? 'table-secondary' : '' }}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <strong>{{ $item->title }}</strong>
                                        @if($item->trashed())
                                            <span class="badge bg-secondary ms-2">Arsip</span>
                                        @endif
                                    </td>
                                    <td>{{ $item->official_name }} <br> <small>{{ $item->position }}</small></td>
                                    <td>
                                        @if($item->is_active)
                                            <span class="badge bg-success">Aktif</span>
                                        @else
                                            <span class="badge bg-warning text-dark">Nonaktif</span>
                                        @endif
                                    </td>
                                    <td>{{ $item->updated_at->format('d/m/Y H:i') }}</td>
                                    <td>
                                        <div class="d-flex gap-2 justify-content-center flex-wrap">
                                            <button class="btn btn-sm btn-info" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#editModal{{ $item->id }}"
                                                title="Edit"
                                                data-toggle="tooltip" data-placement="top">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            
                                            @if($item->trashed())
                                                <form action="{{ route('acceptances.restore', $item->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-success" title="Pulihkan">
                                                        <i class="fas fa-trash-restore"></i>
                                                    </button>
                                                </form>
                                            @else
                                                <form action="{{ route('acceptances.destroy', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" 
                                                        title="Hapus" onclick="return confirmDelete(event)">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@foreach($acceptances as $item)
<div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="editModalLabel{{ $item->id }}"><i class="fas fa-edit me-2"></i>Edit Sambutan</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('acceptances.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label fw-bold">Judul Sambutan</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                       id="title" name="title" value="{{ old('title', $item->title) }}" required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label fw-bold">Nama Pejabat</label>
                                <input type="text" class="form-control @error('official_name') is-invalid @enderror" 
                                       id="official_name" name="official_name" value="{{ old('official_name', $item->official_name) }}" required>
                                @error('official_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label fw-bold">Jabatan</label>
                                <input type="text" class="form-control @error('position') is-invalid @enderror" 
                                       id="position" name="position" value="{{ old('position', $item->position) }}" required>
                                @error('position')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label fw-bold">Foto Pejabat</label>
                                <input type="file" class="form-control @error('photo') is-invalid @enderror" 
                                       id="photo" name="photo" accept="image/*">
                                @if($item->photo)
                                    <small class="text-muted d-block">Foto saat ini: 
                                        <a href="{{ asset('storage/'.$item->photo) }}" target="_blank">Lihat</a>
                                    </small>
                                @endif
                                <small class="text-muted">Format: JPG, PNG, JPEG. Maksimal 2MB</small>
                                @error('photo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label fw-bold">Salam Pembuka</label>
                                <input type="text" class="form-control @error('greeting_opening') is-invalid @enderror" 
                                       id="greeting_opening" name="greeting_opening" 
                                       value="{{ old('greeting_opening', $item->greeting_opening) }}" required>
                                @error('greeting_opening')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label fw-bold">Salam Penutup</label>
                                <input type="text" class="form-control @error('greeting_closing') is-invalid @enderror" 
                                       id="greeting_closing" name="greeting_closing" 
                                       value="{{ old('greeting_closing', $item->greeting_closing) }}" required>
                                @error('greeting_closing')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label fw-bold">Isi Sambutan</label>
                        <textarea class="form-control @error('content') is-invalid @enderror" 
                                  id="content" name="content" rows="5" required>{{ old('content', $item->content) }}</textarea>
                        @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label fw-bold">Kutipan (Opsional)</label>
                                <input type="text" class="form-control @error('quote') is-invalid @enderror" 
                                       id="quote" name="quote" value="{{ old('quote', $item->quote) }}">
                                @error('quote')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label fw-bold">Gambar Tanda Tangan</label>
                                <input type="file" class="form-control @error('signature_image') is-invalid @enderror" 
                                       id="signature_image" name="signature_image" accept="image/*">
                                @if($item->signature_image)
                                    <small class="text-muted d-block">Tanda tangan saat ini: 
                                        <a href="{{ asset('storage/'.$item->signature_image) }}" target="_blank">Lihat</a>
                                    </small>
                                @endif
                                <small class="text-muted">Format: JPG, PNG, JPEG. Maksimal 2MB</small>
                                @error('signature_image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                   <div class="form-check form-switch mb-3">
    <!-- Hidden input to ensure value '0' is submitted if checkbox is unchecked -->
    <input type="hidden" name="is_active" value="0">
    
    <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1"
        {{ old('is_active', $item->is_active) ? 'checked' : '' }}>
    
    <label class="form-check-label fw-bold" for="is_active">Aktifkan Sambutan</label>
</div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times me-1"></i> Tutup
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        var table = $('#acceptanceTable').DataTable({
            responsive: true,
            dom: "<'row mb-1'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                 "<'row mb-1'<'col-sm-12 col-md-6'B><'col-sm-12 col-md-6'>>" +
                 "<'row'<'col-sm-12'tr>>" +
                 "<'row mt-1'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            language: {
                search: "Cari:",
                searchPlaceholder: "Cari sambutan...",
                lengthMenu: "Tampilkan _MENU_ data per halaman",
                zeroRecords: "Tidak ada data yang ditemukan",
                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                infoEmpty: "Menampilkan 0 sampai 0 dari 0 data",
                infoFiltered: "(disaring dari _MAX_ total data)",
                paginate: {
                    first: "Pertama",
                    last: "Terakhir",
                    next: "Selanjutnya",
                    previous: "Sebelumnya"
                }
            },
            lengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]],
            buttons: [
                {
                    extend: 'copy',
                    text: '<i class="fas fa-copy"></i> Copy',
                    className: 'btn btn-secondary text-sm',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4] // Exclude action column
                    }
                },
                {
                    extend: 'print',
                    text: '<i class="fas fa-print"></i> Print',
                    className: 'btn btn-info text-sm',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4] // Exclude action column
                    }
                },
                {
                    extend: 'colvis',
                    text: '<i class="fas fa-columns"></i> Kolom',
                    className: 'btn btn-warning text-sm'
                }
            ],
            initComplete: function() {
                this.api().buttons().container().appendTo('#acceptanceTable_wrapper .col-md-6:eq(0)');
            },
            columnDefs: [
                { responsivePriority: 1, targets: 0 }, // No
                { responsivePriority: 2, targets: -1 }, // Aksi
                { responsivePriority: 3, targets: 1 }, // Judul
                { responsivePriority: 4, targets: 2 }, // Pejabat
                { responsivePriority: 5, targets: 3 }, // Status
                { responsivePriority: 6, targets: 4 }, // Terakhir Diubah
                { 
                    targets: -1, // Aksi column
                    className: 'text-center',
                    orderable: false,
                    searchable: false
                }
            ],
            autoWidth: false,
            drawCallback: function(settings) {
                if ($(window).width() > 768) {
                    this.api().columns.adjust();
                }
            }
        });
        
        $(window).on('resize', function() {
            if ($(window).width() > 768) {
                table.columns.adjust();
            }
        });
        
        $('[data-toggle="tooltip"]').tooltip({
            trigger: 'hover'
        });
    });

    function confirmDelete(e) {
        e.preventDefault();
        const form = e.target.closest('form');
        
        Swal.fire({
            title: 'Konfirmasi Penghapusan',
            text: "Anda yakin ingin menghapus sambutan ini? Tindakan ini tidak dapat dibatalkan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#6a11cb',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, Hapus Sekarang!',
            cancelButtonText: 'Batalkan',
            background: 'rgba(255, 255, 255, 0.96)',
            color: '#000',
            iconColor: '#ff416c',
            scrollbarPadding: false,
            width: '32em',
            customClass: {
                container: 'swal-responsive'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    }
</script>
@endsection