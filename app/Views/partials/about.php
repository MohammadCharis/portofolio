<!-- 2. ABOUT ME HEADING + BIO & SPIDER-MAN HOVER PORTRAIT (Photo 6 & Photo 3) -->
<section id="about" class="max-w-6xl mx-auto px-10 sm:px-20 lg:px-28 pt-28 pb-32">
  <!-- Photo 6: "About Me" Large Centered Heading -->
  <div class="text-center mb-10 sm:mb-36">
    <h2 class="text-4xl sm:text-5xl md:text-6xl font-extrabold text-white tracking-tight">
      About Me
    </h2>
  </div>

  <!-- Photo 3: 3-Column Hero Bio with Interactive Spider-Man Cursor Portrait -->
  <div class="grid grid-cols-1 lg:grid-cols-12 items-center gap-10 lg:gap-6">
    <!-- Left Column: Hi, I'm Mohammad Charis + View CV -->
    <div class="lg:col-span-4 flex flex-col items-start text-left order-2 lg:order-1">
      <span class="text-3xl sm:text-4xl md:text-[2.75rem] font-extrabold text-[#2563eb] leading-tight mb-1">
        Hi, I'm
      </span>
      <h3 class="text-4xl sm:text-5xl md:text-[3.35rem] font-extrabold text-white leading-[1.08] tracking-tight mb-7">
        Mohammad<br />Charis
      </h3>
      <button onclick="openCvModal()" class="
              inline-flex items-center gap-2.5 px-6 py-3 rounded-xl
              bg-[#2563eb] hover:bg-blue-500 text-white font-bold text-sm
              shadow-[0_8px_25px_rgba(37,99,235,0.45)] hover:shadow-[0_10px_30px_rgba(37,99,235,0.7)]
              transition-all duration-300 hover:-translate-y-0.5
            ">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round"
            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
        </svg>
        <span>View CV</span>
      </button>
    </div>

    <!-- Center Column: Portrait with Interactive Spider-Man Hover Spotlight (Photo 8 & Photo 9) -->
    <div class="lg:col-span-4 flex justify-center order-1 lg:order-2">
      <div id="portrait-container"
        class="relative w-[290px] sm:w-[350px] md:w-[390px] aspect-[520/697] select-none group">
        <!-- Base Layer: Formal Portrait Cutout (100% solid so silhouette never has gaps) -->
        <img id="person-base-img" src="<?= base_url('assets/images/rozik.png') ?>" alt="charis Portrait"
          class="person-base-layer w-full h-full object-contain relative z-10 pointer-events-none select-none drop-shadow-[0_20px_35px_rgba(0,0,0,0.7)]" />

        <!-- Top Masked Layer: Spider-Man Cutout (Strictly clipped to person silhouette) -->
        <img id="spidey-mask-img" src="<?= base_url('assets/images/spiderman.png') ?>" alt="Spider-Man Reveal"
          class="spidey-reveal-layer absolute inset-0 w-full h-full object-contain z-20 pointer-events-none select-none" />

        <!-- Soft Dim White Glow Layer (Masked strictly to person silhouette so it never bleeds outside) -->
        <div id="spidey-aura" class="spidey-aura-layer absolute inset-0 z-20"></div>

        <!-- Custom Soft Dim White Dot Cursor (Only visible when cursor is over the person's body/head) -->
        <div id="portrait-cursor-dot" class="
    pointer-events-none absolute z-30 w-2 h-2 -translate-x-1/2 -translate-y-1/2
    rounded-full bg-white/80 shadow-[0_0_6px_rgba(255,255,255,0.5)]
    opacity-0 transition-opacity duration-200
  " style="left: 50%; top: 50%;"></div>

        <!-- Bottom Gradient Fade into Navy Background -->
        <div
          class="absolute inset-x-0 bottom-0 h-20 bg-gradient-to-t from-[#030914] via-[#030914]/60 to-transparent z-20 pointer-events-none">
        </div>
      </div>
    </div>

    <!-- Right Column: Paragraph Description + View Projects -->
    <div class="lg:col-span-4 flex flex-col items-start text-left order-3 lg:pl-4">
      <p class="text-slate-200/90 text-base sm:text-[1.08rem] leading-[1.75] font-normal mb-7">
        Sebagai mahasiswa Fakultas Sain dan Teknologi Institut Teknologi Mojosari, Aku berfokus pada pengembangan
        teknologi yang tidak hanya fungsional, tetapi juga menghadirkan pengalaman digital yang menarik dan berdampak.
      </p>
      <button onclick="navigateToSection('portfolio')" class="
              inline-flex items-center gap-2.5 px-6 py-3 rounded-xl
              bg-[#2563eb] hover:bg-blue-500 text-white font-bold text-sm
              shadow-[0_8px_25px_rgba(37,99,235,0.45)] hover:shadow-[0_10px_30px_rgba(37,99,235,0.7)]
              transition-all duration-300 hover:-translate-y-0.5
            ">
        <span class="font-mono text-xs font-extrabold">&lt;&gt;</span>
        <span>View Projects</span>
      </button>
    </div>
  </div>
</section>