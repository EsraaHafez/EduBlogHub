// Validation Register
function validateRegisterForm() {
    // Get the values from the form fields
    const name = document.getElementById("name").value;
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("confirm_password").value;

    // Get the elements to display error messages
    const usernameError = document.getElementById("username-error");
    const emailError = document.getElementById("email-error");
    const passwordError = document.getElementById("password-error");
    const confirmPasswordError = document.getElementById("confirm-password-error");

    // Clear previous error messages
    usernameError.textContent = "";
    emailError.textContent = "";
    passwordError.textContent = "";
    confirmPasswordError.textContent = "";

    // Initialize a flag to track if the form is valid
    let isValid = true;

    // Validate Username (not empty and no numbers)
    if (name === "" || /\d/.test(name)) {
        usernameError.textContent = "Please enter a valid username without numbers.";
        isValid = false;
    }

    // Validate Email (must include @ and be in a valid format)
    if (email === "" || !/\S+@\S+\.\S+/.test(email)) {
        emailError.textContent = "Please enter a valid email address.";
        isValid = false;
    }

    // Validate Password (minimum 6 characters)
    if (password === "" || password.length < 6) {
        passwordError.textContent = "Password must be at least 6 characters long.";
        isValid = false;
    }

    // Validate Confirm Password (must match the password)
    if (confirmPassword !== password) {
        confirmPasswordError.textContent = "Passwords do not match.";
        isValid = false;
    }

    // Return false to prevent form submission if not valid
    return isValid;
}

// Validation for Login Form
function validateLoginForm() {
    // Get the values from the form fields
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;

    // Get the elements to display error messages
    const emailError = document.getElementById("email-error");
    const passwordError = document.getElementById("password-error");

    // Clear previous error messages
    emailError.textContent = "";
    passwordError.textContent = "";

    // Initialize a flag to track if the form is valid
    let isValid = true;

    // Validate Email (must include @ and be in a valid format)
    if (email === "" || !/\S+@\S+\.\S+/.test(email)) {
        emailError.textContent = "Please enter a valid email address.";
        isValid = false;
    }

    // Validate Password (minimum 6 characters)
    if (password === "" || password.length < 6) {
        passwordError.textContent = "Password must be at least 6 characters long.";
        isValid = false;
    }

    // Return false to prevent form submission if not valid
    return isValid;
}

// Validate Create Post Form
function validateCreatePostForm() {
    // Get the values from the form fields
    const postTitle = document.getElementById("postTitle").value.trim();
    const postCategory = document.getElementById("postCategory").value;
    const postContent = document.getElementById("postContent").value.trim();

    // Get the elements to display error messages
    const titleError = document.getElementById("title-error");
    const categoryError = document.getElementById("category-error");
    const contentError = document.getElementById("content-error");

    // Clear previous error messages
    titleError.textContent = "";
    categoryError.textContent = "";
    contentError.textContent = "";

    // Initialize a flag to track if the form is valid
    let isValid = true;

    // Validate Post Title (must not be empty and at least 5 characters)
    if (postTitle === "" || postTitle.length < 5) {
        titleError.textContent = "Post title must be at least 5 characters long.";
        isValid = false;
    }

    // Validate Post Category (must be selected)
    if (postCategory === "") {
        categoryError.textContent = "Please select a category.";
        isValid = false;
    }

    // Validate Post Content (must not be empty and at least 50 characters)
    if (postContent === "" || postContent.length < 50) {
        contentError.textContent = "Post content must be at least 50 characters long.";
        isValid = false;
    }

    // Return false to prevent form submission if not valid
    return isValid;
}

// Student Form
function validateStudentForm() {
    // Get the values from the form fields
    const name = document.getElementById("student-name").value.trim();
    const age = document.getElementById("student-age").value;
    const postDivision = document.getElementById("postDivision").value;
    const studentClass = document.getElementById("student-class").value.trim();

    // Get the elements to display error messages
    const nameError = document.getElementById("name-error");
    const ageError = document.getElementById("age-error");
    const classError = document.getElementById("class-error");
    const DivisionError = document.getElementById("Division-error");

    // Clear previous error messages
    nameError.textContent = "";
    ageError.textContent = "";
    classError.textContent = "";
    DivisionError.textContent = "";

    // Initialize a flag to track if the form is valid
    let isValid = true;

    // Validate Student Name (must not be empty and contain only letters)
    if (name === "" || !/^[a-zA-Z\s]+$/.test(name)) {
        nameError.textContent = "Please enter a valid name (letters only).";
        isValid = false;
    }

    // Validate Age (must be between 5 and 18)
    if (age === "" || isNaN(age) || age < 5 || age > 18) {
        ageError.textContent = "Please enter a valid age between 5 and 18.";
        isValid = false;
    }

    // Validate Class (must not be empty)
    if (studentClass === "") {
        classError.textContent = "Please enter the student's class.";
        isValid = false;
    }

    // Validate Post Division (must be selected)
    if (postDivision === "") {
        DivisionError.textContent = "Please select a Division.";
        isValid = false;
    }

    // Return false to prevent form submission if not valid
    return isValid;
}

// Teachers Form
function validateTeacherForm() {
    // Get the values from the form fields
    const name = document.getElementById("teacher-name").value.trim();
    const subject = document.getElementById("teacher-subject").value.trim();
    const teacherDepartment = document.getElementById("teacher-Department").value.trim();
    const teacherHireDate = document.getElementById("teacher-HireDate").value;

    // Get the elements to display error messages
    const nameError = document.getElementById("name-error");
    const subjectError = document.getElementById("subject-error");
    const DepartmentError = document.getElementById("Department-error");
    const HireDateError = document.getElementById("HireDate-error");

    // Clear previous error messages
    nameError.textContent = "";
    subjectError.textContent = "";
    DepartmentError.textContent = "";
    HireDateError.textContent = "";

    // Initialize a flag to track if the form is valid
    let isValid = true;

    // Validate Teacher Name (must not be empty and contain only letters)
    if (name === "" || !/^[a-zA-Z\s]+$/.test(name)) {
        nameError.textContent = "Please enter a valid name (letters only).";
        isValid = false;
    }

    // Validate Subject (must not be empty)
    if (subject === "") {
        subjectError.textContent = "Please enter the subject.";
        isValid = false;
    }

    // Validate Teacher Department
    if (teacherDepartment === "") {
        DepartmentError.textContent = "Teacher Department is required.";
        isValid = false;
    }

    // Validate Hire Date (must not be empty)
    if (teacherHireDate === "") {
        HireDateError.textContent = "Hire Date is required.";
        isValid = false;
    }

    // Return false to prevent form submission if not valid
    return isValid;
}

// Attendance
function validateAttendanceForm() {
    // Get the values from the form fields
    const ID = document.getElementById("person-ID").value;
    const date = document.getElementById("date").value;
    const status = document.getElementById("status").value;

    // Get the elements to display error messages
    const IDError = document.getElementById("ID-error");
    const dateError = document.getElementById("date-error");
    const statusError = document.getElementById("status-error");

    // Clear previous error messages
    IDError.textContent = "";
    dateError.textContent = "";
    statusError.textContent = "";

    // Initialize a flag to track if the form is valid
    let isValid = true;

    // Validate ID (must not be empty and contain only numbers)
    if (ID === "" || !/^\d+$/.test(ID)) {
        IDError.textContent = "Please enter a valid ID (Numbers only).";
        isValid = false;
    }

    // Validate Date (must not be empty)
    if (date === "") {
        dateError.textContent = "Please select a date.";
        isValid = false;
    }

    // Validate Status (must be selected)
    if (status === "") {
        statusError.textContent = "Please select a status.";
        isValid = false;
    }

    // Return false to prevent form submission if not valid
    return isValid;
}

// Timetable
function validateTimetableForm() {
    let isValid = true;

    const day = document.getElementById('day');
    const time = document.getElementById('time');
    const duration = document.getElementById('Duration');
    const subjectTeacher = document.getElementById('SubjectTeacher');
    const teacherID = document.getElementById('TeacherID');
    const classID = document.getElementById('ClassID');

    const dayError = document.getElementById('day-error');
    const timeError = document.getElementById('time-error');
    const durationError = document.getElementById('Duration-error');
    const subjectTeacherError = document.getElementById('SubjectTeacher-error');
    const teacherIDError = document.getElementById('TeacherID-error');
    const classIDError = document.getElementById('ClassID-error');

    // Clear previous error messages
    dayError.textContent = "";
    timeError.textContent = "";
    durationError.textContent = "";
    subjectTeacherError.textContent = "";
    teacherIDError.textContent = "";
    classIDError.textContent = "";

    // Day validation
    if (day.value === "") {
        dayError.textContent = "Please select a day.";
        isValid = false;
    }

    // Time validation
    if (time.value === "") {
        timeError.textContent = "Please select a time.";
        isValid = false;
    }

    // Duration validation
    if (duration.value === "" || duration.value <= 0) {
        durationError.textContent = "Please enter a valid duration.";
        isValid = false;
    }

    // Subject validation
    if (subjectTeacher.value.trim() === "") {
        subjectTeacherError.textContent = "Please enter the subject.";
        isValid = false;
    }

    // TeacherID validation
    if (teacherID.value === "" || teacherID.value <= 0) {
        teacherIDError.textContent = "Please enter a valid Teacher ID.";
        isValid = false;
    }

    // ClassID validation
    if (classID.value === "" || classID.value <= 0) {
        classIDError.textContent = "Please enter a valid Class ID.";
        isValid = false;
    }

    return isValid;
}

// Report  students Form
function validateStudentsReportForm() {
    // Get the values from the form fields
    const studentID = document.getElementById("studentID").value.trim();
    const dateFrom = document.getElementById("date-from").value;
    const dateTo = document.getElementById("date-to").value;
    const grade = document.getElementById("grade").value.trim();
    const comments = document.getElementById("Comments").value.trim();

    // Get the elements to display error messages
    const studentIDError = document.getElementById("studentID-error");
    const dateFromError = document.getElementById("date-from-error");
    const dateToError = document.getElementById("date-to-error");
    const gradeError = document.getElementById("grade-error");
    const commentsError = document.getElementById("Comments-error");

    // Clear previous error messages
    studentIDError.textContent = "";
    dateFromError.textContent = "";
    dateToError.textContent = "";
    gradeError.textContent = "";
    commentsError.textContent = "";

    // Initialize a flag to track if the form is valid
    let isValid = true;

    // Validate Student ID (must not be empty and contain only numbers)
    if (studentID === "" || !/^\d+$/.test(studentID)) {
        studentIDError.textContent = "Please enter a valid Student ID (numbers only).";
        isValid = false;
    }

    // Validate Date From and Date To (must not be empty and From date must be before To date)
    if (dateFrom === "") {
        dateFromError.textContent = "Please select a start date.";
        isValid = false;
    }

    if (dateTo === "") {
        dateToError.textContent = "Please select an end date.";
        isValid = false;
    }

    if (dateFrom !== "" && dateTo !== "" && new Date(dateFrom) > new Date(dateTo)) {
        dateToError.textContent = "End date must be after the start date.";
        isValid = false;
    }

    // Validate Grade (must not be empty and must be a number between 0 and 100)
    if (grade === "" || isNaN(grade) || grade < 0 || grade > 100) {
        gradeError.textContent = "Please enter a valid grade between 0 and 100.";
        isValid = false;
    }

    // Validate Comments (must not be empty and at least 10 characters)
    if (comments === "" || comments.length < 50) {
        commentsError.textContent = "Comments must be at least 50 characters long.";
        isValid = false;
    }

    // Return false to prevent form submission if not valid
    return isValid;
}

// report teachers  form

function validateTeacherReportForm() {
    let isValid = true;

    // Clear previous error messages
    document.getElementById('TeacherID-error').textContent = '';
    document.getElementById('date-from-error').textContent = '';
    document.getElementById('date-to-error').textContent = '';
    document.getElementById('Comments-error').textContent = '';

    // Validate TeacherID
    const teacherID = document.getElementById('TeacherID').value;
    if (teacherID === '' || teacherID <= 0) {
        document.getElementById('TeacherID-error').textContent = 'Please enter a valid Teacher ID.';
        isValid = false;
    }

    // Validate Dates
    const dateFrom = document.getElementById('date-from').value;
    const dateTo = document.getElementById('date-to').value;

    if (dateFrom === '') {
        document.getElementById('date-from-error').textContent = 'Please select a start date.';
        isValid = false;
    }

    if (dateTo === '') {
        document.getElementById('date-to-error').textContent = 'Please select an end date.';
        isValid = false;
    }

    if (dateFrom !== '' && dateTo !== '' && dateFrom > dateTo) {
        document.getElementById('date-to-error').textContent = 'End date must be after the start date.';
        isValid = false;
    }

    // Validate Comments
    const Comments = document.getElementById('Comments').value.trim();
    if (Comments === "" || Comments.length < 50 ) {
        document.getElementById('Comments-error').textContent = 'Comments cannot be empty and  content must be at least 50 characters long.';
        isValid = false;
    }

    return isValid;
}