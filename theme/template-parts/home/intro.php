<!-- About Us Section -->
<section class="about-section section-padding">
    <div class="container grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">

        <!-- Image -->
        <div class="order-2 lg:order-1">
            <figure class="about-image">
                <img 
                    src="https://plus.unsplash.com/premium_photo-1670524465634-93cf255ffa8b?q=80&w=1154&auto=format&fit=crop"
                    alt="Wedding photography moment"
                    loading="lazy"
                >
            </figure>
        </div>

        <!-- Content -->
        <div class="order-1 lg:order-2">
            <header class="section-header">
                <span class="section-label">About Us</span>
            </header>

            <h2 class="section-title">
                Specializing in unforgettable wedding photography memories.
            </h2>

            <div class="section-text">
                <p>
                    At Golden Memories, we believe every moment of your special day
                    deserves to be captured with heart and artistry.
                </p>
                <p>
                    From candid emotions to breathtaking portraits, we document your
                    wedding story with a creative and personal approach.
                </p>
            </div>

            <a 
                href="<?php echo esc_url(get_permalink(get_page_by_path('about-us'))); ?>"
                class="btn-primary"
            >
                Learn More About Us
            </a>
        </div>

    </div>
</section>
