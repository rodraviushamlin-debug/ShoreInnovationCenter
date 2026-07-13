<?php
$pageTitle = "Eligibility Evaluator | Shore Innovation Center";

include "includes/header.php";
include "includes/navigation.php";
?>

<main class="page-container">

    <section class="content-section">

        <h2>Summer Student Assistant Eligibility Evaluator</h2>

        <p>
            Complete the form below to determine whether you meet the
            minimum requirements for a Summer Student Assistant position.
        </p>

        <form id="eligibilityForm">

            <div class="form-group">
                <label for="studentName">
                    Student Name
                </label>

                <input
                    type="text"
                    id="studentName"
                    name="studentName"
                    required
                >
            </div>

            <div class="form-group">
                <label for="studentEmail">
                    Student Email
                </label>

                <input
                    type="email"
                    id="studentEmail"
                    name="studentEmail"
                    required
                >
            </div>

            <div class="form-group">
                <label for="studentStatus">
                    Student Status
                </label>

                <select
                    id="studentStatus"
                    name="studentStatus"
                    required
                >
                    <option value="">
                        Select Status
                    </option>

                    <option value="undergraduate">
                        Undergraduate
                    </option>

                    <option value="graduate">
                        Graduate
                    </option>
                </select>
            </div>

            <!-- JavaScript will place the required courses here -->

            <div id="courseSection"></div>

            <div class="form-buttons">

                <button
                    type="submit"
                    class="primary-button"
                >
                    Evaluate Eligibility
                </button>

                <button
                    type="reset"
                    class="secondary-button"
                >
                    Reset
                </button>

            </div>

        </form>

        <!-- Eligibility message -->

        <div
            id="eligibilityResult"
            class="result-box"
            aria-live="polite"
        ></div>

        <!-- Hidden until student qualifies -->

        <div
            id="applicationLinkContainer"
            class="application-link hidden"
        >

            <h3>
                Congratulations!
            </h3>

            <p>
                You meet the minimum eligibility requirements.
                You may now complete the Faculty Research Assistant
                Application.
            </p>

            <a
                href="application.php"
                class="primary-button"
            >
                Open Faculty Research Assistant Application
            </a>

        </div>

    </section>

</main>

<script src="eligibility.js"></script>

<?php include "includes/footer.php"; ?>