<!-- =================================================================== -->
  <!-- 7. CONTACT SECTION (For the "Contact" Navbar Item)                  -->
  <!-- =================================================================== -->
  <section id="contact" class="topo-light-bg relative z-30 pt-24 pb-6">
    <div class="max-w-6xl mx-auto px-10 sm:px-20 lg:px-28">
      <div class="text-center mb-[6.5rem]">
        <h2 class="text-4xl sm:text-5xl font-extrabold tracking-tight">
          <span class="text-slate-900">Hubungi</span> <span class="text-[#2563eb]">Saya</span>
        </h2>
      </div>
      <div class="grid grid-cols-1 lg:grid-cols-5 gap-7 items-start">
        <div class="lg:col-span-2 space-y-7">
        <form onsubmit="handleContactSubmit(event)" class="bg-white rounded-3xl p-8 shadow-[0_8px_22px_rgba(15,23,42,0.28)] space-y-4">
          <h2 class="text-3xl font-extrabold text-[#2563eb] mb-2">Hubungi</h2>
          <p class="text-slate-600 leading-relaxed mb-5">Ada yang mau didiskusikan? Langsung kirim pesan aja ya..!</p>
          <div class="relative">
            <svg class="pointer-events-none absolute left-4 top-1/2 w-5 h-5 -translate-y-1/2 text-slate-500" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19a6 6 0 0 0-6 0m3-9a4 4 0 1 0 0-8 4 4 0 0 0 0 8Z" /></svg>
            <input type="text" id="contact-name" required placeholder="Nama Anda" class="w-full px-4 py-3 pl-12 rounded-xl bg-slate-200/60 border-0 text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
          </div>
          <div class="relative">
            <svg class="pointer-events-none absolute left-4 top-1/2 w-5 h-5 -translate-y-1/2 text-slate-500" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8.5 12 14l9-5.5M5 19h14a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2Z" /></svg>
            <input type="email" id="contact-email" required placeholder="Email Anda" class="w-full px-4 py-3 pl-12 rounded-xl bg-slate-200/60 border-0 text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
          </div>
          <div class="relative">
            <svg class="pointer-events-none absolute left-4 top-4 w-5 h-5 text-slate-500" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M4 5h16v11H8l-4 4V5Z" /></svg>
            <textarea id="contact-msg" rows="4" required placeholder="Pesan Anda" class="w-full px-4 py-3 pl-12 rounded-xl bg-slate-200/60 border-0 text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
          </div>
          <button type="submit" class="w-full py-3.5 rounded-xl bg-[#2563eb] hover:bg-blue-500 text-white font-bold text-sm shadow-[0_8px_20px_rgba(37,99,235,0.3)] transition-all flex items-center justify-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="m22 2-7 20-4-9-9-4 20-7Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M22 2 11 13" /></svg>
            Kirim Pesan
          </button>
          <p id="contact-feedback" class="text-xs font-semibold text-emerald-600 text-center hidden">Terima kasih! Pesan kamu telah berhasil dikirim.</p>
        </form>
        <div class="bg-white rounded-3xl p-8 shadow-[0_8px_22px_rgba(15,23,42,0.28)]">
          <h2 class="text-2xl font-extrabold text-slate-900 mb-6">Find Me</h2>
          <div class="space-y-3 text-slate-700">
            <a href="https://www.linkedin.com/in/mohammad-charis-rozikin-370382447" target="_blank" rel="noopener noreferrer" class="flex items-center gap-3 border-b border-slate-100 pb-3 hover:text-[#2563eb]">
              <img src="<?= base_url('assets/images/in.png') ?>" alt="LinkedIn" class="w-8 h-8 rounded-lg object-contain" />
              <span class="flex-1"><strong class="block text-sm">Let's Connect</strong><small class="block text-xs text-slate-400">Mohammad Charis</small></span><svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5h5v5M19 5l-8 8" /><path stroke-linecap="round" stroke-linejoin="round" d="M19 13v4a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2h4" /></svg>
            </a>
            <a href="https://www.instagram.com/mohammadcharis_/" target="_blank" rel="noopener noreferrer" class="flex items-center gap-3 border-b border-slate-100 pb-3 hover:text-[#2563eb]">
              <img src="<?= base_url('assets/images/instagram.png') ?>" alt="Instagram" class="w-8 h-8 rounded-lg object-contain" />
              <span class="flex-1"><strong class="block text-sm">Instagram</strong><small class="block text-xs text-slate-400">@Mmohammadcharis_</small></span><svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5h5v5M19 5l-8 8" /><path stroke-linecap="round" stroke-linejoin="round" d="M19 13v4a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2h4" /></svg>
            </a>
            <a href="https://github.com/MohammadCharis" target="_blank" rel="noopener noreferrer" class="flex items-center gap-3 border-b border-slate-100 pb-3 hover:text-[#2563eb]">
              <img src="<?= base_url('assets/images/github.png') ?>" alt="GitHub" class="w-8 h-8 rounded-lg object-contain" />
              <span class="flex-1"><strong class="block text-sm">GitHub</strong><small class="block text-xs text-slate-400">@MohammadCharis</small></span><svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5h5v5M19 5l-8 8" /><path stroke-linecap="round" stroke-linejoin="round" d="M19 13v4a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2h4" /></svg>
            </a>
            <a href="https://tiktok.com/@corzz" target="_blank" rel="noopener noreferrer" class="flex items-center gap-3 hover:text-[#2563eb]">
              <img src="<?= base_url('assets/images/tiktok.png') ?>" alt="TikTok" class="w-8 h-8 rounded-lg object-contain" />
              <span class="flex-1"><strong class="block text-sm">TikTok</strong><small class="block text-xs text-slate-400">@corzz</small></span><svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5h5v5M19 5l-8 8" /><path stroke-linecap="round" stroke-linejoin="round" d="M19 13v4a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2h4" /></svg>
            </a>
          </div>
        </div>
      </div>

      <div class="lg:col-span-3 space-y-7">
        <form onsubmit="handleContactSubmit(event)" class="bg-white rounded-3xl p-8 shadow-[0_8px_22px_rgba(15,23,42,0.28)] space-y-5">
          <h2 class="text-2xl font-extrabold text-slate-900 pb-5 border-b border-slate-100">Tulis Komentar</h2>
          <div>
            <label class="block text-sm font-bold text-slate-700 mb-2">Nama</label>
            <input type="text" id="comment-name" required placeholder="Masukkan nama kamu" class="w-full px-4 py-3 rounded-xl bg-slate-200/60 border-0 text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
          </div>
          <div>
            <label class="block text-sm font-bold text-slate-700 mb-2">Komentar</label>
            <textarea id="comment-msg" rows="5" required placeholder="Tulis komentar kamu di sini..." class="w-full px-4 py-3 rounded-xl bg-slate-200/60 border-0 text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
          </div>
          <div>
            <label class="block text-sm font-bold text-slate-700 mb-2">Foto Profil <span class="font-normal text-slate-400">(opsional)</span></label>
            <label class="flex items-center justify-center gap-2 w-full px-4 py-3 rounded-xl bg-slate-200/60 text-slate-700 text-sm cursor-pointer hover:bg-slate-200 transition-colors">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16.5V19a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-2.5M12 3v12m0-12 4 4m-4-4-4 4" /></svg>
              <span id="comment-photo-label">Pilih Foto Profil</span>
              <input type="file" id="comment-photo" accept="image/*" class="hidden" onchange="document.getElementById('comment-photo-label').textContent = this.files[0]?.name || 'Pilih Foto Profil'" />
            </label>
            <p class="text-center text-xs text-slate-400 mt-2">Maksimal ukuran file: 5MB</p>
          </div>
          <button type="submit" class="w-full py-3.5 rounded-xl bg-[#2563eb] hover:bg-blue-500 text-white font-bold text-sm transition-all flex items-center justify-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="m22 2-7 20-4-9-9-4 20-7Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M22 2 11 13" /></svg>
            Kirim Komentar
          </button>
          <p id="contact-feedback" class="text-xs font-semibold text-emerald-600 text-center hidden">Terima kasih! Pesan kamu telah berhasil dikirim.</p>
        </form>
        <div class="bg-white rounded-3xl p-8 shadow-[0_8px_22px_rgba(15,23,42,0.28)]">
          <h2 class="text-2xl font-extrabold text-slate-900 pb-5 border-b border-slate-100">Komentar <span class="text-[#2563eb]">(0)</span></h2>
          <div class="py-10 text-center text-slate-400 text-sm">Belum ada komentar.</div>
        </div>
        </div>
      </div>
      <div class="mt-16 pt-5 border-t border-slate-200 text-center text-xs text-slate-500">
        © 2026 Mohammad Charis™. All Rights Reserved.
      </div>
    </div>
  </section>

  <!-- =================================================================== -->
  <!-- DETAIL MODAL (For Project / Certificate / Award Details & CV)       -->
  <!-- =================================================================== -->
  <div
    id="detail-modal"
    class="fixed inset-0 z-50 bg-black/75 backdrop-blur-md hidden items-center justify-center p-4"
    onclick="closeModal()"
  >
    <div
      class="bg-white text-slate-900 rounded-3xl max-w-lg w-full p-6 sm:p-8 shadow-2xl relative"
      onclick="event.stopPropagation()"
    >
      <button
        onclick="closeModal()"
        class="absolute top-5 right-5 w-9 h-9 rounded-full bg-slate-100 hover:bg-slate-200 flex items-center justify-center text-slate-700 font-bold"
      >
        ✕
      </button>
      <img id="modal-img" src="<?= base_url('assets/images/proj_rujukcepat.jpg') ?>" alt="Preview" class="w-full max-h-[340px] object-contain bg-slate-50 rounded-2xl mb-5 border border-slate-200" />
      <span id="modal-badge" class="inline-block px-3 py-1 rounded-full text-xs font-bold bg-blue-100 text-blue-700 mb-2">Project</span>
      <h3 id="modal-title" class="text-2xl font-extrabold text-slate-900 mb-2">RujukCepat Website</h3>
      <p id="modal-desc" class="text-slate-600 text-sm leading-relaxed mb-6"></p>
      <div class="flex justify-end">
        <button
          onclick="closeModal()"
          class="px-5 py-2.5 rounded-xl bg-[#2563eb] text-white font-bold text-sm hover:bg-blue-600"
        >
          Tutup
        </button>
      </div>
    </div>
  </div>
