/* =========================================================
   Nodus — shared front-end behaviour
   Storage is local only; there is no real backend here.
   ========================================================= */

const STORAGE_KEY = "nodus_user";

/* ---------- helpers ---------- */

function getStoredUser() {
  try {
    const raw = window.localStorage.getItem(STORAGE_KEY);
    return raw ? JSON.parse(raw) : null;
  } catch (err) {
    return null;
  }
}

function setStoredUser(user) {
  window.localStorage.setItem(STORAGE_KEY, JSON.stringify(user));
}

function clearStoredUser() {
  window.localStorage.removeItem(STORAGE_KEY);
}

function initials(name) {
  if (!name) return "N";
  const parts = name.trim().split(/\s+/);
  const first = parts[0] ? parts[0][0] : "";
  const last = parts.length > 1 ? parts[parts.length - 1][0] : "";
  return (first + last).toUpperCase();
}

function isValidEmail(value) {
  return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value);
}

function showFieldError(input, message) {
  input.classList.add("has-error");
  const errorEl = document.getElementById(input.id + "-error");
  if (errorEl) {
    errorEl.textContent = message;
    errorEl.classList.add("is-visible");
  }
}

function clearFieldError(input) {
  input.classList.remove("has-error");
  const errorEl = document.getElementById(input.id + "-error");
  if (errorEl) {
    errorEl.textContent = "";
    errorEl.classList.remove("is-visible");
  }
}

function showStatus(el, message, type) {
  if (!el) return;
  el.textContent = message;
  el.classList.remove("is-success", "is-error");
  el.classList.add("is-visible", type === "error" ? "is-error" : "is-success");
}

/* ---------- password visibility toggles ---------- */

function initPasswordToggles() {
  document.querySelectorAll("[data-password-toggle]").forEach((btn) => {
    btn.addEventListener("click", () => {
      const targetId = btn.getAttribute("data-password-toggle");
      const input = document.getElementById(targetId);
      if (!input) return;
      const revealed = input.type === "text";
      input.type = revealed ? "password" : "text";
      btn.textContent = revealed ? "Show" : "Hide";
      btn.setAttribute("aria-label", revealed ? "Show password" : "Hide password");
    });
  });
}

/* ---------- password strength meter ---------- */

function passwordStrength(value) {
  let score = 0;
  if (value.length >= 8) score += 1;
  if (/[A-Z]/.test(value) && /[a-z]/.test(value)) score += 1;
  if (/[0-9]/.test(value) && /[^A-Za-z0-9]/.test(value)) score += 1;
  return score; // 0-3
}

function initStrengthMeter() {
  const passwordInput = document.getElementById("signup-password");
  const meter = document.getElementById("password-strength");
  if (!passwordInput || !meter) return;
  passwordInput.addEventListener("input", () => {
    const score = passwordStrength(passwordInput.value);
    meter.className = "strength-meter" + (score > 0 ? " level-" + score : "");
  });
}

/* ---------- nav avatar ---------- */

function initNavAvatar() {
  const avatarEl = document.querySelector("[data-nav-avatar]");
  if (!avatarEl) return;
  const user = getStoredUser();
  avatarEl.textContent = initials(user ? user.name : "");
}

/* ---------- sign out ---------- */

function initSignOut() {
  document.querySelectorAll("[data-sign-out]").forEach((btn) => {
    btn.addEventListener("click", (event) => {
      event.preventDefault();
      clearStoredUser();
      window.location.href = "login.html";
    });
  });
}

/* ---------- login page ---------- */

function initLoginForm() {
  const form = document.getElementById("login-form");
  if (!form) return;

  const emailInput = document.getElementById("login-email");
  const passwordInput = document.getElementById("login-password");
  const statusEl = document.getElementById("login-status");

  form.addEventListener("submit", (event) => {
    event.preventDefault();
    let valid = true;

    clearFieldError(emailInput);
    clearFieldError(passwordInput);

    if (!isValidEmail(emailInput.value.trim())) {
      showFieldError(emailInput, "Enter a valid email address.");
      valid = false;
    }

    if (passwordInput.value.length < 1) {
      showFieldError(passwordInput, "Enter your password.");
      valid = false;
    }

    if (!valid) {
      showStatus(statusEl, "Please fix the highlighted fields.", "error");
      return;
    }

    const existing = getStoredUser();
    const name = existing && existing.email === emailInput.value.trim()
      ? existing.name
      : emailInput.value.split("@")[0];

    setStoredUser({
      name: existing && existing.email === emailInput.value.trim() ? existing.name : name,
      email: emailInput.value.trim(),
      headline: existing ? existing.headline : "Member at Nodus",
    });

    showStatus(statusEl, "Signed in. Redirecting to your feed...", "success");
    window.setTimeout(() => {
      window.location.href = "index.html";
    }, 600);
  });
}

/* ---------- signup page ---------- */

function initSignupForm() {
  const form = document.getElementById("signup-form");
  if (!form) return;

  const nameInput = document.getElementById("signup-name");
  const emailInput = document.getElementById("signup-email");
  const passwordInput = document.getElementById("signup-password");
  const confirmInput = document.getElementById("signup-confirm");
  const statusEl = document.getElementById("signup-status");

  form.addEventListener("submit", (event) => {
    event.preventDefault();
    let valid = true;

    [nameInput, emailInput, passwordInput, confirmInput].forEach(clearFieldError);

    if (nameInput.value.trim().length < 2) {
      showFieldError(nameInput, "Enter your full name.");
      valid = false;
    }

    if (!isValidEmail(emailInput.value.trim())) {
      showFieldError(emailInput, "Enter a valid email address.");
      valid = false;
    }

    if (passwordInput.value.length < 8) {
      showFieldError(passwordInput, "Use at least 8 characters.");
      valid = false;
    }

    if (confirmInput.value !== passwordInput.value || confirmInput.value.length === 0) {
      showFieldError(confirmInput, "Passwords do not match.");
      valid = false;
    }

    if (!valid) {
      showStatus(statusEl, "Please fix the highlighted fields.", "error");
      return;
    }

    setStoredUser({
      name: nameInput.value.trim(),
      email: emailInput.value.trim(),
      headline: "New member at Nodus",
    });

    showStatus(statusEl, "Account created. Redirecting to sign in...", "success");
    window.setTimeout(() => {
      window.location.href = "login.html";
    }, 700);
  });
}

/* ---------- index page: feed ---------- */

const seedPosts = [
  {
    name: "Amara Okafor",
    role: "Product Design Lead, Fieldstone",
    time: "3h",
    tag: "Design systems",
    body: "Shipped a full audit of our component library this week. The biggest win was cutting duplicate spacing tokens from 42 down to 9 -- consistency work rarely feels glamorous but it compounds fast.",
    likes: 128,
    comments: 24,
  },
  {
    name: "Julian Reyes",
    role: "Backend Engineer, Harbor Systems",
    time: "7h",
    tag: "Careers",
    body: "Two years ago I was rewriting the same migration script for the fourth time. Today our team ships schema changes with zero downtime. Small process fixes, repeated often, beat one big rewrite.",
    likes: 342,
    comments: 51,
  },
  {
    name: "Priya Natarajan",
    role: "Hiring Manager, Loom & Co.",
    time: "1d",
    tag: "Hiring",
    body: "We are looking for a data analyst who is comfortable moving between SQL and stakeholder conversations. If you enjoy translating messy numbers into a decision someone can act on, send me a note.",
    likes: 96,
    comments: 18,
  },
];

function likeIcon() {
  return (
    '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">' +
    '<path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3H14Z"></path>' +
    '<path d="M7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path>' +
    "</svg>"
  );
}

function commentIcon() {
  return (
    '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">' +
    '<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>' +
    "</svg>"
  );
}

function shareIcon() {
  return (
    '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">' +
    '<path d="M4 12v7a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-7"></path>' +
    '<polyline points="16 6 12 2 8 6"></polyline>' +
    '<line x1="12" y1="2" x2="12" y2="15"></line>' +
    "</svg>"
  );
}

function renderPost(post) {
  const article = document.createElement("article");
  article.className = "card feed-post";
  article.innerHTML =
    '<div class="post-header">' +
    '<div class="avatar-sm">' + initials(post.name) + "</div>" +
    '<div class="post-meta">' +
    '<div class="post-name">' + post.name + "</div>" +
    '<div class="post-role">' + post.role + "</div>" +
    '<div class="post-time">' + post.time + "</div>" +
    "</div>" +
    "</div>" +
    '<div class="post-body">' +
    '<span class="post-tag">' + post.tag + "</span>" +
    post.body +
    "</div>" +
    '<div class="post-stats">' +
    '<span>' + post.likes + " reactions</span>" +
    '<span>' + post.comments + " comments</span>" +
    "</div>" +
    '<div class="post-actions">' +
    '<button type="button" data-like-btn>' + likeIcon() + "<span>Like</span></button>" +
    '<button type="button">' + commentIcon() + "<span>Comment</span></button>" +
    '<button type="button">' + shareIcon() + "<span>Share</span></button>" +
    "</div>";

  const likeBtn = article.querySelector("[data-like-btn]");
  likeBtn.addEventListener("click", () => {
    const liked = likeBtn.classList.toggle("is-liked");
    const statsLine = article.querySelector(".post-stats span");
    post.likes += liked ? 1 : -1;
    statsLine.textContent = post.likes + " reactions";
    likeBtn.querySelector("span").textContent = liked ? "Liked" : "Like";
  });

  return article;
}

function initFeed() {
  const feedList = document.getElementById("feed-list");
  if (!feedList) return;

  seedPosts.forEach((post) => {
    feedList.appendChild(renderPost(post));
  });

  const trigger = document.getElementById("composer-trigger");
  const composeForm = document.getElementById("compose-form");
  const composeText = document.getElementById("compose-text");

  if (trigger && composeForm) {
    trigger.addEventListener("click", () => {
      const isOpen = composeForm.style.display === "block";
      composeForm.style.display = isOpen ? "none" : "block";
      if (!isOpen) composeText.focus();
    });

    composeForm.addEventListener("submit", (event) => {
      event.preventDefault();
      const text = composeText.value.trim();
      if (!text) return;

      const user = getStoredUser();
      const newPost = {
        name: user ? user.name : "You",
        role: user ? user.headline : "Member at Nodus",
        time: "Just now",
        tag: "Update",
        body: text,
        likes: 0,
        comments: 0,
      };

      feedList.prepend(renderPost(newPost));
      composeText.value = "";
      composeForm.style.display = "none";
    });
  }
}

/* ---------- profile page ---------- */

function initProfile() {
  const nameEl = document.querySelector("[data-profile-name]");
  if (!nameEl) return;

  const user = getStoredUser();
  const name = user && user.name ? user.name : "Thandiwe Nkosi";
  const headline = user && user.headline ? user.headline : "Senior Frontend Engineer, Nodus Labs";

  nameEl.textContent = name;
  const headlineEl = document.querySelector("[data-profile-headline]");
  if (headlineEl) headlineEl.textContent = headline;

  const avatarEls = document.querySelectorAll("[data-profile-avatar]");
  avatarEls.forEach((el) => {
    el.textContent = initials(name);
  });
}

/* ---------- init ---------- */

document.addEventListener("DOMContentLoaded", () => {
  initPasswordToggles();
  initStrengthMeter();
  initNavAvatar();
  initSignOut();
  initLoginForm();
  initSignupForm();
  initFeed();
  initProfile();
});