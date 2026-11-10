// =========================================================================
// 1. HERO TREE PARTING / ZOOM-BACK ANIMATION (Photo 2 -> Photo 1)
// =========================================================================
let treesOpened = false;
const treesLayer = document.getElementById('hero-trees-layer');
const welcomeText = document.getElementById('hero-welcome-text');

function setTreesState(open) {
  treesOpened = open;
  if (open) {
    treesLayer.classList.add('trees-hidden');
    welcomeText.classList.remove('title-hidden');
    welcomeText.classList.add('title-visible');
  } else {
    treesLayer.classList.remove('trees-hidden');
    welcomeText.classList.add('title-hidden');
    welcomeText.classList.remove('title-visible');
  }
}

function triggerTreeOpen() {
  if (!treesOpened) {
    setTreesState(true);
  }
}

function toggleTreesManual() {
  setTreesState(!treesOpened);
}

// Intercept initial scroll/wheel at the top of the page so scrolling first
// opens the trees (Photo 2 -> Photo 1) before scrolling down to About Me!
window.addEventListener('wheel', (e) => {
  if (window.scrollY < 40 && e.deltaY > 0 && !treesOpened) {
    e.preventDefault();
    setTreesState(true);
  } else if (window.scrollY <= 5 && e.deltaY < -15 && treesOpened) {
    setTreesState(false);
  }
}, { passive: false });

window.addEventListener('scroll', () => {
  if (window.scrollY > 18 && !treesOpened) {
    setTreesState(true);
  }
  updateScrollAnimations();
});

// =========================================================================
// 2. SPIDER-MAN CURSOR REVEAL ON PORTRAIT (Strictly on Person Silhouette)
// =========================================================================
const portraitBox = document.getElementById('portrait-container');
const cursorDot = document.getElementById('portrait-cursor-dot');
const personBaseImg = document.getElementById('person-base-img');

// Offscreen canvas to hit-test exact alpha channel of the person silhouette
const hitCanvas = document.createElement('canvas');
const hitCtx = hitCanvas.getContext('2d', { willReadFrequently: true });
let hitReady = false;

function initPersonHitMask() {
  if (!personBaseImg || !personBaseImg.complete || !personBaseImg.naturalWidth) return;
  hitCanvas.width = personBaseImg.naturalWidth;
  hitCanvas.height = personBaseImg.naturalHeight;
  hitCtx.clearRect(0, 0, hitCanvas.width, hitCanvas.height);
  hitCtx.drawImage(personBaseImg, 0, 0);
  hitReady = true;
}
personBaseImg.addEventListener('load', initPersonHitMask);
if (personBaseImg.complete) initPersonHitMask();

function isPointOnPerson(x, y, width, height) {
  if (!hitReady || width <= 0 || height <= 0) return true;
  const ix = Math.floor((x / width) * hitCanvas.width);
  const iy = Math.floor((y / height) * hitCanvas.height);
  if (ix < 0 || iy < 0 || ix >= hitCanvas.width || iy >= hitCanvas.height) return false;
  const alpha = hitCtx.getImageData(ix, iy, 1, 1).data[3];
  return alpha > 20;
}

function handlePortraitMove(clientX, clientY) {
  const rect = portraitBox.getBoundingClientRect();
  const x = clientX - rect.left;
  const y = clientY - rect.top;
  portraitBox.style.setProperty('--mx', `${x}px`);
  portraitBox.style.setProperty('--my', `${y}px`);
  cursorDot.style.left = `${x}px`;
  cursorDot.style.top = `${y}px`;

  if (isPointOnPerson(x, y, rect.width, rect.height)) {
    portraitBox.style.cursor = 'none';
    portraitBox.style.setProperty('--spot-size', `75px`);
    cursorDot.style.opacity = '1';
  } else {
    portraitBox.style.cursor = 'default';
    portraitBox.style.setProperty('--spot-size', `0px`);
    cursorDot.style.opacity = '0';
  }
}

portraitBox.addEventListener('mousemove', (e) => {
  handlePortraitMove(e.clientX, e.clientY);
});

portraitBox.addEventListener('mouseenter', (e) => {
  handlePortraitMove(e.clientX, e.clientY);
});

portraitBox.addEventListener('mouseleave', () => {
  portraitBox.style.setProperty('--spot-size', `0px`);
  cursorDot.style.opacity = '0';
});

portraitBox.addEventListener('touchmove', (e) => {
  if (e.touches.length > 0) {
    handlePortraitMove(e.touches[0].clientX, e.touches[0].clientY);
  }
}, { passive: true });

portraitBox.addEventListener('touchend', () => {
  portraitBox.style.setProperty('--spot-size', `0px`);
  cursorDot.style.opacity = '0';
});

// =========================================================================
// 3. TIMELINE INTERACTIVE HIGHLIGHT & EXPERIENCE 3-ITEM SCROLL (Photo 4)
// =========================================================================
function highlightTimeline(el) {
  const parentCol = el.parentElement;
  const items = parentCol.querySelectorAll('.timeline-item');
  items.forEach((item) => {
    const badge = item.querySelector('.timeline-badge');
    const org = item.querySelector('.timeline-org');
    const role = item.querySelector('.timeline-role');
    if (item === el) {
      item.classList.remove('opacity-60');
      badge.className = 'timeline-badge absolute -left-14 top-0 w-11 h-11 rounded-full flex items-center justify-center font-extrabold text-xs transition-colors duration-200 bg-white text-slate-950 border-[4px] border-[#45494e]';
      org.classList.remove('text-slate-400');
      org.classList.add('text-[#e2e8f0]');
      role.classList.remove('text-slate-400');
      role.classList.add('text-white');
    } else {
      item.classList.add('opacity-60');
      badge.className = 'timeline-badge absolute -left-14 top-0 w-11 h-11 rounded-full flex items-center justify-center font-extrabold text-xs transition-colors duration-200 bg-[#0b111e] text-slate-500 border-[2px] border-[#232b3a]';
      org.classList.remove('text-[#e2e8f0]');
      org.classList.add('text-slate-400');
      role.classList.remove('text-white');
      role.classList.add('text-slate-400');
    }
  });
}

const expScrollBox = document.getElementById('exp-scroll-container');
if (expScrollBox) {
  expScrollBox.addEventListener('scroll', () => {
    const st = expScrollBox.scrollTop;
    const maxScroll = expScrollBox.scrollHeight - expScrollBox.clientHeight;
    // Update top/bottom fade mask so items smoothly disappear upward or downward
    if (st <= 10) {
      expScrollBox.className = 'exp-mask-bottom relative max-h-[365px] overflow-y-auto no-scrollbar pr-1 pt-1 pb-10';
    } else if (st >= maxScroll - 12) {
      expScrollBox.className = 'exp-mask-top relative max-h-[365px] overflow-y-auto no-scrollbar pr-1 pt-1 pb-10';
    } else {
      expScrollBox.className = 'exp-mask-both relative max-h-[365px] overflow-y-auto no-scrollbar pr-1 pt-1 pb-10';
    }

    // Highlight whichever Experience item is closest to the top of the visible scroll container
    const items = expScrollBox.querySelectorAll('.timeline-item');
    const boxTop = expScrollBox.getBoundingClientRect().top;
    let closestItem = items[0];
    let minDist = Infinity;
    items.forEach((item) => {
      const itemTop = item.getBoundingClientRect().top;
      const dist = Math.abs((itemTop - boxTop) - 24);
      if (dist < minDist) {
        minDist = dist;
        closestItem = item;
      }
    });
    if (closestItem) highlightTimeline(closestItem);
  });
}

// =========================================================================
// 4. PORTFOLIO DATA & CAROUSEL (Photo 7 Exact Cards)
// =========================================================================
const PORTFOLIO_DATA = {
  projects: [
    {
      title: 'Hology 9.0',
      desc: 'Hology 9.0 (House of Technology 9.0) adalah festival dan kompetisi teknologi informasi (IT) tingkat nasional untuk mahasiswa di seluruh Indonesia yang diselenggarakan oleh FILKOM UB.',
      img: BASE_IMG + 'proj_hology.jpg',
      tag: 'Web & UI/UX'
    },
    {
      title: 'RujukCepat Website',
      desc: 'RujukCepat merupakan sebuah ekosistem digital terintegrasi yang menghubungkan masyarakat, rumah sakit, dan apotek dalam satu sistem layanan kesehatan terpadu.',
      img: BASE_IMG + 'proj_rujukcepat.jpg',
      tag: 'Healthcare Platform'
    },
    {
      title: 'RisetIn',
      desc: 'RisetIn adalah platform digital berbasis AI yang mempercepat proses hilirisasi penelitian dengan menghubungkan mahasiswa, industri, dan mitra akademik.',
      img: BASE_IMG + 'proj_risetin.jpg',
      tag: 'AI Platform'
    },
    {
      title: 'Luma APPS',
      desc: 'Aplikasi personal assistant yang membantu mahasiswa mengelola kehidupan kampus secara menyeluruh mulai dari jadwal kuliah, tugas, hingga finansial.',
      img: BASE_IMG + 'proj_luma.jpg',
      tag: 'Mobile App'
    },
    {
      title: 'FILKOM Hub Portal',
      desc: 'Portal kolaborasi komunitas mahasiswa Fakultas Ilmu Komputer untuk berbagi repositori riset, lomba web development, dan portofolio proyek.',
      img: BASE_IMG + 'proj_risetin.jpg',
      tag: 'Web App'
    },
    {
      title: 'SmartNet Monitor',
      desc: 'Dashboard monitoring infrastruktur jaringan real-time untuk analisis trafik, deteksi anomali, dan manajemen perangkat router terpusat.',
      img: BASE_IMG + 'proj_hology.jpg',
      tag: 'Network Dashboard'
    }
  ],
  certificates: [
    {
      title: 'Certificate of Appreciation — GDGoC UB Community Member',
      desc: 'Sertifikat apresiasi sebagai active Community Member Google Developer Groups on Campus Universitas Brawijaya 2025–2026.',
      img: BASE_IMG + 'cert_gdgoc.jpg',
      tag: 'Certificate'
    },
    {
      title: 'Sertifikat Kompetensi — Kecerdasan Buatan Generatif (IDEA-AI)',
      desc: 'Sertifikat kompetensi Institute for Data Innovation and Artificial Intelligence (IDEA-AI Australia) dalam Kecerdasan Buatan Generatif.',
      img: BASE_IMG + 'cert_idea_ai.jpg',
      tag: 'Certificate'
    },
    {
      title: 'Sertifikat Kompetensi — Belajar Dasar Data Science (Dicoding)',
      desc: 'Sertifikat kelulusan kompetensi Belajar Dasar Data Science oleh Dicoding Indonesia.',
      img: BASE_IMG + 'cert_dicoding.jpg',
      tag: 'Certificate'
    },
    {
      title: 'Google Student Ambassador 2026 — Google Indonesia',
      desc: 'Sertifikasi resmi Google Indonesia sebagai Google Student Ambassador perwakilan Universitas Brawijaya.',
      img: BASE_IMG + 'cert_filkom_1.jpg',
      tag: 'Certificate'
    },
    {
      title: 'Staff Technology & UI/UX Designer — Hology 9.0 FILKOM UB',
      desc: 'Sertifikat kepanitiaan nasional House of Technology (Hology 9.0) Fakultas Ilmu Komputer Universitas Brawijaya.',
      img: BASE_IMG + 'cert_gdgoc.jpg',
      tag: 'Certificate'
    },
    {
      title: 'Front-End & UI/UX Development Certificate',
      desc: 'Sertifikat kompetensi perancangan antarmuka pengguna dan pengembangan aplikasi web modern.',
      img: BASE_IMG + 'cert_idea_ai.jpg',
      tag: 'Certificate'
    }
  ],
  awards: [
    {
      title: 'Selected Google Student Ambassador 2026',
      desc: 'Terpilih mewakili Universitas Brawijaya dalam program kepemimpinan teknologi Google Student Ambassador 2026.',
      img: BASE_IMG + 'award_filkom_1.jpg',
      tag: 'Award'
    },
    {
      title: 'Juara & Finalis Kompetisi Inovasi Digital Nasional',
      desc: 'Penghargaan atas pengembangan ekosistem layanan kesehatan terpadu RujukCepat dan platform AI RisetIn.',
      img: BASE_IMG + 'cert_gdgoc.jpg',
      tag: 'Award'
    },
    {
      title: 'Best UI/UX Design Innovation — FILKOM UB',
      desc: 'Penghargaan desain pengalaman pengguna terbaik tingkat Fakultas Ilmu Komputer Universitas Brawijaya.',
      img: BASE_IMG + 'cert_idea_ai.jpg',
      tag: 'Award'
    },
    {
      title: 'Outstanding Community Member — GDGoC Universitas Brawijaya',
      desc: 'Apresiasi kontribusi aktif dalam kolaborasi teknologi Google Developer Groups on Campus Universitas Brawijaya.',
      img: BASE_IMG + 'cert_dicoding.jpg',
      tag: 'Award'
    },
    {
      title: 'Best Project Exhibition — Hology 9.0',
      desc: 'Penghargaan karya pameran proyek teknologi informasi terbaik pada festival nasional Hology 9.0.',
      img: BASE_IMG + 'award_filkom_1.jpg',
      tag: 'Award'
    }
  ]
};

let currentCategory = 'projects';

function renderPortfolioCards(category) {
  const container = document.getElementById('portfolio-carousel');
  const items = PORTFOLIO_DATA[category] || [];

  if (category === 'certificates' || category === 'awards') {
    const hoverLabel = category === 'certificates' ? 'View Certificate' : 'View Award';
    container.innerHTML = items.map((item, idx) => `
      <div
        onclick="openItemModal('${category}', ${idx})"
        class="
          group w-[320px] sm:w-[420px] lg:w-[465px] flex-shrink-0 bg-white rounded-[22px] p-3.5 sm:p-4
          shadow-[0_10px_32px_rgba(15,23,42,0.07)] border border-slate-100
          cursor-pointer transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_16px_38px_rgba(15,23,42,0.12)]
        "
      >
        <div class="relative w-full h-[240px] sm:h-[300px] lg:h-[325px] rounded-[14px] overflow-hidden bg-slate-100 border border-slate-200/70">
          <img
            src="${item.img}"
            alt="${item.title}"
            class="w-full h-full object-cover transition-all duration-300 group-hover:brightness-[0.80] group-hover:scale-[1.01]"
          />
          <!-- Hover Overlay with Centered "View Certificate" / "View Award" Pill (Matches image_98aee1.png) -->
          <div class="
            absolute inset-0 flex items-center justify-center
            bg-slate-900/15 opacity-0 group-hover:opacity-100
            transition-opacity duration-300
          ">
            <div class="
              inline-flex items-center gap-2 px-5 py-2.5 rounded-xl
              bg-[#5c93ff]/90 backdrop-blur-sm text-white font-bold text-xs sm:text-sm
              shadow-[0_8px_24px_rgba(37,99,235,0.45)]
              transform scale-95 group-hover:scale-100 transition-transform duration-300
            ">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 3h6m0 0v6m0-6l-7 7M9 21H3m0 0v-6m0 6l7-7" />
              </svg>
              <span>${hoverLabel}</span>
            </div>
          </div>
        </div>
      </div>
    `).join('');
    container.scrollLeft = 0;
    return;
  }

  container.innerHTML = items.map((item, idx) => `
    <div class="
      w-[300px] sm:w-[375px] lg:w-[410px] flex-shrink-0 bg-white rounded-[20px] p-4 sm:p-5
      shadow-[0_10px_32px_rgba(15,23,42,0.07)] border border-slate-100
      flex flex-col justify-between transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_16px_38px_rgba(37,99,235,0.12)]
    ">
      <div>
        <div class="w-full h-[165px] sm:h-[190px] rounded-[12px] overflow-hidden bg-slate-100 mb-4 border border-slate-100">
          <img src="${item.img}" alt="${item.title}" class="w-full h-full object-cover" />
        </div>
        <h3 class="text-lg sm:text-[1.22rem] font-extrabold text-slate-900 mb-2 px-0.5 tracking-tight">
          ${item.title}
        </h3>
        <p class="text-slate-600 text-xs sm:text-[13px] leading-relaxed px-0.5 line-clamp-2 mb-5">
          ${item.desc}
        </p>
      </div>
      <div class="px-0.5">
        <button
          onclick="openItemModal('${category}', ${idx})"
          class="
            inline-flex items-center gap-2 px-5 py-2 rounded-[11px]
            bg-[#2563eb] hover:bg-blue-600 text-white font-bold text-xs sm:text-[13px]
            shadow-[0_4px_14px_rgba(37,99,235,0.35)] transition-all
          "
        >
          <span>Details</span>
          <span>→</span>
        </button>
      </div>
    </div>
  `).join('');

  container.scrollLeft = 0;
}

function switchPortfolioTab(category) {
  currentCategory = category;
  const tabs = ['projects', 'certificates', 'awards'];
  tabs.forEach((t) => {
    const btn = document.getElementById(`tab-btn-${t}`);
    if (t === category) {
      btn.className = 'portfolio-tab-btn flex flex-col items-center justify-center gap-1 py-3 px-4 rounded-[14px] font-bold text-xs sm:text-sm transition-all duration-300 bg-[#2563eb] text-white shadow-[0_6px_20px_rgba(37,99,235,0.4)]';
    } else {
      btn.className = 'portfolio-tab-btn flex flex-col items-center justify-center gap-1 py-3 px-4 rounded-[14px] font-bold text-xs sm:text-sm transition-all duration-300 text-slate-700 hover:bg-slate-100';
    }
  });
  renderPortfolioCards(category);
}

function scrollCarousel(dir) {
  const container = document.getElementById('portfolio-carousel');
  container.scrollBy({ left: dir * 380, behavior: 'smooth' });
}

function openPortfolioCategory(category) {
  switchPortfolioTab(category);
  navigateToSection('portfolio');
}

// =========================================================================
// 5. SCROLL-DRIVEN "PORTOFOLIO" TEXT ZOOM + NAVBAR ACTIVE TRACKER
// =========================================================================
const zoomStage = document.getElementById('portofolio-zoom-stage');
const zoomText = document.getElementById('zoom-portofolio-text');
const zoomFlash = document.getElementById('zoom-white-flash');
const mainNav = document.getElementById('main-nav');
const navMascot = document.getElementById('nav-mascot');

function updateScrollAnimations() {
  // 1) "PORTOFOLIO" Giant Zoom Animation (Photo 8 -> Photo 7)
  if (zoomStage && zoomText && zoomFlash) {
    const rect = zoomStage.getBoundingClientRect();
    const stageScrollable = rect.height - window.innerHeight;
    if (rect.top <= 0 && rect.bottom >= window.innerHeight && stageScrollable > 0) {
      const progress = Math.min(1, Math.max(0, -rect.top / stageScrollable));
      // First 35% of scroll keeps PORTOFOLIO readable like Photo 8, then zooms massively into white
      const zoomProgress = Math.max(0, (progress - 0.25) / 0.75);
      const scale = 1 + Math.pow(zoomProgress, 2.3) * 16;
      zoomText.style.transform = `scale(${scale.toFixed(3)})`;
      const flashOpacity = Math.max(0, (zoomProgress - 0.45) / 0.55);
      zoomFlash.style.opacity = flashOpacity.toFixed(3);
    } else if (rect.top > 0) {
      zoomText.style.transform = 'scale(1)';
      zoomFlash.style.opacity = '0';
    } else {
      zoomText.style.transform = 'scale(17)';
      zoomFlash.style.opacity = '1';
    }
  }

  // 2) Active Section & Floating Mascot Position
  const portfolioRect = document.getElementById('portfolio').getBoundingClientRect();
  const contactRect = document.getElementById('contact').getBoundingClientRect();
  const aboutRect = document.getElementById('about').getBoundingClientRect();
  const zoomRect = zoomStage.getBoundingClientRect();

  let activeSection = 'home';
  let isLightModeNav = false;

  if (contactRect.top < window.innerHeight * 0.45) {
    activeSection = 'contact';
  } else if (portfolioRect.top < window.innerHeight * 0.55) {
    activeSection = 'portfolio';
    isLightModeNav = true;
  } else if (zoomRect.top < window.innerHeight * 0.45) {
    activeSection = 'portfolio';
  } else if (aboutRect.top < window.innerHeight * 0.55) {
    activeSection = 'about';
  }

  updateNavbarUI(activeSection, isLightModeNav);
}

function updateNavbarUI(activeId, isLight) {
  const buttons = mainNav.querySelectorAll('.nav-btn');
  if (isLight) {
    mainNav.className = 'flex items-center gap-1.5 sm:gap-2 px-2.5 py-2 rounded-full bg-white/95 border border-slate-200/90 backdrop-blur-xl shadow-[0_10px_30px_rgba(15,23,42,0.1)] transition-colors duration-300';
  } else {
    mainNav.className = 'flex items-center gap-1.5 sm:gap-2 px-2.5 py-2 rounded-full bg-[#0d1829]/75 border border-white/15 backdrop-blur-xl shadow-[0_12px_36px_rgba(0,0,0,0.55)] transition-colors duration-300';
  }

  buttons.forEach((btn) => {
    const id = btn.getAttribute('data-nav');
    if (id === activeId) {
      btn.className = 'nav-btn relative px-5 sm:px-6 py-2 rounded-full text-xs sm:text-sm font-bold tracking-wide transition-all duration-300 bg-[#2563eb] text-white shadow-[0_0_25px_rgba(37,99,235,0.9)]';
      // Position mascot centered above active button
      const navRect = mainNav.getBoundingClientRect();
      const btnRect = btn.getBoundingClientRect();
      const centerOffset = (btnRect.left - navRect.left) + (btnRect.width / 2) - 18;
      navMascot.style.left = `${centerOffset}px`;
    } else {
      btn.className = isLight
        ? 'nav-btn relative px-5 sm:px-6 py-2 rounded-full text-xs sm:text-sm font-bold tracking-wide transition-all duration-300 text-slate-800 hover:text-blue-600'
        : 'nav-btn relative px-5 sm:px-6 py-2 rounded-full text-xs sm:text-sm font-bold tracking-wide transition-all duration-300 text-white/90 hover:text-white';
    }
  });
}

function navigateToSection(id) {
  if (id === 'home') {
    window.scrollTo({ top: 0, behavior: 'smooth' });
    return;
  }
  const el = document.getElementById(id);
  if (el) {
    el.scrollIntoView({ behavior: 'smooth' });
  }
}

// =========================================================================
// 6. MODALS & CONTACT FORM HANDLERS
// =========================================================================
function openItemModal(category, idx) {
  const item = PORTFOLIO_DATA[category][idx];
  if (!item) return;
  document.getElementById('modal-img').src = item.img;
  document.getElementById('modal-badge').textContent = item.tag;
  document.getElementById('modal-title').textContent = item.title;
  document.getElementById('modal-desc').textContent = item.desc;
  const modal = document.getElementById('detail-modal');
  modal.classList.remove('hidden');
  modal.classList.add('flex');
}

function openCvModal() {
  document.getElementById('modal-img').src = BASE_IMG + 'proj_risetin.jpg';
  document.getElementById('modal-badge').textContent = 'Curriculum Vitae';
  document.getElementById('modal-title').textContent = 'Eka Wahyu Maulidan — CV';
  document.getElementById('modal-desc').textContent = 'Mahasiswa Pendidikan Teknologi Informasi (FILKOM Universitas Brawijaya) • Google Student Ambassador 2026 • GDG on Campus UB • UI/UX Designer & Front-End Web Developer.';
  const modal = document.getElementById('detail-modal');
  modal.classList.remove('hidden');
  modal.classList.add('flex');
}

function closeModal() {
  const modal = document.getElementById('detail-modal');
  modal.classList.add('hidden');
  modal.classList.remove('flex');
}

function handleContactSubmit(e) {
  e.preventDefault();
  const fb = document.getElementById('contact-feedback');
  fb.classList.remove('hidden');
  e.target.reset();
  setTimeout(() => fb.classList.add('hidden'), 4000);
}

// Initialize on load
window.addEventListener('DOMContentLoaded', () => {
  renderPortfolioCards('projects');
  updateScrollAnimations();
});
