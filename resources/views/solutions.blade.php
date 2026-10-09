@extends('layouts.app')

@section('title', 'Smart Home Solutions | Smart Illam')
@section('body-class', 'solutions-page')

@section('content')
    <section class="solutions-hero" id="home" aria-labelledby="solutions-hero-title">
        <img class="solutions-hero-image" src="{{ asset('images/solutions/solutions-hero.png') }}" alt="Contemporary smart living room with integrated home controls" fetchpriority="high">
        <div class="solutions-hero-shade" aria-hidden="true"></div>
        <div class="solutions-hero-content">
            <p class="solutions-eyebrow">Smart Solutions</p>
            <h1 id="solutions-hero-title">Intelligent Spaces Designed Around Your Lifestyle</h1>
            <p>Transform your home into a smarter, safer, and more energy-efficient living space with seamless automation powered by Wi-Fi, Zigbee, and Matter protocols.</p>
            <div class="solutions-hero-actions">
                <a class="btn site-navbar__cta" href="{{ route('contact') }}#contact-form">Book Consultation</a>
                <a class="btn solutions-secondary-button" href="#protocols">Explore Services</a>
            </div>
        </div>
    </section>

    <section class="solutions-intro" aria-labelledby="solutions-intro-title">
        <h2 id="solutions-intro-title">Smart Living Starts with<br><span>Intelligent Solutions</span></h2>
        <p class="solutions-tagline">Your Trusted Building Solution Provider</p>
        <p class="solutions-intro-copy">Technology should simplify life, not complicate it. Every Smart Illam solution is carefully designed to integrate naturally into your lifestyle, giving you complete control over your home while improving security, energy efficiency, and everyday comfort.</p>
    </section>

    <section class="protocols-section" id="protocols" aria-labelledby="protocols-title">
        <p class="solutions-eyebrow">Seamless connectivity. Intelligent living.</p>
        <h2 id="protocols-title">Built on Industry-Leading Smart Home Protocols</h2>
        <p>Experience a home where every device communicates effortlessly, creating a truly connected ecosystem designed for comfort, security, and convenience. Powered by the world's leading smart home communication standards, our automation platform delivers unmatched reliability, lightning-fast response, and future-ready compatibility.</p>
        <div class="protocol-badges" aria-label="Supported smart home protocols"><span>Matter</span><span>Zigbee</span><span>Wi-Fi</span></div>
    </section>

    <section class="solution-details" id="solutions-details" aria-label="Smart home solutions">
        <article class="solution-detail">
            <div class="solution-copy">
                <div class="solution-title-wrap"><span class="solution-watermark" aria-hidden="true">Smart Lighting</span><h2>Smart Lighting Control</h2></div>
                <p>Control every light in your home using your smartphone, voice assistant, or elegant touch switches. Create personalized lighting scenes for different moods and schedules.</p>
                <ul class="solution-feature-list"><li>Mobile App Control</li><li>Voice Control</li><li>Smart Touch Switches</li><li>Remote Control</li><li>Dimming Control</li></ul>
            </div>
            <div class="solution-image"><img src="{{ asset('images/solutions/smart-home-room.png') }}" alt="Smart lighting and touch controls in a modern home" loading="lazy"></div>
        </article>
        <article class="solution-detail solution-detail--reverse">
            <div class="solution-copy">
                <div class="solution-title-wrap"><span class="solution-watermark" aria-hidden="true">Smart Security</span><h2>Smart Security</h2></div>
                <p>Protect your family with intelligent security integrated into a single mobile application.</p>
                <ul class="solution-feature-list"><li>Smart Door Lock</li><li>CCTV Integration</li><li>Motion Detection</li><li>Door Sensors</li><li>Window Sensors</li><li>Intrusion Alerts</li></ul>
            </div>
            <div class="solution-image"><img src="{{ asset('images/solutions/smart-home-room-alt.png') }}" alt="Integrated home security controls in a modern living room" loading="lazy"></div>
        </article>
        <article class="solution-detail">
            <div class="solution-copy">
                <div class="solution-title-wrap"><span class="solution-watermark" aria-hidden="true">Smart Curtains</span><h2>Smart Curtain Automation</h2></div>
                <p>Open and close curtains automatically based on time, sunrise, weather, or a single touch.</p>
                <ul class="solution-feature-list"><li>Mobile App Control</li><li>Voice Control</li><li>Remote Control</li><li>Schedule Opening</li><li>Timing Control</li><li>Silent Operation</li></ul>
            </div>
            <div class="solution-image"><img src="{{ asset('images/solutions/solution-interior.jpg') }}" alt="Bright contemporary living room with wide windows and automated curtains" loading="lazy"></div>
        </article>
        <article class="solution-detail solution-detail--reverse">
            <div class="solution-copy">
                <div class="solution-title-wrap"><span class="solution-watermark" aria-hidden="true">Gate Automation</span><h2>Gate Automation with VDP</h2></div>
                <p>Experience a new level of convenience and security with gate automation integrated with a Video Door Phone (VDP). See who's at your entrance, communicate with visitors, and open your gate remotely—from your indoor monitor or smartphone.</p>
                <ul class="solution-feature-list"><li>Mobile App Control</li><li>Touch Switch Control</li><li>Remote Control</li><li>Scheduled Opening</li><li>Silent Operation</li><li>HD Video Monitoring</li><li>Two-way Audio</li></ul>
            </div>
            <div class="solution-image"><img src="{{ asset('images/solutions/smart-home-room.png') }}" alt="Indoor smart home control panel for connected gate access" loading="lazy"></div>
        </article>
    </section>

    <section class="app-control-section" aria-labelledby="app-control-title">
        <div class="solutions-section-heading"><h2 id="app-control-title">Your Entire Smart Home. One Powerful App.</h2><p>Manage lighting, climate, security, curtains, gates, and every connected device from a single intuitive mobile application.</p></div>
        <img src="{{ asset('images/solutions/app-connected-devices.png') }}" alt="Smart home app connected to lighting, climate, curtains, security, and other devices" loading="lazy">
    </section>

    <section class="ecosystem-section" aria-labelledby="ecosystem-title">
        <div class="solutions-section-heading"><h2 id="ecosystem-title">One Ecosystem. Every Device.</h2><p>Whether you're at home, at work, or on the move, manage your entire smart home effortlessly. Access lighting, climate, security, curtains, gates, and more from your desktop, tablet, or smartphone—all synchronized in real time.</p></div>
        <img src="{{ asset('images/solutions/device-ecosystem.png') }}" alt="Smart home automation interfaces displayed on a desktop, tablet, smartphone, and smartwatch" loading="lazy">
    </section>

    <section class="automation-pillars-section" aria-labelledby="automation-pillars-title">
        <div class="solutions-section-heading"><h2 id="automation-pillars-title">Core Automation Pillars</h2><p>Twelve essential technologies integrated into every Smart Illam project for maximum efficiency and comfort.</p></div>
        <div class="automation-pillars-grid">
            @foreach (['Lighting', 'Climate', 'Security', 'CCTV', 'Smart Locks', 'Curtains', 'Voice Control', 'Home Theatre', 'Audio', 'Video Door', 'Energy', 'Mobile App'] as $pillar)
                <div class="automation-pillar"><span aria-hidden="true">✧</span><h3>{{ $pillar }}</h3></div>
            @endforeach
        </div>
    </section>

    <section class="scene-creation-section" aria-labelledby="scene-creation-title">
        <div class="solutions-section-heading"><h2 id="scene-creation-title">Smart Scene Creation</h2></div>
        <div class="scene-cards">
            <article><span>07:00 AM</span><h3>Morning Routine</h3><p>Shades rise gradually, coffee starts brewing, and gentle music fills the master suite.</p></article>
            <article><span>09:00 AM</span><h3>Away Mode</h3><p>Lights and climate controls switch off, the alarm sets, and presence simulation begins.</p></article>
            <article><span>07:30 PM</span><h3>Dinner Party</h3><p>Warm ambient lighting and a comfortable temperature set the mood for entertaining.</p></article>
            <article><span>08:00 PM</span><h3>Movie Night</h3><p>Lights dim, blinds close, and your home cinema system powers up.</p></article>
            <article><span>11:00 PM</span><h3>Good Night</h3><p>Doors lock, perimeter security arms, and path lighting activates.</p></article>
            <article><span>Travel</span><h3>Vacation Mode</h3><p>Monitoring, leak detection, and smart lighting help keep your home protected.</p></article>
        </div>
    </section>

    <section class="lifestyle-section" aria-labelledby="lifestyle-title">
        <div class="solutions-section-heading"><h2 id="lifestyle-title">Built for Every Lifestyle</h2></div>
        <div class="lifestyle-cards">
            <article><div class="lifestyle-image-frame"><img src="{{ asset('images/solutions/lifestyle-apartments.png') }}" alt="Luxury apartment with a bright connected living space" loading="lazy"></div><h3>Luxury Apartments</h3></article>
            <article><div class="lifestyle-image-frame"><img src="{{ asset('images/solutions/lifestyle-industries.png') }}" alt="Industrial facility with an automated entry gate" loading="lazy"></div><h3>Industries</h3></article>
            <article><div class="lifestyle-image-frame"><img src="{{ asset('images/solutions/lifestyle-commercial.png') }}" alt="Modern commercial building with integrated access controls" loading="lazy"></div><h3>Commercial Buildings</h3></article>
        </div>
    </section>

    <section class="solutions-cta-section" style="--solutions-cta-image: url('{{ asset('images/solutions/solution-interior.jpg') }}')" aria-labelledby="solutions-cta-title">
        <div><h2 id="solutions-cta-title">Let's Design the Perfect Smart Home for You.</h2><p>Consult with our expert engineers to discover how we can elevate your lifestyle through intelligent technology.</p></div>
        <div class="solutions-cta-actions"><a class="btn site-navbar__cta" href="{{ url('/#contact') }}">Book Consultation</a><a class="btn solutions-cta-secondary" href="tel:+919876543210">Talk to an Expert</a></div>
    </section>

    @include('partials.site-footer')
@endsection
