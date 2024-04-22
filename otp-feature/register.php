<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="tailwind.config.js"></script>
    <link rel="stylesheet" href="css/custom.css" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <style>
      .backgroundSection {
        background-size: cover;
        background-image: url("image.png");
        /* Additional background properties */
      }
    </style>
  </head>
  <body>
     <!-- Navbar section -->
     <nav class="white-800 text-white p-3">
      <div class="container mx-auto flex justify-between items-center">
        <!-- Your logo -->
        <img src="logo.png" alt="Your Logo" class="h-8 w-auto">
    
        <!-- Toggle switch for dark mode/light mode -->
        <div class="toggle-switch">
          <input type="checkbox" id="toggle" class="toggle-checkbox">
          <label for="toggle" class="toggle-label"></label>
        </div>
      </div>
    </nav>
    
    
    <div id="loadingOverlay">
      <div class="loader">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
        <div class="bar4"></div>
        <div class="bar5"></div>
        <div class="bar6"></div>
        <div class="bar7"></div>
        <div class="bar8"></div>
        <div class="bar9"></div>
        <div class="bar10"></div>
        <div class="bar11"></div>
        <div class="bar12"></div>
      </div>
    </div>
    <section class="backgroundSection">
      <!-- <section class="backgroundSection" style="background-color: blueviolet"> -->
      <!-- <section class="backgroundSection"> -->
      <div class="text-center relative top-4 md:top-8 p-6">
        <h1
          class="text-4xl leading-tight tracking-tight text-gray-900 md:text-5 dark:text-white"
        >
          Ready to take a free trial?
        </h1>
      </div>
      <div class="text-center relative md:top-8 px-8 md:px-16">
        <p
          class="text-lg font-light leading-tight tracking-tight text-gray-500 md:text-2xl dark:text-white"
        >
          Unlock the power of intelligent automation: seamlessly manage tasks, nurture leads, cultivate customer relationships, and propel your business to new heights of success.
        </p>

      <div
        class="flex flex-col items-center justify-center px-4 py-6 lg:py-32 mb-8 p-40 md:p-1000"
      >
        <div
          class="w-full bg-white rounded-2xl shadow dark:border md:mt-0 sm:max-w-max xl:p-10 dark:bg-gray-800 dark:border-gray-700"
          style="width: 600px; height: 450px"
        >
          <div class="p-6 space-y-4 md:space-y-6 sm:p-10">
            <h1
              class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white"
            >
              Sign up for a free account
            </h1>
            <form class="space-y-4 md:space-y-6" method="post" id="reg-form">
              <div class="flex space-x-4">
                <!-- Flex container for First Name and Last Name -->
                <div class="w-1/2">
                  <!-- First Name input box -->
                  <input
                    type="text"
                    name="firstName"
                    id="firstName"
                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-2xl focus:ring-primary-600 focus:border-primary-600 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="First Name"
                    required
                    autocomplete="given-name"
                  />
                </div>
                <div class="w-1/2">
                  <!-- Last Name input box -->
                  <input
                    type="text"
                    name="lastName"
                    id="lastName"
                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-2xl focus:ring-primary-600 focus:border-primary-600 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Last Name"
                    required
                    autocomplete="family-name"
                  />
                </div>
              </div>
              <div class="relative">
                <input
                  type="email"
                  name="email"
                  id="email"
                  class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-2xl focus:ring-primary-600 focus:border-primary-600 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder="Your email"
                  required=""
                  autocomplete="off"
                />
                <a
                  href="#"
                  id="sendOtpLink"
                  class="absolute top-1/4 right-6 text-sm text-blue-500"
                  >Send OTP</a
                >
              </div>

              <div id="otp-div" class="hidden">
                <label
                  for="otp"
                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                  >Verify OTP</label
                >
                <div class="relative">
                  <input
                    type="tel"
                    name="otp"
                    id="otp"
                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-2xl focus:ring-primary-600 focus:border-primary-600 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="XXXXXX"
                    required=""
                    autocomplete="off"
                    minlength="6"
                    maxlength="6"
                    pattern="\d{6}"
                    disabled
                  />
                  <a
                    href="#"
                    id="verifyOtp"
                    class="absolute top-1/4 right-6 text-sm text-blue-500"
                    >Verify</a
                  >
                </div>
              </div>
              <div class="relative">
                <input
                  type="password"
                  name="password"
                  id="password"
                  class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-2xl focus:ring-primary-600 focus:border-primary-600 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder="Create password"
                  required=""
                  autocomplete="off"
                />
              </div>


              <button
                type="submit"
                class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-2xl text-sm px-5 py-1 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
              >
                Register
              </button>
              <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                Already have an account?
                <a
                  href="login.php"
                  class="font-medium text-primary-600 hover:underline dark:text-primary-500"
                  >Login here</a
                >
              </p>
            </form>
          </div>
        </div>
      </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="js/script.js"></script>
  </body>
</html>
