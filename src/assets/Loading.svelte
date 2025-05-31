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

    // List of critical images to preload - prioritizing smaller, essential images
    const imagesList = [
        '/small-logo.png',
        '/gateway-image.png',
        '/mobile-gateway-image.png',
        '/glow-1.png',
        '/glow-2.png',
        '/flame-1.png',
        '/about-glow.png',
        '/product-glow.png'
    ];

    // Function to preload images with timeout
    function preloadImages() {
        totalImages = imagesList.length;

        // Set a maximum loading time of 5 seconds
        setTimeout(() => {
            // Force completion if still loading after timeout
            if (loadedImages < totalImages) {
                loadedImages = totalImages;
                loadingProgress = 100;
                checkLoadingComplete();
            }
        }, 5000);

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

            // Start exit animation immediately since we're only loading critical images
            delayTimer = setTimeout(() => {
                // start the exit animation
                visible = false;

                setTimeout(() => {
                    dispatch('textLoaded');
                }, exitAnimationDuration);
            }, 300); // Reduced delay for better user experience
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
        class="fixed inset-0 z-50 w-full h-screen flex items-center justify-center overflow-hidden bg-dark"
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
