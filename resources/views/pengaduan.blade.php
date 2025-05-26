@extends('components.main')

@section('content')
<body class="bg-light">
<div class="py-0 px-3">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10">
            <!-- Header Section -->
            <div class="text-center mb-4" data-aos="fade-down">
                <div class="section-title">
                    <span>Formulir Pengaduan</span>
                </div>
                <p class="fs-[6] mb-0">Sampaikan keluhan/permintaan Anda dengan lengkap dan jelas</p>
                <div class="d-flex justify-content-center align-items-center mt-3">
                    <div class="badge bg-primary rounded-pill px-3 py-2">
                        <i class="fas fa-shield-alt me-2"></i>Data Anda terlindungi
                    </div>
                </div>
            </div>
            
            <!-- Error Messages -->
            @if($errors->any())
                <div class="alert alert-danger mb-4 animate__animated animate__fadeIn" role="alert">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-exclamation-circle me-2 fs-4"></i>
                        <h5 class="alert-heading mb-0">Terdapat kesalahan</h5>
                    </div>
                    <hr>
                    <ul class="mb-0 ps-3">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <!-- Form Card -->
            <div class="card border-0 shadow-lg rounded-3 overflow-hidden" data-aos="fade-up" data-aos-delay="100">
                <div class="card-header bg-gradient-primary  py-3" >
                    <h4 class="mb-0" style="color: white"><i class="fas fa-edit me-2"></i> Isi Formulir</h4>
                </div>
                <div class="card-body p-2 p-md-5">
                    <form action="{{ route('pengaduan.store') }}" method="POST" id="complaintForm" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf
                        
                        <!-- Personal Information Section -->
                        <div class="mb-2">
                            <h5 class="mb-4 text-primary d-flex align-items-center">
                                <span class="bg-primary-soft rounded-circle  me-3">
                                    <i class="fas fa-user-circle"></i>
                                </span>
                                Informasi Pribadi
                            </h5>
                            
                            <!-- Name Field -->
                            <div class="mb-4">
                                <label for="name" class="form-label fw-semibold">Nama Lengkap <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-primary-soft text-primary"><i class="fas fa-user"></i></span>
                                    <input type="text" class="form-control py-2" id="name" name="name" placeholder="Masukkan nama lengkap" value="{{ old('name') }}" required>
                                    <div class="invalid-feedback">Harap isi nama lengkap Anda</div>
                                </div>
                            </div>
                            
                            <!-- Contact Field -->
                            <div class="mb-4">
                                <label for="contact" class="form-label fw-semibold">Nomor Telepon/WhatsApp <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-primary-soft text-primary"><i class="fas fa-phone-alt"></i></span>
                                    <input type="tel" class="form-control py-2" id="contact" name="contact" placeholder="Contoh: 081234567890" value="{{ old('contact') }}" required>
                                    <div class="invalid-feedback">Harap isi nomor yang dapat dihubungi</div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Complaint Information Section -->
                        <div class="mb-5">
                            <h5 class="mb-4 text-primary d-flex align-items-center">
                                <span class="bg-primary-soft rounded-circle p-2 me-3">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </span>
                                Detail Pengaduan
                            </h5>
                            
                            <!-- Complaint Category -->
                            <div class="mb-4">
                                <label for="category" class="form-label fw-semibold">Kategori Pengaduan <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-primary-soft text-primary"><i class="fas fa-tags"></i></span>
                                    <select class="form-select py-2" id="category" name="category" required>
                                        <option value="" selected disabled>Pilih kategori</option>
                                        <option value="umum" {{ old('category') == 'umum' ? 'selected' : '' }}>Umum</option>
                                        <option value="sosial_kebersihan" {{ old('category') == 'sosial_kebersihan' ? 'selected' : '' }}>Sosial & Kebersihan</option>
                                        <option value="keamanan" {{ old('category') == 'keamanan' ? 'selected' : '' }}>Keamanan</option>
                                        <option value="kesehatan" {{ old('category') == 'kesehatan' ? 'selected' : '' }}>Kesehatan</option>
                                        <option value="permintaan" {{ old('category') == 'permintaan' ? 'selected' : '' }}>Permintaan</option>
                                    </select>
                                    <div class="invalid-feedback">Harap pilih kategori pengaduan</div>
                                </div>
                            </div>
                            
                            <!-- Complaint Details -->
                            <div class="mb-4">
                                <label for="complaint" class="form-label fw-semibold">Detail Pengaduan <span class="text-danger">*</span></label>
                                <textarea class="form-control" id="complaint" name="complaint" rows="5" placeholder="Jelaskan pengaduan Anda secara detail" required>{{ old('complaint') }}</textarea>
                                <div class="form-text ps-1">Mohon jelaskan dengan jelas dan lengkap untuk mempermudah penanganan.</div>
                                <div class="invalid-feedback">Harap isi detail pengaduan Anda</div>
                            </div>
                            
                            <!-- File Upload -->
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Unggah Bukti (Opsional)</label>
                                <div class="file-upload-wrapper border border-2 border-dashed rounded-3 p-4 position-relative overflow-hidden bg-light">
                                    <div class="file-upload-content text-center">
                                        <div class="position-relative d-inline-block">
                                            <i class="fas fa-cloud-upload-alt fa-3x text-primary mb-3"></i>
                                            <div class="position-absolute top-0 start-100 translate-middle">
                                                <span class="badge bg-primary rounded-pill pulse-animation">
                                                    <i class="fas fa-plus"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <h5 class="fw-semibold mb-2">Seret & Lepaskan file disini</h5>
                                        <p class="text-muted mb-3">atau</p>
                                        <label for="attachments" class="btn btn-primary px-4 rounded-pill">
                                            <i class="fas fa-folder-open me-2"></i>Pilih File
                                        </label>
                                        <div class="form-text mt-3">Maksimal 3 file (Gambar/PDF), ukuran maksimal per file: 5MB</div>
                                    </div>
                                    <input class="form-control d-none" type="file" id="attachments" name="attachments[]" multiple accept=".jpg,.jpeg,.png,.pdf,.docx,.doc" maxfiles="3">
                                    <div id="filePreview" class="mt-3 d-none">
                                        <h6 class="fw-semibold mb-3 d-flex align-items-center">
                                            <i class="fas fa-paperclip me-2"></i>File Terpilih:
                                        </h6>
                                        <div id="fileList" class="row g-3"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Submit Button -->
                        <div class="d-grid mt-5" data-aos="zoom-in" data-aos-delay="200">
                            <button type="submit" class="btn btn-primary btn-lg py-3 fw-semibold rounded-pill shadow-sm">
                                <i class="fas fa-paper-plane me-2"></i>Kirim Pengaduan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- Form Footer -->
            <div class="text-center mt-2 mb-3" data-aos="fade-up" data-aos-delay="300">
                <div class="d-flex align-items-center justify-content-center text-muted">
                    <i class="fas fa-clock me-2"></i>
                    <div>
                        <small>Pengaduan Anda akan diproses dalam 1-3 hari kerja</small>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 overflow-hidden">
            <div class="modal-body text-center p-0">
                <div class="success-header bg-gradient-primary py-4">
                    <div class="success-animation mb-4">
                        <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                            <circle class="checkmark-circle" cx="26" cy="26" r="25" fill="none"/>
                            <path class="checkmark-check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                        </svg>
                    </div>
                </div>
                <div class="px-4 py-5">
                    <h3 class="fw-bold mb-3 text-primary">Pengaduan Terkirim!</h3>
                    <p class="mb-4">Terima kasih telah menyampaikan pengaduan. Kami akan segera menindaklanjuti keluhan Anda.</p>
                    
                    @if(session('nomor_pengaduan'))
                        <div class="alert alert-primary alert-dismissible fade show mb-4" role="alert">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-bullhorn me-2"></i>
                                <div>
                                    <strong>Nomor Pengaduan:</strong> 
                                    <span class="d-block mt-1">{{ session('nomor_pengaduan') }}</span>
                                </div>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    
                    <div class="d-flex justify-content-center gap-3">
                        <button type="button" class="btn btn-outline-primary px-4 rounded-pill" data-bs-dismiss="modal">
                            <i class="fas fa-times me-2"></i>Tutup
                        </button>
                        <button type="button" class="btn btn-primary px-4 rounded-pill" onclick="window.location.href='{{ url('/') }}'">
                            <i class="fas fa-home me-2"></i>Beranda
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- File Preview Modal -->
<div class="modal fade" id="filePreviewModal" tabindex="-1" aria-hidden="true">
   <div class="modal-dialog modal-lg modal-dialog-centered">
       <div class="modal-content border-0 shadow-lg" style="max-height: 90vh;">
           <div class="modal-header border-0">
               <h5 class="modal-title w-75 text-truncate" id="previewFileName"></h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
           </div>
           <div class="modal-body p-0 d-flex justify-content-center align-items-center" id="filePreviewContent" style="min-height: 50vh;">
               <!-- Preview content will be inserted here -->
           </div>
           <div class="modal-footer border-0 bg-light">
               <button type="button" class="btn btn-outline-secondary rounded-pill" data-bs-dismiss="modal">
                   <i class="fas fa-times me-2"></i>Tutup
               </button>
               <button type="button" class="btn btn-primary rounded-pill" id="downloadPreviewFile">
                   <i class="fas fa-download me-2"></i>Unduh
               </button>
           </div>
       </div>
   </div>
</div>

<style>
    /* Custom Variables */
    :root {


        --primary-soft: rgba(78, 115, 223, 0.1);
        --success-color: #1cc88a;
        --danger-color: #e74a3b;
        --warning-color: #f6c23e;
        --info-color: #36b9cc;
    }
    
    /* Base Styles */
    body {
        font-family: 'Poppins', 'Segoe UI', system-ui, -apple-system, sans-serif;
        background-color: #f8f9fc;
        color: #5a5c69;
        line-height: 1.6;
    }
    
    /* Gradient Background */
    .bg-gradient-primary {
        background: linear-gradient(135deg, var(--primary-color) 0%, #224abe 100%);
    }
    
    .bg-primary-soft {
        background-color: var(--primary-soft);
    }
    

  
    
  
    
    
    /* Form Styling */
    .card {
        border: none;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1) !important;
    }
    
    .card-header {
        border-bottom: none;
    }
    
    .form-control, .form-select {
        padding: 0.75rem 1rem;
        border-radius: 0.5rem !important;
        transition: all 0.3s ease;
        border: 1px solid #d1d3e2;
    }
    
    .form-control:focus, .form-select:focus {
        box-shadow: 0 0 0 0.25rem rgba(78, 115, 223, 0.25);
        border-color: var(--primary-color);
    }
    
    .input-group-text {
        border-radius: 0.5rem 0 0 0.5rem !important;
        background-color: var(--primary-soft);
        border-right: none;
    }
    
    .input-group .form-control {
        border-left: none;
    }
    
    textarea {
        resize: none;
        min-height: 150px;
    }
    
    /* Buttons */
    .btn-primary {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
        transition: all 0.3s ease;
    }
    
    .btn-primary:hover {
        background-color: var(--primary-hover);
        border-color: var(--primary-hover);
        transform: translateY(-2px);
    }
    
    .btn-outline-primary {
        color: var(--primary-color);
        border-color: var(--primary-color);
    }
    
    .btn-outline-primary:hover {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
    }
    
    .btn-lg {
        padding: 0.75rem 2rem;
        font-size: 1.1rem;
    }
    
    .rounded-pill {
        border-radius: 50rem !important;
    }
    
    /* File Upload Styling */
    .file-upload-wrapper {
        transition: all 0.3s ease;
        background-color: #f8f9fc;
        border-color: #d1d3e2 !important;
    }
    
    .file-upload-wrapper:hover {
        border-color: var(--primary-color) !important;
        background-color: rgba(78, 115, 223, 0.05) !important;
    }
    
    .file-upload-wrapper.drag-over {
        background-color: rgba(78, 115, 223, 0.1) !important;
        border-color: var(--primary-color) !important;
    }
    
    .file-card {
        border: 1px solid #e3e6f0;
        border-radius: 0.75rem;
        padding: 1.25rem;
        transition: all 0.3s ease;
        cursor: pointer;
        background: white;
        position: relative;
        overflow: hidden;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.03);
    }
    
    .file-card:hover {
        transform: translateY(-5px);
        border-color: var(--primary-color);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
    }
    
    .file-icon {
        font-size: 2rem;
        margin-bottom: 0.75rem;
        transition: all 0.3s ease;
    }
    
    .file-card:hover .file-icon {
        transform: scale(1.15);
        color: var(--primary-color);
    }
    
    .file-name {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        font-weight: 500;
    }
    
    .file-size {
        font-size: 0.8rem;
        color: #858796;
    }
    
    .file-remove {
        position: absolute;
        top: -5px;
        right: -5px;
        width: 25px;
        height: 25px;
        border-radius: 50%;
        background: var(--danger-color);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.7rem;
        cursor: pointer;
        transition: all 0.3s ease;
        z-index: 10;
        opacity: 0;
    }
    
    .file-card:hover .file-remove {
        opacity: 1;
        transform: scale(1);
    }
    
    .file-remove:hover {
        transform: scale(1.1) !important;
        background: #c03546;
    }
    
    /* Success Animation */
    .success-animation {
        width: 100px;
        height: 100px;
        margin: 0 auto;
        position: relative;
    }
    
    .success-header {
        background: linear-gradient(135deg, var(--primary-color) 0%, #224abe 100%);
    }
    
    .checkmark {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        display: block;
        stroke-width: 2;
        stroke: white;
        stroke-miterlimit: 10;
        box-shadow: inset 0 0 0 rgba(255, 255, 255, 0.1);
        animation: fill-circle 0.4s ease-in-out 0.4s forwards, scale-circle 0.3s ease-in-out 0.9s both;
    }
    
    .checkmark-circle {
        stroke-dasharray: 166;
        stroke-dashoffset: 166;
        stroke-width: 2;
        stroke-miterlimit: 10;
        fill: none;
        animation: stroke-checkmark-circle 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards;
    }
    
    .checkmark-check {
        transform-origin: 50% 50%;
        stroke-dasharray: 48;
        stroke-dashoffset: 48;
        animation: stroke-checkmark 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards;
    }
    
    /* Preview Container */
    .preview-container {
        max-height: 70vh;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100%;
        padding: 20px;
    }
    
    .preview-image {
        max-width: 100%;
        max-height: 65vh;
        border-radius: 0.5rem;
        object-fit: contain;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    }
    
    /* Pulse Animation */
    .pulse-animation {
        animation: pulse 2s infinite;
    }
    
    /* Keyframe Animations */
    @keyframes fill-circle {
        0% {
            box-shadow: inset 0 0 0 50px rgba(255, 255, 255, 0.1);
        }
        100% {
            box-shadow: inset 0 0 0 0 rgba(255, 255, 255, 0.1);
        }
    }
    
    @keyframes scale-circle {
        0%, 100% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.1);
        }
    }
    
    @keyframes stroke-checkmark-circle {
        0% {
            stroke-dashoffset: 166;
        }
        100% {
            stroke-dashoffset: 0;
        }
    }
    
    @keyframes stroke-checkmark {
        0% {
            stroke-dashoffset: 48;
        }
        100% {
            stroke-dashoffset: 0;
        }
    }
    
    @keyframes pulse {
        0% {
            transform: scale(0.95);
            box-shadow: 0 0 0 0 rgba(78, 115, 223, 0.7);
        }
        70% {
            transform: scale(1);
            box-shadow: 0 0 0 10px rgba(78, 115, 223, 0);
        }
        100% {
            transform: scale(0.95);
            box-shadow: 0 0 0 0 rgba(78, 115, 223, 0);
        }
    }
    
    /* Responsive Adjustments */
    @media (max-width: 768px) {
    
        
        .card-body {
            padding: 1.5rem;
        }
        
        .file-icon {
            font-size: 1.75rem;
        }
        
        .btn-lg {
            padding: 0.65rem 1.5rem;
            font-size: 1rem;
        }
    }
</style>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
   document.addEventListener('DOMContentLoaded', function() {
       // Initialize AOS animations
       if (typeof AOS !== 'undefined') {
           AOS.init({
               once: true,
               easing: 'ease-out-quart',
               duration: 800,
               offset: 100
           });
       }
       
       // Enable Bootstrap validation
       (function() {
           'use strict'
           
           var forms = document.querySelectorAll('.needs-validation')
           
           Array.prototype.slice.call(forms)
               .forEach(function(form) {
                   form.addEventListener('submit', function(event) {
                       if (!form.checkValidity()) {
                           event.preventDefault()
                           event.stopPropagation()
                       }
                       
                       form.classList.add('was-validated')
                   }, false)
               })
       })();
       
       // Show success modal if there's a success message
       @if(session('success'))
           const successModal = new bootstrap.Modal(document.getElementById('successModal'));
           successModal.show();
       @endif
       
       // File upload elements
       const attachments = document.getElementById('attachments');
       const filePreview = document.getElementById('filePreview');
       const fileList = document.getElementById('fileList');
       const filePreviewModal = new bootstrap.Modal(document.getElementById('filePreviewModal'));
       const previewFileName = document.getElementById('previewFileName');
       const filePreviewContent = document.getElementById('filePreviewContent');
       const fileUploadWrapper = document.querySelector('.file-upload-wrapper');
       const fileUploadContent = document.querySelector('.file-upload-content');
       let currentPreviewFile = null;
       
       // Drag and drop functionality
       if (fileUploadWrapper) {
           fileUploadWrapper.addEventListener('dragover', function(e) {
               e.preventDefault();
               this.classList.add('drag-over');
           });
           
           fileUploadWrapper.addEventListener('dragleave', function() {
               this.classList.remove('drag-over');
           });
           
           fileUploadWrapper.addEventListener('drop', function(e) {
               e.preventDefault();
               this.classList.remove('drag-over');
               if (e.dataTransfer.files.length) {
                   attachments.files = e.dataTransfer.files;
                   handleFiles();
               }
           });
       }
       
       if (attachments) {
           attachments.addEventListener('change', handleFiles);
       }
       
       function handleFiles() {
           if (!fileList || !filePreview || !fileUploadContent) return;
           
           fileList.innerHTML = '';
           
           if (attachments.files.length > 0) {
               filePreview.classList.remove('d-none');
               fileUploadContent.classList.add('d-none');
               
               // Limit to 3 files
               if (attachments.files.length > 3) {
                   showToast('error', 'Maksimal 3 file yang dapat diunggah');
                   resetFileInput();
                   return;
               }
               
               // Check file size and type
               for (let i = 0; i < attachments.files.length; i++) {
                   const file = attachments.files[i];
                   const fileSizeMB = file.size / (1024 * 1024);
                   
                   if (fileSizeMB > 5) {
                       showToast('error', `File ${file.name} melebihi ukuran maksimal 5MB`);
                       resetFileInput();
                       return;
                   }
                   
                   if (!isValidFileType(file)) {
                       showToast('error', `Format file ${file.name} tidak didukung`);
                       resetFileInput();
                       return;
                   }
                   
                   createFileCard(file, i);
               }
               
               setupFileCardEvents();
           } else {
               resetFilePreview();
           }
       }
       
       function isValidFileType(file) {
           const validTypes = ['image/jpeg', 'image/png', 'image/jpg', 'application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
           return validTypes.includes(file.type);
       }
       
       function createFileCard(file, index) {
           const fileCard = document.createElement('div');
           fileCard.className = 'col-12 col-sm-6 col-md-4';
           
           let fileIcon = 'fa-file';
           let previewable = false;
           let iconColor = 'text-muted';
           
           if (file.type.includes('image')) {
               fileIcon = 'fa-file-image';
               iconColor = 'text-success';
               previewable = true;
           } else if (file.type.includes('pdf')) {
               fileIcon = 'fa-file-pdf';
               iconColor = 'text-danger';
           } else if (file.type.includes('word') || file.type.includes('document')) {
               fileIcon = 'fa-file-word';
               iconColor = 'text-primary';
           }
           
           fileCard.innerHTML = `
               <div class="file-card position-relative" data-file-index="${index}" data-previewable="${previewable}">
                   <div class="text-center">
                       <i class="fas ${fileIcon} ${iconColor} file-icon"></i>
                       <div class="file-name text-truncate" style="max-width: 90%;" title="${file.name}">${file.name}</div>
                       <div class="file-size">${(file.size / (1024 * 1024)).toFixed(2)} MB</div>
                   </div>
                   <div class="file-remove" data-file-index="${index}">&times;</div>
               </div>
           `;
           fileList.appendChild(fileCard);
       }
       
       function setupFileCardEvents() {
           // Add click event for file preview
           document.querySelectorAll('.file-card').forEach(card => {
               card.addEventListener('click', function(e) {
                   if (e.target.classList.contains('file-remove')) return;
                   
                   const fileIndex = this.getAttribute('data-file-index');
                   const file = attachments.files[fileIndex];
                   const previewable = this.getAttribute('data-previewable') === 'true';
                   
                   currentPreviewFile = file;
                   showFilePreview(file, previewable);
               });
           });
           
           // Add click event for remove buttons
           document.querySelectorAll('.file-remove').forEach(btn => {
               btn.addEventListener('click', function(e) {
                   e.stopPropagation();
                   const fileIndex = this.getAttribute('data-file-index');
                   removeFile(fileIndex);
               });
           });
       }
       
       function showFilePreview(file, previewable) {
           previewFileName.innerHTML = `
               <div class="d-flex justify-content-between align-items-center w-100">
                   <span class="text-truncate me-2" style="max-width: 90%;" title="${file.name}">${file.name}</span>
               </div>
           `;
           
           filePreviewContent.innerHTML = '';
           
           const previewContainer = document.createElement('div');
           previewContainer.className = 'preview-container w-100';
           filePreviewContent.appendChild(previewContainer);
           
           if (previewable && file.type.includes('image')) {
               const reader = new FileReader();
               reader.onload = function(e) {
                   const img = document.createElement('img');
                   img.src = e.target.result;
                   img.className = 'preview-image img-fluid';
                   img.alt = 'Preview';
                   previewContainer.appendChild(img);
                   filePreviewModal.show();
               };
               reader.readAsDataURL(file);
           } else {
               const fileIcon = getFileIconClass(file);
               previewContainer.innerHTML = `
                   <div class="p-4 text-center">
                       <i class="fas ${fileIcon} fa-5x mb-3"></i>
                       <p class="text-muted">Pratinjau tidak tersedia untuk jenis file ini</p>
                   </div>
               `;
               filePreviewModal.show();
           }
       }
       
       function getFileIconClass(file) {
           if (file.type.includes('image')) return 'fa-file-image text-success';
           if (file.type.includes('pdf')) return 'fa-file-pdf text-danger';
           if (file.type.includes('word') || file.type.includes('document')) return 'fa-file-word text-primary';
           return 'fa-file text-muted';
       }
       
       function removeFile(index) {
           const dataTransfer = new DataTransfer();
           for (let i = 0; i < attachments.files.length; i++) {
               if (i != index) {
                   dataTransfer.items.add(attachments.files[i]);
               }
           }
           
           attachments.files = dataTransfer.files;
           
           if (attachments.files.length === 0) {
               resetFilePreview();
           } else {
               handleFiles();
           }
       }
       
       function resetFileInput() {
           attachments.value = '';
           resetFilePreview();
       }
       
       function resetFilePreview() {
           filePreview.classList.add('d-none');
           fileUploadContent.classList.remove('d-none');
       }
       
       // Download button in preview modal
       document.getElementById('downloadPreviewFile').addEventListener('click', function() {
           if (currentPreviewFile) {
               downloadFile(currentPreviewFile);
           }
       });
       
       function downloadFile(file) {
           const url = URL.createObjectURL(file);
           const a = document.createElement('a');
           a.href = url;
           a.download = file.name;
           document.body.appendChild(a);
           a.click();
           document.body.removeChild(a);
           URL.revokeObjectURL(url);
       }
       
       // Toast notification
       function showToast(type, message) {
           const toast = document.createElement('div');
           toast.className = `toast show position-fixed bottom-0 end-0 mb-4 me-4 align-items-center text-white bg-${type} border-0`;
           toast.style.zIndex = '9999';
           toast.role = 'alert';
           toast.setAttribute('aria-live', 'assertive');
           toast.setAttribute('aria-atomic', 'true');
           
           toast.innerHTML = `
               <div class="d-flex">
                   <div class="toast-body">
                       <i class="fas ${type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle'} me-2"></i>
                       ${message}
                   </div>
                   <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
               </div>
           `;
           
           document.body.appendChild(toast);
           
           setTimeout(() => {
               toast.classList.remove('show');
               setTimeout(() => {
                   document.body.removeChild(toast);
               }, 300);
           }, 3000);
       }
   });
</script>
@endsection