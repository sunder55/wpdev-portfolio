document.addEventListener('DOMContentLoaded', () => {
    const themeToggle = document.querySelector('.theme-toggle');
    const themeIcon = themeToggle?.querySelector('.theme-icon');

    function getTheme() {
        return localStorage.getItem('wpdev_theme') || 'light';
    }

    function setTheme(theme) {
        document.documentElement.setAttribute('data-theme', theme);
        localStorage.setItem('wpdev_theme', theme);
        document.cookie = 'wpdev_theme=' + theme + ';path=/;max-age=31536000';
        if (themeIcon) {
            themeIcon.textContent = theme === 'dark' ? '☀️' : '🌙';
        }
    }

    setTheme(getTheme());

    if (themeToggle) {
        themeToggle.addEventListener('click', () => {
            const current = getTheme();
            setTheme(current === 'dark' ? 'light' : 'dark');
        });
    }

    // Mobile menu toggle
    const toggle = document.querySelector('.menu-toggle');
    const nav = document.querySelector('.nav-list');

    if (toggle && nav) {
        toggle.addEventListener('click', () => {
            nav.classList.toggle('open');
        });

        nav.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                nav.classList.remove('open');
            });
        });
    }

    // Project filtering
    const filters = document.querySelectorAll('.filter-btn');
    const grid = document.getElementById('projects-grid');

    if (filters.length && grid) {
        const cards = grid.querySelectorAll('.project-card');

        filters.forEach(btn => {
            btn.addEventListener('click', () => {
                filters.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');

                const filter = btn.dataset.filter;

                cards.forEach(card => {
                    const types = card.dataset.types || 'general';
                    const match = filter === 'all' || types.split(',').includes(filter);
                    card.style.display = match ? '' : 'none';
                });
            });
        });
    }

    // Contact form
    const form = document.getElementById('contact-form');
    if (form) {
        form.addEventListener('submit', async (e) => {
            e.preventDefault();

            const status = document.getElementById('form-status');
            const submitBtn = document.getElementById('form-submit');
            const formData = new FormData(form);

            status.className = 'form-status';
            status.style.display = 'none';
            submitBtn.disabled = true;
            submitBtn.textContent = 'Sending...';

            formData.append('action', 'wpdev_contact');
            formData.append('nonce', wpdevData.nonce);

            try {
                const res = await fetch(wpdevData.ajaxUrl, {
                    method: 'POST',
                    body: formData,
                });
                const data = await res.json();

                status.className = 'form-status ' + (data.success ? 'success' : 'error');
                status.textContent = data.data.message;
                status.style.display = 'block';

                if (data.success) {
                    form.reset();
                }
            } catch {
                status.className = 'form-status error';
                status.textContent = 'Connection error. Please try again.';
                status.style.display = 'block';
            }

            submitBtn.disabled = false;
            submitBtn.textContent = 'Send message';
        });
    }
});
