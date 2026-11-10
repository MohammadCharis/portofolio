<!-- FLOATING TOP NAVBAR WITH CUTE MASCOT (Matches all photos) -->
<header class="fixed top-0 left-1/2 -translate-x-1/2 z-50 select-none">
  <div class="relative pt-6">
    <!-- Cute Floating Mascot above active tab -->
    <div id="nav-mascot"
      class="absolute top-0 z-20 pointer-events-none transition-all duration-500 ease-[cubic-bezier(0.34,1.56,0.64,1)]"
      style="left: 36px;">
      <div class="mascot-float">
        <svg class="block w-[26px] h-[29px]" viewBox="0 0 32 36" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M12 28L16 34L20 28Z" fill="#0b0f19" stroke="#fff" stroke-width="1.6" stroke-linejoin="round" />
          <circle cx="16" cy="15" r="14" fill="#0b0f19" stroke="#fff" stroke-width="1.6" />
          <path d="M16 1.5V28.5M2.5 15H29.5M5.5 5.5Q16 11 26.5 5.5M5.5 24.5Q16 19 26.5 24.5" stroke="#94a3b8"
            stroke-width=".9" stroke-linecap="round" opacity=".55" />
          <path d="M4.5 11C8 8.5 13 10.5 14.5 15.5C11 19 6 18.5 4.5 11Z" fill="#fff" stroke="#fff" stroke-width="1"
            stroke-linejoin="round" />
          <g transform="matrix(-1 0 0 1 32 0)">
            <path d="M4.5 11C8 8.5 13 10.5 14.5 15.5C11 19 6 18.5 4.5 11Z" fill="#fff" stroke="#fff" stroke-width="1"
              stroke-linejoin="round" />
          </g>
        </svg>
      </div>
    </div>

    <!-- Pill Navigation Container -->
    <nav id="main-nav" class="
        flex items-center gap-1.5 sm:gap-2 px-2.5 py-2 rounded-full
        bg-[#0d1829]/75 border border-white/15 backdrop-blur-xl
        shadow-[0_12px_36px_rgba(0,0,0,0.55)] transition-colors duration-300
      ">
      <button data-nav="home" onclick="navigateToSection('home')" class="
          nav-btn relative px-5 sm:px-6 py-2 rounded-full text-xs sm:text-sm font-bold tracking-wide transition-all duration-300
          bg-blue-600 text-white shadow-[0_0_25px_rgba(37,99,235,0.95)]
        ">
        Home
      </button>
      <button data-nav="about" onclick="navigateToSection('about')" class="
          nav-btn relative px-5 sm:px-6 py-2 rounded-full text-xs sm:text-sm font-bold tracking-wide transition-all duration-300
          text-white/90 hover:text-white
        ">
        About
      </button>
      <button data-nav="portfolio" onclick="navigateToSection('portfolio')" class="
          nav-btn relative px-5 sm:px-6 py-2 rounded-full text-xs sm:text-sm font-bold tracking-wide transition-all duration-300
          text-white/90 hover:text-white
        ">
        Portfolio
      </button>
      <button data-nav="contact" onclick="navigateToSection('contact')" class="
          nav-btn relative px-5 sm:px-6 py-2 rounded-full text-xs sm:text-sm font-bold tracking-wide transition-all duration-300
          text-white/90 hover:text-white
        ">
        Contact
      </button>
    </nav>
  </div>
</header>