<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Page</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Tungsten:wght@500&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap');
        @import url('https://fonts.cdnfonts.com/css/super-guardian');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background-color: #0f1923;
            color: #ece8e1;
            min-height: 100vh;
            display: flex;
            align-items: flex-start; /* Changed from center to flex-start */
            justify-content: center;
            padding: 40px 20px; /* Added more padding top/bottom */
            position: relative;
            overflow-y: auto; /* Allow vertical scrolling */
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, #ff44449c 0%, #0f1923 100%);
            opacity: 0.1;
            z-index: 1;
        }

        .container {
            width: 100%;
            max-width: 1000px;
            padding: 3rem;
            background-color: #1f2326;
            border-radius: 2px;
            box-shadow: 0 8px 32px rgba(255, 70, 85, 0.1);
            border: 1px solid #ff4655;
            position: relative;
            z-index: 2;
        }

        .alert {
            margin-bottom: 1rem;
            padding: 1rem;
            border-radius: 2px;
            position: relative;
            display: none;
        }

        .alert.error {
            background-color: rgba(255, 70, 85, 0.9);
            color: white;
        }

        .alert.success {
            background-color: rgba(0, 255, 163, 0.9);
            color: white;
        }

        h2 {
            color: #ff4655;
            text-align: center;
            margin-bottom: 2rem;
            font-size: 3.5rem;
            font-family: 'Super Guardian', sans-serif;
            
            letter-spacing: 2px;
        }

        .form-container {
            display: flex;
            gap: 2rem;
        }

        .form-column {
            flex: 1;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            color: #ece8e1;
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        input {
            width: 100%;
            padding: 0.75rem 1rem;
            background-color: #1f2326;
            border: 1px solid #ff4655;
            border-radius: 2px;
            color: #ece8e1;
            font-size: 1rem;
            transition: all 0.3s;
        }

        input::placeholder {
            color: #7e7e7e;
        }

        input:focus {
            outline: none;
            border-color: #ff4655;
            box-shadow: 0 0 0 2px rgba(255, 70, 85, 0.3);
        }

        .password-field {
            position: relative;
        }

        .password-toggle {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #ff4655;
            cursor: pointer;
        }

        .password-hint {
            font-size: 0.875rem;
            color: #8b978f;
            margin-top: 0.5rem;
            text-transform: none;
            letter-spacing: normal;
        }

        /* Keeping original button styles */
        .submit-button {
            font-family: 'Ropa Sans', sans-serif;
            color: white;
            cursor: pointer;
            font-size: 13px;
            font-weight: bold;
            letter-spacing: 0.05rem;
            border: 1px solid #0E1822;
            padding: 1rem 12rem;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 531.28 200'%3E%3Cdefs%3E%3Cstyle%3E .shape %7B fill: %23FF4655 /* fill: %230E1822; */ %7D %3C/style%3E%3C/defs%3E%3Cg id='Layer_2' data-name='Layer 2'%3E%3Cg id='Layer_1-2' data-name='Layer 1'%3E%3Cpolygon class='shape' points='415.81 200 0 200 115.47 0 531.28 0 415.81 200' /%3E%3C/g%3E%3C/g%3E%3C/svg%3E%0A");
            background-color: #0E1822;
            background-size: 200%;
            background-position: 200%;
            background-repeat: no-repeat;
            transition: 0.3s ease-in-out;
            transition-property: background-position, border, color;
            position: relative;
            z-index: 1;
        }

        .submit-button:hover {
            border: 1px solid #FF4655;
            color: white;
            background-position: 40%;
        }

        .submit-button:before {
            content: "";
            position: absolute;
            background-color: #0E1822;
            width: 0.2rem;
            height: 0.2rem;
            top: -1px;
            left: -1px;
            transition: background-color 0.15s ease-in-out;
        }

        .submit-button:hover:before {
            background-color: white;
        }

        .submit-button:hover:after {
            background-color: white;
        }

        .submit-button:after {
            content: "";
            position: absolute;
            background-color: #FF4655;
            width: 0.3rem;
            height: 0.3rem;
            bottom: -1px;
            right: -1px;
            transition: background-color 0.15s ease-in-out;
        }

        .button-borders {
            position: relative;
            width: fit-content;
            height: fit-content;
        }

        .button-borders:before {
            content: "";
            position: absolute;
            width: calc(100% + 0.5em);
            height: 50%;
            left: -0.3em;
            top: -0.3em;
            border: 1px solid #0E1822;
            border-bottom: 0px;
        }

        .button-borders:after {
            content: "";
            position: absolute;
            width: calc(100% + 0.5em);
            height: 50%;
            left: -0.3em;
            bottom: -0.3em;
            border: 1px solid #0E1822;
            border-top: 0px;
            z-index: 0;
        }

        .login-link {
            text-align: center;
            margin-top: 2rem;
            font-size: 0.875rem;
            color: #ece8e1;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .login-link button {
            background: none;
            border: none;
            color: #ff4655;
            font-weight: 500;
            cursor: pointer;
            transition: color 0.3s;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-decoration: underline;
        }

        .login-link button:hover {
            color: #ff5864;
        }

        @media (max-width: 768px) {
            .form-container {
                flex-direction: column;
            }

            .container {
                width: 95%;
                padding: 2rem;
            }

            h2 {
                font-size: 2.5rem;
            }
        }
        @media (max-width: 1024px) {
            .submit-button {
                padding: 1rem 8rem;
            }
            
            .container {
                max-width: 800px;
            }
        }

        @media (max-width: 768px) {
            .form-container {
                flex-direction: column;
            }

            .container {
                width: 95%;
                padding: 2rem;
                margin: 20px 0;
            }

            h2 {
                font-size: 2.5rem;
            }

            .submit-button {
                padding: 1rem 9.2rem;
            }

            .form-group {
                margin-bottom: 1rem;
            }

            input {
                padding: 0.6rem 0.8rem;
            }
        }

        @media (max-width: 480px) {
            .container {
                width: 100%;
                padding: 1.5rem;
            }

            h2 {
                font-size: 2rem;
            }

            .submit-button {
                padding: 1rem 4rem;
            }

            .button-borders {
                width: 100%;
                display: flex;
                justify-content: center;
            }

            .form-group {
                margin-bottom: 0.8rem;
            }

            .password-hint {
                font-size: 0.75rem;
            }

            input {
                font-size: 0.9rem;
            }

            label {
                font-size: 0.8rem;
            }
        }

        /* Add some spacing for the bottom of the page */
        .login-link {
            margin-bottom: 1rem;
        }

        /* Make the container adapt to content */
        .container {
            margin: 40px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div id="errorAlert" class="alert error">
            <span id="errorMessage"></span>
            <button onclick="closeAlert()">
                <svg width="20" height="20" viewBox="0 0 20 20">
                    <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" fill="currentColor" />
                </svg>
            </button>
        </div>

        <div id="successAlert" class="alert success">
            <span id="successMessage"></span>
            <button onclick="document.getElementById('successAlert').style.display = 'none'">
                
            </button>
        </div>

        <h2>Create your account</h2>
        <form id="registerForm">
            <div class="form-container">
                <div class="form-column">
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" id="first_name" name="first_name" placeholder="Enter your first name" >
                    </div>

                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" id="last_name" name="last_name" placeholder="Enter your last name" >
                    </div>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" placeholder="Choose a username" >
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter your email" >
                    </div>
                </div>

                <div class="form-column">
                    <div class="form-group">
                        <label for="birthdate">Birthdate</label>
                        <input type="date" id="birthdate" name="birthdate">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="password-field">
                            <input type="password" id="password" name="password" placeholder="Create a password">
                            <button type="button" class="password-toggle" onclick="togglePassword('password')">
                                <svg id="showPasswordIcon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                    <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>
                        <p class="password-hint">Password must be at least 6 characters with numbers and letters</p>
                    </div>

                    <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <div class="password-field">
                            <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your password">
                            <button type="button" class="password-toggle" onclick="togglePassword('confirm_password')">
                                <svg id="showConfirmPasswordIcon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                    <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="button-borders">
                        <button type="button" class="submit-button" onclick="user_register()">Register</button>
                    </div>
                </div>
            </div>

            <div class="login-link">
                Already have an account?
                <button type="button" onclick="window.location.href='login.php'">
                    Login Here
                </button>
            </div>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="../lib/js/my.js"></script>
</body>
</html>     