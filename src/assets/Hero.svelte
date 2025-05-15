<div class="relative overflow-hidden">
  <!-- Hero Section with Background Image -->
  <section id="hero" class="relative">
    <!-- Background Image with Opacity -->
    <div class="absolute inset-0 z-0">
      <img 
        src="/bg image.png" 
        alt="Background" 
        class="w-full h-full object-cover opacity-15"
      />
    </div>
    
    <!-- Purple and Blue Glows -->
    <div class="absolute right-0 top-0 h-3/4 z-0 overflow-hidden">
      <img 
        src="/purple glow.png" 
        alt="Purple Glow" 
        class="w-auto h-full max-w-none opacity-80 translate-x-1/3"
      />
    </div>
    <div class="absolute right-0 bottom-0 h-2/3 z-0 overflow-hidden translate-y-1/4">
      <img 
        src="/blue glow.png" 
        alt="Blue Glow" 
        class="w-auto h-full max-w-none opacity-80 translate-x-1/3"
      />
    </div>
    
    <!-- Hero Content -->
    <div class="relative container mx-auto px-6 md:px-12 py-20 md:py-36 z-10">
      <div class="max-w-xl">
        <p class="text-[#2B2B2B] text-lg mb-4">
          Every great business deserves the perfect location. We help you transform 
          <span class="blur-[1px] inline-block">confusion</span> 
          to 
          <span class="text-black font-medium">precision</span>
        </p>
        
        <h1 class="text-[#2B2B2B] text-5xl md:text-8xl font-semibold leading-tight mb-8">
          Navigate tomorrow, <br/>today.
        </h1>
        
        <button 
          disabled 
          class="bg-[#2B2B2B] text-white py-3 px-8 rounded-md opacity-90 cursor-not-allowed"
        >
          Coming Soon
        </button>
      </div>
    </div>
  </section>
  
  <!-- What We Do Section -->
  <section id="what-we-do" class="bg-white py-16 md:py-24">
    <div class="container mx-auto px-6 md:px-12">
      <h2 class="text-3xl md:text-4xl font-semibold text-[#2B2B2B] mb-8">What We Do</h2>
      
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Feature 1 -->
        <div class="bg-gray-50 p-6 rounded-lg shadow-sm">
          <h3 class="text-xl font-medium text-[#2B2B2B] mb-3">Location Analytics</h3>
          <p class="text-gray-700">
            We provide data-driven insights to help businesses make informed decisions about their location strategy.
          </p>
        </div>
        
        <!-- Feature 2 -->
        <div class="bg-gray-50 p-6 rounded-lg shadow-sm">
          <h3 class="text-xl font-medium text-[#2B2B2B] mb-3">Market Research</h3>
          <p class="text-gray-700">
            Comprehensive market analysis to identify opportunities and minimize risks in your expansion plans.
          </p>
        </div>
        
        <!-- Feature 3 -->
        <div class="bg-gray-50 p-6 rounded-lg shadow-sm">
          <h3 class="text-xl font-medium text-[#2B2B2B] mb-3">Strategic Guidance</h3>
          <p class="text-gray-700">
            Expert consultation to optimize your physical presence and maximize your business potential.
          </p>
        </div>
      </div>
    </div>
  </section>
</div>

<style>
  /* Custom opacity class since TailwindCSS doesn't have opacity-15 by default */
  .opacity-15 {
    opacity: 0.15;
  }
  
  /* Custom styles for mobile responsiveness */
  @media (max-width: 640px) {
    #hero {
      min-height: 80vh;
    }
  }
</style>