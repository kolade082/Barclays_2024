<main class="content">
    <div class="address-container">
        <h2>What's your current home address?</h2>
        <p>Help us find you by providing 3 years of UK address history.</p>
        <form action="" method="POST" class="address-form">
            <!-- Placeholder for the getAddress.io postcode lookup -->
            <div id="postcode_lookup_field"></div>

            <div id="manualAddressFields" style="display: none;">
            <div class="form-group">
                <label>First Address Line</label>
                <input id="formatted_address_0" type="text" name="address_line1">
            </div>

            <div class="form-group">
                <label>Second Address Line (Optional)</label>
                <input id="formatted_address_1" type="text" name="address_line2">
            </div>

            <div class="form-group">
                <label>Town</label>
                <input id="town_or_city" type="text" name="city">
            </div>

            <div class="form-group">
                <label>County</label>
                <input id="county" type="text" name="county">
            </div>

            <div class="form-group">
                <label>Postcode</label>
                <input id="postcode" type="text" name="postcode">
            </div>
            </div>
            <div class="manual-entry-link">
                Can't find your address? <a href="#" onclick="manualEntry(event)">Add it manually.</a>
            </div>

            <button type="submit" name="submit" class="btn-next">Next</button>
        </form>
    </div>
</main>

<script src="https://cdn.getaddress.io/scripts/getaddress-find-2.0.0.min.js"></script>
<script>
    getAddress.find('postcode_lookup_field', 'z4Jme2BFQ0y1YGtjvUaVzA42308', {
        input_labels: {
            postcode: "Enter your postcode",
            line_1: "First Address Line",
            line_2: "Second Address Line",
            line_3: "Third Address Line",
            post_town: "Town",
            county: "County"
        }


    });

    function manualEntry(event) {
        event.preventDefault();
        document.getElementById('manualAddressFields').style.display = 'block';
    }
</script>
