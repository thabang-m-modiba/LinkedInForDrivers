<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Nodus | Sign in</title>
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=Inter:wght@400;500;600;700&family=IBM+Plex+Mono:wght@500&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="css/styles.css" />
</head>
<body>

<div class="auth-shell">

  <section class="auth-brand">
    <svg class="node-graphic" viewBox="0 0 600 800" preserveAspectRatio="xMidYMid slice" aria-hidden="true">
      <line x1="80" y1="120" x2="240" y2="260" stroke="#03adfc" stroke-width="1.5" opacity="0.5"/>
      <line x1="240" y1="260" x2="120" y2="420" stroke="#03adfc" stroke-width="1.5" opacity="0.5"/>
      <line x1="240" y1="260" x2="420" y2="200" stroke="#03adfc" stroke-width="1.5" opacity="0.5"/>
      <line x1="420" y1="200" x2="520" y2="360" stroke="#03adfc" stroke-width="1.5" opacity="0.5"/>
      <line x1="120" y1="420" x2="260" y2="560" stroke="#03adfc" stroke-width="1.5" opacity="0.5"/>
      <line x1="260" y1="560" x2="460" y2="520" stroke="#03adfc" stroke-width="1.5" opacity="0.5"/>
      <line x1="460" y1="520" x2="520" y2="360" stroke="#03adfc" stroke-width="1.5" opacity="0.5"/>
      <line x1="260" y1="560" x2="180" y2="700" stroke="#03adfc" stroke-width="1.5" opacity="0.5"/>
      <line x1="460" y1="520" x2="480" y2="700" stroke="#03adfc" stroke-width="1.5" opacity="0.5"/>
      <circle cx="80" cy="120" r="5" fill="#03adfc"/>
      <circle cx="240" cy="260" r="7" fill="#03adfc"/>
      <circle cx="420" cy="200" r="5" fill="#03adfc"/>
      <circle cx="120" cy="420" r="6" fill="#03adfc"/>
      <circle cx="520" cy="360" r="5" fill="#03adfc"/>
      <circle cx="260" cy="560" r="8" fill="#03adfc"/>
      <circle cx="460" cy="520" r="6" fill="#03adfc"/>
      <circle cx="180" cy="700" r="5" fill="#03adfc"/>
      <circle cx="480" cy="700" r="5" fill="#03adfc"/>
    </svg>

    <div class="brand">
      <svg class="brand-mark" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <circle cx="8" cy="8" r="3.4" fill="currentColor"/>
        <circle cx="24" cy="8" r="3.4" fill="currentColor"/>
        <circle cx="16" cy="24" r="3.4" fill="currentColor"/>
        <line x1="8" y1="8" x2="16" y2="24" stroke="currentColor" stroke-width="2"/>
        <line x1="24" y1="8" x2="16" y2="24" stroke="currentColor" stroke-width="2"/>
        <line x1="8" y1="8" x2="24" y2="8" stroke="currentColor" stroke-width="2"/>
      </svg>
      <span class="brand-word">Nodus</span>
    </div>

    <div class="brand-copy">
      <h2>Where working professionals keep their real network in one place.</h2>
      <p>Track the people you have worked with, share what you are building, and find your next opportunity through connections you already trust.</p>
    </div>
  </section>

  <section class="auth-panel">
    <div class="auth-form-wrap">
      <div class="brand">
        <svg class="brand-mark" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
          <circle cx="8" cy="8" r="3.4" fill="currentColor"/>
          <circle cx="24" cy="8" r="3.4" fill="currentColor"/>
          <circle cx="16" cy="24" r="3.4" fill="currentColor"/>
          <line x1="8" y1="8" x2="16" y2="24" stroke="currentColor" stroke-width="2"/>
          <line x1="24" y1="8" x2="16" y2="24" stroke="currentColor" stroke-width="2"/>
          <line x1="8" y1="8" x2="24" y2="8" stroke="currentColor" stroke-width="2"/>
        </svg>
        <span class="brand-word">Nodus</span>
      </div>

      <h1>Sign in</h1>
      <p class="auth-subtitle">Pick up where you left off.</p>

      <div class="form-status" id="login-status" role="status"></div>

      <form id="login-form" novalidate>
        <div class="form-field">
          <label for="login-email">Email</label>
          <input type="email" id="login-email" name="email" autocomplete="email" placeholder="you@company.com" />
          <p class="field-error" id="login-email-error"></p>
        </div>

        <div class="form-field">
          <label for="login-password">Password</label>
          <div class="password-field">
            <input type="password" id="login-password" name="password" autocomplete="current-password" placeholder="Enter your password" />
            <button type="button" class="password-toggle" data-password-toggle="login-password" aria-label="Show password">Show</button>
          </div>
          <p class="field-error" id="login-password-error"></p>
        </div>

        <div class="form-meta-row">
          <label class="checkbox-row">
            <input type="checkbox" id="login-remember" name="remember" />
            Keep me signed in
          </label>
          <a href="#">Forgot password?</a>
        </div>

        <button type="submit" class="btn btn-primary btn-block">Sign in</button>
      </form>

      <div class="form-divider">or</div>

      <button type="button" class="btn btn-outline btn-block">Continue with single sign-on</button>

      <p class="auth-switch">New to Nodus? <a href="signup.html">Create an account</a></p>
    </div>
  </section>

</div>

<script src="js/script.js"></script>
</body>
</html>