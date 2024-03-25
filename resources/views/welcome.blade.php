<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Guest Book App</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />

        <!-- Styles -->
        <style>
            .gradient {
                background: linear-gradient(90deg, #002497 0%, #4359B2 100%);
            }
        </style>
    </head>

    <body class="leading-normal tracking-normal text-white gradient"
        style="font-family: 'Source Sans Pro', sans-serif;">
        <!--Hero-->
        <div class="pt-24">
            <div class="container px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center">
                <!--Left Col-->
                <div class="flex flex-col w-full md:w-2/5 justify-center items-start text-center md:text-left">
                    <p class="uppercase tracking-loose w-full">GUEST BOOK</p>
                    <h1 class="my-4 text-5xl font-bold leading-tight">
                        Welcome to Guest Book
                    </h1>
                    <p class="leading-normal text-2xl mb-8">
                        Explore our guests adventures in the Guestbook - capturing precious moments in unforgettable
                        notes
                    </p>
                    <a href="{{ route('filament.guest.resources.guest-books.index') }}"
                        class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                        Explore
                    </a>
                </div>
                <!--Right Col-->
                <div class="w-full md:w-3/5 py-6 text-center">
                    <img class="w-full md:w-4/5 z-50" src="{{ asset('images/hero.png') }}" />
                </div>
            </div>
        </div>
        <script>
            var scrollpos = window.scrollY;
          var header = document.getElementById("header");
          var navcontent = document.getElementById("nav-content");
          var navaction = document.getElementById("navAction");
          var brandname = document.getElementById("brandname");
          var toToggle = document.querySelectorAll(".toggleColour");

          document.addEventListener("scroll", function () {
            /*Apply classes for slide in bar*/
            scrollpos = window.scrollY;

            if (scrollpos > 10) {
              header.classList.add("bg-white");
              navaction.classList.remove("bg-white");
              navaction.classList.add("gradient");
              navaction.classList.remove("text-gray-800");
              navaction.classList.add("text-white");
              //Use to switch toggleColour colours
              for (var i = 0; i < toToggle.length; i++) {
                toToggle[i].classList.add("text-gray-800");
                toToggle[i].classList.remove("text-white");
              }
              header.classList.add("shadow");
              navcontent.classList.remove("bg-gray-100");
              navcontent.classList.add("bg-white");
            } else {
              header.classList.remove("bg-white");
              navaction.classList.remove("gradient");
              navaction.classList.add("bg-white");
              navaction.classList.remove("text-white");
              navaction.classList.add("text-gray-800");
              //Use to switch toggleColour colours
              for (var i = 0; i < toToggle.length; i++) {
                toToggle[i].classList.add("text-white");
                toToggle[i].classList.remove("text-gray-800");
              }

              header.classList.remove("shadow");
              navcontent.classList.remove("bg-white");
              navcontent.classList.add("bg-gray-100");
            }
          });
        </script>
        <script>
            /*Toggle dropdown list*/
          /*https://gist.github.com/slavapas/593e8e50cf4cc16ac972afcbad4f70c8*/

          var navMenuDiv = document.getElementById("nav-content");
          var navMenu = document.getElementById("nav-toggle");

          document.onclick = check;
          function check(e) {
            var target = (e && e.target) || (event && event.srcElement);

            //Nav Menu
            if (!checkParent(target, navMenuDiv)) {
              // click NOT on the menu
              if (checkParent(target, navMenu)) {
                // click on the link
                if (navMenuDiv.classList.contains("hidden")) {
                  navMenuDiv.classList.remove("hidden");
                } else {
                  navMenuDiv.classList.add("hidden");
                }
              } else {
                // click both outside link and outside menu, hide menu
                navMenuDiv.classList.add("hidden");
              }
            }
          }
          function checkParent(t, elm) {
            while (t.parentNode) {
              if (t == elm) {
                return true;
              }
              t = t.parentNode;
            }
            return false;
          }
        </script>
    </body>

</html>