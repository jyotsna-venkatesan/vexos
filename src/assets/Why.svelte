<div class="bg-gradient-to-b from-[#DCD9D5] to-[#1b1b1b] py-24 md:py-32 relative overflow-hidden" id="why-vexos">
  <div class="container mx-auto px-6 md:px-12 relative z-10">
    <div class="flex flex-col md:flex-row mb-16">
      <div class="w-full md:w-1/3 mb-6 md:mb-0">
        <h2 class="text-3xl md:text-4xl font-semibold text-[#2b2b2b]">Why Vexos?</h2>
      </div>
      <div class="w-full md:w-2/3">
        <p class="text-xl text-[#2b2b2b] leading-relaxed">
          We're revolutionizing location intelligence by combining cutting-edge AI with geographic spatial data,
          enabling businesses to make smarter, faster, and more confident decisions. We're not just mapping
          data—we're mapping success.
        </p>
      </div>
    </div>

    <!-- Main content area -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-16">
      <!-- Left side - empty space for 1/3 width -->
      <div class="lg:col-span-4"></div>

      <!-- Right side - Feature Cards with Images - 2/3 width -->
      <div class="feature-cards lg:col-span-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
          <!-- Feature 1 -->
          <div class="feature-card opacity-0" id="feature-1">
            <div class="bg-black rounded-xl overflow-hidden shadow-lg transform transition-all duration-500 hover:shadow-xl hover:-translate-y-1 h-64 relative">
              <!-- Background Image -->
              <img src="/bg3.png" alt="AI Understanding" class="w-full h-full object-cover absolute inset-0" />

              <!-- Content Overlay -->
              <div class="absolute bottom-0 left-0 right-0 p-4 bg-black/40 rounded-b-md">
                <h3 class="text-xl font-semibold text-[#F5EBE0] mb-1">NLP Trained for Business Intent</h3>
                <p class="text-[#F5EBE0] text-sm">
                  Understands fuzzy location needs with AI that translates requirements into structured criteria.
                </p>
              </div>
            </div>
          </div>

          <!-- Feature 2 -->
          <div class="feature-card opacity-0" id="feature-2">
            <div class="bg-white rounded-xl overflow-hidden shadow-lg transform transition-all duration-500 hover:shadow-xl hover:-translate-y-1 h-64 relative">
              <!-- Background Image -->
              <img src="/bg2.png" alt="Comprehensive Data" class="w-full h-full object-cover absolute inset-0" />

              <!-- Content Overlay -->
              <div class="absolute bottom-0 left-0 right-0 p-4 bg-black/40 rounded-b-md">
                <h3 class="text-xl font-semibold text-[#F5EBE0] mb-1">Multi-Source Data Pipeline</h3>
                <p class="text-[#F5EBE0] text-sm">
                  Combines satellite, economic, and zoning data in real-time for comprehensive analysis.
                </p>
              </div>
            </div>
          </div>

          <!-- Feature 3 -->
          <div class="feature-card opacity-0" id="feature-3">
            <div class="bg-white rounded-xl overflow-hidden shadow-lg transform transition-all duration-500 hover:shadow-xl hover:-translate-y-1 h-64 relative">
              <!-- Background Image -->
              <img src="/bg1.png" alt="Custom Scoring" class="w-full h-full object-cover absolute inset-0" />

              <!-- Content Overlay -->
              <div class="absolute bottom-0 left-0 right-0 p-4 bg-black/40 rounded-b-md">
                <h3 class="text-xl font-semibold text-[#F5EBE0] mb-1">Custom Scoring System</h3>
                <p class="text-[#F5EBE0] text-sm">
                  Custom scoring tailored to your unique business priorities for perfect location matches.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Quote Section -->
    <div class="mt-24 mb-0 opacity-0 relative" id="quote-section">
      <div class="bg-[#DCD9D5] backdrop-blur-sm rounded-xl p-12 shadow-lg text-center">
        <svg class="w-12 h-12 text-[#2b2b2b] mx-auto mb-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
          <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z" />
        </svg>
        <p class="text-2xl md:text-3xl font-light text-[#2b2b2b] mb-8 mx-auto max-w-3xl">
          "I just used Google Maps and my gut feeling to pick the spot."
        </p>
        <p class="text-md text-[#2b2b2b] font-medium tracking-wider uppercase">
          — Business Owner Looking For An Office
        </p>
      </div>
    </div>
  </div>
</div>

<script lang="ts">
  // Wait for document to be fully loaded
  document.addEventListener('DOMContentLoaded', function() {
    // Set up intersection observer for feature cards
    const featureObserver = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting && entry.target instanceof HTMLElement) {
          // When a feature card is in view, animate it
          entry.target.style.opacity = '1';
          entry.target.style.transform = 'translateY(0)';
        }
      });
    }, { threshold: 0.2 });

    // Observe each feature card
    const features = document.querySelectorAll('.feature-card');
    features.forEach(feature => {
      featureObserver.observe(feature);
    });

    // Set up observer for problem statement
    const problemObserver = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting && entry.target instanceof HTMLElement) {
          entry.target.style.opacity = '1';
          entry.target.style.transform = 'translateY(0)';
          problemObserver.unobserve(entry.target);
        }
      });
    }, { threshold: 0.3 });

    // Observe the problem statement
    const problemStatement = document.getElementById('problem-statement');
    if (problemStatement) {
      problemObserver.observe(problemStatement);
    }

    // Set up observer for quote section
    const quoteObserver = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting && entry.target instanceof HTMLElement) {
          entry.target.style.opacity = '1';
          entry.target.style.transform = 'translateY(0)';
          quoteObserver.unobserve(entry.target);
        }
      });
    }, { threshold: 0.3 });

    // Observe the quote section
    const quoteSection = document.getElementById('quote-section');
    if (quoteSection) {
      quoteObserver.observe(quoteSection);
    }
  });
</script>

<style>
  /* Feature card styling */
  .feature-card {
    transition: all 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    transform: translateY(30px);
  }

  /* Problem statement and quote-section styling */
  #quote-section {
    transition: all 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    transform: translateY(30px);
  }

  /* Blur effect for background elements */
  @keyframes pulse {
    0%, 100% {
      opacity: 0.2;
    }
    50% {
      opacity: 0.3;
    }
  }

  .blur-3xl {
    filter: blur(60px);
    animation: pulse 8s infinite;
  }
</style>
