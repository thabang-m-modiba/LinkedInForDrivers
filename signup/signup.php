<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Nodus | Create your account</title>
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=Inter:wght@400;500;600;700&family=IBM+Plex+Mono:wght@500&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="../styles/style.css" />
</head>
<body>

<div class="auth-shell">

  <section class="auth-brand">
    <svg class="node-graphic" viewBox="0 0 600 800" preserveAspectRatio="xMidYMid slice" aria-hidden="true">
      <line x1="100" y1="100" x2="260" y2="220" stroke="#03adfc" stroke-width="1.5" opacity="0.5"/>
      <line x1="260" y1="220" x2="460" y2="160" stroke="#03adfc" stroke-width="1.5" opacity="0.5"/>
      <line x1="260" y1="220" x2="150" y2="380" stroke="#03adfc" stroke-width="1.5" opacity="0.5"/>
      <line x1="460" y1="160" x2="500" y2="340" stroke="#03adfc" stroke-width="1.5" opacity="0.5"/>
      <line x1="150" y1="380" x2="300" y2="500" stroke="#03adfc" stroke-width="1.5" opacity="0.5"/>
      <line x1="500" y1="340" x2="440" y2="520" stroke="#03adfc" stroke-width="1.5" opacity="0.5"/>
      <line x1="300" y1="500" x2="440" y2="520" stroke="#03adfc" stroke-width="1.5" opacity="0.5"/>
      <line x1="300" y1="500" x2="220" y2="660" stroke="#03adfc" stroke-width="1.5" opacity="0.5"/>
      <line x1="440" y1="520" x2="500" y2="680" stroke="#03adfc" stroke-width="1.5" opacity="0.5"/>
      <circle cx="100" cy="100" r="5" fill="#03adfc"/>
      <circle cx="260" cy="220" r="7" fill="#03adfc"/>
      <circle cx="460" cy="160" r="5" fill="#03adfc"/>
      <circle cx="150" cy="380" r="6" fill="#03adfc"/>
      <circle cx="500" cy="340" r="5" fill="#03adfc"/>
      <circle cx="300" cy="500" r="8" fill="#03adfc"/>
      <circle cx="440" cy="520" r="6" fill="#03adfc"/>
      <circle cx="220" cy="660" r="5" fill="#03adfc"/>
      <circle cx="500" cy="680" r="5" fill="#03adfc"/>
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
      <h2>Build a network that reflects the work you have actually done.</h2>
      <p>Add the roles, projects, and people that shaped your career, and let the right opportunities find you through people who already know your work.</p>
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

      <h1>Create your account</h1>
      <p class="auth-subtitle">Takes less than a minute.</p>

      <div class="form-status" id="signup-status" role="status"></div>

      <form id="signup-form" action="../includes/signup.inc.php" method="post" novalidate>
        <div class="form-field">
          <label for="signup-name">Full name</label>
          <input type="text" id="signup-name" name="name" autocomplete="name" placeholder="Your full name" />
          <p class="field-error" id="signup-name-error"></p>
        </div>

        <div class="form-field">
          <label for="signup-email">Email</label>
          <input type="email" id="signup-email" name="email" autocomplete="email" placeholder="you@company.com" />
          <p class="field-error" id="signup-email-error"></p>
        </div>

        <div class="form-field">
          <label for="signup-password">Password</label>
          <div class="password-field">
            <input type="password" id="signup-password" name="password" autocomplete="new-password" placeholder="At least 8 characters" />
            <button type="button" class="password-toggle" data-password-toggle="signup-password" aria-label="Show password">Show</button>
          </div>
          <div class="strength-meter" id="password-strength"><span></span><span></span><span></span></div>
          <p class="field-error" id="signup-password-error"></p>
        </div>

        <div class="form-field">
          <label for="signup-confirm">Confirm password</label>
          <div class="password-field">
            <input type="password" id="signup-confirm" name="confirm" autocomplete="new-password" placeholder="Re-enter your password" />
            <button type="button" class="password-toggle" data-password-toggle="signup-confirm" aria-label="Show password">Show</button>
          </div>
          <p class="field-error" id="signup-confirm-error"></p>
        </div>

        <button type="submit" class="btn btn-primary btn-block">Create account</button>

        <p class="form-note">By creating an account, you agree to Nodus's Terms of Service and Privacy Policy.</p>
      </form>

      <p class="auth-switch">Already have an account? <a href="../login/login.php">Sign in</a></p>
    </div>
  </section>

</div>

<script src="../scripts/script.js"></script>
</body>
</html>