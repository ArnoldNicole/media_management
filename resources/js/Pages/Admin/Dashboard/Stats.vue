<template>
	<div>
		<div
		  class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg"
		>
		  <div class="flex-auto p-4">
		    <div class="flex flex-wrap">
		      <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
		        <h5 class="text-gray-500 uppercase font-bold text-xs">
		          Count
		        </h5>
		        <span class="font-semibold text-xl text-gray-800">
		          Files
		        </span>
		      </div>
		      <div class="relative w-auto pl-4 flex-initial">
		        <div
		          class="text-white bg-pink-500 p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full"		          
		        >
		          <i class="fa fa-users"></i>
		        </div>
		      </div>
		    </div>
		    <p class="text-sm text-gray-500 mt-4">
		      <span class="mr-2 text-red-900">
		        <i
		          class="fas fa-arrow-up"
		        ></i>
		        80%
		      </span>
		      <span class="whitespace-no-wrap">This are the files in our server as at now</span>
		    </p>
		  </div>
	</div>
</div>
</template>
<script>
	
	export default{
		data(){
			return {
			
			}
		}
	}
</script>