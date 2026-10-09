<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Website editor | Smart Illam</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="admin-page admin-editor-page">
    <header class="admin-topbar">
        <a class="admin-topbar-brand" href="{{ route('home') }}"><img src="{{ asset('images/smartillam-logo.png') }}" alt="Smart Illam"></a>
        <div class="admin-topbar-actions"><a href="{{ route('home') }}" target="_blank" rel="noopener">Preview website ↗</a><form method="POST" action="{{ route('admin.logout') }}">@csrf<button type="submit">Sign out</button></form></div>
    </header>
    <main class="admin-editor-shell">
        <aside class="admin-sidebar"><span class="admin-avatar">{{ mb_substr(auth()->user()->name, 0, 1) }}</span><p class="admin-sidebar-overline">WORKSPACE</p><h2>Website</h2><p>Signed in as<br><strong>{{ auth()->user()->name }}</strong></p></aside>
        <section class="admin-editor-main">
            <div class="admin-editor-heading"><div><p class="admin-eyebrow">CONTENT MANAGEMENT</p><h1>Your website, <span>your way.</span></h1><p>Edit and save every page from this admin panel.</p></div><span class="admin-live-pill">ADMIN PANEL</span></div>
            @if (session('status'))<div class="admin-success" role="status">✓ {{ session('status') }}</div>@endif
            @if ($errors->any())<div class="admin-alert" role="alert">Please review the highlighted fields. {{ $errors->first() }}</div>@endif
            <form class="admin-content-form" method="POST" action="{{ route('admin.content.update') }}" data-preview-endpoint="{{ route('admin.content.preview-draft') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="page" value="{{ $selectedPage }}" data-admin-selected-page>
                <section class="admin-content-card admin-page-picker">
                    <div class="admin-card-heading"><span class="admin-card-number">01</span><div><h2>Edit website pages</h2><p>Choose a page, change its text and images below, then save your updates here.</p></div></div>
                    <nav class="admin-page-tabs" aria-label="Choose a page to edit" role="tablist">
                        @foreach ($pages as $pageKey => $page)
                            <button class="admin-page-tab{{ $selectedPage === $pageKey ? ' is-active' : '' }}" type="button" role="tab" id="admin-tab-{{ $pageKey }}" aria-controls="admin-panel-{{ $pageKey }}" aria-selected="{{ $selectedPage === $pageKey ? 'true' : 'false' }}" data-admin-page-tab="{{ $pageKey }}" data-admin-preview-options="{{ json_encode($previewChoices[$pageKey]) }}"><span aria-hidden="true">{{ ['products' => '✦', 'blog' => '▤', 'about' => '◉', 'contact' => '✉'][$pageKey] ?? '⌂' }}</span>{{ $page['label'] }}</button>
                        @endforeach
                    </nav>
                </section>
                <div class="admin-editor-workspace">
                    <aside class="admin-preview-panel" aria-label="Website preview">
                        <div class="admin-preview-heading"><div><p class="admin-eyebrow">LIVE WEBSITE PREVIEW</p><h2>Preview the page</h2></div><a href="{{ $previewChoices[$selectedPage][0]['url'] }}" target="_blank" rel="noopener" data-admin-preview-link>↗</a></div>
                        <label class="admin-preview-select-label" for="admin-preview-choice">Preview page</label>
                        <select id="admin-preview-choice" data-admin-preview-choice>
                            @foreach ($previewChoices[$selectedPage] as $choice)
                                <option value="{{ $choice['url'] }}">{{ $choice['label'] }}</option>
                            @endforeach
                        </select>
                        <div class="admin-preview-frame-wrap"><iframe src="{{ $previewChoices[$selectedPage][0]['url'] }}?cms_preview=1" title="Website page preview" loading="lazy" data-admin-preview-frame></iframe></div>
                        <p class="admin-preview-note">Preview updates as you edit. Save to publish your changes.</p>
                    </aside>
                    <div class="admin-page-editors">
                @foreach ($pages as $pageKey => $page)
                    <section class="admin-content-card admin-page-panel" id="admin-panel-{{ $pageKey }}" role="tabpanel" aria-labelledby="admin-tab-{{ $pageKey }}" data-admin-page-panel="{{ $pageKey }}" @if ($selectedPage !== $pageKey) hidden @endif>
                        <div class="admin-card-heading"><span class="admin-card-number">{{ $loop->iteration < 10 ? '0'.$loop->iteration : $loop->iteration }}</span><div><p class="admin-eyebrow">PAGE CONTENT</p><h2>{{ $page['label'] }}</h2><p>Update the content shown on the {{ strtolower($page['label']) }} pages.</p></div><span class="admin-field-count">{{ collect($page['groups'])->sum(fn ($group) => count($group['fields'])) }} editable items</span></div>
                        <fieldset class="admin-page-fieldset" @if ($selectedPage !== $pageKey) disabled @endif>
                        @foreach ($page['groups'] as $group)
                            <details class="admin-content-group" @if ($loop->first) open @endif>
                                <summary>{{ $group['label'] }}</summary>
                                <div class="admin-fields-grid">
                                    @foreach ($group['fields'] as $field)
                                        <div class="admin-field{{ $field['type'] === 'textarea' && $field['key'] !== 'products.smart-touch-switches.feature_names' ? ' admin-field-wide' : '' }}{{ $field['type'] === 'image' && $field['key'] !== 'products.smart-touch-switches.feature_image_1' ? ' admin-field-image' : '' }}{{ $field['key'] === 'products.smart-touch-switches.feature_names' ? ' admin-field-feature-names' : '' }}{{ $field['key'] === 'products.smart-touch-switches.feature_image_1' ? ' admin-field-feature-primary' : '' }}" data-admin-field-index="{{ $field['index'] }}" data-admin-field-type="{{ $field['type'] }}">
                                            @if ($field['type'] === 'image')<label>{{ $field['label'] }}</label>@else<label for="field-{{ $field['index'] }}">{{ $field['label'] }}</label>@endif
                                            @if ($field['type'] === 'image')
                                                <div class="admin-image-editor">
                                                    <div class="admin-image-preview-wrap">
                                                        @if (!empty($field['value']))<img class="admin-field-image-preview" src="{{ \Illuminate\Support\Str::startsWith($field['value'], ['http://', 'https://', 'data:']) ? $field['value'] : asset($field['value']) }}" alt="Current {{ strtolower($field['label']) }}">@else<p class="admin-image-empty">No image selected</p>@endif
                                                    </div>
                                                    <div class="admin-image-controls">
                                                        <label for="field-{{ $field['index'] }}-upload">Upload from your device</label>
                                                        <input id="field-{{ $field['index'] }}-upload" name="images[{{ $field['index'] }}]" type="file" accept="image/png,image/jpeg,image/webp">
                                                        <label for="field-{{ $field['index'] }}-url">Or paste an image URL</label>
                                                        <input id="field-{{ $field['index'] }}-url" name="image_urls[{{ $field['index'] }}]" type="url" value="{{ old('image_urls.'.$field['index'], \Illuminate\Support\Str::startsWith($field['value'], ['http://', 'https://', 'data:']) ? $field['value'] : '') }}" data-admin-image-url data-admin-original="{{ \Illuminate\Support\Str::startsWith($field['value'], ['http://', 'https://', 'data:']) ? $field['value'] : '' }}" placeholder="https://example.com/image.jpg">
                                                        <small>PNG, JPG, or WebP · up to 5 MB for uploads. If both options are set, the device upload is used.</small>
                                                        <label class="admin-clear-field"><input type="checkbox" name="clear_images[{{ $field['index'] }}]" value="1"><span>Use the original website image</span></label>
                                                    </div>
                                                </div>
                                            @elseif ($field['type'] === 'textarea')
                                                <textarea id="field-{{ $field['index'] }}" name="content[{{ $field['index'] }}]" rows="{{ $field['key'] === 'products.smart-touch-switches.feature_names' ? 9 : 3 }}" data-admin-content-input data-admin-original="{{ $field['value'] }}" placeholder="Leave blank to keep the current website text">{{ old('content.'.$field['index'], $field['value']) }}</textarea>
                                            @else
                                                <input id="field-{{ $field['index'] }}" name="content[{{ $field['index'] }}]" type="{{ $field['type'] }}" value="{{ old('content.'.$field['index'], $field['value']) }}" data-admin-content-input data-admin-original="{{ $field['value'] }}" placeholder="Leave blank to keep the current website text">
                                            @endif
                                            @if ($field['type'] !== 'image')<label class="admin-clear-field"><input type="checkbox" name="clear[{{ $field['index'] }}]" value="1"><span>Clear this content</span></label>@endif
                                        </div>
                                    @endforeach
                                </div>
                            </details>
                        @endforeach
                        </fieldset>
                    </section>
                @endforeach
                <div class="admin-save-row"><p>Changes appear on the public pages after saving.</p><button class="admin-submit" type="submit">Save website changes <span aria-hidden="true">↗</span></button></div>
                    </div>
                </div>
            </form>
        </section>
    </main>
</body>
</html>
