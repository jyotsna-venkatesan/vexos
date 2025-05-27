<script>
    import { onMount, createEventDispatcher } from 'svelte';
    import { fade, fly } from 'svelte/transition';

    // default message
    export let message = 'Loading...';
    export let exitAnimationDuration = 600;

    const dispatch = createEventDispatcher();
    let visibleChars = 0;
    let revealTimer;
    let delayTimer;
    let visible = true;
    
    // Image preloading
    let loadedImages = 0;
    let totalImages = 0;
    let loadingProgress = 0;
    
    // List of images to preload
    const imagesList = [
        '/Ellipse 13.png',
        '/Ellipse 14.png',
        '/about-glow.png',
        '/elevator-pitch.jpeg',
        '/flame-1.png',
        '/gateway-image.png',
        '/glow-1.png',
        '/glow-2.png',
        '/hkstp-logo.png',
        '/jyots-and-mirha.png',
        '/jyots-img.png',
        '/kteo-logo.png',
        '/mirha-img.png',
        '/mobile-gateway-image.png',
        '/polyu-logo.png',
        '/product-glow.png',
        '/small-logo.png',
        '/tech-1.png',
        '/tech-3.png',
        '/tech-4.png',
        '/src/assets/svelte.svg'
    ];
    
    // Function to preload images
    function preloadImages() {
        totalImages = imagesList.length;
        
        imagesList.forEach(src => {
            const img = new Image();
            img.onload = () => {
                loadedImages++;
                loadingProgress = Math.floor((loadedImages / totalImages) * 100);
                
                // Check if all images are loaded and text animation is complete
                checkLoadingComplete();
            };
            img.onerror = () => {
                // Count errors as loaded to avoid getting stuck
                loadedImages++;
                loadingProgress = Math.floor((loadedImages / totalImages) * 100);
                console.error(`Failed to load image: ${src}`);
                
                // Check if all images are loaded
                checkLoadingComplete();
            };
            img.src = src;
        });
    }
    
    // Function to check if loading is complete
    function checkLoadingComplete() {
        if (loadedImages >= totalImages && visibleChars >= message.length) {
            clearInterval(revealTimer);
            
            // Only start exit animation after minimal delay
            delayTimer = setTimeout(() => {
                // start the exit animation
                visible = false;

                setTimeout(() => {
                    dispatch('textLoaded');
                }, exitAnimationDuration);
            }, 500); // Reduced delay since we're actually waiting for images
        }
    }

    onMount(() => {
        // Start preloading images
        preloadImages();
        
        // start revealing characters
        revealTimer = setInterval(() => {
            if (visibleChars < message.length) {
                visibleChars++;
                // Check if loading is complete after each character
                checkLoadingComplete();
            }
        }, 20);

        return () => {
            clearInterval(revealTimer);
            clearTimeout(delayTimer);
        };
    });
</script>

<style>
    @keyframes shine {
        0% { transform: translateX(-100%); }
        100% { transform: translateX(200%); }
    }
    .animate-shine {
        animation: shine 1.5s infinite linear;
    }
</style>

{#if visible}
    <div
        class="fixed inset-0 z-50 w-full h-screen flex items-center justify-center overflow-hidden bg-[#0A0A0A]"
        transition:fly={{ y: -window.innerHeight * 1.5, duration: exitAnimationDuration, easing: t => t * t, opacity: 1 }}>
        <!-- message -->
        <div class="z-20 flex flex-col items-center justify-center px-6 w-full mx-auto">
            <div class="text-xl md:text-3xl font-medium text-center text-orangel mb-16">
                {#each message as char, i}
                    <span class="{i < visibleChars ? 'opacity-100' : 'opacity-0'} transition-opacity">
                        {char}
                    </span>
                {/each}
            </div>
            
            <!-- Progress bar with shine effect -->
            <div class="w-48 h-0.5 bg-gray-800 rounded-full overflow-hidden relative">
                <div 
                    class="h-full bg-pinkn transition-all duration-300 ease-out relative"
                    style="width: {loadingProgress}%">
                </div>
                <!-- Shine animation -->
                <div class="absolute top-0 left-0 h-full w-10 bg-gradient-to-r from-transparent via-white/30 to-transparent animate-shine pointer-events-none"></div>
            </div>
        </div>
    </div>
{/if}
