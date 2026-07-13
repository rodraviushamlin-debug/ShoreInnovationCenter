function showCourses() {

let status = document.getElementById("studentStatus").value;

let section = document.getElementById("courseSection");

if(status=="undergraduate"){

section.innerHTML=`

<h3>Required Courses</h3>

<label>CSE 3203 Mobile System Overview</label>

<select id="g1">
<option value="">Select Grade</option>
<option>A</option>
<option>B</option>
<option>C</option>
<option>D</option>
<option>F</option>
</select>

<label>IT 4213 Mobile Web Development</label>

<select id="g2">
<option value="">Select Grade</option>
<option>A</option>
<option>B</option>
<option>C</option>
<option>D</option>
<option>F</option>
</select>

<label>IT 3123 Hardware and Software Concepts</label>

<select id="g3">
<option value="">Select Grade</option>
<option>A</option>
<option>B</option>
<option>C</option>
<option>D</option>
<option>F</option>
</select>

<label>IT 4323 Database Systems</label>

<select id="g4">
<option value="">Select Grade</option>
<option>A</option>
<option>B</option>
<option>C</option>
<option>D</option>
<option>F</option>
</select>

`;

}

else if(status=="graduate"){

section.innerHTML=`

<h3>Required Courses</h3>

<label>IT 7113 Data Visualization</label>

<select id="g1">
<option value="">Select Grade</option>
<option>A</option>
<option>B</option>
<option>C</option>
<option>D</option>
<option>F</option>
</select>

<label>IT 6713 Business Intelligence</label>

<select id="g2">
<option value="">Select Grade</option>
<option>A</option>
<option>B</option>
<option>C</option>
<option>D</option>
<option>F</option>
</select>

<label>SWE 6733 Software Testing</label>

<select id="g3">
<option value="">Select Grade</option>
<option>A</option>
<option>B</option>
<option>C</option>
<option>D</option>
<option>F</option>
</select>

<label>IT 5443 Web Technologies</label>

<select id="g4">
<option value="">Select Grade</option>
<option>A</option>
<option>B</option>
<option>C</option>
<option>D</option>
<option>F</option>
</select>

`;

}

else{

section.innerHTML="";

}

}

function gradePoint(letter){

switch(letter){

case "A": return 4.0;
case "B": return 3.0;
case "C": return 2.0;
case "D": return 1.0;
default: return 0.0;

}

}

function evaluateEligibility(){

let name=document.getElementById("studentName").value.trim();

let email=document.getElementById("studentEmail").value.trim();

let status=document.getElementById("studentStatus").value;

if(name==""){

alert("Please enter your name.");

return;

}

if(email==""){

alert("Please enter your email.");

return;

}

if(status==""){

alert("Please select your student status.");

return;

}

let grades=[];

for(let i=1;i<=4;i++){

let value=document.getElementById("g"+i).value;

if(value==""){

alert("Please select all grades.");

return;

}

grades.push(gradePoint(value));

}

let average=(grades[0]+grades[1]+grades[2]+grades[3])/4;

let result=document.getElementById("result");

if(status=="undergraduate"){

if(average>3.2){

result.innerHTML=`
<h3>Congratulations!</h3>

<p>Average Grade: ${average.toFixed(2)}</p>

<p>You qualify to continue to the application form.</p>

<a href="application.html">Continue to Application</a>
`;

}

else{

result.innerHTML=`
<h3>Thank You</h3>

<p>Average Grade: ${average.toFixed(2)}</p>

<p>You do not currently meet the minimum eligibility requirement.</p>
`;

}

}

else{

if(average>3.7){

result.innerHTML=`
<h3>Congratulations!</h3>

<p>Average Grade: ${average.toFixed(2)}</p>

<p>You qualify to continue to the application form.</p>

<a href="application.html">Continue to Application</a>
`;

}

else{

result.innerHTML=`
<h3>Thank You</h3>

<p>Average Grade: ${average.toFixed(2)}</p>

<p>You do not currently meet the minimum eligibility requirement.</p>
`;

}

}

}
"use strict";

const eligibilityForm = document.querySelector("#eligibilityForm");
const studentStatus = document.querySelector("#studentStatus");
const courseSection = document.querySelector("#courseSection");
const eligibilityResult = document.querySelector(
    "#eligibilityResult"
);
const applicationLinkContainer = document.querySelector(
    "#applicationLinkContainer"
);

// Courses displayed for undergraduate students.
const undergraduateCourses = [
    "CSE 3203 Mobile System Overview",
    "IT 4213 Mobile Web Development",
    "IT 3123 Hardware and Software Concepts",
    "IT 3203 Introduction to Web Development"
];

// Courses displayed for graduate students.
const graduateCourses = [
    "IT 7113 Data Visualization",
    "IT 6713 Business Intelligence",
    "IT 6753 Advanced Web Development",
    "IT 6823 Information Security Concepts"
];

// Convert each letter grade into a numeric value.
function convertLetterGrade(letterGrade) {
    switch (letterGrade) {
        case "A":
            return 95;

        case "B":
            return 85;

        case "C":
            return 75;

        case "D":
            return 65;

        case "F":
            return 50;

        default:
            return null;
    }
}

// Create the course and grade fields.
function showCourses() {
    const selectedStatus = studentStatus.value;

    courseSection.innerHTML = "";
    eligibilityResult.textContent = "";
    eligibilityResult.className = "result-box";

    // Hide the application link when status changes.
    applicationLinkContainer.classList.add("hidden");

    let courses = [];

    if (selectedStatus === "undergraduate") {
        courses = undergraduateCourses;
    } else if (selectedStatus === "graduate") {
        courses = graduateCourses;
    } else {
        return;
    }

    const heading = document.createElement("h3");
    heading.textContent = "Required Courses and Grades";
    courseSection.appendChild(heading);

    courses.forEach(function (course, index) {
        const formGroup = document.createElement("div");
        formGroup.className = "form-group";

        const label = document.createElement("label");
        label.setAttribute("for", `courseGrade${index}`);
        label.textContent = course;

        const select = document.createElement("select");
        select.id = `courseGrade${index}`;
        select.name = `courseGrade${index}`;
        select.className = "course-grade";
        select.required = true;

        select.innerHTML = `
            <option value="">Select Grade</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
            <option value="F">F</option>
        `;

        formGroup.appendChild(label);
        formGroup.appendChild(select);
        courseSection.appendChild(formGroup);
    });
}

// Evaluate the student's eligibility.
function evaluateEligibility() {
    const studentName = document
        .querySelector("#studentName")
        .value
        .trim();

    const studentEmail = document
        .querySelector("#studentEmail")
        .value
        .trim();

    const selectedStatus = studentStatus.value;

    const gradeFields = document.querySelectorAll(".course-grade");

    // Clear old results and hide the application link.
    eligibilityResult.textContent = "";
    eligibilityResult.className = "result-box";
    applicationLinkContainer.classList.add("hidden");

    if (studentName === "") {
        eligibilityResult.textContent =
            "Please enter your name.";

        eligibilityResult.className =
            "result-box not-eligible";

        return;
    }

    if (studentEmail === "") {
        eligibilityResult.textContent =
            "Please enter your email address.";

        eligibilityResult.className =
            "result-box not-eligible";

        return;
    }

    if (selectedStatus === "") {
        eligibilityResult.textContent =
            "Please select your student status.";

        eligibilityResult.className =
            "result-box not-eligible";

        return;
    }

    if (gradeFields.length === 0) {
        eligibilityResult.textContent =
            "Please select your student status and enter your grades.";

        eligibilityResult.className =
            "result-box not-eligible";

        return;
    }

    const numericGrades = [];
    let allCoursesCompleted = true;

    gradeFields.forEach(function (gradeField) {
        const numericGrade = convertLetterGrade(
            gradeField.value
        );

        if (numericGrade === null) {
            allCoursesCompleted = false;
        } else {
            numericGrades.push(numericGrade);
        }
    });

    if (!allCoursesCompleted) {
        eligibilityResult.textContent =
            "Please select a letter grade for every required course.";

        eligibilityResult.className =
            "result-box not-eligible";

        return;
    }

    const totalGradePoints = numericGrades.reduce(
        function (total, grade) {
            return total + grade;
        },
        0
    );

    const averageGrade =
        totalGradePoints / numericGrades.length;

    const studentQualifies =
        allCoursesCompleted && averageGrade >= 80;

    if (studentQualifies) {
        eligibilityResult.textContent =
            `Congratulations, ${studentName}! Your average is ` +
            `${averageGrade.toFixed(2)}%. You meet the minimum ` +
            "eligibility requirements.";

        eligibilityResult.className =
            "result-box eligible";

        // Show the application link only when qualified.
        applicationLinkContainer.classList.remove("hidden");
    } else {
        eligibilityResult.textContent =
            `${studentName}, your average is ` +
            `${averageGrade.toFixed(2)}%. You do not currently meet ` +
            "the minimum eligibility requirement of 80%.";

        eligibilityResult.className =
            "result-box not-eligible";

        // Keep the application link hidden.
        applicationLinkContainer.classList.add("hidden");
    }
}

// Display courses when student status changes.
studentStatus.addEventListener("change", showCourses);

// Evaluate the form without reloading the page.
eligibilityForm.addEventListener("submit", function (event) {
    event.preventDefault();
    evaluateEligibility();
});

// Clear results and hide the application link after reset.
eligibilityForm.addEventListener("reset", function () {
    window.setTimeout(function () {
        courseSection.innerHTML = "";
        eligibilityResult.textContent = "";
        eligibilityResult.className = "result-box";

        applicationLinkContainer.classList.add("hidden");
    }, 0);
});
890e2
