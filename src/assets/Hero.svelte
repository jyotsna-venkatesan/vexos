<script>
  import { onMount } from 'svelte';

  let desktopImageScale = 1.2;
  let mobileImageScale = 1.2;
  let isDesktopImageVisible = false;
  let isMobileImageVisible = false;

  // zoom effect
  const handleScroll = () => {
    const desktopImageEl = document.getElementById('desktop-gateway-image');
    const mobileImageEl = document.getElementById('mobile-gateway-image');

    if (desktopImageEl) {
      const rect = desktopImageEl.getBoundingClientRect();
      const isVisible = rect.top < window.innerHeight && rect.bottom > 0;

      if (isVisible) {
        isDesktopImageVisible = true;
        const viewportProgress = Math.max(0, Math.min(1, 1 - (rect.top / window.innerHeight)));
        desktopImageScale = 1.2 - (0.2 * viewportProgress);
      }
    }

    if (mobileImageEl) {
      const rect = mobileImageEl.getBoundingClientRect();
      const isVisible = rect.top < window.innerHeight && rect.bottom > 0;

      if (isVisible) {
        isMobileImageVisible = true;
        const viewportProgress = Math.max(0, Math.min(1, 1 - (rect.top / window.innerHeight)));
        mobileImageScale = 1.2 - (0.2 * viewportProgress);
      }
    }
  };

  onMount(() => {
    window.addEventListener('scroll', handleScroll);
    handleScroll();
    return () => {
      window.removeEventListener('scroll', handleScroll);
    };
  });
</script>

<!-- combined hero and what is vexos section -->
<div class="relative overflow-hidden bg-dark ">
  <div class="max-w-7xl mx-auto lg:pt-48 md:pt-48 pt-24 px-4 sm:px-6 lg:px-8">
      <!-- grid -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8 pb-24">
          <!-- left half text -->
          <div class="flex flex-col justify-end h-full order-2 md:order-1 ">
            <p class="text-light text-md ">A single platform that tells you exactly where to place what matters — whether it's a store, a sensor, or a security team.</p>
          </div>

          <!-- right half text -->
          <h1 class="text-light font-medium text-6xl md:text-5xl lg:text-[90px] text-right md:text-right order-1 md:order-2"> RE-IMAGINING LOCATION DECISIONS</h1>
      </div>

      <!-- horizontal line -->
      <div class="w-3/5 h-px bg-light mt-4 mb-8"></div>
  </div>

  <!-- flame 1 -->
  <img class="absolute right-0 md:-mt-52 lg:-mt-96 -mt-28 z-10" src="/flame-1.png">

  <!-- what is vexos image section -->
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-20 mt-24">
    <!-- ipad/laptop image -->
    <div class="relative hidden sm:block">
      <!-- Image wrapper with overflow hidden to contain the scaled image -->
      <div class="overflow-hidden rounded-md">
        <img
          id="desktop-gateway-image"
          src="/gateway-image.png"
          alt="Gateway Image"
          class="w-full h-auto transition-transform duration-300 ease-out rounded-md"
          style="transform: scale({desktopImageScale}); transform-origin: center center;"
        >
      </div>

      <!-- semi transparent bg for the image overlay text -->
      <div class="absolute lg:top-52 top-6 left-8 lg:w-1/2 w-3/5 bg-white bg-opacity-20 backdrop-blur-sm rounded-lg p-6">
        <p class="text-light text-md mb-6">At Vexos, we specialize in <span class="text-[#FF4686]">location intelligence.</span> Our platform goes beyond traditional mapping to deliver precise recommendations tailored to your needs.</p>
        <!-- remaining laptop/ipad text -->
        <p class="text-light text-md">By leveraging advanced AI analytics, we focus on <span class="text-[#FF6D46]">optimal placement</span>, ensuring you make informed decisions that drive success.</p>
      </div>

      <!-- What is Vexos text moved to bottom left -->
      <div class="absolute bottom-8 left-8">
          <h1 class="text-light font-medium text-5xl">About <span class="text-orangen">Vexos</span></h1>
      </div>
    </div>

    <!-- first glow for laptop-->
    <img src="/glow-1.png" alt="Glow 1" class="w-full h-auto -mt-20 mb-24 md:mb-32 lg:mb-48 hidden sm:block md:block">

    <!-- mobile view -->
    <div class="block sm:hidden">
      <!-- Mobile image wrapper with overflow hidden -->
      <div class="overflow-hidden rounded-md">
        <img
          id="mobile-gateway-image"
          src="/mobile-gateway-image.png"
          alt="Gateway Image"
          class="w-full h-auto transition-transform duration-300 ease-out rounded-md"
          style="transform: scale({mobileImageScale}); transform-origin: center center;"
        >
      </div>

      <!-- mobile text -->
      <h1 class="text-light font-medium text-3xl mt-48 mb-12">About <span class="text-pinkn">Vexos</span></h1>
      <p class="text-light text-md mb-6">At Vexos, we specialize in location intelligence. Our platform goes beyond traditional mapping to deliver precise recommendations tailored to your needs.</p>
      <!-- remaining mobile text -->
      <p class="text-light text-md">By leveraging advanced AI analytics, we focus on optimal placement, ensuring you make informed decisions that drive success.</p>

      <!-- first glow for mobile -->
      <img src="/glow-1.png" alt="Glow 1" class="w-full h-auto block mt-24 mb-24">
    </div>
  </div>
</div>
