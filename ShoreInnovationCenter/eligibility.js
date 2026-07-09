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