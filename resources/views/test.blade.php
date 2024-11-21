@extends('include/layout')
@section('title', 'Budgeteer')
@section('content')

    <div class="max-w-md mx-auto">
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <!-- Email Input -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                    Email
                </label>
                <input id="email" type="email"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="Enter email" onfocus="toggleValidation(true, 'email')"
                    onblur="toggleValidation(false, 'email')" oninput="validateEmail()" />

                <!-- Validation Messages with Icons -->
                <ul id="email-validation-messages"
                    class="list-disc pl-5 text-sm space-y-1 mt-2 transition-all duration-300 max-h-0 overflow-hidden">
                    <li id="email-format" class="flex items-center text-red-500">
                        <span class="mr-2" id="email-icon">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </span>
                        Enter a valid email address
                    </li>
                </ul>
            </div>

            <!-- Password Input -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Password
                </label>
                <input id="password" type="password"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="Enter password" onfocus="toggleValidation(true, 'password')"
                    onblur="toggleValidation(false, 'password')" oninput="validatePassword()" />

                <!-- Validation Messages with Icons -->
                <ul id="password-validation-messages"
                    class="list-disc pl-5 text-sm space-y-1 mt-2 transition-all duration-300 max-h-0 overflow-hidden">
                    <li id="min-length" class="flex items-center text-red-500">
                        <span class="mr-2" id="min-length-icon">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </span>
                        Minimum 5 characters
                    </li>
                    <li id="special-char" class="flex items-center text-red-500">
                        <span class="mr-2" id="special-char-icon">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </span>
                        At least one special character
                    </li>
                    <li id="uppercase" class="flex items-center text-red-500">
                        <span class="mr-2" id="uppercase-icon">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </span>
                        At least one uppercase letter
                    </li>
                </ul>
            </div>

            <!-- Confirm Password Input -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="confirm-password">
                    Confirm Password
                </label>
                <input autocomplete="off" id="confirm-password" type="password"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="Confirm password" onfocus="toggleValidation(true, 'confirm-password')"
                    onblur="toggleValidation(false, 'confirm-password')" oninput="validateConfirmPassword()" />

                <!-- Validation Messages with Icons -->
                <ul id="confirm-password-validation-messages"
                    class="list-disc pl-5 text-sm space-y-1 mt-2 transition-all duration-300 max-h-0 overflow-hidden">
                    <li id="password-match" class="flex items-center text-red-500">
                        <span class="mr-2" id="password-match-icon">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </span>
                        Passwords must match
                    </li>
                </ul>
            </div>
        </form>
    </div>

    <script>
        // Toggles visibility of validation messages
        function toggleValidation(show, type) {
            const validationMessages = document.getElementById(`${type}-validation-messages`);
            if (show) {
                validationMessages.classList.remove("max-h-0", "overflow-hidden");
                validationMessages.classList.add("max-h-40", "overflow-visible");
            } else {
                validationMessages.classList.add("max-h-0", "overflow-hidden");
                validationMessages.classList.remove("max-h-40", "overflow-visible");
            }
        }

        // Validates password field
        function validatePassword() {
            const password = document.getElementById("password").value;

            const validations = [{
                    id: "min-length",
                    icon: "min-length-icon",
                    test: (pwd) => pwd.length >= 5
                },
                {
                    id: "special-char",
                    icon: "special-char-icon",
                    test: (pwd) => /[!@#$%^&*(),.?":{}|<>]/g.test(pwd)
                },
                {
                    id: "uppercase",
                    icon: "uppercase-icon",
                    test: (pwd) => /[A-Z]/.test(pwd)
                },
            ];

            validations.forEach((validation) => {
                const element = document.getElementById(validation.id);
                const icon = document.getElementById(validation.icon);

                if (validation.test(password)) {
                    element.classList.replace("text-red-500", "text-green-500");
                    icon.innerHTML =
                        `<svg class="w-4 h-4 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>`;
                } else {
                    element.classList.replace("text-green-500", "text-red-500");
                    icon.innerHTML =
                        `<svg class="w-4 h-4 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>`;
                }
            });
        }

        // Validates email format
        function validateEmail() {
            const email = document.getElementById("email").value;
            const emailFormat = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            const emailElement = document.getElementById("email-format");
            const emailIcon = document.getElementById("email-icon");

            if (emailFormat.test(email)) {
                emailElement.classList.replace("text-red-500", "text-green-500");
                emailIcon.innerHTML =
                    `<svg class="w-4 h-4 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>`;
            } else {
                emailElement.classList.replace("text-green-500", "text-red-500");
                emailIcon.innerHTML =
                    `<svg class="w-4 h-4 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>`;
            }
        }

        // Validates confirm password
        function validateConfirmPassword() {
            const password = document.getElementById("password").value;
            const confirmPassword = document.getElementById("confirm-password").value;
            const confirmPasswordElement = document.getElementById("password-match");
            const confirmPasswordIcon = document.getElementById("password-match-icon");

            if (password === confirmPassword && confirmPassword.length > 0) {
                confirmPasswordElement.classList.replace("text-red-500", "text-green-500");
                confirmPasswordIcon.innerHTML =
                    `<svg class="w-4 h-4 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>`;
            } else {
                confirmPasswordElement.classList.replace("text-green-500", "text-red-500");
                confirmPasswordIcon.innerHTML =
                    `<svg class="w-4 h-4 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>`;
            }
        }
    </script>

@endsection
