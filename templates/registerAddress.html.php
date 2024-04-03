<?php
//session_start();
$excludeNavLinks = true; ?>
<main class="content">
    <div class="address-container">
        <h2>What's your current home address?</h2>
        <p>Help us find you by providing 3 years of UK address history.</p>
        <form action="" method="POST" class="address-form">
            <div class="form-group">
                <label for="postcode">Postcode</label>
                <input type="text" name="postcode" id="postcode" placeholder="e.g. SE11 5JA" required>
            </div>
            <div class="form-group">
                <label for="address">Choose your address</label>
                <select name="address" id="address" required>
                    <!-- Populate with options based on postcode lookup -->
                </select>
            </div>
            <div class="manual-entry-link">
                Can't find your address? <a href="#" onclick="manualEntry()">Add it manually.</a>
            </div>
            <button type="submit" name="submit" class="btn-next">Next</button>
        </form>
    </div>
</main>
<script>
    function manualEntry() {
        // Add functionality to switch to manual address entry
    }
</script>

