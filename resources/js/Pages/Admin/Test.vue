<template>
	<div class="bg-gradient-to-b from-red-200 to-red-100  rounded-lg shadow-xl">
		<div class="w-full p-1">
			<nav class="bg-red-200 pt-2 md:pt-1 pb-1 px-1 mt-0 h-auto fixed w-full z-20 top-0">

			    <div class="flex flex-wrap items-center">
			        <div class="flex flex-shrink md:w-1/3 justify-center md:justify-start text-white">
			            <a href="#">
			                <img src="/images/logo.png" class="pl-2 h-12  bg-white  border" alt="Logo">
			            </a>
			        </div>

			        <div class="flex flex-1 md:w-1/3 justify-center md:justify-start text-white px-2">
			            <span class="relative w-full">
			                <input type="search" placeholder="Search" class="w-full bg-red-500 text-white transition border border-transparent focus:outline-none focus:border-gray-400 rounded py-3 px-2 pl-10 appearance-none leading-normal">
			                <div class="absolute search-icon" style="top: 1rem; left: .8rem;">
			                    <svg class="fill-current pointer-events-none text-white w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
			                        <path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z">
			                        	
			                        </path>
			                    </svg>
			                </div>
			            </span>
			        </div>

			        <div class="flex w-full pt-2 content-center justify-between md:w-1/3 md:justify-end">
			            <ul class="list-reset flex justify-between flex-1 md:flex-none items-center">
			                <li class="flex-1 md:flex-none md:mr-3">
			                    <a class="inline-block py-2 px-4 text-white no-underline" href="#">Active</a>
			                </li>
			                <li class="flex-1 md:flex-none md:mr-3">
			                    <a class="inline-block text-gray-600 no-underline hover:text-gray-200 hover:text-underline py-2 px-4" href="#">link</a>
			                </li>
			                <li class="flex-1 md:flex-none md:mr-3">
			                    <div class="relative inline-block">
			                        <button @click="toggleDD('myDropdown')" class="drop-button text-white focus:outline-none"> <span class="pr-2"><i class="em em-robot_face"></i></span> Hi, User <svg class="h-3 fill-current inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
			                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg></button>
			                        <div id="myDropdown" class="dropdownlist absolute bg-gray-800 text-white right-0 mt-3 p-3 overflow-auto z-30 invisible">
			                         <a href="#" class="p-2 hover:bg-gray-800 text-white text-sm no-underline hover:no-underline block"><i class="fa fa-user fa-fw"></i> Profile</a>
			                            <a href="#" class="p-2 hover:bg-gray-800 text-white text-sm no-underline hover:no-underline block"><i class="fa fa-cog fa-fw"></i> Settings</a>
			                            <div class="border border-gray-800"></div>
			                            <a href="#" class="p-2 hover:bg-gray-800 text-white text-sm no-underline hover:no-underline block"><i class="fas fa-sign-out-alt fa-fw"></i> Log Out</a>
			                        </div>
			                    </div>
			                </li>
			            </ul>
			        </div>
			    </div>

			</nav>
			<div class="bg-gradient-to-b from-red-200 to-red-100 border-b-4 border-red-500 rounded-lg shadow-xl mb-3">					<!-- component -->
				<div class="container my-12 mx-auto px-4 md:px-12">
					<div class="flex flex-wrap -mx-1 lg:-mx-4">
						<div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/4" v-for="(product, p) in products">
							            <!-- Article -->
							<article class="overflow-hidden rounded-lg shadow-lg"><inertia-link :href="'/olx/product/info/'+product.name">
							  <img alt="Placeholder" class="block h-auto w-full" src="/images/sketch.jpg">
							    </inertia-link>

							  <header class="flex items-center justify-between leading-tight p-1 md:p-4">
							      <h1 class="text-lg">
							          <span class="no-underline hover:bg-white">
							             {{product.product_name}}
							          </span>
							      </h1>
							      <p class="text-grey-darker text-sm">
							                        {{product.seen}}
							      </p>
							   </header>

							   <footer class="flex items-center justify-between leading-none p-1 md:p-4">
							     <a class="flex items-center no-underline  text-black cursor-pointer">
							      <img alt="Placeholder" class="bg-white text-blue-400 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2" src="/images/sketch.jpg">
							       <p class="ml-2 text-sm">
							           {{product.description}}
							       </p>
							      </a>
							       <p class="no-underline text-red-800 hover:text-purple-100">
							          <span class="hidden">Favourite</span>
							             <i class="fa fa-trash"></i>
							        </p>
							      </footer>
							 </article>
							            <!-- Product Article -->
							        </div>
							    </div>
							</div>

						</div>
		</div>

		<!-- Footer -->

		<footer class="relative bg-red-200 pt-8 pb-6">
		  <div
		    class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20 h-20"
		    style="transform: translateZ(0);"
		  >
		    <svg
		      class="absolute bottom-0 overflow-hidden"
		      xmlns="http://www.w3.org/2000/svg"
		      preserveAspectRatio="none"
		      version="1.1"
		      viewBox="0 0 2560 100"
		      x="0"
		      y="0"
		    >
		      <polygon
		        class="text-red-200 fill-current"
		        points="2560 0 2560 100 0 100"
		      ></polygon>
		    </svg>
		  </div>
		  <div class="container mx-auto px-4">
		    <div class="flex flex-wrap text-center lg:text-left">
		      <div class="w-full lg:w-6/12 px-4">
		        <h4 class="text-3xl font-semibold">Contact Us</h4>
		        <h5 class="text-lg mt-0 mb-2 text-gray-700">
		          Talk to us on any of our social media handles, we respond withing minutes.
		        </h5>
		        <div class="mt-6 lg:mb-0 mb-6">
		          <button
		            class="bg-white text-blue-400 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2"
		            type="button"
		          >
		            <i class="fab fa-twitter"></i>
		          </button>
		          <button
		            class="bg-white text-blue-600 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2"
		            type="button"
		          >
		            <i class="fab fa-facebook-square"></i>
		          </button>
		          <button
		            class="bg-white text-pink-400 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2"
		            type="button"
		          >
		            <i class="fab fa-dribbble"></i>
		          </button>
		          <button
		            class="bg-white text-gray-900 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2"
		            type="button"
		          >
		            <i class="fab fa-github"></i>
		          </button>
		        </div>
		      </div>
		      <div class="w-full lg:w-6/12 px-4">
		        <div class="flex flex-wrap items-top mb-6">
		          <div class="w-full lg:w-4/12 px-4 ml-auto">
		            <span
		              class="block uppercase text-gray-600 text-sm font-semibold mb-2"
		            >
		             You Might Like
		            </span>
		            <ul class="list-unstyled">
		              <li>
		                <a
		                  class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
		                  href="https://digitecsolution.com"
		                >
		                  About Us
		                </a>
		              </li>
		              <li>
		                <a
		                  class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
		                  href="https://digitecsolution.com/blog"
		                >
		                  Blog
		                </a>
		              </li>
		              <li>
		                <a
		                  class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
		                  href="https://github.com/ArnoldNicole"
		                >
		                  Github
		                </a>
		              </li>		              
		            </ul>
		          </div>
		          <div class="w-full lg:w-4/12 px-4">
		            <span
		              class="block uppercase text-gray-600 text-sm font-semibold mb-2"
		            >
		              Other Information
		            </span>
		            <ul class="list-unstyled">
		              <li>
		                <a
		                  class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
		                  href="#"
		                >
		                  BCLB NO
		                </a>
		              </li>
		              <li>
		                <a
		                  class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
		                  href="/terms-of-service"
		                >
		                  Terms of Service
		                </a>
		              </li>
		              <li>
		                <a
		                  class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
		                  href="/privacy-policy"
		                >
		                  Privacy Policy
		                </a>
		              </li>		              
		            </ul>
		          </div>
		        </div>
		      </div>
		    </div>
		    <hr class="my-6 border-gray-400" />
		    <div
		      class="flex flex-wrap items-center md:justify-between justify-center"
		    >
		      <div class="w-full md:w-4/12 px-4 mx-auto text-center">
		        <div class="text-sm text-gray-600 font-semibold py-1">
		          Copyright © {{ newDate }} DIGITECSOLUTION.COM
		          <a
		            href="https://digitecsolution.com/blog/author/arnold_wamae"
		            class="text-gray-600 hover:text-gray-900"
		          >
		            Arnold Wamae
		          </a>
		          .
		        </div>
		      </div>
		    </div>
		  </div>
		</footer>
	</div>
</template>
<script>
export default {
  data() {
    return {
      navbarOpen: false,
      canLogin:true,
      newDate: new Date().getFullYear(),
      canRegister:true,
      products:[{
      	name:'CSS_Design',
      	product_name:'CSS DESIGN',
      	seen:'45',
      	description:'This is just a sketch.',
      },
      {
      	name:'CSS_Design',
      	product_name:'CSS DESIGN',
      	seen:'45',
      	description:'This is just a sketch.',
      },
      {
      	name:'CSS_Design',
      	product_name:'CSS DESIGN',
      	seen:'45',
      	description:'This is just a sketch.',
      },
      {
      	name:'CSS_Design',
      	product_name:'CSS DESIGN',
      	seen:'45',
      	description:'This is just a sketch.',
      },
      {
      	name:'CSS_Design',
      	product_name:'CSS DESIGN',
      	seen:'45',
      	description:'This is just a sketch.',
      },
      {
      	name:'Laravel',
      	product_name:'Laravel Design',
      	seen:'100',
      	description:'This great laravel api connects microtics and gets data from the remote os',
      }],
    };
  }, 
  methods: {
    toggleDD(myDropMenu){
    	document.getElementById(myDropMenu).classList.toggle("invisible");
    },
  },
}	
</script>