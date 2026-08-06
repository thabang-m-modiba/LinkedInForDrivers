<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Nodus | Feed</title>
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=Inter:wght@400;500;600;700&family=IBM+Plex+Mono:wght@500&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="css/styles.css" />
</head>
<body>

<header class="site-header">
  <div class="header-inner">
    <a class="brand" href="index.html" aria-label="Nodus home">
      <svg class="brand-mark" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <circle cx="8" cy="8" r="3.4" fill="currentColor"/>
        <circle cx="24" cy="8" r="3.4" fill="currentColor"/>
        <circle cx="16" cy="24" r="3.4" fill="currentColor"/>
        <line x1="8" y1="8" x2="16" y2="24" stroke="currentColor" stroke-width="2"/>
        <line x1="24" y1="8" x2="16" y2="24" stroke="currentColor" stroke-width="2"/>
        <line x1="8" y1="8" x2="24" y2="8" stroke="currentColor" stroke-width="2"/>
      </svg>
      <span class="brand-word">Nodus</span>
    </a>

    <form class="search-form" role="search" onsubmit="return false;">
      <div class="search-field">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
          <circle cx="11" cy="11" r="7"></circle>
          <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
        </svg>
        <label for="search-input" class="visually-hidden">Search</label>
        <input id="search-input" type="search" placeholder="Search people, posts, roles" />
      </div>
    </form>

    <nav class="main-nav" aria-label="Primary">
      <a class="nav-link is-active" href="index.html">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
          <path d="M3 11.5 12 4l9 7.5"></path>
          <path d="M5 10v10h5v-6h4v6h5V10"></path>
        </svg>
        Home
      </a>
      <a class="nav-link" href="#">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
          <circle cx="7" cy="8" r="3"></circle>
          <circle cx="17" cy="8" r="3"></circle>
          <path d="M2 20c0-3 2.5-5 5-5s5 2 5 5"></path>
          <path d="M12 20c0-3 2.5-5 5-5s5 2 5 5"></path>
        </svg>
        Network
      </a>
      <a class="nav-link" href="#">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
          <rect x="3" y="7" width="18" height="13" rx="2"></rect>
          <path d="M8 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
        </svg>
        Jobs
      </a>
      <a class="nav-link" href="#">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
          <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
        </svg>
        Messages
      </a>
      <a class="nav-link" href="profile.html">
        <span class="nav-avatar" data-nav-avatar>N</span>
        Me
      </a>
    </nav>
  </div>
</header>

<main class="page-shell">

  <aside class="side-rail side-left">
    <section class="card profile-summary">
      <div class="cover-strip"></div>
      <div class="avatar-lg" data-profile-avatar>TN</div>
      <div class="summary-body">
        <h3 data-profile-name>Thandiwe Nkosi</h3>
        <p class="headline" data-profile-headline>Senior Frontend Engineer, Nodus Labs</p>
        <div class="summary-stats">
          <div class="stat-row"><span>Profile views</span><strong>214</strong></div>
          <div class="stat-row"><span>Post impressions</span><strong>1,842</strong></div>
        </div>
      </div>
    </section>

    <section class="card rail-card" style="margin-top:16px;">
      <h4>Quick links</h4>
      <ul class="rail-list">
        <li><a href="profile.html">View your profile</a></li>
        <li><a href="#">Saved posts</a></li>
        <li><a href="#">Groups</a></li>
      </ul>
    </section>
  </aside>

  <section class="feed-column">
    <div class="card composer">
      <div class="composer-row">
        <div class="avatar-sm" data-profile-avatar>TN</div>
        <button type="button" class="composer-trigger" id="composer-trigger">
          Share an update with your network
        </button>
      </div>

      <form id="compose-form" style="display:none; margin-top:12px;">
        <label for="compose-text" class="visually-hidden">Write a post</label>
        <textarea id="compose-text" rows="3" placeholder="What are you working on?"
          style="width:100%; border:1px solid var(--color-border); border-radius:8px; padding:10px 12px; font-family:inherit; font-size:14px; resize:vertical;"></textarea>
        <div style="display:flex; justify-content:flex-end; gap:8px; margin-top:10px;">
          <button type="button" class="btn btn-ghost btn-sm" onclick="document.getElementById('compose-form').style.display='none';">Cancel</button>
          <button type="submit" class="btn btn-primary btn-sm">Post</button>
        </div>
      </form>

      <div class="composer-actions">
        <button type="button">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="3" width="18" height="18" rx="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><path d="M21 15l-5-5L5 21"></path></svg>
          <span>Photo</span>
        </button>
        <button type="button">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M23 7l-7 5 7 5V7z"></path><rect x="1" y="5" width="15" height="14" rx="2"></rect></svg>
          <span>Video</span>
        </button>
        <button type="button">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline></svg>
          <span>Article</span>
        </button>
      </div>
    </div>

    <div id="feed-list"></div>
  </section>

  <aside class="side-rail side-right">
    <section class="card rail-card">
      <h4>People you may know</h4>
      <ul class="rail-list">
        <li>
          <span class="rail-node">SM</span>
          <div>
            <div class="rail-title">Sipho Mokoena</div>
            <div class="rail-sub">DevOps Engineer, Halyard</div>
          </div>
        </li>
        <li>
          <span class="rail-node">EA</span>
          <div>
            <div class="rail-title">Elena Alvarez</div>
            <div class="rail-sub">UX Researcher, Fieldstone</div>
          </div>
        </li>
        <li>
          <span class="rail-node">KD</span>
          <div>
            <div class="rail-title">Kwame Duah</div>
            <div class="rail-sub">Data Analyst, Loom & Co.</div>
          </div>
        </li>
      </ul>
    </section>

    <section class="card rail-card" style="margin-top:16px;">
      <h4>Today's reads</h4>
      <ul class="rail-list">
        <li>
          <span class="rail-node">01</span>
          <div>
            <div class="rail-title">Remote onboarding, done right</div>
            <div class="rail-sub">4,120 readers</div>
          </div>
        </li>
        <li>
          <span class="rail-node">02</span>
          <div>
            <div class="rail-title">The case for smaller standups</div>
            <div class="rail-sub">2,875 readers</div>
          </div>
        </li>
      </ul>
    </section>
  </aside>

</main>

<footer class="site-footer">
  Nodus &mdash; a front-end concept. &nbsp;<a href="#" data-sign-out>Sign out</a>
</footer>

<script src="js/script.js"></script>
</body>
</html>