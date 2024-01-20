<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Create account - Eagle Eye Tradings</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="main/dist/css/tailwind.output.css" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="main/dist/js/init-alpine.js"></script>
    <link rel="stylesheet" href="main/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="main/plugins/jquery-ui/jquery-ui.css">

    <link rel="stylesheet" href="main/dist/css/bvalidator.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />

</head>

<body>
    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
        <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
            <div class="flex flex-col overflow-y-auto md:flex-row">
                <div class="h-32 md:h-auto md:w-1/2">
                    <img aria-hidden="true" class="object-cover w-full h-full dark:hidden" src="main/dist/img/create-account-office.jpeg" alt="Office" />
                    <img aria-hidden="true" class="hidden object-cover w-full h-full dark:block" src="main/dist/img/create-account-office-dark.jpeg" alt="Office" />
                </div>
                <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                    <div class="w-full">
                        <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                            Create account
                        </h1>
                        <form id="adduser" onsubmit="event.preventDefault();sendForm('', '', 'insertuser', 'resultid', 'adduser');return 0;">
                            <label class="block text-sm" style="margin-bottom: 5px;">
                                <span class="text-gray-700 dark:text-gray-400">Name</span>
                                <input data-bvalidator="required" name="username" class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Enter your name" autocomplete="off" />
                                <span></label>
                            <label class="block text-sm" style="margin-bottom: 5px;">
                                <span class="text-gray-700 dark:text-gray-400">Email</span>
                                <input data-bvalidator="required" name="email" class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Enter you email id" />
                            </label>
                            <label class="block text-sm" style="margin-bottom: 5px;">
                                <span class="text-gray-700 dark:text-gray-400">Mob No.</span>
                                <input data-bvalidator="required,digit,minlength[10],maxlength[10]" name="mobileno" class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Enter your mobile no." />
                            </label></span>


                            <label class="block text-sm" style="margin-bottom: 5px;">
                                <span class="text-gray-700 dark:text-gray-400">Date of Birth</span>
                                <input id="date" onfocus="setcalenderlimit(this.id,'')" data-bvalidator="required,gap18year" data-bvalidator-msg-gap18year="Customer Should be minimum 18 year Old" name="dob" class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder=" Your date of birth" /></label>
                            <label class="block text-sm" style="margin-bottom: 5px;">
                                <span class="text-gray-700 dark:text-gray-400">Address</span>
                                <input data-bvalidator="required" name="address" class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Full address" />
                            </label>
                            <label class="block text-sm" style="margin-bottom: 5px;">
                                <span class="text-gray-700 dark:text-gray-400">Aadhar No.</span>
                                <input data-bvalidator="required" name="adharno" class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Enter 12 Digit Aadhar No." /></label>
                            <label class="block text-sm" style="margin-bottom: 5px;">
                                <span class="text-gray-700 dark:text-gray-400">PAN No.</span>
                                <input data-bvalidator="required" name="panno" class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Your Pan No." /></label>

                            <label class="block text-sm" style="margin-bottom: 5px;">
                                <span class="text-gray-700 dark:text-gray-400">Bank Name</span>
                                <input data-bvalidator="required" name="bankname" class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="eg. BOI, State bank of India, Kotak etc..." /></label>

                            <label class="block text-sm" style="margin-bottom: 5px;">
                                <span class="text-gray-700 dark:text-gray-400">Account No.</span>
                                <input data-bvalidator="required" name="accountno" class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Enter A/c No." /></label>
                            <label class="block text-sm" style="margin-bottom: 5px;">
                                <span class="text-gray-700 dark:text-gray-400">IFSC Code</span>
                                <input data-bvalidator="required" name="ifsc" class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="IFSC Code of Bank" /></label>
                            </label>
                            <label class="block text-sm" style="margin-bottom: 5px;">
                                <span class="text-gray-700 dark:text-gray-400">Employee ID</span>
                                <input xdata-bvalidator="required" name="employeeref" class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Employee ID if available" /></label>

                            <label class="block text-sm" style="margin-bottom: 5px;position:relative">
                                <span class="text-gray-700 dark:text-gray-400">Password</span>
                                <input type="password" data-bvalidator="required" id="password" name="password" class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Please Give Strong Password!" />
                                <i id="eye" class="fa fa-eye" style="position: absolute;top:33px;right:10px" aria-hidden="true"></i>
                            </label>
                            <label class="block text-sm" style="margin-bottom: 5px;">
                                <span class="text-gray-700 dark:text-gray-400">Confirm Password</span>
                                <input type="password" id="confirmpassword" data-bvalidator="required,matchconfirmpassword[password]" data-bvalidator-msg-matchconfirmpassword="Confirm Password Not Matched" class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Confirm Password" />
                            </label>
                            <div id="resultid"></div>

                            <div class="flex mt-6 text-sm">
                                <label class="flex items-center dark:text-gray-400">
                                    <input id="chekbox" data-bvalidator-msg-dispatchchecking="Please Check The Box" value="Yes" name="policyread" data-bvalidator="valempty,dispatchchecking" type="checkbox" class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" />
                                    <span class="ml-2">
                                        I agree to the
                                        <span class="underline">privacy policy</span>
                                    </span>
                                </label>
                            </div>

                            <!-- You should use a button here, as the anchor is only used for the example  -->
                            <button type="submit" class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                Create account
                            </button>
                        </form>


                        <p class=" mt-4">
                            <a class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline" href="./login">
                                Already have an account? Login
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="main/plugins/jquery/jquery.min.js"></script>
    <script src="main/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- Bootstrap 4 -->
    <script src="main/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="main/dist/js/adminlte.min.js"></script>
    <script src="main/dist/js/customfunction.js?ver=<?php echo time(); ?>"></script>
    <script src="main/dist/js/jquery.bvalidator-yc.js"></script>
    <script src="main/dist/js/select2.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
</body>
<script>
    function dispatchchecking(n) {
        // console.log(n+' something')
        // console.log($(this).val())
        if ($("#chekbox").prop('checked') == true) {
            return true
        }

    }
    $("#eye").click(() => {
        iconname = $("#eye").attr("class");
        if (iconname === 'fa fa-eye') {
            $('#password').attr('type', 'text')
            $("#eye").attr('class', 'fa fa-eye-slash')

        } else {
            $('#password').attr('type', 'password')
            $("#eye").attr('class', 'fa fa-eye')
        }
    })
</script>

</html>