@extends('components.main')

@section('content')
<div class="py-4 py-lg-5 px-3">
    <div class="row justify-content-center mx-0">
        <div class="col-12 col-lg-9 col-xl-8 px-2">
            <!-- Animated Header with Glass Morphism -->
            <div class="text-center mb-3 mb-lg-5 glass-card p-4 rounded-4" data-aos="fade-down" data-aos-duration="800">
               <div class=" bg-opacity-20 text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px; backdrop-filter: blur(10px);">
                  <i class="fas fa-comment-dots fa-2x"></i>
               </div>
               <h4 class="fw-bold mb-2 text-white">Formulir Pengaduan</h4>
               <div class="animated-typing-container">
                   <p class="text-white-50 mb-0 typed-text">Sampaikan keluhan/permintaan Anda dengan lengkap...</p>
               </div>
            </div>
            
            <!-- Error Messages -->
            @if($errors->any())
                <div class="alert alert-glass-danger mb-4" data-aos="fade-up">
                    <ul class="mb-0 ps-3">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <!-- Luxurious Form Body with Glass Morphism -->
            <div class="glass-cards rounded-4 p-4 p-lg-5 shadow-luxury" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
                <form action="{{ route('pengaduan.store') }}" method="POST" id="complaintForm" enctype="multipart/form-data">
                    @csrf
                    
                    <!-- Name Field -->
                    <div class="mb-4 floating-input">
                        <label for="name" class="form-label fw-semibold text-white">Nama Lengkap <span class="text-danger">*</span></label>
                        <div class="input-group glass-input border-0 rounded-3 overflow-hidden">
                            <span class="input-group-text bg-transparent border-0 pe-2 text-white"><i class="fas fa-user"></i></span>
                            <input type="text" placeholder="Masukkan nama lengkap" class="form-control glass-input-inner border-0 py-3 text-white" id="name" name="name" placeholder=" " value="{{ old('name') }}" required>
                            <div class="floating-label text-white-50"></div>
                        </div>
                    </div>
                    
                    <!-- Contact Field -->
                    <div class="mb-4 floating-input">
                        <label for="contact" class="form-label fw-semibold text-white">Nomor Telepon/WhatsApp <span class="text-danger">*</span></label>
                        <div class="input-group glass-input border-0 rounded-3 overflow-hidden">
                            <span class="input-group-text bg-transparent border-0 pe-2 text-white"><i class="fas fa-phone-alt"></i></span>
                            <input type="number" placeholder="Contoh: 081234567890" class="form-control glass-input-inner border-0 py-3 text-white" id="contact" name="contact" placeholder=" " value="{{ old('contact') }}" required>
                            <div class="floating-label text-white-50"></div>
                        </div>
                    </div>
                    
                    <!-- Complaint Category -->
                    <div class="mb-4">
                        <label for="category" class="form-label fw-semibold text-white">Kategori Pengaduan <span class="text-danger">*</span></label>
                        <div class="input-group glass-input border-0 rounded-3 overflow-hidden select-wrapper">
                            <span class="input-group-text bg-transparent border-0 pe-2 text-white"><i class="fas fa-tags"></i></span>
                            <select class="form-control glass-input-inner border-0 py-3 text-white" id="category" name="category" required>
                                <option value="" selected disabled>Pilih kategori</option>
                                <option value="umum" {{ old('category') == 'umum' ? 'selected' : '' }}>Umum</option>
                                <option value="sosial_kebersihan" {{ old('category') == 'sosial_kebersihan' ? 'selected' : '' }}>Sosial & Kebersihan</option>
                                <option value="keamanan" {{ old('category') == 'keamanan' ? 'selected' : '' }}>Keamanan</option>
                                <option value="kesehatan" {{ old('category') == 'kesehatan' ? 'selected' : '' }}>Kesehatan</option>
                                <option value="permintaan" {{ old('category') == 'permintaan' ? 'selected' : '' }}>Permintaan</option>
                            </select>
                            <i class="fas fa-chevron-down select-arrow text-white-50"></i>
                        </div>
                    </div>
                    
                    <!-- Complaint Details -->
                    <div class="mb-4">
                        <label for="complaint" class="form-label fw-semibold text-white">Detail Pengaduan <span class="text-danger">*</span></label>
                        <div class="position-relative">
                            <textarea class="form-control glass-input-inner border-0 py-3 text-white" id="complaint" name="complaint" rows="5" placeholder="Jelaskan pengaduan Anda secara detail" required>{{ old('complaint') }}</textarea>
                            <div class="floating-label text-white-50"></div>
                        </div>
                        <div class="form-text text-white-50 ps-2">Mohon jelaskan dengan jelas dan lengkap untuk mempermudah penanganan.</div>
                    </div>
                    
                    <!-- File Upload -->
                    <div class="mb-4">
                        <label for="attachments" class="form-label fw-semibold text-white">Unggah Bukti (Opsional)</label>
                        <div class="file-upload-wrapper glass-input border-0 rounded-4 p-4 position-relative overflow-hidden">
                            <div class="file-upload-content text-center">
                                <i class="fas fa-cloud-upload-alt fa-3x text-white mb-3"></i>
                                <h5 class="fw-semibold mb-2 text-white">Seret & Lepaskan file disini</h5>
                                <p class="text-white-50 mb-3">atau</p>
                                <label for="attachments" class="btn btn-glass-outline px-4 rounded-3">
                                    <i class="fas fa-folder-open me-2"></i>Pilih File
                                </label>
                                <div class="form-text text-white-50 mt-3">Maksimal 3 file (Gambar/PDF), ukuran maksimal per file: 5MB</div>
                            </div>
                            <input class="form-control d-none" type="file" id="attachments" name="attachments[]" multiple accept=".jpg,.jpeg,.png,.pdf,.docx,.doc" maxfiles="3">
                            <div id="filePreview" class="mt-3 d-none">
                                <h6 class="fw-semibold mb-3 text-white">File Terpilih:</h6>
                                <div id="fileList" class="row g-3"></div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Submit Button -->
                    <div class="d-grid mt-5" data-aos="zoom-in" data-aos-delay="400">
                        <button type="submit" class="btn btn-neon-primary py-3 fw-semibold rounded-3 btn-hover-effect">
                            <i class="fas fa-paper-plane me-2"></i>Kirim Pengaduan
                            <span class="btn-glow"></span>
                        </button>
                    </div>
                </form>
            </div>
            
            <!-- Form Footer -->
            <div class="text-center mt-4" data-aos="fade-up" data-aos-delay="600">
                <div class="text-white-50 small">
                    <i class="fas fa-info-circle me-1"></i> Pengaduan Anda akan diproses dalam 1-3 hari kerja
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Floating Background Elements -->
<div class="bg-bubbles">
    <div class="bubble bubble-1"></div>
    <div class="bubble bubble-2"></div>
    <div class="bubble bubble-3"></div>
    <div class="bubble bubble-4"></div>
    <div class="bubble bubble-5"></div>
</div>

<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content glass-card border-0">
            <div class="modal-body text-center p-5 position-relative">
                <div class="success-animation">
                    <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                        <circle class="checkmark-circle" cx="26" cy="26" r="25" fill="none"/>
                        <path class="checkmark-check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                    </svg>
                </div>
                <h4 class="fw-bold mb-3 text-neon">Pengaduan Terkirim!</h4>
                <p class="mb-4 text-white">Terima kasih telah menyampaikan pengaduan. Kami akan segera menindaklanjuti keluhan Anda.</p>
                @if(session('nomor_pengaduan'))
                    <div class="alert alert-glass-info mb-3">
                        <strong class="text-white">Nomor Pengaduan:</strong> <span class="text-white">{{ session('nomor_pengaduan') }}</span>
                    </div>
                @endif
                <button type="button" class="btn btn-neon-outline px-4 rounded-3 btn-hover-effect" data-bs-dismiss="modal">
                    <i class="fas fa-times me-2"></i>Tutup
                </button>
            </div>
        </div>
    </div>
</div>

<!-- File Preview Modal -->
<div class="modal fade" id="filePreviewModal" tabindex="-1" aria-hidden="true">
   <div class="modal-dialog modal-lg modal-dialog-centered">
       <div class="modal-content glass-card border-0" style="max-height: 90vh;">
           <div class="modal-header border-0 position-relative">
               <h5 class="modal-title w-75 text-white" id="previewFileName"></h5>
               <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
           </div>
           <div class="modal-body p-0 d-flex justify-content-center align-items-center" id="filePreviewContent" style="min-height: 50vh;">
               <!-- Preview content will be inserted here -->
           </div>
       </div>
   </div>
</div>

<style>
    /* Base Styles with Gradient Background */
    body {
        font-family: 'Poppins', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
        color: white;
        min-height: 100vh;
        overflow-x: hidden;
    }
    .select-arrow {
        position: absolute;
        right: 12px;
        top: 50%;
        transform: translateY(-50%);
        pointer-events: none;
        color: #6c757d;
        transition: all 0.3s ease;
    }
    /* Glass Morphism Effect */
    .glass-card {
        overflow: hidden;
        max-height: 240px;
        word-wrap: normal;
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
    }

    .glass-cards {
        overflow: hidden;
        word-wrap: normal;
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
    }
    
    .glass-input {
        background: rgba(255, 255, 255, 0.05) !important;
        backdrop-filter: blur(5px);
        -webkit-backdrop-filter: blur(5px);
        border: 1px solid rgba(255, 255, 255, 0.1) !important;
    }
    
    .glass-input-inner {
        background: transparent !important;
        background: rgba(255, 255, 255, 0.1) !important;
        color: black !important;
    }
    
    .glass-input-inner::placeholder {
        color: rgba(255, 255, 255, 0.5) !important;
    }
    
    .alert-glass-danger {
        background: rgba(220, 53, 69, 0.2);
        backdrop-filter: blur(5px);
        border: 1px solid rgba(220, 53, 69, 0.3);
        color: #ff6b6b;
    }
    
    .alert-glass-info {
        background: rgba(13, 110, 253, 0.2);
        backdrop-filter: blur(5px);
        border: 1px solid rgba(13, 110, 253, 0.3);
    }
    
    /* Neon Effects */
    .text-neon {
        color: #00f2fe;
        text-shadow: 0 0 10px rgba(0, 242, 254, 0.5);
    }
    
    .btn-neon-primary {
        background: linear-gradient(135deg, #00f2fe 0%, #4facfe 100%);
        border: none;
        color: #1a1a2e;
        font-weight: 600;
        position: relative;
        overflow: hidden;
        z-index: 1;
    }
    
    .btn-neon-primary:hover {
        color: #1a1a2e;
    }
    
    .btn-neon-primary::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 0;
        height: 100%;
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        transition: all 0.4s ease;
        z-index: -1;
    }
    
    .btn-neon-primary:hover::before {
        width: 100%;
    }
    
    .btn-neon-outline {
        background: transparent;
        border: 2px solid #00f2fe;
        color: #00f2fe;
        position: relative;
        overflow: hidden;
    }
    
    .btn-neon-outline:hover {
        background: rgba(0, 242, 254, 0.1);
        color: #00f2fe;
    }
    
    .btn-neon-outline::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(0, 242, 254, 0.2), transparent);
        transition: all 0.6s ease;
    }
    
    .btn-neon-outline:hover::before {
        left: 100%;
    }
    
    .btn-glass-outline {
        background: transparent;
        border: 2px solid rgba(255, 255, 255, 0.3);
        color: white;
        transition: all 0.3s ease;
    }
    
    .btn-glass-outline:hover {
        background: rgba(255, 255, 255, 0.1);
        border-color: rgba(255, 255, 255, 0.5);
        color: white;
    }
    
    /* Floating Labels */
    .floating-input {
        position: relative;
    }
    
    .floating-label {
        position: absolute;
        top: 50%;
        left: 55px;
        transform: translateY(-50%);
        color: rgba(255, 255, 255, 0.7);
        pointer-events: none;
        transition: all 0.3s ease;
        z-index: 5;
    }
    
    .floating-input input:focus ~ .floating-label,
    .floating-input input:not(:placeholder-shown) ~ .floating-label,
    textarea:focus ~ .floating-label,
    textarea:not(:placeholder-shown) ~ .floating-label {
        top: 10px;
        left: 55px;
        font-size: 12px;
        background: rgba(26, 26, 46, 0.7);
        padding: 0 5px;
        color: #00f2fe;
    }
    
    /* Button Glow Effect */
    .btn-glow {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(45deg, 
            rgba(0, 242, 254, 0.8), 
            rgba(79, 172, 254, 0.8), 
            rgba(0, 242, 254, 0.8));
        z-index: -2;
        filter: blur(15px);
        opacity: 0;
        transition: opacity 0.5s ease;
    }
    
    .btn-hover-effect:hover .btn-glow {
        opacity: 0.6;
    }
    
    /* File Upload Styling */
    .file-upload-wrapper {
        transition: all 0.3s ease;
        border-style: dashed;
    }
    
    .file-upload-wrapper:hover {
        border-color: rgba(0, 242, 254, 0.5) !important;
        background-color: rgba(0, 242, 254, 0.05) !important;
    }
    
    .file-upload-wrapper.drag-over {
        background-color: rgba(0, 242, 254, 0.1) !important;
        border-color: rgba(0, 242, 254, 0.7) !important;
    }
    
    .file-card {
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 0.75rem;
        padding: 1rem;
        transition: all 0.3s ease;
        cursor: pointer;
        background: rgba(255, 255, 255, 0.05);
        position: relative;
        overflow: hidden;
    }
    
    .file-card:hover {
        transform: translateY(-5px);
        background: rgba(255, 255, 255, 0.1);
        border-color: rgba(0, 242, 254, 0.5);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }
    
    .file-icon {
        font-size: 2rem;
        margin-bottom: 0.5rem;
        transition: all 0.3s ease;
    }
    
    .file-card:hover .file-icon {
        transform: scale(1.2);
        color: #00f2fe;
    }
    
    .file-name {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        color: white;
    }
    
    .file-size {
        font-size: 0.8rem;
        color: rgba(255, 255, 255, 0.6);
    }
    
    .file-remove {
        position: absolute;
        top: -5px;
        right: -5px;
        width: 25px;
        height: 25px;
        border-radius: 50%;
        background: #dc3545;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.7rem;
        cursor: pointer;
        transition: all 0.3s ease;
        z-index: 10;
    }
    
    .file-remove:hover {
        transform: scale(1.1);
        background: #bb2d3b;
    }
    
    /* Success Animation */
    .success-animation {
        width: 100px;
        height: 100px;
        margin: 0 auto 20px;
        position: relative;
    }
    
    .checkmark {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        display: block;
        stroke-width: 2;
        stroke: #00f2fe;
        stroke-miterlimit: 10;
        box-shadow: inset 0 0 0 rgba(0, 242, 254, 0.3);
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
    
    /* Typing Animation */
    .typed-text {
        display: inline-block;
        font-size: 12px;
        overflow: hidden;
        white-space: normal;
        border-right: 2px solid #00f2fe;
        animation: typing 3.5s steps(40, end), blink-caret 0.75s step-end infinite;
    }

    .preview-container {
        max-height: 70vh;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100%;
        padding: 15px;
    }

    .preview-image {
        max-width: 100%;
        max-height: 65vh;
        border-radius: 0.5rem;
        justify-content: center;
        object-fit: contain;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }
    
    /* Background Bubbles */
    .bg-bubbles {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
        overflow: hidden;
    }
    
    .bubble {
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.05);
        box-shadow: inset 0 0 10px rgba(255, 255, 255, 0.2);
        animation: float 15s infinite linear;
    }
    
    .bubble-1 {
        width: 150px;
        height: 150px;
        top: 10%;
        left: 10%;
        animation-duration: 20s;
    }
    
    .bubble-2 {
        width: 250px;
        height: 250px;
        top: 60%;
        left: 80%;
        animation-duration: 25s;
    }
    
    .bubble-3 {
        width: 100px;
        height: 100px;
        top: 80%;
        left: 20%;
        animation-duration: 15s;
    }
    
    .bubble-4 {
        width: 180px;
        height: 180px;
        top: 30%;
        left: 50%;
        animation-duration: 30s;
    }
    
    .bubble-5 {
        width: 120px;
        height: 120px;
        top: 70%;
        left: 40%;
        animation-duration: 18s;
    }
    
    /* Keyframe Animations */
    @keyframes fill-circle {
        0% {
            box-shadow: inset 0 0 0 50px rgba(0, 242, 254, 0.1);
        }
        100% {
            box-shadow: inset 0 0 0 0 rgba(0, 242, 254, 0.1);
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
    
    @keyframes typing {
        from { width: 0 }
        to { width: 100% }
    }
    
    @keyframes blink-caret {
        from, to { border-color: transparent }
        50% { border-color: #00f2fe }
    }
    
    @keyframes float {
        0% {
            transform: translateY(0) rotate(0deg);
        }
        50% {
            transform: translateY(-50px) rotate(180deg);
        }
        100% {
            transform: translateY(0) rotate(360deg);
        }
    }
    
    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .glass-card {
            padding: 1.5rem;
        }
        
        .floating-label {
            left: 45px;
            font-size: 0.9rem;
        }
        
        .floating-input input:focus ~ .floating-label,
        .floating-input input:not(:placeholder-shown) ~ .floating-label,
        textarea:focus ~ .floating-label,
        textarea:not(:placeholder-shown) ~ .floating-label {
            left: 45px;
            font-size: 0.7rem;
        }
        
        .file-icon {
            font-size: 1.5rem;
        }
        
        .bubble {
            display: none;
        }
        
        .bubble-1, .bubble-2 {
            display: block;
            opacity: 0.1;
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
               offset: 120
           });
       }
       
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
                   alert('Maksimal 3 file yang dapat diunggah');
                   resetFileInput();
                   return;
               }
               
               // Check file size and type
               for (let i = 0; i < attachments.files.length; i++) {
                   const file = attachments.files[i];
                   const fileSizeMB = file.size / (1024 * 1024);
                   
                   if (fileSizeMB > 5) {
                       alert(`File ${file.name} melebihi ukuran maksimal 5MB`);
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
       
       function createFileCard(file, index) {
           const fileCard = document.createElement('div');
           fileCard.className = 'col-12 col-sm-6 col-md-4';
           
           let fileIcon = 'fa-file';
           let previewable = false;
           
           if (file.type.includes('image')) {
               fileIcon = 'fa-file-image text-success';
               previewable = true;
           } else if (file.type.includes('pdf')) {
               fileIcon = 'fa-file-pdf text-danger';
           } else if (file.type.includes('word') || file.type.includes('document')) {
               fileIcon = 'fa-file-word text-primary';
           }
           
           fileCard.innerHTML = `
               <div class="file-card position-relative" data-file-index="${index}" data-previewable="${previewable}">
                   <div class="text-center">
                       <i class="fas ${fileIcon} file-icon"></i>
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
                   img.className = 'preview-image img-fluid justify-content-center align-items-center';
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
                       <p class="text-white-50">Pratinjau tidak tersedia untuk jenis file ini</p>
                       <a href="#" class="btn btn-neon-outline rounded-3 btn-hover-effect" id="downloadFile">
                           <i class="fas fa-download me-2"></i>Unduh File
                       </a>
                   </div>
               `;
               filePreviewModal.show();
               
               document.getElementById('downloadFile').addEventListener('click', function(e) {
                   e.preventDefault();
                   downloadFile(file);
               });
           }
       }
       
       function getFileIconClass(file) {
           if (file.type.includes('image')) return 'fa-file-image text-success';
           if (file.type.includes('pdf')) return 'fa-file-pdf text-danger';
           if (file.type.includes('word') || file.type.includes('document')) return 'fa-file-word text-primary';
           return 'fa-file text-white-50';
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
   });
</script>
@endsection