document.addEventListener('DOMContentLoaded', function () {

    /* ---- Post composer character counter ---- */
    var postTitle = document.getElementById('postTitle');
    var postInput = document.getElementById('postContent');
    var charCount = document.getElementById('charCount');
    var postSubmit = document.getElementById('postSubmit');
    var POST_LIMIT = 500;

    if (postInput && charCount) {
        var updateCount = function () {
            var remaining = POST_LIMIT - postInput.value.length;
            charCount.textContent = remaining;
            charCount.classList.toggle('limit-near', remaining <= 20);
            if (postSubmit) {
                var titleFilled = !postTitle || postTitle.value.trim().length > 0;
                postSubmit.disabled = postInput.value.trim().length === 0 || !titleFilled || remaining < 0;
            }
        };
        postInput.addEventListener('input', updateCount);
        if (postTitle) postTitle.addEventListener('input', updateCount);
        updateCount();
    }

    /* ---- Confirm before deleting a post ---- */
    document.querySelectorAll('.post-delete-form').forEach(function (form) {
        form.addEventListener('submit', function (e) {
            if (!confirm('Delete this post? This cannot be undone.')) {
                e.preventDefault();
            }
        });
    });

    /* ---- Confirm before deleting the account ---- */
    var deleteAccountForm = document.getElementById('deleteAccountForm');
    if (deleteAccountForm) {
        deleteAccountForm.addEventListener('submit', function (e) {
            if (!confirm('Delete your account? All of your posts and data will be permanently removed.')) {
                e.preventDefault();
            }
        });
    }

    /* ---- Profile page tab switching ---- */
    var tabButtons = document.querySelectorAll('.profile-tabs button');
    var tabPanels = document.querySelectorAll('.profile-panel');

    tabButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            var target = button.getAttribute('data-tab');

            tabButtons.forEach(function (b) { b.classList.remove('active'); });
            tabPanels.forEach(function (p) { p.classList.remove('active'); });

            button.classList.add('active');
            var panel = document.getElementById(target);
            if (panel) {
                panel.classList.add('active');
            }
        });
    });

    /* ---- Mark the active nav link based on current path ---- */
    var currentPath = window.location.pathname.replace(/\/+$/, '');
    document.querySelectorAll('.nav-menus a').forEach(function (link) {
        var linkPath = link.getAttribute('href');
        if (linkPath && currentPath.endsWith(linkPath.replace(/^\//, ''))) {
            link.classList.add('active');
        }
    });

    /* ---- Responsive nav: hamburger toggle for small screens ---- */
    var navToggle = document.getElementById('navToggle');
    var navMenus = document.getElementById('navMenus');
    var MOBILE_BREAKPOINT = 768;

    if (navToggle && navMenus) {
        var toggleIcon = navToggle.querySelector('.material-symbols-outlined');

        var closeMenu = function () {
            navMenus.classList.remove('open');
            navToggle.setAttribute('aria-expanded', 'false');
            if (toggleIcon) toggleIcon.textContent = 'menu';
        };

        var openMenu = function () {
            navMenus.classList.add('open');
            navToggle.setAttribute('aria-expanded', 'true');
            if (toggleIcon) toggleIcon.textContent = 'close';
        };

        navToggle.addEventListener('click', function (e) {
            e.stopPropagation();
            var isOpen = navMenus.classList.contains('open');
            if (isOpen) {
                closeMenu();
            } else {
                openMenu();
            }
        });

        /* Close the menu after picking a link */
        navMenus.querySelectorAll('a').forEach(function (link) {
            link.addEventListener('click', closeMenu);
        });

        /* Close on click/tap outside the menu */
        document.addEventListener('click', function (e) {
            if (navMenus.classList.contains('open') &&
                !navMenus.contains(e.target) &&
                !navToggle.contains(e.target)) {
                closeMenu();
            }
        });

        /* Close on Escape */
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && navMenus.classList.contains('open')) {
                closeMenu();
                navToggle.focus();
            }
        });

        /* Reset state when resizing back up to desktop width */
        var resizeTimer;
        window.addEventListener('resize', function () {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function () {
                if (window.innerWidth > MOBILE_BREAKPOINT) {
                    closeMenu();
                }
            }, 150);
        });
    }
});