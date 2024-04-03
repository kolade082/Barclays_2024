<div class="page-title">
            <h1>Log in to Your Account</h1>
</div>

<main class="content">

    <div class="signup-container">
    
        <h2>Log in Below</h2>

        <form action="" method="post">
            <div class="form-group">
                <label for="account_type">Select Account Type</label>
                <select name="account_type" id="account_type">
                    <option value = "Customer" selected>Customer</option>
                    <option value = "Admin">Admin</option>
                </select>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Enter your email" aria-label="Email" />
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Enter your password" aria-label="Password" />
                <a href="#" class="forgot-password">Forgot password?</a>
            </div>

            <div class="form-group">
                <input type="submit" name="submit" value="Log In" />
                
            </div>
        </form>
    </div>
</main>