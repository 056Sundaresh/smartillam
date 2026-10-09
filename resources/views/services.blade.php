@extends('layouts.app')

@section('title', 'Smart Home Services | Smart Illam')
@section('body-class', 'services-page')

@section('content')
    <section class="services-hero" aria-labelledby="services-hero-title">
        <div class="services-hero__shade" aria-hidden="true"></div>
        <div class="container services-hero__content">
            <p class="section-eyebrow">Smart Solutions</p>
            <h1 id="services-hero-title">Complete Smart Home Services<br>From Design to Lifetime Support</h1>
            <p>We create bespoke automation ecosystems that blend seamlessly into your home or office, providing effortless control and unparalleled luxury.</p>
            <div class="services-hero__actions">
                <a class="btn site-navbar__cta" href="{{ route('contact') }}#contact-form">Book Consultation</a>
                <a class="services-outline-button" href="#specialties">Explore Services</a>
            </div>
        </div>
    </section>

    <section class="services-approach section-pad" aria-labelledby="services-approach-title">
        <div class="container services-approach__grid">
            <div class="services-approach__copy">
                <p class="section-eyebrow">The Approach</p>
                <h2 id="services-approach-title">Every Detail, Expertly Managed.</h2>
                <p>Our service is defined by meticulous planning and an unwavering commitment to quality. We don’t just install hardware; we curate an experience that integrates seamlessly with your daily life.</p>
                <ul class="services-check-list">
                    <li>Bespoke Architectural Integration</li>
                    <li>Certified Installation Standards</li>
                    <li>24/7 Concierge Support Systems</li>
                </ul>
            </div>
            <img class="services-approach__image" src="{{ asset('images/services/services-approach.png') }}" alt="A smart home control panel installed in a bright contemporary kitchen" loading="lazy">
        </div>
    </section>

    <section class="services-specialties section-pad" id="specialties" aria-labelledby="services-specialties-title">
        <div class="container">
            <div class="services-section-heading">
                <p class="section-eyebrow">Our Specialties</p>
                <h2 id="services-specialties-title">Core Automation Ecosystems</h2>
            </div>
            <div class="services-specialty-grid">
                @foreach ([
                    ['icon' => '☼', 'title' => 'Lighting Automation', 'description' => 'Adaptive lighting scenes for every mood and moment.', 'image' => 'service-lighting.jpg', 'alt' => 'Warm layered lighting in a modern living room', 'route' => 'products.smart-touch-switches'],
                    ['icon' => '▣', 'title' => 'Door Lock Automation', 'description' => 'Experience the ultimate convergence of convenience and robust security.', 'image' => 'service-door-lock.png', 'alt' => 'Smart keypad door lock at a modern home', 'route' => 'products.smart-door-locks'],
                    ['icon' => '⬟', 'title' => 'Security & Surveillance', 'description' => 'Advanced protection systems for complete peace of mind.', 'image' => 'service-security.jpg', 'alt' => 'Secure, well-lit entrance to a contemporary home', 'route' => 'products.smart-security-systems'],
                    ['icon' => '♧', 'title' => 'Water Level Control', 'description' => 'The Smart Water Level Controller automatically manages your water.', 'image' => 'service-water-controller.png', 'alt' => 'Automatic water level controller beside a garden', 'route' => 'products.water-level-controllers'],
                    ['icon' => '▧', 'title' => 'Motorized Curtains', 'description' => 'Silent, automated window treatments for privacy and light.', 'image' => 'service-curtains.jpg', 'alt' => 'Motorized curtains in a calm, sunlit bedroom', 'route' => 'products.smart-curtain-control'],
                    ['icon' => '⌂', 'title' => 'Gate Automation', 'description' => 'Smart gate automation for complete security and convenience.', 'image' => 'service-gate.png', 'alt' => 'Automated sliding gate at a contemporary residence', 'route' => 'products.sliding-gate-automation'],
                    ['icon' => '◉', 'title' => 'Maintenance & Support', 'description' => 'Continuous care and maintenance for peak system performance.', 'image' => 'service-support.jpg', 'alt' => 'Smart home specialist helping a customer with a control panel', 'route' => 'contact'],
                ] as $specialty)
                    <article class="services-specialty-card" style="--specialty-image: url('{{ asset('images/services/'.$specialty['image']) }}')">
                        <a href="{{ $specialty['route'] === 'contact' ? route('contact') : route($specialty['route']) }}" aria-label="Learn more about {{ $specialty['title'] }}">
                            <img src="{{ asset('images/services/'.$specialty['image']) }}" alt="{{ $specialty['alt'] }}" loading="lazy">
                            <span class="services-specialty-card__shade" aria-hidden="true"></span>
                            <span class="services-specialty-card__copy">
                                <span class="services-specialty-card__icon" aria-hidden="true">{{ $specialty['icon'] }}</span>
                                <span class="services-specialty-card__title">{{ $specialty['title'] }}</span>
                                <span class="services-specialty-card__description">{{ $specialty['description'] }}</span>
                                <span class="services-specialty-card__link">Learn more <span aria-hidden="true">→</span></span>
                            </span>
                        </a>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="services-journey section-pad" aria-labelledby="services-journey-title">
        <div class="container">
            <div class="services-section-heading">
                <p class="section-eyebrow">The Journey</p>
                <h2 id="services-journey-title">A Legacy of Precise Execution</h2>
            </div>
            <ol class="services-journey__steps">
                <li><span>1</span><p>Consultation &amp;<br>Requirement Analysis</p></li>
                <li><span>2</span><p>Solution Proposal<br>&amp; Quotation</p></li>
                <li><span>3</span><p>Order Confirmation</p></li>
                <li><span>4</span><p>Professional<br>Installation</p></li>
                <li><span>5</span><p>Testing &amp;<br>Quality Assurance</p></li>
                <li><span>6</span><p>Training &amp;<br>Ongoing Support</p></li>
            </ol>
        </div>
    </section>

    <section class="services-values section-pad" aria-label="Why choose Smart Illam">
        <div class="container services-values__grid">
            <article><span aria-hidden="true">♙</span><h2>Certified Professionals</h2><p>Our engineers hold industry-leading certifications from Crestron, Control4, and Lutron.</p></article>
            <article><span aria-hidden="true">♢</span><h2>Premium Products</h2><p>We source only the most reliable, high-end components to ensure a flawless experience.</p></article>
            <article><span aria-hidden="true">⚒</span><h2>Personalized Design</h2><p>Every solution is uniquely engineered to match your lifestyle and architectural aesthetics.</p></article>
            <article><span aria-hidden="true">⚒</span><h2>Clean Installation</h2><p>White-glove service that respects your home, with invisible wiring and clean finishing.</p></article>
            <article><span aria-hidden="true">◷</span><h2>Future Ready</h2><p>Scalable architecture that evolves with new technology without the need for major rewiring.</p></article>
            <article><span aria-hidden="true">♡</span><h2>Dedicated Support</h2><p>Lifetime assistance with direct-to-engineer communication for rapid resolution.</p></article>
        </div>
    </section>

    <section class="services-quote section-pad" aria-labelledby="services-quote-title">
        <div class="container">
            <div class="services-quote__panel">
                <h2 id="services-quote-title">Request Quote</h2>
                <form class="services-quote-form" data-service-quote data-contact-email="{{ $cmsContent['contact.email'] ?? 'buildingcare09@gmail.com' }}">
                    <label>Full Name<input name="name" type="text" autocomplete="name" required></label>
                    <label>Contact Number<input name="phone" type="tel" autocomplete="tel" required></label>
                    <label>Existing System<select name="system"><option>Smart Illam Installation</option><option>New Installation</option><option>Existing Smart Home System</option><option>Upgrade or Maintenance</option></select></label>
                    <button class="btn" type="submit">Request Quotation</button>
                </form>
            </div>
        </div>
    </section>

    <section class="services-faq section-pad" aria-labelledby="services-faq-title">
        <div class="container services-faq__inner">
            <div class="services-section-heading">
                <p class="section-eyebrow">Common Queries</p>
                <h2 id="services-faq-title">Everything You Need to Know</h2>
            </div>
            <div class="services-faq__list">
                <details><summary>How long does a typical installation take?</summary><p>Project timelines depend on the size of your property and the systems selected. We share a clear schedule after the site assessment and solution proposal.</p></details>
                <details><summary>Can you automate an existing home?</summary><p>Yes. We assess your wiring and existing devices, then recommend compatible solutions that can be installed with minimal disruption.</p></details>
                <details><summary>Is training provided for the systems?</summary><p>Yes. After installation and testing, our team walks you through the controls and helps your household feel comfortable using the system.</p></details>
                <details><summary>Do the systems work without internet?</summary><p>Core controls can continue to work locally depending on the selected system. Remote access and some connected services require an internet connection.</p></details>
                <details><summary>Are your solutions compatible with Apple HomeKit?</summary><p>Compatibility depends on the chosen devices and integration platform. We confirm the supported assistants and protocols during solution planning.</p></details>
                <details><summary>What happens if the power goes out?</summary><p>Devices resume their configured behavior when power returns. Backup power can be planned for selected network or security equipment where needed.</p></details>
            </div>
        </div>
    </section>

    <section class="services-final-cta" aria-labelledby="services-final-cta-title">
        <div class="container services-final-cta__content">
            <h2 id="services-final-cta-title">Let’s Create a Home That<br>Works Smarter.</h2>
            <div class="services-final-cta__actions">
                <a class="btn site-navbar__cta" href="{{ route('contact') }}#contact-form">Book Consultation</a>
                <a class="services-outline-button" href="{{ route('contact') }}">Request a Site Visit</a>
            </div>
        </div>
    </section>

    @include('partials.site-footer')
@endsection
