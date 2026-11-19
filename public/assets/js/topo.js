/* =====================================================================
   topo.js - Background garis kontur topografi yang bergerak (ringan)
   Tanpa library. Otomatis dipasang ke elemen .topo-light-bg & .topo-dark-bg
   - Semua section memakai medan garis yang SAMA (nyambung di perbatasan)
   - Garis disambung jadi kurva mulus (bukan potongan lurus)
   - Dihitung sekali per frame lalu dipakai bersama semua canvas
   ===================================================================== */
(function () {
  'use strict';

  // ====== PENGATURAN (silakan diubah) ======
  var FPS   = 24;    // makin kecil makin ringan (20-30 sudah halus)
  var CELL  = 10;    // ukuran sel grid (px). Dengan kurva mulus, 10-14 sudah cukup
  var SPEED = 0.35;  // kecepatan gerak. 0.2 = sangat pelan, 1 = cepat
  var SCALE = 1.8;   // ukuran pola. Makin besar angkanya makin kecil polanya
  var STEP  = 0.4;   // jarak antar garis kontur. Makin kecil makin rapat
  var FADE_TOP    = 0;   // pudar bawaan untuk SEMUA section (px). 0 = tanpa pudar. Per section: data-topo-fade="400"
  var FADE_BOTTOM = 0;   // pudar di bagian bawah section (px). 0 = tidak ada
  var PRELOAD = '700px 0px'; // mulai menggambar sebelum section masuk layar
  var THEMES = {
    light: { line: 'rgba(148,163,184,0.40)' },  // untuk section terang
    dark:  { line: 'rgba(59,110,180,0.32)'  }   // untuk section gelap
  };
  // Tiap gelombang: [kx, ky, kecepatan, fase, amplitudo]
  var WAVES = [
    [ 0.0090,  0.0040,  0.30, 0.0, 1.0],
    [-0.0050,  0.0095,  0.22, 1.7, 0.9],
    [ 0.0140, -0.0060, -0.27, 3.1, 0.6],
    [ 0.0035,  0.0150,  0.35, 4.4, 0.5],
    [-0.0110, -0.0100,  0.18, 5.6, 0.4]
  ];
  var L0 = -2.7;     // level kontur terendah
  // =========================================

  var reduceMotion = window.matchMedia &&
    window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  var K = WAVES.length;
  var W, H, dpr, cols, rows, field, P;
  var sxA, cxA, syA, cyA;                 // tabel sin/cos per kolom & baris
  var link0, link1, seen, touched, chX, chY, tc;
  var PX, PY, fMin, fMax;
  var instances = [];
  var curT = 0;

  function measure() {
    dpr = Math.min(window.devicePixelRatio || 1, 1.5);
    W = document.documentElement.clientWidth;
    H = window.innerHeight;
    cols = Math.ceil(W / CELL) + 1;
    rows = Math.ceil(H / CELL) + 1;
    field = new Float32Array(cols * rows);
    sxA = new Float32Array(K * cols); cxA = new Float32Array(K * cols);
    syA = new Float32Array(K * rows); cyA = new Float32Array(K * rows);
    var m = 2 * cols * rows;           // jumlah "sisi sel" (horizontal + vertikal)
    link0 = new Int32Array(m).fill(-1);
    link1 = new Int32Array(m).fill(-1);
    seen = new Uint8Array(m);
    touched = new Int32Array(m);
    chX = new Float32Array(m + 1);
    chY = new Float32Array(m + 1);
  }

  function sizeInstance(it) {
    var cv = it.cv, ctx = it.ctx;
    cv.style.width = W + 'px';
    cv.style.height = H + 'px';
    cv.width = Math.round(W * dpr);
    cv.height = Math.round(H * dpr);
    ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
    ctx.lineWidth = 1;
    ctx.lineJoin = 'round';
    ctx.lineCap = 'round';
    ctx.strokeStyle = THEMES[it.theme].line;
  }

  // Medan ketinggian. sin(ax+by+c) dipecah jadi hasil kali tabel -> tanpa sin per titik
  function computeField(t) {
    var i, j, k;
    for (k = 0; k < K; k++) {
      var w = WAVES[k];
      var kx = w[0] * SCALE * CELL, ky = w[1] * SCALE * CELL, ph = w[3] + w[2] * t;
      for (i = 0; i < cols; i++) {
        var a = kx * i + ph;
        sxA[k * cols + i] = Math.sin(a); cxA[k * cols + i] = Math.cos(a);
      }
      for (j = 0; j < rows; j++) {
        var b = ky * j;
        syA[k * rows + j] = Math.sin(b); cyA[k * rows + j] = Math.cos(b);
      }
    }
    var n = 0;
    fMin = 1e9; fMax = -1e9;
    for (j = 0; j < rows; j++) {
      for (i = 0; i < cols; i++) {
        var v = 0;
        for (k = 0; k < K; k++) {
          v += WAVES[k][4] * (sxA[k * cols + i] * cyA[k * rows + j] +
                              cxA[k * cols + i] * syA[k * rows + j]);
        }
        field[n++] = v;
        if (v < fMin) fMin = v;
        if (v > fMax) fMax = v;
      }
    }
  }

  // ---- sambung potongan garis jadi rantai ----
  function touch(e) { if (link0[e] === -1 && link1[e] === -1) touched[tc++] = e; }
  function put(e, o) { if (link0[e] === -1) link0[e] = o; else link1[e] = o; }
  function connect(e1, e2) { touch(e1); touch(e2); put(e1, e2); put(e2, e1); }

  // koordinat titik potong pada sebuah sisi sel untuk level L
  function pos(e, L) {
    var p = e >> 1, i = p % cols, j = (p / cols) | 0;
    var a = field[p];
    if (e & 1) {                         // sisi vertikal
      PX = i * CELL;
      PY = j * CELL + CELL * (L - a) / (field[p + cols] - a);
    } else {                             // sisi horizontal
      PX = i * CELL + CELL * (L - a) / (field[p + 1] - a);
      PY = j * CELL;
    }
  }

  // telusuri satu rantai lalu gambar sebagai kurva mulus
  function walk(start, L, closed) {
    var n = 0, cur = start, nx;
    while (cur !== -1) {
      seen[cur] = 1;
      pos(cur, L);
      chX[n] = PX; chY[n] = PY; n++;
      nx = -1;
      if (link0[cur] !== -1 && !seen[link0[cur]]) nx = link0[cur];
      else if (link1[cur] !== -1 && !seen[link1[cur]]) nx = link1[cur];
      cur = nx;
    }
    if (n < 2) return;
    var k, mx, my;
    if (closed && n >= 3) {
      P.moveTo((chX[n - 1] + chX[0]) / 2, (chY[n - 1] + chY[0]) / 2);
      for (k = 0; k < n; k++) {
        var q = (k + 1) % n;
        mx = (chX[k] + chX[q]) / 2; my = (chY[k] + chY[q]) / 2;
        P.quadraticCurveTo(chX[k], chY[k], mx, my);
      }
      P.closePath();
    } else {
      P.moveTo(chX[0], chY[0]);
      if (n === 2) { P.lineTo(chX[1], chY[1]); return; }
      for (k = 1; k < n - 1; k++) {
        mx = (chX[k] + chX[k + 1]) / 2; my = (chY[k] + chY[k + 1]) / 2;
        P.quadraticCurveTo(chX[k], chY[k], mx, my);
      }
      P.lineTo(chX[n - 1], chY[n - 1]);
    }
  }

  function trace(L) {
    var s, e;
    for (s = 0; s < tc; s++) {           // rantai terbuka (ujung di tepi layar)
      e = touched[s];
      if (!seen[e] && link1[e] === -1) walk(e, L, false);
    }
    for (s = 0; s < tc; s++) {           // loop tertutup
      e = touched[s];
      if (!seen[e]) walk(e, L, true);
    }
    for (s = 0; s < tc; s++) {           // reset untuk level berikutnya
      e = touched[s];
      link0[e] = -1; link1[e] = -1; seen[e] = 0;
    }
  }

  function buildPath(t) {
    computeField(t);
    P = new Path2D();
    var kLo = Math.ceil((fMin - L0) / STEP), kHi = Math.floor((fMax - L0) / STEP);
    var i, j, k;
    for (k = kLo; k <= kHi; k++) {
      var L = L0 + k * STEP;
      tc = 0;
      for (j = 0; j < rows - 1; j++) {
        for (i = 0; i < cols - 1; i++) {
          var p = j * cols + i;
          var a = field[p], b = field[p + 1], d = field[p + cols], c = field[p + cols + 1];
          var idx = (a > L ? 8 : 0) | (b > L ? 4 : 0) | (c > L ? 2 : 0) | (d > L ? 1 : 0);
          if (idx === 0 || idx === 15) continue;
          var T = 2 * p, B = 2 * (p + cols), Lf = 2 * p + 1, R = 2 * (p + 1) + 1;
          switch (idx) {
            case 1: case 14: connect(Lf, B); break;
            case 2: case 13: connect(B, R); break;
            case 3: case 12: connect(Lf, R); break;
            case 4: case 11: connect(T, R); break;
            case 5:  connect(T, Lf); connect(B, R); break;
            case 6: case 9:  connect(T, B); break;
            case 7: case 8:  connect(T, Lf); break;
            case 10: connect(T, R); connect(Lf, B); break;
          }
        }
      }
      trace(L);
    }
    return P;
  }

  // all=true: gambar semua canvas (dipakai untuk gambar awal / resize)
  function drawAll(t, all) {
    var path = buildPath(t);
    for (var i = 0; i < instances.length; i++) {
      var it = instances[i];
      if (all || it.visible) {
        it.ctx.clearRect(0, 0, W, H);
        it.ctx.stroke(path);
      }
    }
  }

  function makeInstance(host, theme) {
    // Wrapper di-clip ke ukuran section; canvas di dalamnya fixed seukuran layar
    var wrap = document.createElement('div');
    wrap.setAttribute('aria-hidden', 'true');
    wrap.style.cssText =
      'position:absolute;inset:0;z-index:-1;pointer-events:none;clip-path:inset(0);';
    // Pudar transparan -> penuh dari atas ke bawah (bisa diganti per elemen: data-topo-fade="200")
    var attr = host.getAttribute('data-topo-fade');
    var fadeTop = attr !== null ? parseFloat(attr) || 0 : FADE_TOP;
    if (fadeTop > 0 || FADE_BOTTOM > 0) {
      var stops = ['transparent 0'];
      stops.push('#000 ' + fadeTop + 'px');
      if (FADE_BOTTOM > 0) {
        stops.push('#000 calc(100% - ' + FADE_BOTTOM + 'px)');
        stops.push('transparent 100%');
      }
      var mask = 'linear-gradient(to bottom, ' + stops.join(', ') + ')';
      if (fadeTop <= 0) mask = mask.replace('transparent 0, #000 0px', '#000 0');
      wrap.style.webkitMaskImage = mask;
      wrap.style.maskImage = mask;
    }
    var cv = document.createElement('canvas');
    cv.style.cssText = 'position:fixed;top:0;left:0;display:block;';
    wrap.appendChild(cv);
    host.insertBefore(wrap, host.firstChild);

    var it = { host: host, cv: cv, ctx: cv.getContext('2d'), theme: theme, visible: false };
    sizeInstance(it);
    return it;
  }

  function init() {
    var hosts = document.querySelectorAll('.topo-light-bg, .topo-dark-bg');
    if (!hosts.length || typeof Path2D === 'undefined') return;

    measure();
    hosts.forEach(function (host) {
      var theme = host.classList.contains('topo-dark-bg') ? 'dark' : 'light';
      var it = makeInstance(host, theme);
      instances.push(it);

      if ('IntersectionObserver' in window) {
        new IntersectionObserver(function (entries) {
          it.visible = entries[0].isIntersecting;
        }, { rootMargin: PRELOAD }).observe(host);
      } else {
        it.visible = true;
      }
    });

    // Gambar awal untuk SEMUA canvas, jadi sudah terisi sebelum section terlihat
    drawAll(0, true);

    if (!reduceMotion) {
      var last = 0;
      var frame = function (now) {
        requestAnimationFrame(frame);
        if (now - last < 1000 / FPS) return;
        last = now;
        var any = false;
        for (var i = 0; i < instances.length; i++) {
          if (instances[i].visible) { any = true; break; }
        }
        if (!any) return;
        curT = now / 1000 * SPEED;
        drawAll(curT, false);
      };
      requestAnimationFrame(frame);
    }

    var rt;
    window.addEventListener('resize', function () {
      clearTimeout(rt);
      rt = setTimeout(function () {
        measure();
        instances.forEach(sizeInstance);
        drawAll(curT, true);
      }, 150);
    });
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();