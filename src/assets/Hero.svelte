<!-- Hero Component with Animations -->
<div class="relative overflow-hidden font-khula bg-[#DCD9D5]">
  <!-- Hero Section with Background Image -->
  <section id="hero" class="relative min-h-screen overflow-visible flex items-center">
    <!-- Background Image with Opacity -->
    <div class="absolute inset-0 z-0">
      <img
        src="/bg image.png"
        alt="Background"
        class="w-full h-full object-cover opacity-50"
      />
    </div>

    <!-- Hero Background Image on the right -->
    <div class="absolute right-0 top-0 h-screen w-1/2 z-0 overflow-hidden">
      <img
        src="/herobg.png"
        alt="Hero Background"
        class="h-full w-screen object-cover object-left"
      />
    </div>

    <!-- Hero Content with Bounce Animation -->
    <div class="relative container mx-auto px-6 md:px-12 z-10 w-full">
      <div class="max-w-5xl">
        <p class="text-[#2B2B2B] text-lg mb-4 opacity-0 animate-bounce-in-1">
          Every great business deserves the perfect location. <br>We help you transform
          <span class="blur-[1px] inline-block">confusion</span>
          to
          <span class="text-black font-bold">precision</span>
        </p>

        <h1 class="text-[#2B2B2B] text-5xl md:text-8xl font-semibold leading-tight mb-8 md:w-[90%] opacity-0 animate-bounce-in-2">
          Navigate tomorrow, today.
        </h1>

        <button
          disabled
          class="bg-[#2B2B2B] text-white py-3 px-8 rounded-md opacity-0 animate-bounce-in-3 cursor-not-allowed"
        >
          Coming Soon
        </button>
      </div>
    </div>
  </section>

  <!-- What We Do Section -->
  <section id="what-we-do" class="bg-[#DCD9D5] py-16 md:py-16">
    <div class="container mx-auto px-6 md:px-12">
      <div class="flex flex-col md:flex-row md:items-start md:space-x-12 lg:space-x-20">
        <!-- Left side - Heading -->
        <div class="md:w-1/3 mb-8 md:mb-0">
          <h2 class="text-3xl md:text-4xl font-semibold text-[#2B2B2B] sticky top-24">What We Do</h2>
        </div>

        <!-- Right side - Description and Process Animation -->
        <div class="md:w-2/3">
          <p class="text-lg text-[#2B2B2B] max-w-xl">
            Vexos uses AI and geospatial data to help businesses find the best location to grow.
            Whether you're opening a clinic or scaling a franchise, we transform complex decisions
            into simple, data-backed insights.
          </p>

          <!-- Process Flow Animation - Elements initially hidden -->
          <div class="process-flow my-4" id="process-container">
            <div class="flex flex-col md:flex-row items-center justify-between relative">
              <!-- Process Step 1 -->
              <div class="process-box border-l-4 border-[#2B2B2B] opacity-0" id="box-1">
                <h3 class="text-xl font-medium text-[#2B2B2B] mb-3">Input</h3>
                <p class="text-gray-700">Your business needs and parameters</p>
              </div>

              <!-- Arrow 1 -->
              <div class="process-arrow hidden md:block w-12 text-center opacity-0" id="arrow-1">
                <svg class="w-12 h-6 mx-auto text-[#2B2B2B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                </svg>
              </div>

              <!-- Process Step 2 -->
              <div class="process-box border-l-4 border-[#2B2B2B] opacity-0" id="box-2">
                <h3 class="text-xl font-medium text-[#2B2B2B] mb-3">Analysis</h3>
                <p class="text-gray-700">AI processing of location data</p>
              </div>

              <!-- Arrow 2 -->
              <div class="process-arrow hidden md:block w-12 text-center opacity-0" id="arrow-2">
                <svg class="w-12 h-6 mx-auto text-[#2B2B2B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                </svg>
              </div>

              <!-- Process Step 3 -->
              <div class="process-box border-l-4 border-[#2B2B2B] opacity-0" id="box-3">
                <h3 class="text-xl font-medium text-[#2B2B2B] mb-3">Recommendation</h3>
                <p class="text-gray-700">Actionable location insights</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<script>


  // Wait for document to be fully loaded
  document.addEventListener('DOMContentLoaded', function() {
    // Set up intersection observer
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          // When the process container is in view, trigger the animations
          animateProcess();
          // Stop observing once triggered
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.3 }); // Element must be 30% visible

    // Start observing the process container
    const container = document.getElementById('process-container');
    if (container) {
      observer.observe(container);
    }

    // Function to animate process elements in sequence
    function animateProcess() {
      const elements = [
        document.getElementById('box-1'),
        document.getElementById('arrow-1'),
        document.getElementById('box-2'),
        document.getElementById('arrow-2'),
        document.getElementById('box-3')
      ];

      elements.forEach((element, index) => {
        if (element) {
          setTimeout(() => {
            element.style.opacity = '1';
            element.style.transform = 'translateY(0)';
          }, index * 300); // 300ms delay between each element
        }
      });
    }
  });
</script>

<style>

  /* Process box styling */
  .process-box {
    background-color: white;
    border-radius: 0.5rem;
    padding: 1.5rem;
    box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
    transition: all 0.6s ease;
    width: 100%;
    transform: translateY(20px);
  }

  /* Process arrow styling */
  .process-arrow {
    transition: all 0.6s ease;
    transform: translateY(20px);
  }

  @media (min-width: 768px) {
    .process-box {
      width: 16rem;
      margin-bottom: 0;
    }
  }

  @media (max-width: 767px) {
    .process-box {
      margin-bottom: 2rem;
    }
  }

  @keyframes bounceIn {
    0% {
      opacity: 0;
      transform: translateY(40px);
    }
    60% {
      opacity: 1;
      transform: translateY(-10px);
    }
    100% {
      opacity: 1;
      transform: translateY(0);
    }
  }

  /* Animation classes */
  .animate-bounce-in-1 {
    animation: bounceIn 0.8s ease-out 0.2s forwards;
  }

  .animate-bounce-in-2 {
    animation: bounceIn 0.8s ease-out 0.5s forwards;
  }

  .animate-bounce-in-3 {
    animation: bounceIn 0.8s ease-out 0.8s forwards;
  }
</style>
