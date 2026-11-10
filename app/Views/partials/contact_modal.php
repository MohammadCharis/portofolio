<!-- =================================================================== -->
  <!-- 7. CONTACT SECTION (For the "Contact" Navbar Item)                  -->
  <!-- =================================================================== -->
  <section id="contact" class="topo-dark-bg relative z-30 py-24 px-6 sm:px-12 lg:px-20 border-t border-white/10">
    <div class="max-w-4xl mx-auto text-center">
      <h2 class="text-4xl sm:text-5xl font-extrabold text-white tracking-tight mb-4">
        Get In Touch
      </h2>
      <p class="text-slate-300 max-w-xl mx-auto text-base sm:text-lg mb-10">
        Tertarik untuk berkolaborasi dalam pengembangan web, UI/UX design, atau proyek teknologi lainnya? Kirimkan pesan langsung di bawah ini.
      </p>

      <form onsubmit="handleContactSubmit(event)" class="max-w-xl mx-auto bg-[#0d1829]/80 border border-white/15 backdrop-blur-xl rounded-3xl p-7 sm:p-9 text-left shadow-2xl space-y-5">
        <div>
          <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Nama Lengkap</label>
          <input
            type="text"
            id="contact-name"
            required
            placeholder="Masukkan nama kamu"
            class="w-full px-4 py-3 rounded-xl bg-slate-900/90 border border-white/10 text-white text-sm focus:outline-none focus:border-blue-500"
          />
        </div>
        <div>
          <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Email</label>
          <input
            type="email"
            id="contact-email"
            required
            placeholder="nama@email.com"
            class="w-full px-4 py-3 rounded-xl bg-slate-900/90 border border-white/10 text-white text-sm focus:outline-none focus:border-blue-500"
          />
        </div>
        <div>
          <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Pesan</label>
          <textarea
            id="contact-msg"
            rows="3"
            required
            placeholder="Tulis pesan atau ajakan kolaborasi..."
            class="w-full px-4 py-3 rounded-xl bg-slate-900/90 border border-white/10 text-white text-sm focus:outline-none focus:border-blue-500"
          ></textarea>
        </div>
        <button
          type="submit"
          class="w-full py-3.5 rounded-xl bg-[#2563eb] hover:bg-blue-500 text-white font-bold text-sm shadow-[0_8px_25px_rgba(37,99,235,0.5)] transition-all"
        >
          Kirim Pesan
        </button>
        <p id="contact-feedback" class="text-xs font-semibold text-emerald-400 text-center hidden">
          Terima kasih! Pesan kamu telah berhasil dikirim.
        </p>
      </form>
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
