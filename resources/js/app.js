document.querySelectorAll('[data-curtain-motion]').forEach((stage) => {
    const slider = stage.parentElement.querySelector('.curtain-motion__slider');

    if (!slider) {
        return;
    }

    const updateCurtainOpening = () => {
        stage.style.setProperty('--curtain-open', `${slider.value}%`);
    };

    slider.addEventListener('input', updateCurtainOpening);
    updateCurtainOpening();
});

document.querySelectorAll('[data-door-model]').forEach((button) => {
    button.addEventListener('click', () => {
        const modelGroup = button.parentElement;
        const selectedModelLabel = document.querySelector('[data-selected-door-model]');

        modelGroup.querySelectorAll('[data-door-model]').forEach((modelButton) => {
            const isSelected = modelButton === button;

            modelButton.classList.toggle('active', isSelected);
            modelButton.setAttribute('aria-pressed', String(isSelected));
        });

        if (selectedModelLabel) {
            selectedModelLabel.textContent = button.dataset.doorModel;
        }
    });
});

document.querySelectorAll('[data-cctv-model]').forEach((button) => {
    button.addEventListener('click', () => {
        const modelGroup = button.parentElement;
        const selectedModelLabel = document.querySelector('[data-selected-cctv-model]');

        modelGroup.querySelectorAll('[data-cctv-model]').forEach((modelButton) => {
            const isSelected = modelButton === button;

            modelButton.classList.toggle('active', isSelected);
            modelButton.setAttribute('aria-pressed', String(isSelected));
        });

        if (selectedModelLabel) {
            selectedModelLabel.textContent = button.dataset.cctvModel;
        }
    });
});

document.querySelectorAll('[data-gate-model]').forEach((button) => {
    button.addEventListener('click', () => {
        const modelGroup = button.parentElement;
        const modelSection = button.closest('.swing-gate-models');
        const selectedModelLabel = modelSection?.querySelector('[data-selected-gate-model]');

        modelGroup.querySelectorAll('[data-gate-model]').forEach((modelButton) => {
            const isSelected = modelButton === button;

            modelButton.classList.toggle('active', isSelected);
            modelButton.setAttribute('aria-pressed', String(isSelected));
        });

        if (selectedModelLabel) {
            selectedModelLabel.textContent = button.dataset.gateModel;
        }
    });
});

document.querySelectorAll('[data-gate-model-next]').forEach((button) => {
    button.addEventListener('click', () => {
        const modelSection = button.closest('.swing-gate-models');
        const models = modelSection ? [...modelSection.querySelectorAll('[data-gate-model]')] : [];
        const currentModelIndex = models.findIndex((model) => model.getAttribute('aria-pressed') === 'true');
        const nextModel = models[(currentModelIndex + 1) % models.length];

        nextModel?.click();
    });
});

document.querySelectorAll('[data-feature-image]').forEach((categoryButton) => {
    categoryButton.addEventListener('click', () => {
        const featureLink = document.querySelector('[data-product-feature]');
        const featureImage = featureLink?.querySelector('[data-product-feature-image]');

        if (!featureLink || !featureImage) {
            return;
        }

        featureImage.src = categoryButton.dataset.featureImage;
        featureImage.alt = categoryButton.dataset.featureAlt;
        featureLink.href = categoryButton.dataset.featureUrl;
        featureLink.setAttribute('aria-label', categoryButton.dataset.featureLabel);
    });
});

document.querySelectorAll('[data-blog-topic]').forEach((button) => {
    button.addEventListener('click', () => {
        const selectedTopic = button.dataset.blogTopic;
        const topicButtons = document.querySelectorAll('[data-blog-topic]');
        const articleCards = document.querySelectorAll('.blog-article-card');
        const emptyState = document.querySelector('.blog-empty-state');
        let visibleArticleCount = 0;

        topicButtons.forEach((topicButton) => {
            const isSelected = topicButton === button;

            topicButton.classList.toggle('active', isSelected);
            topicButton.setAttribute('aria-pressed', String(isSelected));
        });

        articleCards.forEach((articleCard) => {
            const isVisible = selectedTopic === 'all' || articleCard.dataset.articleTopic === selectedTopic;

            articleCard.hidden = !isVisible;
            visibleArticleCount += Number(isVisible);
        });

        if (emptyState) {
            emptyState.hidden = visibleArticleCount > 0;
        }
    });
});

document.querySelectorAll('[data-newsletter-form]').forEach((form) => {
    form.addEventListener('submit', (event) => {
        event.preventDefault();

        const email = new FormData(form).get('email');
        const subject = encodeURIComponent('Subscribe to Smart Illam Weekly Intelligence');
        const body = encodeURIComponent(`Please add ${email} to the Smart Illam newsletter.`);

        window.location.href = `mailto:info@smartillam.in?subject=${subject}&body=${body}`;
    });
});

document.querySelectorAll('[data-service-quote]').forEach((form) => {
    form.addEventListener('submit', (event) => {
        event.preventDefault();

        const values = new FormData(form);
        const subject = encodeURIComponent(`Service quotation request from ${values.get('name')}`);
        const body = encodeURIComponent([
            `Name: ${values.get('name')}`,
            `Contact number: ${values.get('phone')}`,
            `Existing system: ${values.get('system')}`,
        ].join('\n'));
        const contactEmail = form.dataset.contactEmail || 'buildingcare09@gmail.com';

        window.location.href = `mailto:${contactEmail}?subject=${subject}&body=${body}`;
    });
});

document.querySelectorAll('[data-contact-form]').forEach((form) => {
    form.addEventListener('submit', (event) => {
        event.preventDefault();

        const values = new FormData(form);
        const firstName = values.get('first_name');
        const subject = encodeURIComponent(`Smart Illam enquiry from ${firstName}`);
        const body = encodeURIComponent([
            `Name: ${firstName} ${values.get('last_name') || ''}`.trim(),
            `Email: ${values.get('email')}`,
            `Mobile: ${form.dataset.contactPhonePrefix || '+91'} ${values.get('phone')}`,
            `Interested in: ${values.get('service')}`,
            `Preferred contact method: ${values.get('contact_method') || 'Not specified'}`,
            '',
            `Requirement: ${values.get('requirements') || 'Not provided'}`,
        ].join('\n'));

        const note = form.parentElement.querySelector('[data-contact-form-note]');

        if (note) {
            note.hidden = false;
        }

        const contactEmail = form.dataset.contactEmail || 'buildingcare09@gmail.com';

        window.location.href = `mailto:${contactEmail}?subject=${subject}&body=${body}`;
    });
});

const adminPageTabs = [...document.querySelectorAll('[data-admin-page-tab]')];

if (adminPageTabs.length > 0) {
    const pagePanels = [...document.querySelectorAll('[data-admin-page-panel]')];
    const selectedPageInput = document.querySelector('[data-admin-selected-page]');
    const previewChoiceSelect = document.querySelector('[data-admin-preview-choice]');
    const previewFrame = document.querySelector('[data-admin-preview-frame]');
    const previewLink = document.querySelector('[data-admin-preview-link]');
    let previewFrameScrollTop = 0;

    const getPreviewUrl = (url) => {
        const parsedUrl = new URL(url, window.location.href);
        parsedUrl.searchParams.set('cms_preview', '1');

        return parsedUrl.toString();
    };

    previewFrame?.addEventListener('load', () => {
        requestAnimationFrame(() => {
            requestAnimationFrame(() => {
                previewFrame.contentWindow?.scrollTo(0, previewFrameScrollTop);
            });
        });
    });

    const setPreviewChoices = (tab) => {
        if (!previewChoiceSelect || !previewFrame || !previewLink) {
            return;
        }

        const choices = JSON.parse(tab.dataset.adminPreviewOptions || '[]');
        previewChoiceSelect.replaceChildren(...choices.map((choice) => {
            const option = document.createElement('option');
            option.value = choice.url;
            option.textContent = choice.label;

            return option;
        }));

        const previewUrl = choices[0]?.url;

        if (previewUrl) {
            previewChoiceSelect.value = previewUrl;
            previewFrame.src = getPreviewUrl(previewUrl);
            previewLink.href = getPreviewUrl(previewUrl);
        }
    };

    previewChoiceSelect?.addEventListener('change', () => {
        if (previewFrame && previewLink) {
            previewFrameScrollTop = previewFrame.contentWindow?.scrollY ?? 0;
            previewFrame.src = getPreviewUrl(previewChoiceSelect.value);
            previewLink.href = getPreviewUrl(previewChoiceSelect.value);
        }
    });

    adminPageTabs.forEach((tab) => {
        tab.addEventListener('click', () => {
            const selectedPage = tab.dataset.adminPageTab;

            adminPageTabs.forEach((pageTab) => {
                const isSelected = pageTab === tab;

                pageTab.classList.toggle('is-active', isSelected);
                pageTab.setAttribute('aria-selected', String(isSelected));
            });

            pagePanels.forEach((panel) => {
                const isSelected = panel.dataset.adminPagePanel === selectedPage;

                panel.hidden = !isSelected;
                const fieldset = panel.querySelector('.admin-page-fieldset');

                if (fieldset) {
                    fieldset.disabled = !isSelected;
                }
            });

            if (selectedPageInput) {
                selectedPageInput.value = selectedPage;
            }

            setPreviewChoices(tab);

            const pageUrl = new URL(window.location.href);
            pageUrl.searchParams.set('page', selectedPage);
            window.history.replaceState({}, '', pageUrl);
        });
    });
}

document.querySelectorAll('.admin-content-form').forEach((form) => {
    let previewTimer;
    let previewImageData = new Map();
    let previewRequest = 0;

    const updateLivePreview = (changedField, imageData = null) => {
        const previewFrame = document.querySelector('[data-admin-preview-frame]');
        const selectedPage = form.querySelector('[data-admin-selected-page]')?.value;

        if (!previewFrame || !selectedPage) {
            return;
        }

        window.clearTimeout(previewTimer);
        previewTimer = window.setTimeout(async () => {
            const field = changedField?.closest('.admin-field');
            const fieldIndex = field?.dataset.adminFieldIndex;
            const formData = new FormData();

            formData.append('page', selectedPage);

            if (field && field.dataset.adminFieldType !== 'image' && changedField?.matches('[data-admin-content-input]')) {
                formData.append(`content[${fieldIndex}]`, changedField.value);
                const clearInput = field.querySelector('.admin-clear-field input');

                if (clearInput?.checked) {
                    formData.append(`clear[${fieldIndex}]`, '1');
                }
            }

            if (field && field.dataset.adminFieldType !== 'image' && changedField?.matches('.admin-clear-field input')) {
                formData.append(`content[${fieldIndex}]`, field.querySelector('[data-admin-content-input]')?.value ?? '');

                if (changedField.checked) {
                    formData.append(`clear[${fieldIndex}]`, '1');
                }
            }

            if (field?.dataset.adminFieldType === 'image') {
                const clearInput = field.querySelector('.admin-clear-field input');
                const imageUrlInput = field.querySelector('[data-admin-image-url]');

                if (changedField?.matches('[data-admin-image-url]')) {
                    if (imageUrlInput.value.trim()) {
                        previewImageData.delete(fieldIndex);
                    } else {
                        formData.append(`reset_images[${fieldIndex}]`, '1');
                        previewImageData.delete(fieldIndex);
                    }
                } else if (changedField?.matches('.admin-clear-field input')) {
                    if (changedField.checked) {
                        formData.append(`clear_images[${fieldIndex}]`, '1');
                    } else {
                        formData.append(`reset_images[${fieldIndex}]`, '1');
                    }
                } else if (imageData) {
                    previewImageData.set(fieldIndex, imageData);
                }

                if (clearInput?.checked) {
                    formData.append(`clear_images[${fieldIndex}]`, '1');
                } else if (previewImageData.has(fieldIndex)) {
                    formData.append(`image_data[${fieldIndex}]`, previewImageData.get(fieldIndex));
                } else if (imageUrlInput?.value.trim()) {
                    formData.append(`image_urls[${fieldIndex}]`, imageUrlInput.value.trim());
                }
            }

            const csrfToken = form.querySelector('input[name="_token"]')?.value;

            if (csrfToken) {
                formData.append('_token', csrfToken);
            }

            const requestId = ++previewRequest;
            const currentScroll = previewFrame.contentWindow?.scrollY ?? 0;

            try {
                const response = await fetch(form.dataset.previewEndpoint, {
                    method: 'POST',
                    body: formData,
                    headers: { Accept: 'application/json' },
                });

                if (!response.ok || requestId !== previewRequest) {
                    return;
                }

                previewFrameScrollTop = currentScroll;
                previewFrame.src = getPreviewUrl(previewChoiceSelect.value);
            } catch {
                // Keep the last rendered preview visible if the draft update cannot be reached.
            }
        }, 350);
    };

    form.querySelectorAll('[data-admin-content-input], [data-admin-image-url]').forEach((input) => {
        input.addEventListener('input', () => updateLivePreview(input));
        input.addEventListener('change', () => updateLivePreview(input));
    });

    form.querySelectorAll('.admin-clear-field input').forEach((input) => {
        input.addEventListener('change', () => updateLivePreview(input));
    });

    form.querySelectorAll('.admin-image-controls input[type="file"]').forEach((input) => {
        input.addEventListener('change', () => {
            const file = input.files?.[0];

            if (!file) {
                return;
            }

            const reader = new FileReader();
            reader.addEventListener('load', () => updateLivePreview(input, reader.result));
            reader.readAsDataURL(file);
        });
    });

    form.addEventListener('submit', () => {
        form.querySelectorAll('[data-admin-content-input], [data-admin-image-url]').forEach((input) => {
            const field = input.closest('.admin-field');
            const clearField = field?.querySelector('.admin-clear-field input');
            const uploadField = field?.querySelector('input[type="file"]');
            const hasNewUpload = Boolean(uploadField?.files.length);
            const isUnchanged = input.value === input.dataset.adminOriginal;

            if (isUnchanged && !clearField?.checked && !hasNewUpload) {
                input.disabled = true;
            }
        });
    });
});
