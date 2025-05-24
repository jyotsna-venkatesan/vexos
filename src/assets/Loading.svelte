<script>
    import { onMount, createEventDispatcher } from 'svelte';
    import { fade, fly } from 'svelte/transition';

    // default message
    export let message = 'Loading...';
    export let waitForText = true;
    // Set visibility delay after typing (in milliseconds)
    export let visibilityDelay = 2000;
    // Duration of exit animation in milliseconds
    export let exitAnimationDuration = 600;

    const dispatch = createEventDispatcher();
    let visibleChars = 0;
    let revealTimer;
    let delayTimer;
    let visible = true;

    onMount(() => {
        // Start revealing characters one by one
        revealTimer = setInterval(() => {
            if (visibleChars < message.length) {
                visibleChars++;
            } else {
                clearInterval(revealTimer);

                // Add a delay before starting exit animation
                delayTimer = setTimeout(() => {
                    // Start the exit animation
                    visible = false;

                    // Dispatch event after animation completes
                    setTimeout(() => {
                        dispatch('textLoaded');
                    }, exitAnimationDuration);
                }, visibilityDelay);
            }
        }, 20);

        return () => {
            clearInterval(revealTimer);
            clearTimeout(delayTimer);
        };
    });
</script>

{#if visible}
    <div
        class="fixed inset-0 z-50 w-full h-screen flex items-center justify-center overflow-hidden bg-[#0A0A0A]"
        transition:fly={{ y: -window.innerHeight * 1.5, duration: exitAnimationDuration, easing: t => t * t, opacity: 1 }}>
        <!-- message -->
        <div class="z-20 flex flex-col items-center justify-center px-6 w-full mx-auto">
            <div class="text-xl md:text-3xl font-medium text-center text-orangel">
                {#each message as char, i}
                    <span class="{i < visibleChars ? 'opacity-100' : 'opacity-0'} transition-opacity">
                        {char}
                    </span>
                {/each}
            </div>
        </div>
    </div>
{/if}
