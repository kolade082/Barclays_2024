<main class="main-dashboard">
    <div class="dashboard-sidebar">
        <div class="dashboard-links">
            <a class="btn btn-custom my-3" href="dashboard">Dashboard</a>
            <a class="btn btn-custom my-3" href="patients">Manage Patients</a>

            <a class="btn btn-custom my-3" href="#">Anomalies</a>
            <a class="btn btn-custom my-3" href="#">Help?</a>
        </div>
    </div>
    <section class="dashboard-content">
        <h1>NHS Patient Record Dashboard</h1>
        <!-- Section for Real-Time Alerts -->
        <div class="dashboard-section">
            <h2>Real-Time Alerts</h2>
            <div id="realTimeAlerts">
                <?=$html?>
            </div>
            <div id="realTimeAlerts">
                <div class="anomaly-item">
                    <div class="anomaly-description">
                        <p>Anomaly Detected: Discrepancy in patient record for Patient ID  124798000 </p>
                    </div>
                    <div class="view-details">
                        <button onclick="viewDetails(this)"
                                data-your-data="' . htmlspecialchars(json_encode($patient), ENT_QUOTES) . '"
                                data-nhs-data="' . htmlspecialchars(json_encode($nhsData), ENT_QUOTES) . '">
                            View Details
                        </button>
                    </div>
                </div>

            </div>
            <div id="realTimeAlerts">
                <div class="anomaly-item">
                    <div class="anomaly-description">
                        <p>Anomaly Detected: Discrepancy in patient record for Patient ID  927967800 </p>
                    </div>
                    <div class="view-details">
                        <button onclick="viewDetails(this)"
                                data-your-data="' . htmlspecialchars(json_encode($patient), ENT_QUOTES) . '"
                                data-nhs-data="' . htmlspecialchars(json_encode($nhsData), ENT_QUOTES) . '">
                            View Details
                        </button>
                    </div>
                </div>

            </div>

        </div>

        <div class="dashboard-section">
            <h2>Recent Activity</h2>
            <p>Overview of recent system usage, updates, and alerts.</p>
            <div class="recent-activities">
                <!-- Example Activity 1 -->
                <div class="activity">
                    <h3>New Patient Registration</h3>
                    <p>John Doe was registered in the system. <span class="activity-date">2023-11-29</span></p>
                </div>

                <!-- Example Activity 2 -->
                <div class="activity">
                    <h3>Appointment Scheduled</h3>
                    <p>An appointment was scheduled for Jane Smith. <span class="activity-date">2023-11-28</span></p>
                </div>

                <!-- More activities can be added here -->
            </div>
        </div>



        <!-- Modal Structure -->
        <div id="comparisonModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal()">&times;</span>
                <div class="comparison-container">
                    <div class="data-pane">
                        <!-- Data from your system will be loaded here -->
                        <h3>Your System Data</h3>
                        <div id="yourSystemData"></div>
                    </div>
                    <div class="data-pane">
                        <!-- Data from NHS system will be loaded here -->
                        <h3>NHS System Data</h3>
                        <div id="nhsSystemData"></div>
                    </div>
                </div>
                <!-- Action buttons -->
                <div class="modal-actions">
                    <button class="keep" onclick="keepData()">Keep</button>
                    <button class="overwrite" onclick="overwriteData()">Overwrite</button>
                </div>

            </div>
        </div>



    </section>
    <script>
        function formatData(yourData, nhsData) {
            let comparisonHtml = `<div class="data-table">
        <table>
        <thead>
            <tr>
                <th>Field</th>
                <th>Your System Data</th>
                <th>NHS System Data</th>
            </tr>
        </thead>
        <tbody>`;

            const fields = ['firstname', 'lastname', 'dob', 'phone_number', 'email'];

            fields.forEach(field => {
                const yourValue = yourData[field] || '';
                const nhsValue = nhsData[field] || '';
                const isCorrect = yourValue === nhsValue;

                let backgroundColor = isCorrect ? '#90ee90' : '#ffcccb';

                comparisonHtml += `<tr>
            <td class="field-name">${field.charAt(0).toUpperCase() + field.slice(1)}</td>
            <td style="background-color: ${backgroundColor}">${yourValue}</td>
            <td>${nhsValue}</td>
        </tr>`;
            });

            comparisonHtml += `</tbody>
        </table></div>`;
            return comparisonHtml;
        }


        function viewDetails(button) {
            const yourData = JSON.parse(button.getAttribute('data-your-data'));
            const nhsData = JSON.parse(button.getAttribute('data-nhs-data'));

            // Format the data into HTML
            const comparisonHtml = formatData(yourData, nhsData);
            document.getElementById('comparisonModal').querySelector('.comparison-container').innerHTML = comparisonHtml;

            // Set the current anomaly element for use in keepData function
            window.currentAnomalyElement = button.closest('.anomaly-item');

            // Display the modal
            document.getElementById('comparisonModal').style.display = 'block';
        }



        function closeModal() {
            document.getElementById('comparisonModal').style.display = 'none';
        }

        function keepData() {
            // Close the modal
            closeModal();

            // Hide the last opened anomaly. This assumes that the `viewDetails` function
            // sets a global variable to the currently viewed anomaly element.
            if (window.currentAnomalyElement) {
                window.currentAnomalyElement.style.display = 'none';
            }
        }

        function overwriteData() {
            // Implement logic to overwrite with NHS data
            console.log("Overwrite data logic goes here");
            closeModal(); // Close the modal after action
        }
    </script>

</main>