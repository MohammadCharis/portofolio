<!-- =================================================================== -->
    <!-- 4. INTERACTIVE 3D GLASS FOLDER CARDS SECTION (Photo 5 & image_c591f5)-->
    <!-- =================================================================== -->
    <section id="folders-section" class="max-w-6xl mx-auto px-10 sm:px-20 lg:px-28 pt-28 pb-32">
      <!-- Shared SVG ClipPath & Gradients for Exact Curved Folder Geometry -->
      <svg width="0" height="0" class="absolute pointer-events-none">
        <defs>
          <!-- Normalised 0..1 clipPath matching viewBox 0 0 400 320 of image_c591f5.png Front Pocket -->
          <clipPath id="folder-front-clip" clipPathUnits="objectBoundingBox">
            <path d="M 0,0.35 A 0.065,0.08125 0 0 1 0.065,0.26875 L 0.345,0.26875 C 0.40,0.26875 0.43,0.3875 0.49,0.3875 L 0.935,0.3875 A 0.065,0.08125 0 0 1 1,0.46875 L 1,0.91875 A 0.065,0.08125 0 0 1 0.935,1 L 0.065,1 A 0.065,0.08125 0 0 1 0,0.91875 Z" />
          </clipPath>
          <linearGradient id="folder-back-grad" x1="0%" y1="0%" x2="0%" y2="100%">
            <stop offset="0%" stop-color="#434852" />
            <stop offset="38%" stop-color="#252930" />
            <stop offset="100%" stop-color="#0b0d11" />
          </linearGradient>
          <linearGradient id="folder-back-stroke" x1="0%" y1="0%" x2="0%" y2="100%">
            <stop offset="0%" stop-color="rgba(255,255,255,0.38)" />
            <stop offset="50%" stop-color="rgba(255,255,255,0.14)" />
            <stop offset="100%" stop-color="rgba(255,255,255,0.05)" />
          </linearGradient>
          <linearGradient id="folder-front-stroke" x1="0%" y1="0%" x2="0%" y2="100%">
            <stop offset="0%" stop-color="rgba(255,255,255,0.45)" />
            <stop offset="45%" stop-color="rgba(255,255,255,0.18)" />
            <stop offset="100%" stop-color="rgba(255,255,255,0.08)" />
          </linearGradient>
        </defs>
      </svg>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-12 md:gap-10 items-end">

        <!-- FOLDER 1: 6 Projects -->
        <div
          class="folder-card relative w-full max-w-[360px] mx-auto aspect-[400/320] cursor-pointer select-none group"
          onclick="openPortfolioCategory('projects')"
        >
          <!-- Layer 1: Folder Back Plate SVG (Sloped Tab on Top-Right, exact match to image_c591f5.png) -->
          <svg viewBox="0 0 400 320" class="absolute inset-0 w-full h-full drop-shadow-[0_22px_38px_rgba(0,0,0,0.85)] z-0">
            <path
              d="M 1.5 66 A 25 25 0 0 1 26.5 41 L 166 41 C 186 41, 196 1.5, 218 1.5 L 373.5 1.5 A 25 25 0 0 1 398.5 26.5 L 398.5 293.5 A 25 25 0 0 1 373.5 318.5 L 26.5 318.5 A 25 25 0 0 1 1.5 293.5 Z"
              fill="url(#folder-back-grad)"
              stroke="url(#folder-back-stroke)"
              stroke-width="1.5"
            />
          </svg>

          <!-- Layer 2: 3 Fan-Out Project Preview Images Inside Folder -->
          <div class="absolute inset-x-[9%] top-[33%] bottom-[8%] z-10 flex items-start justify-center pointer-events-none">
            <img
              src="<?= base_url('assets/images/sikha.jpg') ?>"
              alt="Project 1"
              class="folder-preview-item preview-1 absolute top-0 w-[94%] h-[92%] object-cover rounded-[16px] border border-white/25 shadow-lg"
            />
            <img
              src="<?= base_url('assets/images/alumni.png') ?>"
              alt="Project 2"
              class="folder-preview-item preview-2 absolute top-0 w-[96%] h-[92%] object-cover rounded-[16px] border border-white/30 shadow-xl"
            />
            <img
              src="<?= base_url('assets/images/sikha.jpg') ?>"
              alt="Project 3"
              class="folder-preview-item preview-3 absolute top-0 w-[98%] h-[92%] object-cover rounded-[16px] border border-white/35 shadow-2xl"
            />
          </div>

          <!-- Layer 3: Translucent Frosted Glass Front Pocket (Sloped Tab on Top-Left, exact match to image_c591f5.png) -->
          <div class="folder-front-wrap absolute inset-0 z-20 pointer-events-none">
            <!-- Frosted Glass Backdrop Fill clipped to exact Front Pocket path -->
            <div class="folder-front-glass absolute inset-0 w-full h-full"></div>

            <!-- Specular SVG Border Stroke on top of the Frosted Glass -->
            <svg viewBox="0 0 400 320" class="absolute inset-0 w-full h-full">
              <path
                d="M 1.5 112 A 25 25 0 0 1 26.5 87 L 138 87 C 160 87, 172 124, 196 124 L 373.5 124 A 25 25 0 0 1 398.5 149 L 398.5 293.5 A 25 25 0 0 1 373.5 318.5 L 26.5 318.5 A 25 25 0 0 1 1.5 293.5 Z"
                fill="none"
                stroke="url(#folder-front-stroke)"
                stroke-width="1.5"
              />
            </svg>

            <!-- Bottom Text & Squircle "ooo" Button -->
            <div class="absolute inset-x-0 bottom-0 p-7 sm:p-8 flex items-end justify-between">
              <div>
                <div class="text-[2.6rem] font-extrabold text-white leading-none mb-1.5 tracking-tight">4</div>
                <div class="folder-count-serif text-[1.05rem] font-bold text-slate-300/95">Projects</div>
              </div>
              <div class="
                w-[62px] h-[54px] rounded-[18px]
                bg-gradient-to-b from-[#2c3037]/95 to-[#17191e]/95
                border border-white/10 shadow-[0_8px_20px_rgba(0,0,0,0.65),inset_0_1px_1px_rgba(255,255,255,0.15)]
                flex items-center justify-center gap-[3px]
              ">
                <span class="w-[9px] h-[9px] rounded-full border-[1.7px] border-white/95"></span>
                <span class="w-[9px] h-[9px] rounded-full border-[1.7px] border-white/95"></span>
                <span class="w-[9px] h-[9px] rounded-full border-[1.7px] border-white/95"></span>
              </div>
            </div>
          </div>
        </div>

        <!-- FOLDER 2: 6 Certificates (Exact match to image_c591f5.png) -->
        <div
          class="folder-card relative w-full max-w-[360px] mx-auto aspect-[400/320] cursor-pointer select-none group"
          onclick="openPortfolioCategory('certificates')"
        >
          <!-- Layer 1: Folder Back Plate SVG -->
          <svg viewBox="0 0 400 320" class="absolute inset-0 w-full h-full drop-shadow-[0_22px_38px_rgba(0,0,0,0.85)] z-0">
            <path
              d="M 1.5 66 A 25 25 0 0 1 26.5 41 L 166 41 C 186 41, 196 1.5, 218 1.5 L 373.5 1.5 A 25 25 0 0 1 398.5 26.5 L 398.5 293.5 A 25 25 0 0 1 373.5 318.5 L 26.5 318.5 A 25 25 0 0 1 1.5 293.5 Z"
              fill="url(#folder-back-grad)"
              stroke="url(#folder-back-stroke)"
              stroke-width="1.5"
            />
          </svg>

          <!-- Layer 2: 3 Fan-Out Certificate Preview Images Inside Folder -->
          <div class="absolute inset-x-[9%] top-[33%] bottom-[8%] z-10 flex items-start justify-center pointer-events-none">
            <img
              src="<?= base_url('assets/images/sertifikat_4.png') ?>"
              alt="Certificate 1"
              class="folder-preview-item preview-1 absolute top-0 w-[94%] h-[92%] object-cover object-top rounded-[16px] border border-white/25 shadow-lg"
            />
            <img
              src="<?= base_url('assets/images/sertifikat_1.jpeg') ?>"
              alt="Certificate 2"
              class="folder-preview-item preview-2 absolute top-0 w-[96%] h-[92%] object-cover object-top rounded-[16px] border border-white/30 shadow-xl"
            />
            <img
              src="<?= base_url('assets/images/sertifikat_2.png') ?>"
              alt="Certificate 3"
              class="folder-preview-item preview-3 absolute top-0 w-[98%] h-[92%] object-cover object-top rounded-[16px] border border-white/35 shadow-2xl"
            />
            <img
              src="<?= base_url('assets/images/sertifikat_3.jpeg') ?>"
              alt="Certificate 3"
              class="folder-preview-item preview-4 absolute top-0 w-[98%] h-[92%] object-cover object-top rounded-[16px] border border-white/35 shadow-2xl"
            />
            <img
              src="<?= base_url('assets/images/sertifikat_5.png') ?>"
              alt="Certificate 3"
              class="folder-preview-item preview-5 absolute top-0 w-[98%] h-[92%] object-cover object-top rounded-[16px] border border-white/35 shadow-2xl"
            />
          </div>

          <!-- Layer 3: Translucent Frosted Glass Front Pocket -->
          <div class="folder-front-wrap absolute inset-0 z-20 pointer-events-none">
            <div class="folder-front-glass absolute inset-0 w-full h-full"></div>

            <svg viewBox="0 0 400 320" class="absolute inset-0 w-full h-full">
              <path
                d="M 1.5 112 A 25 25 0 0 1 26.5 87 L 138 87 C 160 87, 172 124, 196 124 L 373.5 124 A 25 25 0 0 1 398.5 149 L 398.5 293.5 A 25 25 0 0 1 373.5 318.5 L 26.5 318.5 A 25 25 0 0 1 1.5 293.5 Z"
                fill="none"
                stroke="url(#folder-front-stroke)"
                stroke-width="1.5"
              />
            </svg>

            <div class="absolute inset-x-0 bottom-0 p-7 sm:p-8 flex items-end justify-between">
              <div>
                <div class="text-[2.6rem] font-extrabold text-white leading-none mb-1.5 tracking-tight">5</div>
                <div class="folder-count-serif text-[1.05rem] font-bold text-slate-300/95">Certificates</div>
              </div>
              <div class="
                w-[62px] h-[54px] rounded-[18px]
                bg-gradient-to-b from-[#2c3037]/95 to-[#17191e]/95
                border border-white/10 shadow-[0_8px_20px_rgba(0,0,0,0.65),inset_0_1px_1px_rgba(255,255,255,0.15)]
                flex items-center justify-center gap-[3px]
              ">
                <span class="w-[9px] h-[9px] rounded-full border-[1.7px] border-white/95"></span>
                <span class="w-[9px] h-[9px] rounded-full border-[1.7px] border-white/95"></span>
                <span class="w-[9px] h-[9px] rounded-full border-[1.7px] border-white/95"></span>
              </div>
            </div>
          </div>
        </div>

        <!-- FOLDER 3: 5 Awards -->
        <div
          class="folder-card relative w-full max-w-[360px] mx-auto aspect-[400/320] cursor-pointer select-none group"
          onclick="openPortfolioCategory('awards')"
        >
          <!-- Layer 1: Folder Back Plate SVG -->
          <svg viewBox="0 0 400 320" class="absolute inset-0 w-full h-full drop-shadow-[0_22px_38px_rgba(0,0,0,0.85)] z-0">
            <path
              d="M 1.5 66 A 25 25 0 0 1 26.5 41 L 166 41 C 186 41, 196 1.5, 218 1.5 L 373.5 1.5 A 25 25 0 0 1 398.5 26.5 L 398.5 293.5 A 25 25 0 0 1 373.5 318.5 L 26.5 318.5 A 25 25 0 0 1 1.5 293.5 Z"
              fill="url(#folder-back-grad)"
              stroke="url(#folder-back-stroke)"
              stroke-width="1.5"
            />
          </svg>

          <!-- Layer 2: 3 Fan-Out Award Preview Images Inside Folder -->
          <div class="absolute inset-x-[9%] top-[33%] bottom-[8%] z-10 flex items-start justify-center pointer-events-none">
            <img
              src="<?= base_url('assets/images/award_preview.jpg') ?>"
              alt="Award 1"
              class="folder-preview-item preview-1 absolute top-0 w-[94%] h-[92%] object-cover object-top rounded-[16px] border border-white/25 shadow-lg"
            />
            <img
              src="<?= base_url('assets/images/cert_filkom_1.jpg') ?>"
              alt="Award 2"
              class="folder-preview-item preview-2 absolute top-0 w-[96%] h-[92%] object-cover object-top rounded-[16px] border border-white/30 shadow-xl"
            />
            <img
              src="<?= base_url('assets/images/award_filkom_1.jpg') ?>"
              alt="Award 3"
              class="folder-preview-item preview-3 absolute top-0 w-[98%] h-[92%] object-cover object-top rounded-[16px] border border-white/35 shadow-2xl"
            />
          </div>

          <!-- Layer 3: Translucent Frosted Glass Front Pocket -->
          <div class="folder-front-wrap absolute inset-0 z-20 pointer-events-none">
            <div class="folder-front-glass absolute inset-0 w-full h-full"></div>

            <svg viewBox="0 0 400 320" class="absolute inset-0 w-full h-full">
              <path
                d="M 1.5 112 A 25 25 0 0 1 26.5 87 L 138 87 C 160 87, 172 124, 196 124 L 373.5 124 A 25 25 0 0 1 398.5 149 L 398.5 293.5 A 25 25 0 0 1 373.5 318.5 L 26.5 318.5 A 25 25 0 0 1 1.5 293.5 Z"
                fill="none"
                stroke="url(#folder-front-stroke)"
                stroke-width="1.5"
              />
            </svg>

            <div class="absolute inset-x-0 bottom-0 p-7 sm:p-8 flex items-end justify-between">
              <div>
                <div class="text-[2.6rem] font-extrabold text-white leading-none mb-1.5 tracking-tight">5</div>
                <div class="folder-count-serif text-[1.05rem] font-bold text-slate-300/95">Awards</div>
              </div>
              <div class="
                w-[62px] h-[54px] rounded-[18px]
                bg-gradient-to-b from-[#2c3037]/95 to-[#17191e]/95
                border border-white/10 shadow-[0_8px_20px_rgba(0,0,0,0.65),inset_0_1px_1px_rgba(255,255,255,0.15)]
                flex items-center justify-center gap-[3px]
              ">
                <span class="w-[9px] h-[9px] rounded-full border-[1.7px] border-white/95"></span>
                <span class="w-[9px] h-[9px] rounded-full border-[1.7px] border-white/95"></span>
                <span class="w-[9px] h-[9px] rounded-full border-[1.7px] border-white/95"></span>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>

    <!-- =================================================================== -->
    <!-- 5. GIANT "PORTOFOLIO" TEXT ZOOM TRANSITION STAGE (Photo 8 -> 7)     -->
    <!-- =================================================================== -->
    <section id="portofolio-zoom-stage" class="relative h-[195vh] w-full">
      <div class="sticky top-0 h-screen w-full overflow-hidden flex items-center justify-center">
        <!-- White flash overlay that fades in as PORTOFOLIO scales up -->
        <div
          id="zoom-white-flash"
          class="absolute inset-0 bg-[#f8fafc] opacity-0 pointer-events-none transition-opacity duration-75 z-10"
        ></div>

        <!-- Massive Bold "PORTOFOLIO" Text (Photo 8) -->
        <h2
          id="zoom-portofolio-text"
          class="
            relative z-20 font-black text-white uppercase tracking-tight select-none
            text-[3.4rem] sm:text-[6.2rem] md:text-[8.5rem] lg:text-[10.8rem]
            leading-none will-change-transform transition-transform duration-75 ease-out
          "
        >
          PORTOFOLIO
        </h2>
      </div>
    </section>
