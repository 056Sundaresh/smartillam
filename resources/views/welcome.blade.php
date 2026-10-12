@extends('layouts.app')

@section('title', 'Smart Illam | Intelligent Home Automation')
@section('body-class', 'home-page')

@section('content')
    @php
        $homeImage = $cmsContent['home.feature_image'] ?? 'images/home/home-smart-living-room.svg';
        $homeImageUrl = \Illuminate\Support\Str::startsWith($homeImage, ['http://', 'https://', 'data:']) ? $homeImage : asset($homeImage);
        $homeBenefits = preg_split('/\r\n|\r|\n/', $cmsContent['home.feature_benefits'] ?? '', -1, PREG_SPLIT_NO_EMPTY);
        $homeHeroTitle = $cmsContent['home.hero_title'] ?? 'Smart Living Insights & Home Automation Guides';
        $homePhilosophyTitle = $cmsContent['home.philosophy_title'] ?? 'Invisible Intelligence.';
    @endphp
    <section class="home-panel" id="home" aria-labelledby="page-title">
        <div class="home-panel__heading">
            <p class="home-eyebrow">{{ $cmsContent['home.hero_eyebrow'] ?? 'Smart Illam' }}</p>
            <h1 id="page-title">{!! nl2br(e($homeHeroTitle)) !!}</h1>
            <p class="home-panel__intro">{{ $cmsContent['home.hero_description'] ?? 'Stay informed with expert insights, practical tips, industry trends, and the latest innovations in smart home automation.' }}</p>
        </div>

        <article class="home-feature-card" id="solutions">
            <div class="home-feature-card__image">
                <img src="{{ $homeImageUrl }}" alt="{{ $cmsContent['home.feature_image_alt'] ?? 'Modern smart home living room with a connected control panel' }}" fetchpriority="high">
            </div>
            <div class="home-feature-card__content">
                <p class="home-eyebrow">{{ $cmsContent['home.feature_eyebrow'] ?? 'Thoughtful technology' }}</p>
                <h2>{{ $cmsContent['home.feature_title'] ?? 'Technology That Simplifies Everyday Living' }}</h2>
                <p>{{ $cmsContent['home.feature_description'] ?? 'We don’t just install devices; we craft intelligent environments tailored to your lifestyle. Our mission is to blend technology into the background, providing you with effortless control and peace of mind.' }}</p>
                <ul class="home-benefit-list">
                    @foreach ($homeBenefits as $benefit)
                        <li><span aria-hidden="true">✓</span> {{ $benefit }}</li>
                    @endforeach
                </ul>
                <a class="home-text-link" href="#contact">{{ $cmsContent['home.feature_link'] ?? 'Discover what’s possible' }} <span aria-hidden="true">↗</span></a>
            </div>
        </article>
    </section>

    <section class="home-demo-section" aria-labelledby="virtual-demo-title">
        <div class="home-section-heading">
            <p class="home-eyebrow">{{ $cmsContent['home.demo_eyebrow'] ?? 'See your smart home in action' }}</p>
            <h2 id="virtual-demo-title">{{ $cmsContent['home.demo_title'] ?? 'Try a Virtual Demo' }}</h2>
            <p>{{ $cmsContent['home.demo_description'] ?? 'Explore how connected controls can make everyday living more comfortable and convenient.' }}</p>
        </div>
        <div class="home-demo-visuals">
            <img class="home-demo-visuals__phone" src="{{ asset('images/home/home-virtual-demo-mobile.svg') }}" alt="Smart Illam mobile app showing living room climate, lighting, blinds and appliance controls" loading="lazy">
            <img class="home-demo-visuals__house" src="{{ asset('images/home/home-virtual-demo-house.svg') }}" alt="Modern illuminated smart home at night" loading="lazy">
        </div>
    </section>

    <section class="home-promise-section" aria-labelledby="promise-title">
        <div class="home-section-heading">
            <h2 id="promise-title">{{ $cmsContent['home.promise_title'] ?? 'Our Promise to Your Home' }}</h2>
            <p>{{ $cmsContent['home.promise_description'] ?? 'Creating intelligent living spaces with seamless automation, premium technology, and personalized solutions.' }}</p>
        </div>
        <div class="home-promise-grid">
            <article class="home-promise-card home-promise-card--voice">
                <img src="{{ asset('images/home/home-voice-ai-card.svg') }}" alt="Voice and AI working in sync, with smart recommendations for comfort, efficiency and security" loading="lazy">
            </article>
            <div class="home-promise-stack">
                <article class="home-promise-card home-promise-card--reliability">
                    <img src="{{ asset('images/home/home-reliability-card.svg') }}" alt="Intuitive design, smart reliability and thoughtful technology" loading="lazy">
                </article>
                <article class="home-promise-card home-promise-card--console">
                    <img src="{{ asset('images/home/home-device-alexa.svg') }}" alt="Smart home voice assistant speaker" loading="lazy">
                </article>
            </div>
            <article class="home-promise-card home-promise-card--device">
                <img src="{{ asset('images/home/home-orris-device.svg') }}" alt="Orris smart home voice assistant device" loading="lazy">
                <div><h3>Elevating Everyday</h3><p>Living Through<br>Intelligent Design</p></div>
            </article>
        </div>
    </section>

    <section class="home-philosophy-section" aria-labelledby="philosophy-title">
        <div class="home-philosophy-inner">
            <div class="home-philosophy-copy">
                <p class="home-eyebrow">{{ $cmsContent['home.philosophy_eyebrow'] ?? 'The Philosophy' }}</p>
                <h2 id="philosophy-title">{!! nl2br(e($homePhilosophyTitle)) !!}</h2>
                <p>{{ $cmsContent['home.philosophy_description'] ?? 'We believe the best technology is the one you don’t see. Smart Illam integrates seamlessly into your life, anticipating your needs before you even realize them. It’s not about gadgets; it’s about grace.' }}</p>
                <div class="home-philosophy-points">
                    <div><strong>150+</strong><span>Homes Automated</span></div>
                    <div><strong>98%</strong><span>Client Satisfaction</span></div>
                    <div><strong>24*7</strong><span>Support</span></div>
                    <div><strong>12+</strong><span>Years of Experience</span></div>
                </div>
            </div>
            <div class="home-philosophy-image"><img src="{{ asset('images/home/home-philosophy-background.svg') }}" alt="Modern home interior with layered lighting and smart controls" loading="lazy"></div>
        </div>
    </section>

    <section class="home-devices-section" id="products" aria-labelledby="devices-title">
        <div class="home-devices-inner">
            <div class="home-devices-heading">
                <h2 id="devices-title">{{ $cmsContent['home.devices_title'] ?? 'Smart Devices for Living' }}</h2>
                <p>{{ $cmsContent['home.devices_description'] ?? 'Smart gadgets designed for connected homes, bringing intelligence and convenience to living.' }}</p>
            </div>
            <div class="home-device-cards">
                <article class="home-device-card"><img src="{{ asset('images/home/device-alexa-card.png') }}" alt="Amazon Alexa Echo — voice-controlled smart assistant" loading="lazy"></article>
                <article class="home-device-card"><img src="{{ asset('images/home/device-nest-card.png') }}" alt="Google Nest Hub — control your smart home effortlessly" loading="lazy"></article>
                <article class="home-device-card"><img src="{{ asset('images/home/device-homepod-card.png') }}" alt="Apple HomePod — premium smart speaker with Siri integration" loading="lazy"></article>
            </div>
            <a class="home-products-link" href="#contact">View All Products <span aria-hidden="true">↗</span></a>
        </div>
    </section>

    <section class="home-work-section" id="services" aria-labelledby="work-title">
        <div class="home-work-inner">
            <div class="home-work-heading"><h2 id="work-title">{{ $cmsContent['home.work_title'] ?? 'How We Work' }}</h2><p>{{ $cmsContent['home.work_description'] ?? 'Every project begins with understanding your unique requirements.' }}</p></div>
            <div class="home-work-steps">
                <article class="home-work-step">
                    <p class="home-work-step__description">We begin by understanding your business needs through detailed discussions and a site visit. Our team gathers all technical and functional requirements, identifies any customization needs, and finalizes the project scope.</p>
                    <div class="home-work-step__visual"><img src="{{ asset('images/home/home-work-consultation.svg') }}" alt="Consultation meeting to understand a smart home project" loading="lazy"></div>
                    <div class="home-work-step__title"><span>01</span><h3>Consultation &amp;<br>Requirement Analysis</h3></div>
                </article>
                <article class="home-work-step">
                    <div class="home-work-step__title"><span>02</span><h3>Solution Proposal<br>&amp; Quotation</h3></div>
                    <div class="home-work-step__visual"><img src="{{ asset('images/home/home-work-proposal.svg') }}" alt="Smart home proposal and quotation displayed on a tablet" loading="lazy"></div>
                    <p class="home-work-step__description">Based on your requirements, we provide a detailed quotation with the recommended solution, project scope, estimated cost, and implementation timeline for your approval.</p>
                </article>
                <article class="home-work-step">
                    <p class="home-work-step__description">Once the quotation is approved, the project is confirmed, and we schedule the implementation according to the agreed timeline.</p>
                    <div class="home-work-step__visual"><img src="{{ asset('images/home/home-work-confirmation.svg') }}" alt="Confirming a smart home project together" loading="lazy"></div>
                    <div class="home-work-step__title"><span>03</span><h3>Order Confirmation</h3></div>
                </article>
                <article class="home-work-step">
                    <div class="home-work-step__title"><span>04</span><h3>Professional<br>Installation</h3></div>
                    <div class="home-work-step__visual"><img src="{{ asset('images/home/home-work-installation.svg') }}" alt="Technician setting up smart home controls" loading="lazy"></div>
                    <p class="home-work-step__description">Our experienced technicians install the complete solution with precision, ensuring all devices and systems are configured for optimal performance.</p>
                </article>
                <article class="home-work-step">
                    <p class="home-work-step__description">We perform comprehensive testing to verify that every feature functions correctly, ensuring the system meets all performance and quality standards.</p>
                    <div class="home-work-step__visual"><img src="{{ asset('images/home/home-work-testing.svg') }}" alt="Technician testing smart home controls" loading="lazy"></div>
                    <div class="home-work-step__title"><span>05</span><h3>Testing &amp;<br>Quality Assurance</h3></div>
                </article>
                <article class="home-work-step">
                    <div class="home-work-step__title"><span>06</span><h3>Training &amp;<br>Ongoing Support</h3></div>
                    <div class="home-work-step__visual"><img src="{{ asset('images/home/home-work-training.svg') }}" alt="Smart home team demonstrating the controls to a homeowner" loading="lazy"></div>
                    <p class="home-work-step__description">After successful installation, we provide hands-on training for your team and offer continuous technical support to ensure smooth and hassle-free operation.</p>
                </article>
            </div>
        </div>
    </section>

    <section class="home-results-section" aria-labelledby="results-title">
        <div class="home-results-inner">
            <div class="home-results-heading">
                <div><p class="home-eyebrow">{{ $cmsContent['home.results_eyebrow'] ?? 'Built on Trust' }}</p><h2 id="results-title">{{ $cmsContent['home.results_title'] ?? 'Proven Results. Satisfied Clients.' }}</h2></div>
                <p>{{ $cmsContent['home.results_description'] ?? 'Discover how Smart Illam is helping homeowners create safer, smarter and more connected lifestyles.' }}</p>
            </div>
            <div class="home-results-grid">
                <article class="home-results-stat">
                    <p>Making Homes Smarter, One Tap at a time for Comfort, Convenience and Seamless Living</p>
                    <div><strong>98%</strong><span>Of users report convenience in daily life</span></div>
                </article>
                <div class="home-results-feature">
                    <div class="home-results-banner"><span aria-hidden="true"></span>Secure, Seamless, Effortless</div>
                    <img src="{{ asset('images/home/home-client-story.svg') }}" alt="Smart Illam client sharing his experience" loading="lazy">
                </div>
                <blockquote class="home-testimonial">
                    <span class="home-testimonial__quote" aria-hidden="true">“</span>
                    <p>{{ $cmsContent['home.testimonial'] ?? 'Smart Illam completely transformed our home. Lighting, security, and entertainment are now just one tap away. The installation was smooth, and the support team was exceptional.' }}</p>
                    <footer><span><strong>Ramesh Kumar</strong><small>Chennai</small></span><span class="home-testimonial__arrows" aria-hidden="true"><i>←</i><i>→</i></span></footer>
                </blockquote>
            </div>
        </div>
    </section>

    @include('partials.site-footer')
@endsection
