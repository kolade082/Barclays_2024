<main class="content">
    <div class="address-container">
        <h2>What's your current home address?</h2>
        <p>Help us find you by providing 3 years of UK address history.</p>
        <form action="" method="POST" class="address-form">
            <div class="form-group">
                <label for="postcode">Postcode</label>
                <input type="text" id="postcode" name="postcode">
                <button type="button" id="findAddress">Find Address</button>
            </div>

            <div id="manualAddressFields" class="hidden">
                <div class="form-group">
                    <label for="address-line1">Address Line 1</label>
                    <input type="text" id="address-line1" name="address-line1">
                </div>

                <div class="form-group">
                    <label for="address-line2">Address Line 2 (Optional)</label>
                    <input type="text" id="address-line2" name="address-line2">
                </div>

                <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" id="city" name="city">
                </div>

                <div class="form-group">
                    <label for="country">Country</label>
                    <input type="text" id="country" name="country">
                </div>
            </div>

            <div class="manual-entry-link">
                Can't find your address? <a href="#" onclick="manualEntry(event)">Add it manually.</a>
            </div>
            <button type="submit" name="submit" class="btn-next">Next</button>
        </form>
    </div>
</main>
<script>
    function manualEntry(event) {
        event.preventDefault();

        document.getElementById('manualAddressFields').style.display = 'block';

        document.querySelector('.manual-entry-link').style.display = 'none';
    }
</script>

