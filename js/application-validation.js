"use strict";

document.addEventListener("DOMContentLoaded", function () {
    const applicationForm = document.querySelector(
        "#researchApplicationForm"
    );

    const validationSummary = document.querySelector(
        "#formValidationSummary"
    );

    // Stop if the application form is not on the current page.
    if (!applicationForm || !validationSummary) {
        return;
    }

    /**
     * Displays an error message beneath a form control.
     */
    function showError(fieldName, message) {
        const errorElement = document.querySelector(
            `#${fieldName}Error`
        );

        if (errorElement) {
            errorElement.textContent = message;
        }
    }

    /**
     * Removes all previous validation messages.
     */
    function clearErrors() {
        const errorMessages = document.querySelectorAll(
            ".error-message"
        );

        errorMessages.forEach(function (errorMessage) {
            errorMessage.textContent = "";
        });

        validationSummary.textContent = "";
        validationSummary.classList.remove("visible");
    }

    /**
     * Checks whether at least one checkbox is selected.
     */
    function checkboxGroupSelected(groupName) {
        return document.querySelectorAll(
            `input[name="${groupName}"]:checked`
        ).length > 0;
    }

    /**
     * Validates the application before sending it to PHP.
     */
    applicationForm.addEventListener(
        "submit",
        function (event) {
            clearErrors();

            let isValid = true;

            const studentName = document
                .querySelector("#studentName")
                .value
                .trim();

            const studentEmail = document
                .querySelector("#studentEmail")
                .value
                .trim();

            const phoneNumber = document
                .querySelector("#phoneNumber")
                .value
                .trim();

            const ksuId = document
                .querySelector("#ksuId")
                .value
                .trim();

            const major = document
                .querySelector("#major")
                .value
                .trim();

            const classification = document.querySelector(
                'input[name="classification"]:checked'
            );

            const gpaValue = document
                .querySelector("#gpa")
                .value
                .trim();

            const gpa = Number(gpaValue);

            const graduationDate = document
                .querySelector("#graduationDate")
                .value;

            const preferredLab = document
                .querySelector("#preferredLab")
                .value;

            const researchInterests = document
                .querySelector("#researchInterests")
                .value
                .trim();

            const hoursAvailable = document
                .querySelector("#hoursAvailable")
                .value;

            const emailPattern =
                /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            const phonePattern =
                /^[0-9+\-().\s]{7,20}$/;

            if (studentName.length < 2) {
                showError(
                    "studentName",
                    "Enter your full name."
                );

                isValid = false;
            }

            if (!emailPattern.test(studentEmail)) {
                showError(
                    "studentEmail",
                    "Enter a valid email address."
                );

                isValid = false;
            }

            if (!phonePattern.test(phoneNumber)) {
                showError(
                    "phoneNumber",
                    "Enter a valid phone number."
                );

                isValid = false;
            }

            if (ksuId.length < 4) {
                showError(
                    "ksuId",
                    "Enter a valid KSU student ID."
                );

                isValid = false;
            }

            if (major.length < 2) {
                showError(
                    "major",
                    "Enter your academic major."
                );

                isValid = false;
            }

            if (!classification) {
                showError(
                    "classification",
                    "Select your student classification."
                );

                isValid = false;
            }

            if (
                gpaValue === "" ||
                Number.isNaN(gpa) ||
                gpa < 0 ||
                gpa > 4
            ) {
                showError(
                    "gpa",
                    "Enter a GPA between 0.00 and 4.00."
                );

                isValid = false;
            }

            if (graduationDate === "") {
                showError(
                    "graduationDate",
                    "Select your expected graduation date."
                );

                isValid = false;
            }

            if (preferredLab === "") {
                showError(
                    "preferredLab",
                    "Select a preferred research lab."
                );

                isValid = false;
            }

            if (!checkboxGroupSelected("skills[]")) {
                showError(
                    "skills",
                    "Select at least one skill."
                );

                isValid = false;
            }

            if (researchInterests.length < 25) {
                showError(
                    "researchInterests",
                    "Describe your research interests using at least 25 characters."
                );

                isValid = false;
            }

            if (hoursAvailable === "") {
                showError(
                    "hoursAvailable",
                    "Select your weekly availability."
                );

                isValid = false;
            }

            if (!checkboxGroupSelected("availableDays[]")) {
                showError(
                    "availableDays",
                    "Select at least one available day."
                );

                isValid = false;
            }

            if (!isValid) {
                event.preventDefault();

                validationSummary.textContent =
                    "Please correct the errors in the application before submitting.";

                validationSummary.classList.add("visible");

                validationSummary.scrollIntoView({
                    behavior: "smooth",
                    block: "center"
                });
            }
        }
    );

    /**
     * Clears validation messages when the form is reset.
     */
    applicationForm.addEventListener(
        "reset",
        function () {
            clearErrors();
        }
    );
});