<div class="quote-section w-full py-24 relative z-20 mt-[-2rem]">
  <!-- Background Image with Overlay -->
  <div class="absolute inset-0 z-0 ">
    <img src="/quotebg.jpg" alt="Background" class="w-full h-full object-cover" />
    <div class="absolute inset-0 bg-black/50"></div>
    <!-- Gradient fade to #1b1b1b at bottom -->
    <div class="absolute bottom-0 left-0 right-0 h-[30%] bg-gradient-to-b from-transparent to-[#1b1b1b]"></div>
  </div>

  <div class="container mx-auto px-6 md:px-12 relative z-10">
    <div class="opacity-0 relative" id="quote-section">
      <div class="flex items-start">
        <svg class="w-12 h-12 text-white/70 flex-shrink-0 mr-6 mt-1 drop-shadow-[0_2px_3px_rgba(0,0,0,0.4)]" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
          <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z" />
        </svg>
        <div class="flex-1 text-left">
          <div class="quote-text-container">
            <p class="text-2xl md:text-3xl text-white font-medium mb-8 drop-shadow-[0_2px_4px_rgba(0,0,0,0.7)]" id="quote-text">
              "I just used Google Maps and my gut feeling to pick the spot."
            </p>
          </div>
          <p class="text-md text-white font-medium tracking-wider drop-shadow-[0_1px_2px_rgba(0,0,0,0.5)]">
            — Business Owner Looking For An Office
          </p>
        </div>
      </div>
    </div>
  </div>
</div>

<script lang="ts">
  import { onMount } from 'svelte';

  onMount(() => {
    // Set up observer for quote section
    const quoteObserver = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting && entry.target instanceof HTMLElement) {
          entry.target.style.opacity = '1';
          entry.target.style.transform = 'translateY(0)';

          // Get the quote text element
          const quoteText = document.getElementById('quote-text');
          if (quoteText) {
            // Store original text
            const originalText = quoteText.innerText.trim();
            // Clear the text
            quoteText.innerHTML = '';

            // Split text into words
            const words = originalText.split(' ');

            // Create a container for the words
            const container = document.createElement('div');
            quoteText.appendChild(container);

            // Animate each word with a delay
            words.forEach((word, index) => {
              const wordSpan = document.createElement('span');
              wordSpan.textContent = word;
              wordSpan.style.opacity = '0';
              wordSpan.style.display = 'inline-block';
              wordSpan.style.transition = 'opacity 0.5s ease-in-out';
              wordSpan.className = 'word-span'; // Add class for additional styling

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
  /* Quote section container */
  .quote-section {
    position: relative;
    overflow: hidden;
    box-shadow: 0 -10px 20px rgba(0,0,0,0.2);
  }

  /* Quote text container */
  .quote-text-container {
    position: relative;
  }

  /* Quote section styling */
  #quote-section {
    transition: all 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    transform: translateY(30px);
  }

  /* Quote text animation */
  #quote-text span {
    transform: translateY(0);
    will-change: opacity;
  }

  /* Add text lift effect */
  .word-span {
    display: inline-block;
    text-shadow: 0 2px 4px rgba(0,0,0,0.7);
    position: relative;
    transition: all 0.3s ease;
  }

  /* Subtle lift on hover */
  #quote-text:hover .word-span {
    transform: translateY(-1px);
    text-shadow: 0 4px 8px rgba(0,0,0,0.6);
  }
</style>
