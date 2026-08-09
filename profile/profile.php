<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Nodus | Profile</title>
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=Inter:wght@400;500;600;700&family=IBM+Plex+Mono:wght@500&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="../styles/style.css" />
</head>
<body class="profile-page">

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
      <a class="nav-link" href="index.html">
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
      <a class="nav-link is-active" href="profile.html">
        <span class="nav-avatar" data-nav-avatar>N</span>
        Me
      </a>
    </nav>
  </div>
</header>

<main class="page-shell">

  <section class="profile-main">
    <div class="profile-cover">
      <svg viewBox="0 0 1200 160" preserveAspectRatio="xMidYMid slice" aria-hidden="true">
        <line x1="60" y1="120" x2="180" y2="40" stroke="#ffffff" stroke-width="1.5" opacity="0.35"/>
        <line x1="180" y1="40" x2="320" y2="100" stroke="#ffffff" stroke-width="1.5" opacity="0.35"/>
        <line x1="320" y1="100" x2="480" y2="20" stroke="#ffffff" stroke-width="1.5" opacity="0.35"/>
        <line x1="480" y1="20" x2="640" y2="110" stroke="#ffffff" stroke-width="1.5" opacity="0.35"/>
        <line x1="640" y1="110" x2="800" y2="30" stroke="#ffffff" stroke-width="1.5" opacity="0.35"/>
        <line x1="800" y1="30" x2="960" y2="120" stroke="#ffffff" stroke-width="1.5" opacity="0.35"/>
        <line x1="960" y1="120" x2="1120" y2="50" stroke="#ffffff" stroke-width="1.5" opacity="0.35"/>
        <circle cx="60" cy="120" r="4" fill="#ffffff" opacity="0.6"/>
        <circle cx="180" cy="40" r="4" fill="#ffffff" opacity="0.6"/>
        <circle cx="320" cy="100" r="4" fill="#ffffff" opacity="0.6"/>
        <circle cx="480" cy="20" r="4" fill="#ffffff" opacity="0.6"/>
        <circle cx="640" cy="110" r="4" fill="#ffffff" opacity="0.6"/>
        <circle cx="800" cy="30" r="4" fill="#ffffff" opacity="0.6"/>
        <circle cx="960" cy="120" r="4" fill="#ffffff" opacity="0.6"/>
        <circle cx="1120" cy="50" r="4" fill="#ffffff" opacity="0.6"/>
      </svg>
    </div>

    <div class="profile-header">
      <div class="profile-avatar" data-profile-avatar>TN</div>
      <div class="profile-identity">
        <div>
          <h1 data-profile-name>Thandiwe Nkosi</h1>
          <p class="headline" data-profile-headline>Senior Frontend Engineer, Nodus Labs</p>
          <p class="location-row">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"></path>
              <circle cx="12" cy="10" r="3"></circle>
            </svg>
            Johannesburg, Gauteng &middot; 500+ connections
          </p>
        </div>
        <div class="profile-actions">
          <button type="button" class="btn btn-primary">Connect</button>
          <button type="button" class="btn btn-outline">Message</button>
        </div>
      </div>

      <div class="stat-block-row">
        <div class="stat-block">
          <div class="stat-num">6</div>
          <div class="stat-label">Years experience</div>
        </div>
        <div class="stat-block">
          <div class="stat-num">128</div>
          <div class="stat-label">Endorsements</div>
        </div>
        <div class="stat-block">
          <div class="stat-num">37</div>
          <div class="stat-label">Posts</div>
        </div>
      </div>
    </div>

    <section class="card profile-section">
      <h2>About</h2>
      <p>Frontend engineer focused on design systems and accessible interfaces. I spend most of my time turning loosely defined product ideas into components that hold up across a whole product, and I care about pages that stay fast on a mid-range phone, not just a demo laptop.</p>
    </section>

    <section class="card profile-section">
      <h2>Experience</h2>

      <div class="experience-item">
        <div class="company-node">NL</div>
        <div>
          <div class="role">Senior Frontend Engineer</div>
          <div class="org">Nodus Labs</div>
          <div class="duration">Jan 2023 &ndash; Present &middot; 2 yrs 7 mos</div>
        </div>
      </div>

      <div class="experience-item">
        <div class="company-node">HS</div>
        <div>
          <div class="role">Frontend Engineer</div>
          <div class="org">Harbor Systems</div>
          <div class="duration">Jun 2020 &ndash; Dec 2022 &middot; 2 yrs 7 mos</div>
        </div>
      </div>

      <div class="experience-item">
        <div class="company-node">FS</div>
        <div>
          <div class="role">Junior Developer</div>
          <div class="org">Fieldstone Digital</div>
          <div class="duration">Jan 2019 &ndash; May 2020 &middot; 1 yr 5 mos</div>
        </div>
      </div>
    </section>

    <section class="card profile-section">
      <h2>Skills</h2>
      <div class="skill-pill-row">
        <span class="skill-pill">JavaScript</span>
        <span class="skill-pill">CSS Architecture</span>
        <span class="skill-pill">Design Systems</span>
        <span class="skill-pill">Accessibility</span>
        <span class="skill-pill">React</span>
        <span class="skill-pill">Performance Tuning</span>
      </div>
    </section>
  </section>

  <aside class="side-rail side-right">
    <section class="card rail-card">
      <h4>Profile language</h4>
      <ul class="rail-list">
        <li>
          <span class="rail-node">EN</span>
          <div>
            <div class="rail-title">English</div>
            <div class="rail-sub">Primary</div>
          </div>
        </li>
      </ul>
    </section>

    <section class="card rail-card" style="margin-top:16px;">
      <h4>People also viewed</h4>
      <ul class="rail-list">
        <li>
          <span class="rail-node">MC</span>
          <div>
            <div class="rail-title">Michael Chen</div>
            <div class="rail-sub">Frontend Engineer, Harbor Systems</div>
          </div>
        </li>
        <li>
          <span class="rail-node">LB</span>
          <div>
            <div class="rail-title">Lerato Baloyi</div>
            <div class="rail-sub">UI Engineer, Fieldstone</div>
          </div>
        </li>
      </ul>
    </section>
  </aside>

</main>

<footer class="site-footer">
  Nodus &mdash; a front-end concept. &nbsp;<a href="../login/login.php" data-sign-out>Sign out</a>
</footer>

<script src="../scripts/script.js"></script>
</body>
</html>