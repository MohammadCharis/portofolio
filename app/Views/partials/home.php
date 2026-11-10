<section id="home" class="relative w-full h-screen min-h-[600px] overflow-hidden select-none cursor-pointer"
  onclick="triggerTreeOpen()">
  <!-- Layer 1: Mountain & Sky Clean Background -->
  <img src="<?= base_url('assets/images/laba.jpg') ?>" alt="Mountain Landscape"
    class="absolute inset-0 w-full h-full object-cover object-center z-10 scale-[1.01]" />

  <!-- Layer 2: Giant "WELCOME TO MY PORTFOLIO" Text (Behind the Person!) -->
  <div id="hero-welcome-text" class="
      hero-title-wrap title-hidden
      absolute inset-0 z-20 flex flex-col items-center justify-center pointer-events-none
      -mt-10 sm:-mt-14 px-4
    ">
    <h1 class="
        text-center font-black text-white uppercase tracking-wider
        text-[2.5rem] sm:text-[4.2rem] md:text-[5.5rem] lg:text-[6.4rem]
        leading-[1.04] drop-shadow-[0_8px_30px_rgba(0,0,0,0.45)]
      ">
      WELCOME TO MY<br />PORTFOLIO
    </h1>
  </div>

  <!-- Layer 3: Person Standing Cutout in Front of Text -->
  <img src="<?= base_url('assets/images/laba2.png') ?>" alt="laba_laba"
    class="absolute inset-0 w-full h-full object-cover object-center z-30 pointer-events-none scale-[1.01]" />

  <!-- Layer 4: Foreground Trees Frame (Photo 2 initial state -> scales back & disappears on scroll/click) -->
  <img id="hero-trees-layer" src="<?= base_url('assets/images/jaring.png') ?>" alt="Foreground Forest Trees"
    class="hero-trees absolute inset-0 w-full h-full object-cover object-center z-40 pointer-events-none" />

  <!-- Bottom Gradient Blend into Dark Topographic Section -->
  <div
    class="absolute inset-x-0 bottom-0 h-28 bg-gradient-to-t from-[#030914] via-[#030914]/70 to-transparent z-40 pointer-events-none">
  </div>


</section>