<div class="container mt-5">
    <h2 class="mb-4">Application Dashboard</h2>
    <div class="summary-stats d-flex justify-content-around my-4">
        <div class="summary-card card text-center text-dark" style="background-color: #f0f4f8;">
            <div class="card-body">
                <h5 class="card-title">Total Applications</h5>
                <p class="card-text" id="totalApplications"><?= htmlspecialchars($totalApplications); ?></p>
            </div>
        </div>
        <div class="summary-card card text-center text-dark" style="background-color: #ffeeba;">
            <div class="card-body">
                <h5 class="card-title">Under Review</h5>
                <p class="card-text" id="underReviewApplications"><?= htmlspecialchars($underReviewApplications); ?></p>
            </div>
        </div>
        <div class="summary-card card text-center text-dark" style="background-color: #d4edda;">
            <div class="card-body">
                <h5 class="card-title">Approved</h5>
                <p class="card-text" id="approvedApplications"><?= htmlspecialchars($approvedApplications); ?></p>
            </div>
        </div>
        <div class="summary-card card text-center text-dark" style="background-color: #f8d7da;">
            <div class="card-body">
                <h5 class="card-title">Declined</h5>
                <p class="card-text" id="declinedApplications"><?= htmlspecialchars($declinedApplications); ?></p>
            </div>
        </div>
    </div>

    <ul class="nav nav-tabs" id="applicationTabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="all-tab" data-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="true">All</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="under-review-tab" data-toggle="tab" href="#under-review" role="tab" aria-controls="under-review" aria-selected="false">Under Review</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="approved-tab" data-toggle="tab" href="#approved" role="tab" aria-controls="approved" aria-selected="false">Approved</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="declined-tab" data-toggle="tab" href="#declined" role="tab" aria-controls="declined" aria-selected="false">Declined</a>
        </li>
    </ul>

    <div class="tab-content" id="applicationTabsContent">
        <!-- Content for All Applications -->
        <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
            <!-- Table or content for All Applications -->
            <table class="table">
                <thead>
                <tr>
                    <th>Application ID</th>
                    <th>Date Submitted</th>
                    <th>Status</th>
                    <th>Applicant Name</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($allApplications as $application): ?>
                    <?php
                    // Determine the class for the status
                    $statusClass = $statusClasses[$application['status']] ?? 'text-secondary';
                    ?>
                    <tr>
                        <td><?= htmlspecialchars($application['appsId']); ?></td>
                        <td><?= htmlspecialchars($application['created_at']); ?></td>
                        <td class="<?= $statusClass; ?>"><?= htmlspecialchars($application['status']); ?></td>
                        <td><?= htmlspecialchars($application['first_name'] . " " . $application['last_name']); ?></td>
                        <td>
                            <a href="#" class="text-info mr-2"><i class="fas fa-eye"></i></a>
                            <?php if ($application['status'] === 'Under Review'): ?>
                                <form action="updateApplicationStatus" method="POST" style="display:inline-block;">
                                    <input type="hidden" name="applicationId" value="<?= htmlspecialchars($application['id']); ?>">
                                    <input type="hidden" name="newStatus" value="Approved">
                                    <button type="submit" class="btn btn-success btn-sm">Approve</button>
                                </form>
                                <form action="updateApplicationStatus" method="POST" style="display:inline-block;">
                                    <input type="hidden" name="applicationId" value="<?= htmlspecialchars($application['id']); ?>">
                                    <input type="hidden" name="newStatus" value="Declined">
                                    <button type="submit" class="btn btn-danger btn-sm">Decline</button>
                                </form>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="tab-pane fade" id="under-review" role="tabpanel" aria-labelledby="under-review-tab">
            <!-- Table or content for Pending Applications -->
            <table class="table">
                <thead>
                <tr class="table-warning">
                    <th>Application ID</th>
                    <th>Date Submitted</th>
                    <th>Status</th>
                    <th>Applicant Name</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($allApplications as $application): ?>
                    <?php if ($application['status'] === 'Under Review'): ?>
                        <tr>
                            <td><?= htmlspecialchars($application['appsId']); ?></td>
                            <td><?= htmlspecialchars($application['created_at']); ?></td>
                            <td class="<?= htmlspecialchars($statusClasses[$application['status']]); ?>"><?= htmlspecialchars($application['status']); ?></td>
                            <td><?= htmlspecialchars($application['first_name'] . " " . $application['last_name']); ?></td>
                            <td>
                                <a href="#" class="text-success mr-2"><i class="fas fa-eye"></i></a>
                                <form action="updateApplicationStatus" method="POST" style="display:inline-block;">
                                    <input type="hidden" name="applicationId" value="<?= htmlspecialchars($application['appsId']); ?>">
                                    <input type="hidden" name="newStatus" value="Approved">
                                    <button type="submit" class="btn btn-success btn-sm">Approve</button>
                                </form>
                                <form action="/admin/updateApplicationStatus" method="POST" style="display:inline-block;">
                                    <input type="hidden" name="applicationId" value="<?= htmlspecialchars($application['appsId']); ?>">
                                    <input type="hidden" name="newStatus" value="Declined">
                                    <button type="submit" class="btn btn-danger btn-sm">Decline</button>
                                </form>
                            </td>

                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="tab-pane" id="declined">
            <!-- Table or content for Declined Applications -->
            <table class="table">
                <thead>
                <tr class="table-danger">
                    <th>Application ID</th>
                    <th>Date Submitted</th>
                    <th>Status</th>
                    <th>Applicant Name</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($allApplications as $application): ?>
                    <?php if ($application['status'] === 'Declined'): ?>
                        <tr>
                            <td><?= htmlspecialchars($application['id']); ?></td>
                            <td><?= htmlspecialchars($application['created_at']); ?></td>
                            <td class="<?= htmlspecialchars($statusClasses[$application['status']]); ?>"><?= htmlspecialchars($application['status']); ?></td>
                            <td><?= htmlspecialchars($application['first_name'] . " " . $application['last_name']); ?></td>
                            <td>
                                <a href="#" class="text-success mr-2"><i class="fas fa-eye"></i></a>
<!--                                <form action="updateApplicationStatus" method="POST" style="display:inline-block;">-->
<!--                                    <input type="hidden" name="applicationId" value="--><?php //= htmlspecialchars($application['id']); ?><!--">-->
<!--                                    <input type="hidden" name="newStatus" value="Approved">-->
<!--                                    <button type="submit" class="btn btn-success btn-sm">Approve</button>-->
<!--                                </form>-->
<!--                                <form action="updateApplicationStatus" method="POST" style="display:inline-block;">-->
<!--                                    <input type="hidden" name="applicationId" value="--><?php //= htmlspecialchars($application['id']); ?><!--">-->
<!--                                    <input type="hidden" name="newStatus" value="Declined">-->
<!--                                    <button type="submit" class="btn btn-danger btn-sm">Decline</button>-->
<!--                                </form>-->
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="tab-pane" id="approved">
            <!-- Table or content for Approved Applications -->
            <table class="table">
                <thead>
                <tr class="table-success">
                    <th>Application ID</th>
                    <th>Date Submitted</th>
                    <th>Status</th>
                    <th>Applicant Name</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($allApplications as $application): ?>
                    <?php if ($application['status'] === 'Approved'): ?>
                        <tr>
                            <td><?= htmlspecialchars($application['id']); ?></td>
                            <td><?= htmlspecialchars($application['created_at']); ?></td>
                            <td class="<?= htmlspecialchars($statusClasses[$application['status']]); ?>"><?= htmlspecialchars($application['status']); ?></td>
                            <td><?= htmlspecialchars($application['first_name'] . " " . $application['last_name']); ?></td>
                            <td>
<!--                                <a href="#" class="text-success mr-2"><i class="fas fa-eye"></i></a>-->
                                <a href="javascript:void(0);" class="text-info mr-2 showUserDetails" data-id="<?= htmlspecialchars($application['id']); ?>"><i class="fas fa-eye"></i></a>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- User Details Modal -->
<div class="modal fade" id="userDetailsModal" tabindex="-1" aria-labelledby="userDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userDetailsModalLabel">User Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- User details go here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.showUserDetails').click(function() {
            var userId = $(this).data('id');
            $.ajax({
                url: 'fetchUserDetails.php', // Adjust URL as needed
                type: 'POST',
                data: { userId: userId },
                success: function(data) {
                    // Assuming 'data' is the HTML content to be displayed in the modal
                    $('#userDetailsModal .modal-body').html(data);
                    $('#userDetailsModal').modal('show');
                }
            });
        });
    });
</script>



