<!-- =================================================================== -->
  <!-- 6. LIGHT PORTFOLIO SHOWCASE SECTION (Exact Match to image_991475)   -->
  <!-- =================================================================== -->
  <section id="portfolio" class="topo-light-bg relative z-30 min-h-screen flex flex-col justify-between pt-14 pb-16 text-slate-900 overflow-hidden">
    <!-- Top Area: Watermark "Portofolio" right behind Navbar + White Tab Bar -->
    <div class="relative w-full">
      <!-- Watermark "Portofolio" overlapping bottom of fixed navbar (exact match to image_991475.png) -->
      <div class="text-center pt-1 mb-12 select-none pointer-events-none">
        <h2 class="text-[2.6rem] sm:text-[3.25rem] font-extrabold text-[#9ca3af]/80 tracking-tight leading-none">
          Portofolio
        </h2>
      </div>

      <!-- Centered White Rounded Tab Switcher (Projects | Certificates | Awards) -->
      <div class="max-w-[740px] mx-auto px-4">
        <div class="
          bg-white rounded-[20px] p-2 shadow-[0_10px_35px_rgba(15,23,42,0.08)]
          border border-slate-100 grid grid-cols-3 gap-2
        ">
          <!-- Tab: Projects -->
          <button
            id="tab-btn-projects"
            onclick="switchPortfolioTab('projects')"
            class="
              portfolio-tab-btn flex flex-col items-center justify-center gap-1 py-3 px-4 rounded-[14px]
              font-bold text-xs sm:text-sm transition-all duration-300
              bg-[#2563eb] text-white shadow-[0_6px_20px_rgba(37,99,235,0.4)]
            "
          >
            <span class="font-mono text-xs font-extrabold">&lt;&gt;</span>
            <span>Projects</span>
          </button>

          <!-- Tab: Certificates -->
          <button
            id="tab-btn-certificates"
            onclick="switchPortfolioTab('certificates')"
            class="
              portfolio-tab-btn flex flex-col items-center justify-center gap-1 py-3 px-4 rounded-[14px]
              font-bold text-xs sm:text-sm transition-all duration-300
              text-slate-700 hover:bg-slate-100
            "
          >
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <circle cx="12" cy="8" r="5"></circle>
              <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.5L7.5 21 12 18.5 16.5 21 15 12.5"></path>
            </svg>
            <span>Certificates</span>
          </button>

          <!-- Tab: Awards -->
          <button
            id="tab-btn-awards"
            onclick="switchPortfolioTab('awards')"
            class="
              portfolio-tab-btn flex flex-col items-center justify-center gap-1 py-3 px-4 rounded-[14px]
              font-bold text-xs sm:text-sm transition-all duration-300
              text-slate-700 hover:bg-slate-100
            "
          >
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M8 21h8m-4-4v4m-5-9H4a1 1 0 01-1-1V5a1 1 0 011-1h3m10 8h3a1 1 0 001-1V5a1 1 0 00-1-1h-3M7 4h10v6a5 5 0 01-10 0V4z"></path>
            </svg>
            <span>Awards</span>
          </button>
        </div>
      </div>
    </div>

    <!-- Horizontal Carousel Container with Left/Right Floating Blue Buttons (Exact match to image_991475.png) -->
    <div class="relative w-full max-w-[1560px] mx-auto mt-8 mb-auto">
      <!-- Left Floating Blue Arrow Button -->
      <button
        onclick="scrollCarousel(-1)"
        aria-label="Previous"
        class="
          absolute left-3 sm:left-5 top-1/2 -translate-y-1/2 z-20
          w-11 h-11 rounded-full bg-[#2563eb] hover:bg-blue-600 text-white
          shadow-[0_6px_20px_rgba(37,99,235,0.5)] flex items-center justify-center
          transition-all duration-300 hover:scale-105
        "
      >
        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
        </svg>
      </button>

      <!-- Right Floating Blue Arrow Button -->
      <button
        onclick="scrollCarousel(1)"
        aria-label="Next"
        class="
          absolute right-3 sm:right-5 top-1/2 -translate-y-1/2 z-20
          w-11 h-11 rounded-full bg-[#2563eb] hover:bg-blue-600 text-white
          shadow-[0_6px_20px_rgba(37,99,235,0.5)] flex items-center justify-center
          transition-all duration-300 hover:scale-105
        "
      >
        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
        </svg>
      </button>

      <!-- Cards Track (Starts cleanly with Hology 9.0 on the left, RujukCepat in middle, RisetIn on right) -->
      <div
        id="portfolio-carousel"
        class="no-scrollbar flex items-stretch gap-6 overflow-x-auto scroll-smooth pl-12 sm:pl-24 pr-12 sm:pr-24 py-3"
      >
        <!-- Populated dynamically by JS -->
      </div>
    </div>
  </section>
