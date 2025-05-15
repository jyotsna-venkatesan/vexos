  <!-- Quote Component -->
  <div class="mt-24">
    <Quote />
  </div>

<div class="bg-[#1b1b1b] pt-8 md:pt-12 pb-24 relative overflow-hidden" id="team-section">
  <div class="container mx-auto px-6 md:px-12 relative z-10">
    <!-- 1/3 - 2/3 Header Layout -->
    <div class="flex flex-col md:flex-row mb-16">
      <div class="w-full md:w-1/3 mb-6 md:mb-0">
        <h2 class="text-3xl md:text-4xl font-semibold text-white">The Team</h2>
      </div>
      <div class="w-full md:w-2/3">
        <p class="text-xl text-white/80 leading-relaxed">
          Meet the team behind Vexos who combine deep expertise in geospatial analytics,
          artificial intelligence, and business strategy to revolutionize location intelligence.
        </p>
      </div>
    </div>

    <!-- Team Member Cards -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-16">
      <!-- Left side - empty space for 1/3 width -->
      <div class="lg:col-span-4"></div>

      <!-- Right side - Team Cards - 2/3 width -->
      <div class="team-cards lg:col-span-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
          <!-- Team Member 1 -->
          <div class="team-card opacity-0" id="team-1">
            <div class="bg-white rounded-xl overflow-hidden shadow-lg transform transition-all duration-500 hover:shadow-xl hover:-translate-y-1 relative h-full flex flex-col">
              <!-- Team Member Image -->
              <div class="h-72 overflow-hidden">
                <img src="./team1.jpg" alt="Jyotsna Venkatesan" class="w-full h-full object-cover transition-transform duration-700 transform hover:scale-105" />
              </div>

              <!-- Content -->
              <div class="p-6 bg-white flex-grow flex flex-col">
                <div class="flex justify-between items-start">
                  <div>
                    <h3 class="text-2xl font-semibold text-[#2b2b2b]">Jyotsna Venkatesan</h3>
                    <p class="text-[#7b7cc7] text-md">Founder & CTO</p>
                  </div>
                  <a href="https://www.linkedin.com/in/jyotsna-venkatesan-8684801b8/" target="_blank" rel="noopener noreferrer" class="text-[#0077b5] hover:text-[#005885] transition-colors" aria-label="Jyotsna Venkatesan's LinkedIn Profile">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                    </svg>
                  </a>
                </div>
                <p class="text-[#2b2b2b] text-base text-md flex-grow mt-2">
                  Year 3 Computer Science Student at the Hong Kong Polytechnic University
                </p>
              </div>
            </div>
          </div>

          <!-- Team Member 2 -->
          <div class="team-card opacity-0" id="team-2">
            <div class="bg-white rounded-xl overflow-hidden shadow-lg transform transition-all duration-500 hover:shadow-xl hover:-translate-y-1 relative h-full flex flex-col">
              <!-- Team Member Image -->
              <div class="h-72 overflow-hidden">
                <img src="./team2.jpg" alt="Mirha Saleem" class="w-full h-full object-cover transition-transform duration-700 transform hover:scale-105" />
              </div>

              <!-- Content -->
              <div class="p-6 bg-white flex-grow flex flex-col">
                <div class="flex justify-between items-start">
                  <div>
                    <h3 class="text-2xl font-semibold text-[#2b2b2b]">Mirha Saleem</h3>
                    <p class="text-[#0882bf] text-md">Founder and CDO</p>
                  </div>
                  <a href="https://www.linkedin.com/in/mirha-saleem-4348a5258/" target="_blank" rel="noopener noreferrer" class="text-[#0077b5] hover:text-[#005885] transition-colors" aria-label="Mirha Saleem's LinkedIn Profile">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                    </svg>
                  </a>
                </div>
                <p class="text-[#2b2b2b] text-md text-base flex-grow mt-2">
                  3rd Year Physics + AI and Data Analytics Student at the Hong Kong Polytechnic University
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  import Quote from './Quote.svelte';

  // Wait for document to be fully loaded
  document.addEventListener('DOMContentLoaded', function() {
    // Set up intersection observer for team cards
    const teamObserver = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting && entry.target instanceof HTMLElement) {
          // When a team card is in view, animate it
          entry.target.style.opacity = '1';
          entry.target.style.transform = 'translateY(0)';
        }
      });
    }, { threshold: 0.2 });

    // Observe each team card
    const teamCards = document.querySelectorAll('.team-card');
    teamCards.forEach(card => {
      teamObserver.observe(card);
    });

    // Set up observer for philosophy section
    const philosophyObserver = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting && entry.target instanceof HTMLElement) {
          entry.target.style.opacity = '1';
          entry.target.style.transform = 'translateY(0)';

          // Get the philosophy text element
          const philosophyText = document.getElementById('philosophy-text');
          if (philosophyText) {
            // Store original text
            const originalText = philosophyText.innerText.trim();
            // Clear the text
            philosophyText.innerHTML = '';

            // Split text into words
            const words = originalText.split(' ');

            // Create a container for the words
            const container = document.createElement('div');
            philosophyText.appendChild(container);

            // Animate each word with a delay
            words.forEach((word, index) => {
              const wordSpan = document.createElement('span');
              wordSpan.textContent = word;
              wordSpan.style.opacity = '0';
              wordSpan.style.display = 'inline-block';
              wordSpan.style.transition = 'opacity 0.5s ease-in-out';

              container.appendChild(wordSpan);

              // Add a space after each word (except the last one)
              if (index < words.length - 1) {
                const space = document.createTextNode(' ');
                container.appendChild(space);
              }

              // Delay the fade-in for each word
              setTimeout(() => {
                wordSpan.style.opacity = '1';
              }, 120 * index);
            });
          }

          philosophyObserver.unobserve(entry.target);
        }
      });
    }, { threshold: 0.3 });

    // Observe the philosophy section
    const philosophySection = document.getElementById('philosophy-section');
    if (philosophySection) {
      philosophyObserver.observe(philosophySection);
    }
  });
</script>

<style>
  /* Team card styling */
  .team-card {
    transition: all 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    transform: translateY(30px);
  }


</style>
