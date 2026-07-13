<?php
$pageTitle = "Application Confirmation | Shore Innovation Center";

$errors = [];

/**
 * Safely cleans text submitted through the form.
 */
function cleanInput($value)
{
    return trim($value);
}

/**
 * Safely displays submitted values in HTML.
 */
function escapeOutput($value)
{
    return htmlspecialchars(
        $value,
        ENT_QUOTES,
        "UTF-8"
    );
}

/**
 * Checks whether a submitted value matches an allowed list.
 */
function valueIsAllowed($value, $allowedValues)
{
    return in_array($value, $allowedValues, true);
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    $errors[] = "The application must be submitted through the application form.";
}

// Retrieve and clean text values.
$studentName = cleanInput($_POST["studentName"] ?? "");
$studentEmail = cleanInput($_POST["studentEmail"] ?? "");
$phoneNumber = cleanInput($_POST["phoneNumber"] ?? "");
$ksuId = cleanInput($_POST["ksuId"] ?? "");
$major = cleanInput($_POST["major"] ?? "");
$classification = cleanInput($_POST["classification"] ?? "");
$gpa = cleanInput($_POST["gpa"] ?? "");
$graduationDate = cleanInput($_POST["graduationDate"] ?? "");
$preferredLab = cleanInput($_POST["preferredLab"] ?? "");
$researchInterests = cleanInput(
    $_POST["researchInterests"] ?? ""
);
$experience = cleanInput($_POST["experience"] ?? "");
$hoursAvailable = cleanInput(
    $_POST["hoursAvailable"] ?? ""
);
$additionalInformation = cleanInput(
    $_POST["additionalInformation"] ?? ""
);

// Retrieve checkbox arrays.
$skills = $_POST["skills"] ?? [];
$availableDays = $_POST["availableDays"] ?? [];

// Make sure checkbox values were submitted as arrays.
if (!is_array($skills)) {
    $skills = [];
}

if (!is_array($availableDays)) {
    $availableDays = [];
}

// Allowed radio button, dropdown, and checkbox values.
$allowedClassifications = [
    "Undergraduate",
    "Graduate"
];

$allowedLabs = [
    "Advanced Computing Lab",
    "Cybersecurity Lab",
    "Cleanroom",
    "High-Bay Makerspace",
    "Interdisciplinary Research Team"
];

$allowedSkills = [
    "Programming",
    "Data Analysis",
    "Cybersecurity",
    "Laboratory Research",
    "Technical Writing",
    "CAD or 3D Modeling",
    "Electronics or Robotics",
    "Research Documentation"
];

$allowedHours = [
    "5-10 hours",
    "11-15 hours",
    "16-20 hours",
    "More than 20 hours"
];

$allowedDays = [
    "Monday",
    "Tuesday",
    "Wednesday",
    "Thursday",
    "Friday"
];

// Server-side validation begins here.
if (strlen($studentName) < 2) {
    $errors[] = "Enter your full name.";
}

if (!filter_var($studentEmail, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Enter a valid email address.";
}

if (
    $phoneNumber === "" ||
    !preg_match('/^[0-9+\-().\s]{7,20}$/', $phoneNumber)
) {
    $errors[] = "Enter a valid phone number.";
}

if (strlen($ksuId) < 4) {
    $errors[] = "Enter a valid KSU student ID.";
}

if (strlen($major) < 2) {
    $errors[] = "Enter your academic major.";
}

if (
    !valueIsAllowed(
        $classification,
        $allowedClassifications
    )
) {
    $errors[] = "Select a valid student classification.";
}

if (
    $gpa === "" ||
    !is_numeric($gpa) ||
    (float) $gpa < 0 ||
    (float) $gpa > 4
) {
    $errors[] = "Enter a GPA between 0.00 and 4.00.";
}

if (
    $graduationDate === "" ||
    !preg_match('/^\d{4}-\d{2}$/', $graduationDate)
) {
    $errors[] = "Select a valid expected graduation date.";
}

if (!valueIsAllowed($preferredLab, $allowedLabs)) {
    $errors[] = "Select a valid preferred research lab.";
}

if (count($skills) === 0) {
    $errors[] = "Select at least one skill.";
} else {
    foreach ($skills as $skill) {
        if (!valueIsAllowed($skill, $allowedSkills)) {
            $errors[] = "An invalid skill selection was submitted.";
            break;
        }
    }
}

if (strlen($researchInterests) < 25) {
    $errors[] =
        "Describe your research interests using at least 25 characters.";
}

if (!valueIsAllowed($hoursAvailable, $allowedHours)) {
    $errors[] = "Select a valid weekly availability.";
}

if (count($availableDays) === 0) {
    $errors[] = "Select at least one available day.";
} else {
    foreach ($availableDays as $day) {
        if (!valueIsAllowed($day, $allowedDays)) {
            $errors[] =
                "An invalid availability day was submitted.";
            break;
        }
    }
}

include "includes/header.php";
include "includes/navigation.php";
?>

<main class="page-container">
    <?php if (count($errors) > 0): ?>

        <section class="form-error-section">
            <h2>Application Could Not Be Submitted</h2>

            <p>
                Please correct the following application errors:
            </p>

            <ul class="server-error-list">
                <?php foreach ($errors as $error): ?>
                    <li><?php echo escapeOutput($error); ?></li>
                <?php endforeach; ?>
            </ul>

            <p>
                <a
                    href="application.php"
                    class="primary-button inline-button"
                >
                    Return to the Application Form
                </a>
            </p>
        </section>

    <?php else: ?>

        <?php
        $formattedGpa = number_format((float) $gpa, 2);

        $formattedGraduationDate = date(
            "F Y",
            strtotime($graduationDate . "-01")
        );

        $skillsDisplay = implode(", ", $skills);
        $daysDisplay = implode(", ", $availableDays);

        if ($experience === "") {
            $experience = "No relevant experience provided.";
        }

        if ($additionalInformation === "") {
            $additionalInformation =
                "No additional information provided.";
        }
        ?>

        <section class="confirmation-section">
            <h2>Application Submitted Successfully</h2>

            <p class="confirmation-message">
                Thank you,
                <strong>
                    <?php echo escapeOutput($studentName); ?>
                </strong>.
                Your faculty research assistant application has been
                processed successfully.
            </p>

            <p>
                Review the information below for accuracy. For this class
                project, the application is displayed only and is not
                stored in a database.
            </p>

            <div class="table-wrapper">
                <table class="confirmation-table">
                    <caption>
                        Faculty Research Assistant Application Confirmation
                    </caption>

                    <tbody>
                        <tr>
                            <th scope="row">Full Name</th>
                            <td>
                                <?php echo escapeOutput($studentName); ?>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">KSU Email Address</th>
                            <td>
                                <?php echo escapeOutput($studentEmail); ?>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">Phone Number</th>
                            <td>
                                <?php echo escapeOutput($phoneNumber); ?>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">KSU Student ID</th>
                            <td>
                                <?php echo escapeOutput($ksuId); ?>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">Academic Major</th>
                            <td>
                                <?php echo escapeOutput($major); ?>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">Classification</th>
                            <td>
                                <?php echo escapeOutput($classification); ?>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">Current GPA</th>
                            <td>
                                <?php echo escapeOutput($formattedGpa); ?>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">Expected Graduation</th>
                            <td>
                                <?php
                                echo escapeOutput(
                                    $formattedGraduationDate
                                );
                                ?>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">Preferred Research Lab</th>
                            <td>
                                <?php echo escapeOutput($preferredLab); ?>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">Skills and Experience</th>
                            <td>
                                <?php echo escapeOutput($skillsDisplay); ?>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">Research Interests</th>
                            <td>
                                <?php
                                echo nl2br(
                                    escapeOutput($researchInterests)
                                );
                                ?>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">Relevant Experience</th>
                            <td>
                                <?php
                                echo nl2br(
                                    escapeOutput($experience)
                                );
                                ?>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">Hours Available Per Week</th>
                            <td>
                                <?php echo escapeOutput($hoursAvailable); ?>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">Available Days</th>
                            <td>
                                <?php echo escapeOutput($daysDisplay); ?>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">Additional Information</th>
                            <td>
                                <?php
                                echo nl2br(
                                    escapeOutput(
                                        $additionalInformation
                                    )
                                );
                                ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="confirmation-actions">
                <a href="index.php" class="primary-button inline-button">
                    Return to Home
                </a>

                <a
                    href="application.php"
                    class="secondary-button inline-button"
                >
                    Submit Another Application
                </a>
            </div>
        </section>

    <?php endif; ?>
</main>

<?php include "includes/footer.php"; ?>