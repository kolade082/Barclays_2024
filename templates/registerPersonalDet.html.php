<?php
//session_start();
$excludeNavLinks = true;
?>

<main class="content">
    <div class="signup-container">
        <form action="registerPersonalDet" method="POST" class="signup-form">
            <h2>Create your account</h2>

            <div class="form-group">
                <label for="first-name">First name</label>
                <input type="text" name="first-name" id="first-name" placeholder="Enter your first name" required>
            </div>

            <div class="form-group">
                <label for="last-name">Last name</label>
                <input type="text" name="last-name" id="last-name" placeholder="Enter your last name" required>
            </div>

            <div class="form-group dob">
                <label for="dob">Date of birth</label>
                <div class="dob-selects">
                    <select name="dob-day" id="dob-day" required>
                        <option value="">Day</option>
                        <?php for ($day = 1; $day <= 31; $day++): ?>
                            <option value="<?= str_pad($day, 2, '0', STR_PAD_LEFT) ?>"><?= $day ?></option>
                        <?php endfor; ?>
                    </select>

                    <select name="dob-month" id="dob-month" required>
                        <option value="">Month</option>
                        <?php for ($month = 1; $month <= 12; $month++): ?>
                            <option value="<?= str_pad($month, 2, '0', STR_PAD_LEFT) ?>"><?= $month ?></option>
                        <?php endfor; ?>
                    </select>

                    <select name="dob-year" id="dob-year" required>
                        <option value="">Year</option>
                        <?php for ($year = date('Y'); $year >= date('Y') - 120; $year--): ?>
                            <option value="<?= $year ?>"><?= $year ?></option>
                        <?php endfor; ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="password">Create password</label>
                <input type="password" name="password" id="password" placeholder="Create a password" required>
                <ul class="password-criteria">
                    <li>An uppercase and lowercase character</li>
                    <li>At least one number</li>
                    <li>Between 8 and 50 characters</li>
                </ul>
            </div>

            <div class="terms">
                <p>By creating a Clear Score account, you agree to Clear Score's
                    <a href="link-to-terms" target="_blank">Terms and Conditions</a>. We manage and protect your information in accordance with our
                    <a href="link-to-privacy-policy" target="_blank">Privacy Policy</a>.</p>

                <p>You authorise and instruct ClearScore to retrieve and process information held about you by credit reference agencies, for the purpose of providing you with our services.</p>
            </div>



            <button type="submit" name="submit" class="btn-signup">Next</button>
        </form>
    </div>
</main>
