<main class="content">
    <div class="work-and-income-container">
        <h2>Work, Income, and Housing Details</h2>
        <p>Provide details about your employment, income, and housing. This information helps us offer you the best possible service.</p>
        <form action="" method="POST" class="work-and-income-form">
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

            <div class="form-group">
                <label for="employmentStatus">Employment Status</label>
                <select id="employmentStatus" name="employmentStatus">
                    <option value="">Select</option>
                    <option value="employed">Employed</option>
                    <option value="self-employed">Self-employed</option>
                    <option value="unemployed">Unemployed</option>
                    <option value="student">Student</option>
                    <option value="retired">Retired</option>
                </select>
            </div>

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
                <input type="number" id="income" name="income" placeholder="Your annual income">
            </div>

            <div class="form-group">
                <label for="creditApproval">Credit Approval (Past 6 months)</label>
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

            <button type="submit" name="submit" class="btn-next">Next</button>
        </form>
    </div>
</main>
