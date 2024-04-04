<?php

// Set the flag to exclude navigation links
$excludeNavLinks = true;

// Check if there are any errors stored in the session
$errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];

// Clear the errors from the session
unset($_SESSION['errors']);
?>

<main class="content">
    <div class="signup-container">
        <form action="" method="POST" class="signup-form">
            <h2>Sign up</h2>
            <!-- Display errors if they exist -->
            <?php if (!empty($errors)): ?>
                <div class="error">
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li><?= $error ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
            <label for="email">Let's start with your email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>
            <button type="submit" name="submit" class="btn-signup">Get started</button>
        </form>
    </div>
</main>

