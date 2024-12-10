// Alert handling utility functions
function showError(message) {
    $("#errorMessage").text(message);
    $("#errorAlert").css('display', 'block');
}

function showSuccess(message) {
    $("#successMessage").text(message);
    $("#successAlert").css('display', 'block');
}

function closeAlert() {
    $("#errorAlert").css('display', 'none');
}

// Validation utility functions
function isValidEmail(email) {
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailPattern.test(email);
}

function isValidUsername(username) {
    const usernamePattern = /^[a-zA-Z0-9_]+$/;
    return usernamePattern.test(username) && username.length >= 3;
}

function isValidPassword(password) {
    return password.length >= 6 && /\d/.test(password) && /[a-zA-Z]/.test(password);
}
function validatePasswords() {
    const password = $("#password").val().trim();
    const confirmPassword = $("#confirm_password").val().trim();

    if (!password) {
        showError("Please enter a password");
        $("#password").focus();
        return false;
    }
    if (!isValidPassword(password)) {
        showError("Password must be at least 6 characters long and contain both letters and numbers");
        $("#password").focus();
        return false;
    }
    if (!confirmPassword) {
        showError("Please confirm your password");
        $("#confirm_password").focus();
        return false;
    }
    if (password !== confirmPassword) {
        showError("Passwords do not match");
        $("#confirm_password").focus();
        return false;
    }
    return true;
}

// Login function
function user_login() {
    const identifier = $("#identifier").val().trim();
    const password = $("#password").val().trim();

    // Basic validation
    if (!identifier) {
        showError("Please enter your username or email");
        $("#identifier").focus();
        return;
    }
    if (!password) {
        showError("Please enter your password");
        $("#password").focus();
        return;
    }

    $.ajax({
        type: "POST",
        url: "../../src/routes/routes.php",
        data: $("#loginForm").serialize() + "&type=login",
        success: function (response) {
            try {
                if (response === "Login successful") {
                    showSuccess("Login successful! Redirecting...");
                    setTimeout(() => {
                        window.location.href = "home.php";
                    }, 1000);
                } else {
                    showError("Invalid username or password. Please try again.");
                }
            } catch (e) {
                showError("An error occurred. Please try again.");
            }
        },
        error: function (xhr, status, error) {
            showError("Login failed: " + (xhr.responseText || "Unknown error occurred"));
        }
    });
}

// Register function
function user_register() {
    // Clear any existing errors
    closeAlert();

    // Get form values
    const firstName = $("#first_name").val().trim();
    const lastName = $("#last_name").val().trim();
    const birthdate = $("#birthdate").val().trim();
    const username = $("#username").val().trim();
    const password = $("#password").val().trim();
    const confirmPassword = $("#confirm_password").val().trim();
    const email = $("#email").val().trim();

    // Validate required fields
    if (!firstName) {
        showError("Please enter your first name");
        $("#first_name").focus();
        return;
    }
    if (!lastName) {
        showError("Please enter your last name");
        $("#last_name").focus();
        return;
    }
    if (!birthdate) {
        showError("Please enter your birthdate");
        $("#birthdate").focus();
        return;
    }
    if (!username) {
        showError("Please enter a username");
        $("#username").focus();
        return;
    }
    if (!isValidUsername(username)) {
        showError("Username must be at least 3 characters and can only contain letters, numbers, and underscores");
        $("#username").focus();
        return;
    }

    // Password validation
    if (!validatePasswords()) {
        return;
    }

    if (!email) {
        showError("Please enter your email");
        $("#email").focus();
        return;
    }
    if (!isValidEmail(email)) {
        showError("Please enter a valid email address");
        $("#email").focus();
        return;
    }

    // Validate birthdate is not in future
    const birthdateObj = new Date(birthdate);
    if (birthdateObj > new Date()) {
        showError("Birthdate cannot be in the future");
        $("#birthdate").focus();
        return;
    }

    // Create formData without middle_name
    const formData = {
        first_name: firstName,
        last_name: lastName,
        birthdate: birthdate,
        username: username,
        password: password,
        email: email,
        type: 'register'
    };

    // Submit the form
    $.ajax({
        type: "POST",
        url: "../../src/routes/routes.php",
        data: formData,
        success: function (data) {
            console.log("Response from routes.php:", data);
            if (data === "Registration successful") {
                showSuccess("Registration successful! Redirecting to login page...");
                setTimeout(() => {
                    window.location.href = "login.php";
                }, 2000);
            } else {
                showError("Registration failed: " + data);
            }
        },
        error: function (xhr, status, error) {
            console.error("Error:", error);
            showError("An error occurred during registration. Please try again.");
        }
    });
}

// Logout function
function user_Logout() {
    $.ajax({
        type: "POST",
        url: "../../src/routes/routes.php",
        data: { type: "logout" },
        success: function (data) {
            if (data === "Logout successful") {
                showSuccess("Logout successful! Redirecting...");
                setTimeout(() => {
                    window.location.href = "login.php";
                }, 1000);
            } else {
                showError("Logout failed.");
            }
        },
        error: function (error) {
            console.error("Error:", error);
            showError("An error occurred during logout. Please try again.");
        }
    });
}
// Toggle password visibility
function togglePassword(fieldId) {
    const passwordInput = document.getElementById(fieldId);
    const showIcon = document.getElementById(`show${fieldId.charAt(0).toUpperCase() + fieldId.slice(1)}Icon`);
    const hideIcon = document.getElementById(`hide${fieldId.charAt(0).toUpperCase() + fieldId.slice(1)}Icon`);

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        showIcon.classList.add('hidden');
        hideIcon.classList.remove('hidden');
    } else {
        passwordInput.type = 'password';
        showIcon.classList.remove('hidden');
        hideIcon.classList.add('hidden');
    }
}
// Handle Enter key in forms
$(document).ready(function () {
    $('#loginForm, #registerForm').on('keypress', function (e) {
        if (e.which === 13) { // Enter key
            e.preventDefault();
            if (this.id === 'loginForm') {
                user_login();
            } else if (this.id === 'registerForm') {
                user_register();
            }
        }
    });
});