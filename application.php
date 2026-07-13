<?php
$pageTitle = "Research Assistant Application | Shore Innovation Center";
include "includes/header.php";
include "includes/navigation.php";
?>

<main class="page-container">
    <section class="page-introduction">
        <h2>Faculty Research Assistant Application</h2>

        <p>
            Qualified students may use this form to apply for faculty
            research assistant opportunities associated with the Robin
            and Doug Shore Innovation Center.
        </p>

        <p>
            Complete every required field. Provide accurate academic,
            research, skills, and availability information. Fields marked
            with an asterisk (*) are required.
        </p>
    </section>

    <section class="form-section">
        <form
            id="researchApplicationForm"
            class="application-form"
            action="process-application.php"
            method="post"
            novalidate
        >
            <fieldset>
                <legend>Contact Information</legend>

                <div class="form-group">
                    <label for="studentName">
                        Full Name <span class="required">*</span>
                    </label>

                    <input
                        type="text"
                        id="studentName"
                        name="studentName"
                        maxlength="100"
                        autocomplete="name"
                        required
                    >

                    <small class="error-message" id="studentNameError"></small>
                </div>

                <div class="form-group">
                    <label for="studentEmail">
                        KSU Email Address <span class="required">*</span>
                    </label>

                    <input
                        type="email"
                        id="studentEmail"
                        name="studentEmail"
                        maxlength="120"
                        placeholder="example@students.kennesaw.edu"
                        autocomplete="email"
                        required
                    >

                    <small class="error-message" id="studentEmailError"></small>
                </div>

                <div class="form-group">
                    <label for="phoneNumber">
                        Phone Number <span class="required">*</span>
                    </label>

                    <input
                        type="tel"
                        id="phoneNumber"
                        name="phoneNumber"
                        maxlength="20"
                        placeholder="555-555-5555"
                        autocomplete="tel"
                        required
                    >

                    <small class="error-message" id="phoneNumberError"></small>
                </div>
            </fieldset>

            <fieldset>
                <legend>Academic Information</legend>

                <div class="form-group">
                    <label for="ksuId">
                        KSU Student ID <span class="required">*</span>
                    </label>

                    <input
                        type="text"
                        id="ksuId"
                        name="ksuId"
                        maxlength="15"
                        required
                    >

                    <small class="error-message" id="ksuIdError"></small>
                </div>

                <div class="form-group">
                    <label for="major">
                        Academic Major <span class="required">*</span>
                    </label>

                    <input
                        type="text"
                        id="major"
                        name="major"
                        maxlength="100"
                        required
                    >

                    <small class="error-message" id="majorError"></small>
                </div>

                <div class="form-group">
                    <span class="group-label">
                        Student Classification <span class="required">*</span>
                    </span>

                    <div class="option-group">
                        <label>
                            <input
                                type="radio"
                                name="classification"
                                value="Undergraduate"
                            >
                            Undergraduate
                        </label>

                        <label>
                            <input
                                type="radio"
                                name="classification"
                                value="Graduate"
                            >
                            Graduate
                        </label>
                    </div>

                    <small
                        class="error-message"
                        id="classificationError"
                    ></small>
                </div>

                <div class="form-group">
                    <label for="gpa">
                        Current GPA <span class="required">*</span>
                    </label>

                    <input
                        type="number"
                        id="gpa"
                        name="gpa"
                        min="0"
                        max="4"
                        step="0.01"
                        placeholder="Example: 3.50"
                        required
                    >

                    <small class="error-message" id="gpaError"></small>
                </div>

                <div class="form-group">
                    <label for="graduationDate">
                        Expected Graduation Date
                        <span class="required">*</span>
                    </label>

                    <input
                        type="month"
                        id="graduationDate"
                        name="graduationDate"
                        required
                    >

                    <small
                        class="error-message"
                        id="graduationDateError"
                    ></small>
                </div>
            </fieldset>

            <fieldset>
                <legend>Research Interests</legend>

                <div class="form-group">
                    <label for="preferredLab">
                        Preferred Research Lab
                        <span class="required">*</span>
                    </label>

                    <select
                        id="preferredLab"
                        name="preferredLab"
                        required
                    >
                        <option value="">Select a research lab</option>
                        <option value="Advanced Computing Lab">
                            Advanced Computing Lab
                        </option>
                        <option value="Cybersecurity Lab">
                            Cybersecurity Lab
                        </option>
                        <option value="Cleanroom">
                            Cleanroom
                        </option>
                        <option value="High-Bay Makerspace">
                            High-Bay Makerspace
                        </option>
                        <option value="Interdisciplinary Research Team">
                            Interdisciplinary Research Team
                        </option>
                    </select>

                    <small class="error-message" id="preferredLabError"></small>
                </div>

                <div class="form-group">
                    <span class="group-label">
                        Skills and Experience
                        <span class="required">*</span>
                    </span>

                    <p class="form-help">
                        Select at least one skill.
                    </p>

                    <div class="checkbox-grid">
                        <label>
                            <input
                                type="checkbox"
                                name="skills[]"
                                value="Programming"
                            >
                            Programming
                        </label>

                        <label>
                            <input
                                type="checkbox"
                                name="skills[]"
                                value="Data Analysis"
                            >
                            Data Analysis
                        </label>

                        <label>
                            <input
                                type="checkbox"
                                name="skills[]"
                                value="Cybersecurity"
                            >
                            Cybersecurity
                        </label>

                        <label>
                            <input
                                type="checkbox"
                                name="skills[]"
                                value="Laboratory Research"
                            >
                            Laboratory Research
                        </label>

                        <label>
                            <input
                                type="checkbox"
                                name="skills[]"
                                value="Technical Writing"
                            >
                            Technical Writing
                        </label>

                        <label>
                            <input
                                type="checkbox"
                                name="skills[]"
                                value="CAD or 3D Modeling"
                            >
                            CAD or 3D Modeling
                        </label>

                        <label>
                            <input
                                type="checkbox"
                                name="skills[]"
                                value="Electronics or Robotics"
                            >
                            Electronics or Robotics
                        </label>

                        <label>
                            <input
                                type="checkbox"
                                name="skills[]"
                                value="Research Documentation"
                            >
                            Research Documentation
                        </label>
                    </div>

                    <small class="error-message" id="skillsError"></small>
                </div>

                <div class="form-group">
                    <label for="researchInterests">
                        Research Interests
                        <span class="required">*</span>
                    </label>

                    <textarea
                        id="researchInterests"
                        name="researchInterests"
                        rows="6"
                        maxlength="1000"
                        placeholder="Describe your research interests and the type of work you would like to perform."
                        required
                    ></textarea>

                    <small
                        class="error-message"
                        id="researchInterestsError"
                    ></small>
                </div>

                <div class="form-group">
                    <label for="experience">
                        Relevant Experience
                    </label>

                    <textarea
                        id="experience"
                        name="experience"
                        rows="5"
                        maxlength="1000"
                        placeholder="Describe courses, projects, employment, volunteer work, or research experience."
                    ></textarea>
                </div>
            </fieldset>

            <fieldset>
                <legend>Availability</legend>

                <div class="form-group">
                    <label for="hoursAvailable">
                        Hours Available Per Week
                        <span class="required">*</span>
                    </label>

                    <select
                        id="hoursAvailable"
                        name="hoursAvailable"
                        required
                    >
                        <option value="">Select weekly availability</option>
                        <option value="5-10 hours">5–10 hours</option>
                        <option value="11-15 hours">11–15 hours</option>
                        <option value="16-20 hours">16–20 hours</option>
                        <option value="More than 20 hours">
                            More than 20 hours
                        </option>
                    </select>

                    <small
                        class="error-message"
                        id="hoursAvailableError"
                    ></small>
                </div>

                <div class="form-group">
                    <span class="group-label">
                        Available Days <span class="required">*</span>
                    </span>

                    <p class="form-help">
                        Select at least one day.
                    </p>

                    <div class="checkbox-grid">
                        <label>
                            <input
                                type="checkbox"
                                name="availableDays[]"
                                value="Monday"
                            >
                            Monday
                        </label>

                        <label>
                            <input
                                type="checkbox"
                                name="availableDays[]"
                                value="Tuesday"
                            >
                            Tuesday
                        </label>

                        <label>
                            <input
                                type="checkbox"
                                name="availableDays[]"
                                value="Wednesday"
                            >
                            Wednesday
                        </label>

                        <label>
                            <input
                                type="checkbox"
                                name="availableDays[]"
                                value="Thursday"
                            >
                            Thursday
                        </label>

                        <label>
                            <input
                                type="checkbox"
                                name="availableDays[]"
                                value="Friday"
                            >
                            Friday
                        </label>
                    </div>

                    <small
                        class="error-message"
                        id="availableDaysError"
                    ></small>
                </div>

                <div class="form-group">
                    <label for="additionalInformation">
                        Additional Information
                    </label>

                    <textarea
                        id="additionalInformation"
                        name="additionalInformation"
                        rows="4"
                        maxlength="750"
                        placeholder="Provide any additional scheduling information or comments."
                    ></textarea>
                </div>
            </fieldset>

            <div
                id="formValidationSummary"
                class="validation-summary"
                role="alert"
                aria-live="polite"
            ></div>

            <div class="form-buttons">
                <button type="submit" class="primary-button">
                    Submit Application
                </button>

                <button type="reset" class="secondary-button">
                    Reset Form
                </button>
            </div>
        </form>
    </section>
</main>

<script src="js/application-validation.js"></script>

<?php include "includes/footer.php"; ?>