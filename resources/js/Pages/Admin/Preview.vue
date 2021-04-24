<template>
  <div>
    <nav
      class="md:left-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-no-wrap md:overflow-hidden shadow-xl bg-white flex flex-wrap items-center justify-between relative md:w-72 z-10 py-4 px-6"
    >
      <div
        class="md:flex-col md:items-stretch md:min-h-full md:flex-no-wrap px-0 flex flex-wrap items-center justify-between w-full mx-auto"
      >
        <!-- Toggler -->
        <button
          class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"
          type="button"
          v-on:click="toggleCollapseShow('bg-white m-2 py-3 px-6')"
        >
          <i class="fas fa-bars"></i>
        </button>
       
        <div
          class="md:block text-left md:pb-2 text-gray-700 mr-0 inline-block whitespace-no-wrap tp-4 px-0"
                >
         <p class="text-sm py-1">MarketPlace</p>
          <div class="flex">
          	<h1 class="text-lg">Item For Sale</h1>
          	<button class="bg-white divide-gray-700 float-right px-2 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none ml-4 ease-linear transition-all duration-150 float-right">Save Draft</button>
          </div>
        </div>


        <div
          class="md:flex md:flex-col md:items-stretch md:opacity-100 md:relative md:mt-4 md:shadow-none shadow absolute top-0 left-0 right-0 z-40 overflow-y-auto overflow-x-hidden h-auto items-center flex-1 rounded"
          v-bind:class="collapseShow"
        >      
          <!-- Form -->
          <form class="mt-6 mb-4 bg-white">
            <div class="mb-3 pt-0">
              <label class="w-36 text-center flex flex-col items-center px-2 py-3 bg-white rounded-lg shadow-lg tracking-wide cursor-pointer hover:bg-blue hover:text-white">
              	<span>Add Photo</span>
                  <input type='file'  class="hidden" />
              </label>
            </div>
          </form>
          
          <input
            type="text"
            placeholder="Title"
            class="px-3 py-2 h-10 mb-1 border border-solid border-gray-600 placeholder-gray-400 text-gray-700 bg-white rounded text-base leading-snug shadow-none outline-none focus:outline-none w-full font-normal"
          />

          <input
            type="text"
            placeholder="Price"
            class="px-3 py-2 h-10 mb-1 border border-solid border-gray-600 placeholder-gray-400 text-gray-700 bg-white rounded text-base leading-snug shadow-none outline-none focus:outline-none w-full font-normal"
          />

          <select 
            class="px-3 py-2 h-10 mb-1 border border-solid border-gray-600 placeholder-gray-400 text-gray-700 bg-white rounded text-base leading-snug shadow-none outline-none focus:outline-none w-full font-normal"
          >
          <option value="">Category</option>
      	</select>

      	<select 
            class="px-3 py-2 h-10 mb-1 border border-solid border-gray-600 placeholder-gray-400 text-gray-700 bg-white rounded text-base leading-snug shadow-none outline-none focus:outline-none w-full font-normal"
          >
          <option value="">Conditions</option>
      	</select>

      	<textarea 
      		placeholder="Description"
      		rows="5" 
            class="px-3 py-2  mb-1 border border-solid border-gray-600 placeholder-gray-400 text-gray-700 bg-white rounded text-base leading-snug shadow-none outline-none focus:outline-none w-full font-normal"
          >
          
      	</textarea>

      	<input
            type="text"
            placeholder="Product Tag"
            class="px-3 py-2 h-10 mb-1 border border-solid border-gray-600 placeholder-gray-400 text-gray-700 bg-white rounded text-base leading-snug shadow-none outline-none focus:outline-none w-full font-normal"
          />
          
        </div>
      </div>
    </nav>
    <div class="relative md:ml-72 bg-gray-200 h-screen"> 
      <div class="px-4 mx-auto w-full">        
        <div class="flex flex-wrap">
          <div class="lg:pt-12 pt-6 w-full px-4 text-center">
            <div
              class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg  mt-12"
            >
              <!-- <div class="px-2 py-2 flex-auto"> -->
              	<div class="md:flex">
              		<small class="ml-0 mt-1 mb-4">Preview</small>
              	    <div class="w-full mb-2 mt-4 md:w-10/12 md:mx-4 border rounded shadow-sm">              	        
              	        <div class="px-4 py-4">
              	            <div>
              	                <a href="#" class="font-semibold leading-tight text-2xl text-gray-500 hover:text-gray-200">
              	                Your Listing Preview
              	                </a>
              	            </div>
              	            <hr class="border-gray-200 my-1 border-bottom-none" style="border-top-width:0">
              	            <p class="text-gray-900">
              	            As you create your listing, you can preview how it will appear to others on market place
              	            </p>
              	        </div>
              	    </div>
              	</div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data(){
  	return {
  		collapseShow: "hidden",
  	}
  },
  methods: {
    toggleCollapseShow: function (classes) {
      this.collapseShow = classes;
    },
  }, 
}
</script>
