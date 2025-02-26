<body class="bg-gray-100 flex items-center justify-center min-h-screen">
  <div class="container w-[100vw]">
    <div class="w-dvw">
      <div class="swiper rounded-lg shadow-lg h-screen">
        <div class="swiper-wrapper">
          <div
            class="swiper-slide flex items-center justify-center bg-[url('/storage/app/public/working/pexels-photo-842811.jpeg')] bg-cover bg-no-repeat w-screen h-screen text-white">
            <h1 class="text-7xl font-bold italic text-center text-white mt-50">Welcome to Incognito Boutique</h1>
          </div>
          <div
            class="swiper-slide flex items-center justify-center h-64 bg-[url('https://www.shopimpressions.com/cdn/shop/files/inbloom-desktop2_1600x_crop_center.jpg?v=1738880331')] bg-center bg-no-repeat w-screen text-white">
          </div>
          <div
            class="swiper-slide flex items-center justify-center h-64 bg-[url('https://www.shopimpressions.com/cdn/shop/files/thatsamore-desktop_1600x_crop_center.jpg?v=1736533910')] bg-center bg-no-repeat w-screen text-white">
          </div>
        </div>
        <!-- Pagination & Navigation -->
        <div class="swiper-pagination"></div>
        <!-- <div class="swiper-button-next"></div> -->
        <!-- <div class="swiper-button-prev"></div> -->

        <script>
          document.addEventListener("DOMContentLoaded", function () {
            new Swiper(".swiper", {
              loop: true,
              autoplay: { delay: 3000 },
              pagination: { el: ".swiper-pagination", clickable: true },
              navigation: { nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" },
            });
          });
        </script>
      </div>









      <!-- brands -->
      <!-- Second Swiper Slider -->
      <div class="mt-5 block w-screen max-w-screen border-2 border-amber-500 mx-3">
        <h1 class="text-4xl font-bold italic text-center text-gray-800">Our Brands</h1>
        <div class="swiper swiper2 rounded-lg shadow-lg ">
          <div class="swiper-wrapper">
            <!-- firstswiper -->
            <div class="swiper-slide">
              <div class="flex items-center justify-around mx-2 w-screen">
                <div id="firstbrand">
                  <img
                    src="https://www.shopimpressions.com/cdn/shop/files/2411057903000-2024110811322900-1ff7f0f6new-in-express-sample-1_375x_crop_center.jpg?v=1737664889"
                    alt="New Collection" class="rounded-lg">
                  <h1 class="text-3xl font-bold italic text-center text-white mt-1">brand 2</h1>
                  <p class="break-all">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Magnam quos eius, nemo
                    ea blanditiis porro?</p>
                </div>

                <div id="secondbrand">
                  <img
                    src="https://www.shopimpressions.com/cdn/shop/files/2411057903000-2024110811322900-1ff7f0f6new-in-express-sample-1_375x_crop_center.jpg?v=1737664889"
                    alt="New Collection" class="object-cover rounded-lg">
                  <h1 class="text-3xl font-bold italic text-center text-white mt-1">brand 2</h1>
                  <p class="break-all">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Magnam quos eius, nemo
                    ea blanditiis porro?</p>
                </div>

                <div id="thirdbrand">
                  <img
                    src="https://www.shopimpressions.com/cdn/shop/files/2411057903000-2024110811322900-1ff7f0f6new-in-express-sample-1_375x_crop_center.jpg?v=1737664889"
                    alt="New Collection" class="object-cover rounded-lg">
                  <h1 class="text-3xl font-bold italic text-center text-white mt-1">brand 3</h1>
                  <p class="break-all">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Magnam quos eius, nemo
                    ea blanditiis porro?</p>
                </div>

              </div>
            </div>
            <!-- secondswiper -->
            <div class="swiper-slide flex-row items-center justify-center gap-1">
              <div class="flex items-center justify-center">
                <div id="fourthbrand">
                  <img
                    src="https://www.shopimpressions.com/cdn/shop/files/2411057903000-2024110811322900-1ff7f0f6new-in-express-sample-1_375x_crop_center.jpg?v=1737664889"
                    alt="New Collection" class="object-cover rounded-lg">
                  <h1 class="text-3xl font-bold italic text-center text-white mt-1">brand 4</h1>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis deleniti harum id placeat
                    similique ipsum ducimus ea voluptatum quidem architecto.</p>
                </div>

                <div id="fifthbrand">
                  <img
                    src="https://www.shopimpressions.com/cdn/shop/files/2411057903000-2024110811322900-1ff7f0f6new-in-express-sample-1_375x_crop_center.jpg?v=1737664889"
                    alt="New Collection" class="object-cover rounded-lg">
                  <h1 class="text-3xl font-bold italic text-center text-white mt-1">brand 5</h1>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis deleniti harum id placeat
                    similique ipsum ducimus ea voluptatum quidem architecto.</p>
                </div>

                <div id="sixthbrand">
                  <img
                    src="https://www.shopimpressions.com/cdn/shop/files/2411057903000-2024110811322900-1ff7f0f6new-in-express-sample-1_375x_crop_center.jpg?v=1737664889"
                    alt="New Collection" class="object-cover rounded-lg">
                  <h1 class="text-3xl font-bold italic text-center text-white mt-1">brand 6</h1>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis deleniti harum id placeat
                    similique ipsum ducimus ea voluptatum quidem architecto.</p>
                </div>

              </div>
            </div>
            <!-- thirdswiper -->
            <div class="swiper-slide flex-row items-center justify-center">
              <div class="flex items-center justify-center gap-1">
                <div id="seventhbrand">
                  <img
                    src="https://www.shopimpressions.com/cdn/shop/files/2411057903000-2024110811322900-1ff7f0f6new-in-express-sample-1_375x_crop_center.jpg?v=1737664889"
                    alt="New Collection" class="object-cover rounded-lg">
                  <h1 class="text-3xl font-bold italic text-center text-white mt-1">brand 7</h1>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis deleniti harum id placeat
                    similique ipsum ducimus ea voluptatum quidem architecto.</p>
                </div>

                <div id="secondbrand">
                  <img
                    src="https://www.shopimpressions.com/cdn/shop/files/2411057903000-2024110811322900-1ff7f0f6new-in-express-sample-1_375x_crop_center.jpg?v=1737664889"
                    alt="New Collection" class="object-cover rounded-lg">
                  <h1 class="text-3xl font-bold italic text-center text-white mt-1">brand 2</h1>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis deleniti harum id placeat
                    similique ipsum ducimus ea voluptatum quidem architecto.</p>
                </div>

                <div id="eighthbrand">
                  <img
                    src="https://www.shopimpressions.com/cdn/shop/files/2411057903000-2024110811322900-1ff7f0f6new-in-express-sample-1_375x_crop_center.jpg?v=1737664889"
                    alt="New Collection" class="object-cover rounded-lg">
                  <h1 class="text-3xl font-bold italic text-center text-white mt-1">brand 8</h1>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis deleniti harum id placeat
                    similique ipsum ducimus ea voluptatum quidem architecto.</p>
                </div>

              </div>
            </div>
          </div>

          <!-- Pagination -->
          <div class="swiper-pagination"></div>
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>

        </div>
      </div>






      <!-- Categories -->
      <div class="m-3 w-full h-full border-amber-500 border-2 mx-2 bg-slate-400 rounded-lg">
        <h1 class="text-4xl font-bold italic text-center text-white p-2">Categories</h1>
        <div class="grid-cols-3 grid gap-2 mx-1">
          <div id="category1"
            class="bg-[url('https://www.shopimpressions.com/cdn/shop/files/2411057903000-2024110811322900-1ff7f0f6new-in-express-sample-1_375x_crop_center.jpg?v=1737664889')] h-80 rounded-lg">
            <div id="categoriescontent" class="flex flex-col items-center justify-around rounded-lg h-full">
              <h1 class="text-3xl font-bold italic text-center text-white mt-1">category name</h1>
              <button
                class="bg-white text-black rounded-lg inline-block p-2 hover:bg-blue-500 hover:cursor-pointer">Shop
                now</button>
            </div>
          </div>
          <div id="category1"
            class="bg-[url('https://www.shopimpressions.com/cdn/shop/files/2411057903000-2024110811322900-1ff7f0f6new-in-express-sample-1_375x_crop_center.jpg?v=1737664889')] h-80 rounded-lg">
            <div id="categoriescontent" class="flex flex-col items-center justify-around rounded-lg h-full">
              <h1 class="text-3xl font-bold italic text-center text-white mt-1">category name</h1>
              <button
                class="bg-white text-black rounded-lg inline-block p-2 hover:bg-blue-500 hover:cursor-pointer">Shop
                now</button>
            </div>
          </div>
          <div id="category1"
            class="bg-[url('https://www.shopimpressions.com/cdn/shop/files/2411057903000-2024110811322900-1ff7f0f6new-in-express-sample-1_375x_crop_center.jpg?v=1737664889')] h-80 rounded-lg">
            <div id="categoriescontent" class="flex flex-col items-center justify-around rounded-lg h-full">
              <h1 class="text-3xl font-bold italic text-center text-white mt-1">category name</h1>
              <button
                class="bg-white text-black rounded-lg inline-block p-2 hover:bg-blue-500 hover:cursor-pointer">Shop
                now</button>
            </div>
          </div>
          <div id="category1"
            class="bg-[url('https://www.shopimpressions.com/cdn/shop/files/2411057903000-2024110811322900-1ff7f0f6new-in-express-sample-1_375x_crop_center.jpg?v=1737664889')] h-80 rounded-lg">
            <div id="categoriescontent" class="flex flex-col items-center justify-around rounded-lg h-full">
              <h1 class="text-3xl font-bold italic text-center text-white mt-1">category name</h1>
              <button
                class="bg-white text-black rounded-lg inline-block p-2 hover:bg-blue-500 hover:cursor-pointer">Shop
                now</button>
            </div>
          </div>
          <div id="category1"
            class="bg-[url('https://www.shopimpressions.com/cdn/shop/files/2411057903000-2024110811322900-1ff7f0f6new-in-express-sample-1_375x_crop_center.jpg?v=1737664889')] h-80 rounded-lg">
            <div id="categoriescontent" class="flex flex-col items-center justify-around rounded-lg h-full">
              <h1 class="text-3xl font-bold italic text-center text-white mt-1">category name</h1>
              <button
                class="bg-white text-black rounded-lg inline-block p-2 hover:bg-blue-500 hover:cursor-pointer">Shop
                now</button>
            </div>
          </div>
          <div
            class="category1 bg-[url('https://www.shopimpressions.com/cdn/shop/files/2411057903000-2024110811322900-1ff7f0f6new-in-express-sample-1_375x_crop_center.jpg?v=1737664889')] h-80 rounded-lg">
            <div id="categoriescontent" class="flex flex-col items-center justify-around rounded-lg h-full">
              <h1 class="text-3xl font-bold italic text-center text-white mt-1">category name</h1>
              <button
                class="bg-white text-black rounded-lg inline-block p-2 hover:bg-blue-500 hover:cursor-pointer">Shop
                now</button>
            </div>
          </div>
          <div id="category1"
            class="bg-[url('https://www.shopimpressions.com/cdn/shop/files/2411057903000-2024110811322900-1ff7f0f6new-in-express-sample-1_375x_crop_center.jpg?v=1737664889')] h-80 rounded-lg">
            <div id="categoriescontent" class="flex flex-col items-center justify-around rounded-lg h-full">
              <h1 class="text-3xl font-bold italic text-center text-white mt-1">category name</h1>
              <button
                class="bg-white text-black rounded-lg inline-block p-2 hover:bg-blue-500 hover:cursor-pointer">Shop
                now</button>
            </div>
          </div>
          <div id="category1"
            class="bg-[url('https://www.shopimpressions.com/cdn/shop/files/2411057903000-2024110811322900-1ff7f0f6new-in-express-sample-1_375x_crop_center.jpg?v=1737664889')] h-80 rounded-lg">
            <div id="categoriescontent" class="flex flex-col items-center justify-around rounded-lg h-full">
              <h1 class="text-3xl font-bold italic text-center text-white mt-1">category name</h1>
              <button
                class="bg-white text-black rounded-lg inline-block p-2 hover:bg-blue-500 hover:cursor-pointer">Shop
                now</button>
            </div>
          </div>
          <div id="category1"
            class="bg-[url('https://www.shopimpressions.com/cdn/shop/files/2411057903000-2024110811322900-1ff7f0f6new-in-express-sample-1_375x_crop_center.jpg?v=1737664889')] h-80 rounded-lg">
            <div id="categoriescontent" class="flex flex-col items-center justify-around rounded-lg h-full">
              <h1 class="text-3xl font-bold italic text-center text-white mt-1">category name</h1>
              <button
                class="bg-white text-black rounded-lg inline-block p-2 hover:bg-blue-500 hover:cursor-pointer">Shop
                now</button>
            </div>
          </div>
        </div>
      </div>





      <!-- ALL FESTIVE BANNER -->



      <div class="bg-[url('C:\Users\Brian\Desktop\Projects\boutique_project\storage\app\public\working\istockphoto-1094338222-1024x1024.jpg')] h-screen rounded-lg">
        <div id="festivebanner" class="flex flex-col items-center justify-around rounded-lg h-full">
          <h2 class="text-7xl font-bold italic text-center text-pink-700 mt-1">YOUR ALL FESTIVES BOUTIQUE</h2>
          <h2 class="text-7xl font-bold italic text-center text-pink-700 mt-1">EVEN IN OUTING MOMENTS</h2>
        </div>
      </div>






      <!-- ONLY FOR YOU -->

      <div class="m-3 w-full h-full border-amber-500 border-2 mx-2 bg-slate-400 rounded-lg">
        <h1 class="text-4xl font-bold italic text-center text-white p-2">Selected Only For You</h1>
        <div class="grid-cols-3 grid gap-2 mx-1">
          <div
            class="bg-[url('https://www.shopimpressions.com/cdn/shop/files/2411057903000-2024110811322900-1ff7f0f6new-in-express-sample-1_375x_crop_center.jpg?v=1737664889')] h-80 rounded-lg">
            <div id="categoriescontent" class="flex flex-col items-center justify-around rounded-lg h-full">
              <h4 class="text-xl font-bold italic text-center text-blue-600 mt-1">Spring Meadows Floral Midi Curves</h4>
              <button
                class="bg-white text-black rounded-lg inline-block p-2 hover:bg-blue-500 hover:cursor-pointer">Shop
                now</button>
            </div>
          </div>
          <div
            class="bg-[url('https://www.shopimpressions.com/cdn/shop/files/2411057903000-2024110811322900-1ff7f0f6new-in-express-sample-1_375x_crop_center.jpg?v=1737664889')] h-80 rounded-lg">
            <div id="categoriescontent" class="flex flex-col items-center justify-around rounded-lg h-full">
              <h4 class="text-xl font-bold italic text-center text-blue-600 mt-1">Spring Meadows Floral Midi Curves</h4>
              <button
                class="bg-white text-black rounded-lg inline-block p-2 hover:bg-blue-500 hover:cursor-pointer">Shop
                now</button>
            </div>
          </div>
          <div
            class="bg-[url('https://www.shopimpressions.com/cdn/shop/files/2411057903000-2024110811322900-1ff7f0f6new-in-express-sample-1_375x_crop_center.jpg?v=1737664889')] h-80 rounded-lg">
            <div id="categoriescontent" class="flex flex-col items-center justify-around rounded-lg h-full">
              <h4 class="text-xl font-bold italic text-center text-blue-600 mt-1">Spring Meadows Floral Midi Curves</h4>
              <button
                class="bg-white text-black rounded-lg inline-block p-2 hover:bg-blue-500 hover:cursor-pointer">Shop
                now</button>
            </div>
          </div>
          <div
            class="bg-[url('https://www.shopimpressions.com/cdn/shop/files/2411057903000-2024110811322900-1ff7f0f6new-in-express-sample-1_375x_crop_center.jpg?v=1737664889')] h-80 rounded-lg">
            <div id="categoriescontent" class="flex flex-col items-center justify-around rounded-lg h-full">
              <h4 class="text-xl font-bold italic text-center text-blue-600 mt-1">Spring Meadows Floral Midi Curves</h4>
              <button
                class="bg-white text-black rounded-lg inline-block p-2 hover:bg-blue-500 hover:cursor-pointer">Shop
                now</button>
            </div>
          </div>
          <div
            class="bg-[url('https://www.shopimpressions.com/cdn/shop/files/2411057903000-2024110811322900-1ff7f0f6new-in-express-sample-1_375x_crop_center.jpg?v=1737664889')] h-80 rounded-lg">
            <div id="categoriescontent" class="flex flex-col items-center justify-around rounded-lg h-full">
              <h4 class="text-xl font-bold italic text-center text-blue-600 mt-1">Spring Meadows Floral Midi Curves</h4>
              <button
                class="bg-white text-black rounded-lg inline-block p-2 hover:bg-blue-500 hover:cursor-pointer">Shop
                now</button>
            </div>
          </div>
          <div
            class="bg-[url('https://www.shopimpressions.com/cdn/shop/files/2411057903000-2024110811322900-1ff7f0f6new-in-express-sample-1_375x_crop_center.jpg?v=1737664889')] h-80 rounded-lg">
            <div id="categoriescontent" class="flex flex-col items-center justify-around rounded-lg h-full">
              <h4 class="text-xl font-bold italic text-center text-blue-600 mt-1">Spring Meadows Floral Midi Curves</h4>
              <button
                class="bg-white text-black rounded-lg inline-block p-2 hover:bg-blue-500 hover:cursor-pointer">Shop
                now</button>
            </div>
          </div>
        </div>
        <button class="mx-auto bg-blue-900 hover:bg-blue-600 hover:cursor-pointer p-4 rounded-lg text-2xl text-white my-2 block">View All</button>
      </div>

      





      <!-- LATEST COLLECTION -->

      <div class="m-3 w-full h-full border-amber-500 border-2 mx-2 bg-slate-400 rounded-lg">
        <h1 class="text-4xl font-bold italic text-center text-white p-2">Shop our latest collections</h1>
        <div class="grid-cols-3 grid gap-2 mx-1">
          <div
            class="bg-[url('https://www.shopimpressions.com/cdn/shop/files/2411057903000-2024110811322900-1ff7f0f6new-in-express-sample-1_375x_crop_center.jpg?v=1737664889')] h-80 rounded-lg">
            <div id="categoriescontent" class="flex flex-col items-center justify-around rounded-lg h-full">
              <h4 class="text-xl font-bold italic text-center text-blue-600 mt-1">Spring Meadows Floral Midi Curves</h4>
              <button
                class="bg-white text-black rounded-lg inline-block p-2 hover:bg-blue-500 hover:cursor-pointer">Shop
                now</button>
            </div>
          </div>
          <div
            class="bg-[url('https://www.shopimpressions.com/cdn/shop/files/2411057903000-2024110811322900-1ff7f0f6new-in-express-sample-1_375x_crop_center.jpg?v=1737664889')] h-80 rounded-lg">
            <div id="categoriescontent" class="flex flex-col items-center justify-around rounded-lg h-full">
              <h4 class="text-xl font-bold italic text-center text-blue-600 mt-1">Spring Meadows Floral Midi Curves</h4>
              <button
                class="bg-white text-black rounded-lg inline-block p-2 hover:bg-blue-500 hover:cursor-pointer">Shop
                now</button>
            </div>
          </div>
          <div
            class="bg-[url('https://www.shopimpressions.com/cdn/shop/files/2411057903000-2024110811322900-1ff7f0f6new-in-express-sample-1_375x_crop_center.jpg?v=1737664889')] h-80 rounded-lg">
            <div id="categoriescontent" class="flex flex-col items-center justify-around rounded-lg h-full">
              <h4 class="text-xl font-bold italic text-center text-blue-600 mt-1">Spring Meadows Floral Midi Curves</h4>
              <button
                class="bg-white text-black rounded-lg inline-block p-2 hover:bg-blue-500 hover:cursor-pointer">Shop
                now</button>
            </div>
          </div>
          <div
            class="bg-[url('https://www.shopimpressions.com/cdn/shop/files/2411057903000-2024110811322900-1ff7f0f6new-in-express-sample-1_375x_crop_center.jpg?v=1737664889')] h-80 rounded-lg">
            <div id="categoriescontent" class="flex flex-col items-center justify-around rounded-lg h-full">
              <h4 class="text-xl font-bold italic text-center text-blue-600 mt-1">Spring Meadows Floral Midi Curves</h4>
              <button
                class="bg-white text-black rounded-lg inline-block p-2 hover:bg-blue-500 hover:cursor-pointer">Shop
                now</button>
            </div>
          </div>
          <div
            class="bg-[url('https://www.shopimpressions.com/cdn/shop/files/2411057903000-2024110811322900-1ff7f0f6new-in-express-sample-1_375x_crop_center.jpg?v=1737664889')] h-80 rounded-lg">
            <div id="categoriescontent" class="flex flex-col items-center justify-around rounded-lg h-full">
              <h4 class="text-xl font-bold italic text-center text-blue-600 mt-1">Spring Meadows Floral Midi Curves</h4>
              <button
                class="bg-white text-black rounded-lg inline-block p-2 hover:bg-blue-500 hover:cursor-pointer">Shop
                now</button>
            </div>
          </div>
          <div
            class="bg-[url('https://www.shopimpressions.com/cdn/shop/files/2411057903000-2024110811322900-1ff7f0f6new-in-express-sample-1_375x_crop_center.jpg?v=1737664889')] h-80 rounded-lg">
            <div id="categoriescontent" class="flex flex-col items-center justify-around rounded-lg h-full">
              <h4 class="text-xl font-bold italic text-center text-blue-600 mt-1">Spring Meadows Floral Midi Curves</h4>
              <button
                class="bg-white text-black rounded-lg inline-block p-2 hover:bg-blue-500 hover:cursor-pointer">Shop
                now</button>
            </div>
          </div>
        </div>
        <button class="mx-auto bg-blue-900 hover:bg-blue-600 hover:cursor-pointer p-4 rounded-lg text-2xl text-white my-2 block">View All</button>
      </div>

      

      





      <!-- LATEST COLLECTION -->

      <div class="m-3 w-full h-full border-amber-500 border-2 mx-2 bg-slate-400 rounded-lg">
        <h1 class="text-4xl font-bold italic text-center text-white p-2">View Trending Clothes</h1>
        <div class="grid-cols-3 grid gap-2 mx-1">
          <div
            class="bg-[url('https://www.shopimpressions.com/cdn/shop/files/2411057903000-2024110811322900-1ff7f0f6new-in-express-sample-1_375x_crop_center.jpg?v=1737664889')] h-80 rounded-lg">
            <div id="categoriescontent" class="flex flex-col items-center justify-around rounded-lg h-full">
              <h4 class="text-xl font-bold italic text-center text-blue-600 mt-1">Spring Meadows Floral Midi Curves</h4>
              <button
                class="bg-white text-black rounded-lg inline-block p-2 hover:bg-blue-500 hover:cursor-pointer">Shop
                now</button>
            </div>
          </div>
          <div
            class="bg-[url('https://www.shopimpressions.com/cdn/shop/files/2411057903000-2024110811322900-1ff7f0f6new-in-express-sample-1_375x_crop_center.jpg?v=1737664889')] h-80 rounded-lg">
            <div id="categoriescontent" class="flex flex-col items-center justify-around rounded-lg h-full">
              <h4 class="text-xl font-bold italic text-center text-blue-600 mt-1">Spring Meadows Floral Midi Curves</h4>
              <button
                class="bg-white text-black rounded-lg inline-block p-2 hover:bg-blue-500 hover:cursor-pointer">Shop
                now</button>
            </div>
          </div>
          <div
            class="bg-[url('https://www.shopimpressions.com/cdn/shop/files/2411057903000-2024110811322900-1ff7f0f6new-in-express-sample-1_375x_crop_center.jpg?v=1737664889')] h-80 rounded-lg">
            <div id="categoriescontent" class="flex flex-col items-center justify-around rounded-lg h-full">
              <h4 class="text-xl font-bold italic text-center text-blue-600 mt-1">Spring Meadows Floral Midi Curves</h4>
              <button
                class="bg-white text-black rounded-lg inline-block p-2 hover:bg-blue-500 hover:cursor-pointer">Shop
                now</button>
            </div>
          </div>
          <div
            class="bg-[url('https://www.shopimpressions.com/cdn/shop/files/2411057903000-2024110811322900-1ff7f0f6new-in-express-sample-1_375x_crop_center.jpg?v=1737664889')] h-80 rounded-lg">
            <div id="categoriescontent" class="flex flex-col items-center justify-around rounded-lg h-full">
              <h4 class="text-xl font-bold italic text-center text-blue-600 mt-1">Spring Meadows Floral Midi Curves</h4>
              <button
                class="bg-white text-black rounded-lg inline-block p-2 hover:bg-blue-500 hover:cursor-pointer">Shop
                now</button>
            </div>
          </div>
          <div
            class="bg-[url('https://www.shopimpressions.com/cdn/shop/files/2411057903000-2024110811322900-1ff7f0f6new-in-express-sample-1_375x_crop_center.jpg?v=1737664889')] h-80 rounded-lg">
            <div id="categoriescontent" class="flex flex-col items-center justify-around rounded-lg h-full">
              <h4 class="text-xl font-bold italic text-center text-blue-600 mt-1">Spring Meadows Floral Midi Curves</h4>
              <button
                class="bg-white text-black rounded-lg inline-block p-2 hover:bg-blue-500 hover:cursor-pointer">Shop
                now</button>
            </div>
          </div>
          <div
            class="bg-[url('https://www.shopimpressions.com/cdn/shop/files/2411057903000-2024110811322900-1ff7f0f6new-in-express-sample-1_375x_crop_center.jpg?v=1737664889')] h-80 rounded-lg">
            <div id="categoriescontent" class="flex flex-col items-center justify-around rounded-lg h-full">
              <h4 class="text-xl font-bold italic text-center text-blue-600 mt-1">Spring Meadows Floral Midi Curves</h4>
              <button
                class="bg-white text-black rounded-lg inline-block p-2 hover:bg-blue-500 hover:cursor-pointer">Shop
                now</button>
            </div>
          </div>
        </div>
        <button class="mx-auto bg-blue-900 hover:bg-blue-600 hover:cursor-pointer p-4 rounded-lg text-2xl text-white my-2 block">View All</button>
      </div>

    </div>
  </div>

  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <!-- Swiper Initialization -->
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      new Swiper(".swiper2", {
        loop: true,
        autoplay: { delay: 10000 },
        pagination: { el: ".swiper-pagination", clickable: true },
        navigation: { nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" },
      });
    });
  </script>

</body>