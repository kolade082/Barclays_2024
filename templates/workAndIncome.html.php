<main class="content">
    <div class="housing-and-work-details-container">
    <h2>Work, Income, and Housing Details</h2>
    <p>Provide details about your employment, income, and housing. This information helps us offer you the best possible service.</p>
    <form action="" method="POST" class="housing-and-work-details-form">

        <!-- Housing Details -->
        <div class="form-section">
            <h2>Housing Details</h2>
            <div class="form-group">
                <label for="housingStatus">Housing Status</label>
                <select id="housingStatus" name="housingStatus">
                    <option value="">Select</option>
                    <option value="owner">Homeowner</option>
                    <option value="renting">Renting</option>
                    <option value="living_with_family">Living with Family</option>
                    <option value="other">Other</option>
                </select>
            </div>
        </div>

        <!-- Work and Income Details -->
        <div class="form-section">
            <h2>Work and Income Details</h2>
            <div class="form-group">
                <label for="employmentStatus">Employment Status</label>
                <select id="employmentStatus" name="employmentStatus">
                    <option value="">Select</option>
                    <option value="employed">Employed</option>
                    <option value="self-employed">Self-employed</option>
                    <option value="unemployed">Unemployed</option>
                    <option value="retired">Retired</option>
                </select>
            </div>

            <div class="conditional-fields show-if-employed">
                <div class="form-group">
                    <label for="occupation">Occupation</label>
                    <input type="text" id="occupation" name="occupation" placeholder="Your occupation">
                </div>
                <div class="form-group">
                    <label for="employer">Employer Name</label>
                    <input type="text" id="employer" name="employer" placeholder="If applicable">
                </div>
                <div class="form-group">
                    <label for="income">Annual Income (£)</label>
                    <input type="number" id="income" name="annualIncome" placeholder="Your annual income">
                </div>
            </div>

            <div class="form-group" id="employmentDurationGroup" style="display: none;">
                <label for="employmentDuration">Employment Duration</label>
                <input type="text" id="employmentDuration" name="employmentDuration" placeholder="Duration at current job (months)">
            </div>

        </div>

        <!-- Additional Details -->
        <div class="form-section">
            <h3>Additional Details</h3>
            <div class="form-group">
                <label for="creditApproval">Credit Approval (Past 6 Months)</label>
                <select id="creditApproval" name="creditApproval">
                    <option value="">Select</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
            </div>

            <div class="form-group">
                <label for="reasonForUse">Reason for Use</label>
                <select id="reasonForUse" name="reasonForUse">
                    <option value="">Select a reason</option>
                    <option value="debt_consolidation">Debt Consolidation</option>
                    <option value="home_improvement">Home Improvement</option>
                    <option value="major_purchase">Major Purchase</option>
                    <option value="car_financing">Car Financing</option>
                    <option value="business">Business</option>
                    <option value="education">Education</option>
                    <option value="travel">Travel</option>
                    <option value="medical_expenses">Medical Expenses</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <div class="form-group">
                <label for="monthlyOutgoings">Outgoings Monthly (£)</label>
                <input type="number" id="monthlyOutgoings" name="monthlyOutgoings" placeholder="Your monthly outgoings">
            </div>

            <div class="form-group">
                <label for="dependents">Number of Dependents</label>
                <input type="number" id="dependents" name="dependents" placeholder="Number of dependents">
            </div>
        </div>

        <button type="submit" name="submit" class="btn-next">Next</button>
    </form>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var employmentStatusSelector = document.getElementById('employmentStatus');
        var conditionalFields = document.querySelector('.conditional-fields.show-if-employed');
        var employmentDurationGroup = document.getElementById('employmentDurationGroup'); // Assuming you have this field for employment duration

        function toggleFields() {
            var status = employmentStatusSelector.value;

            // Show conditional fields for 'employed', 'self-employed', and 'retired'
            conditionalFields.style.display = (status === 'employed' || status === 'self-employed' || status === 'retired') ? 'block' : 'none';

            // Hide employment duration field specifically for 'retired'
            if (employmentDurationGroup) {
                employmentDurationGroup.style.display = (status === 'employed' || status === 'self-employed') ? 'block' : 'none';
            }
        }

        // Initial check to handle pre-filled or browser back navigation scenarios
        toggleFields();

        // Event listener to handle changes in the employment status dropdown
        employmentStatusSelector.addEventListener('change', toggleFields);
    });

</script>
