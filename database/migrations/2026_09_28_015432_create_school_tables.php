<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        // 1. Settings / Pengaturan Situs
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->longText('value')->nullable();
            $table->string('group')->default('general'); // general, hero, profile, contact, seo
            $table->string('type')->default('text'); // text, textarea, richtext, image, boolean
            $table->timestamps();
        });

        // 2. Berita, Pengumuman, & Artikel (Soft Deletes)
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->enum('type', ['berita', 'pengumuman', 'artikel'])->default('berita');
            $table->string('category')->default('Umum');
            $table->longText('content');
            $table->string('image')->nullable();
            $table->enum('status', ['draft', 'terbit'])->default('terbit');
            $table->dateTime('published_at')->nullable();
            $table->unsignedBigInteger('views')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });

        // 3. Agenda Sekolah
        Schema::create('agendas', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('event_date');
            $table->string('location');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        // 4. Guru & Staf
        Schema::create('staffs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nip')->nullable();
            $table->string('position');
            $table->string('subject')->nullable(); // mapel
            $table->string('photo')->nullable();
            $table->text('bio')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        // 5. Fasilitas
        Schema::create('facilities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // 6. Album Galeri & Foto Galeri
        Schema::create('gallery_albums', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('cover_image')->nullable();
            $table->timestamps();
        });

        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('album_id')->nullable()->constrained('gallery_albums')->nullOnDelete();
            $table->string('title')->nullable();
            $table->string('category')->default('Kegiatan');
            $table->enum('type', ['foto', 'video'])->default('foto');
            $table->string('file_path');
            $table->text('caption')->nullable();
            $table->timestamps();
        });

        // 7. Ekstrakurikuler
        Schema::create('extracurriculars', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('instructor');
            $table->string('schedule');
            $table->string('location');
            $table->string('icon')->default('⚽');
            $table->string('photo')->nullable();
            $table->text('achievements')->nullable();
            $table->timestamps();
        });

        // 8. Jurusan / Program Keahlian
        Schema::create('majors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->nullable();
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->text('career_prospects')->nullable();
            $table->string('icon')->nullable();
            $table->string('image')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        // 9. Prestasi
        Schema::create('achievements', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->enum('level', ['Sekolah', 'Kecamatan', 'Kota/Kabupaten', 'Provinsi', 'Nasional', 'Internasional'])->default('Kota/Kabupaten');
            $table->string('year', 10);
            $table->string('organizer')->nullable();
            $table->string('student_name')->nullable();
            $table->string('photo')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });

        // 10. Unduhan File
        Schema::create('downloads', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('category')->default('Umum'); // Brosur, Formulir, Kurikulum, Jadwal, Panduan
            $table->string('file_path');
            $table->string('file_size')->nullable();
            $table->unsignedBigInteger('download_count')->default(0);
            $table->timestamps();
        });

        // 11. Kontak / Pesan Masuk (Soft Deletes)
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('subject');
            $table->text('message');
            $table->boolean('is_read')->default(false);
            $table->text('reply_content')->nullable();
            $table->timestamp('replied_at')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        // 12. Gelombang Pendaftaran PPDB
        Schema::create('ppdb_waves', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('quota')->default(100);
            $table->boolean('is_active')->default(true);
            $table->date('announcement_date')->nullable();
            $table->boolean('is_announced')->default(false);
            $table->timestamps();
        });

        // 13. Data Pendaftar PPDB (Soft Deletes)
        Schema::create('ppdb_applicants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wave_id')->constrained('ppdb_waves')->cascadeOnDelete();
            $table->foreignId('major_id')->nullable()->constrained('majors')->nullOnDelete();
            $table->string('registration_number')->unique();
            $table->string('full_name');
            $table->string('nisn', 20)->nullable();
            $table->string('nik', 20)->nullable();
            $table->enum('gender', ['L', 'P'])->default('L');
            $table->string('birth_place')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('religion')->nullable();
            $table->text('address')->nullable();
            $table->string('phone', 30);
            $table->string('email')->nullable();
            $table->string('origin_school');
            $table->string('parent_name');
            $table->string('parent_phone', 30);
            $table->string('parent_job')->nullable();
            
            // Uploaded Documents
            $table->string('document_kk')->nullable();
            $table->string('document_ijazah')->nullable();
            $table->string('document_akta')->nullable();
            $table->string('document_photo')->nullable();
            
            // Status & Verification
            $table->enum('status', ['menunggu', 'diverifikasi', 'diterima', 'ditolak', 'cadangan'])->default('menunggu');
            $table->text('verification_notes')->nullable();
            $table->foreignId('verified_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('verified_at')->nullable();
            
            $table->softDeletes();
            $table->timestamps();
        });

        // 14. Log Aktivitas
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('action'); // LOGIN, LOGOUT, CREATE, UPDATE, DELETE, VERIFY_PPDB, EXPORT
            $table->string('model_type')->nullable();
            $table->unsignedBigInteger('model_id')->nullable();
            $table->text('description');
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('activity_logs');
        Schema::dropIfExists('ppdb_applicants');
        Schema::dropIfExists('ppdb_waves');
        Schema::dropIfExists('contacts');
        Schema::dropIfExists('downloads');
        Schema::dropIfExists('achievements');
        Schema::dropIfExists('majors');
        Schema::dropIfExists('extracurriculars');
        Schema::dropIfExists('galleries');
        Schema::dropIfExists('gallery_albums');
        Schema::dropIfExists('facilities');
        Schema::dropIfExists('staffs');
        Schema::dropIfExists('agendas');
        Schema::dropIfExists('posts');
        Schema::dropIfExists('settings');
    }
};