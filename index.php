<?php 
    include 'includes/Operation.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - Account</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap1.min.css">
    <!-- bootstarp js -->
    <script src="js/bootstrap.min.js"></script>

</head>
<body>
    <!-- Login 13 - Bootstrap Brain Component -->
    <section class="bg-light py-3 py-md-5" style="min-height: 100vh;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                    <div class="card border border-light-subtle rounded-3 shadow-sm">
                        <div class="card-body p-3 p-md-4 p-xl-5">
                            <div class="text-center mb-3">
                            <a href="#!">
                                <img src="images/index_logo.png" alt="FUJIFILM LOGO Logo" width="280" height="90">
                            </a>
                            </div>
                            <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Sign in to your account</h2>

                            <div id="invalidAlert" class="alert alert-danger" style="display:none;">Invalid Credentials.</div>

                            <form method="post" id="loginForm">
                                <div class="row gy-2 overflow-hidden">
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
                                            <label for="username" class="form-label">Username</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control" name="password" id="password" value="" placeholder="Password" required>
                                            <label for="password" class="form-label">Password</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-flex gap-2 justify-content-between">
                                            <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" name="rememberMe" id="rememberMe">
                                            <label class="form-check-label text-secondary" for="rememberMe">
                                                Keep me logged in
                                            </label>
                                            </div>
                                            <a href="#!" class="link-primary text-decoration-none">Forgot password?</a>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid my-3">
                                            <button class="btn btn-primary btn-lg" type="submit" name="submit" value="login">Log in</button>
                                        </div>
                                    </div>
                                    <!-- <div class="col-12">
                                        <p class="m-0 text-secondary text-center">Don't have an account? <a href="#!" class="link-primary text-decoration-none">Sign up</a></p>
                                    </div> -->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>
<script>
// Show alert if ?invalid=1 is in the URL
if (window.location.search.indexOf('invalid=1') !== -1) {
    document.getElementById('invalidAlert').style.display = '';
    // Remove ?invalid=1 from the URL without reloading the page
    if (window.history.replaceState) {
        const url = new URL(window.location);
        url.searchParams.delete('invalid');
        window.history.replaceState({}, document.title, url.pathname + url.search);
    }
}

// Loading overlay logic
document.getElementById('loginForm').addEventListener('submit', function(e) {
    // Create loading overlay
    var loader = document.createElement('div');
    loader.id = 'loadingOverlay';
    loader.style.position = 'fixed';
    loader.style.top = 0;
    loader.style.left = 0;
    loader.style.width = '100vw';
    loader.style.height = '100vh';
    loader.style.background = 'rgba(255,255,255,0.8)';
    loader.style.display = 'flex';
    loader.style.alignItems = 'center';
    loader.style.justifyContent = 'center';
    loader.style.zIndex = 9999;
    loader.innerHTML = '<div style="display:flex; flex-direction:column; align-items:center;">' +
        '<div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status"><span class="visually-hidden">Loading...</span></div>' +
        '<div style="margin-top:1rem; font-size:1.2rem; color:#007bff;">Please wait, logging in...</div>' +
    '</div>';
    document.body.appendChild(loader);
});
</script>
</html>