<template>
	<div>
		<form @submit.prevent="saveFile">
			<h3 class="text-center">Add a Thumbnail for {{file.filename}}</h3>
			<div class="flex justify-around my-2">
			    <div class="flex flex-wrap w-10/12">
			       <div class="flex w-full items-center justify-center bg-grey-lighter">
			           <label class="w-64 flex flex-col items-center px-4 py-6 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-white">
			               <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
			                   <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
			               </svg>
			               <span class="mt-2 text-base leading-normal">Select a file</span>
			               <input type='file' required @change="Images_onFileChanged" class="hidden" />
			           </label>
			       </div>

			       <div v-if="url" class="mt-1 text-green-800 font-serif font-bold animate-pulse">{{ url }}</div>
			        
			        <div v-if="errors" class="mt-1 text-red-600 font-serif font-bold animate-pulse">{{ form.errors.file }}</div> 
			    </div>
			</div>

			<div class="flex justify-around my-2">
			        <div class="flex flex-wrap w-10/12">
			            <button :disabled="form.processing" type="submit"  class="p-2 bg-gray-400 text-white  rounded-md tracking-wider cursor-pointer" required>
			                {{form.processing ? 'Saving...' : 'Save File'}}
			            </button>
			        </div>
			 </div>

		</form>
	</div>
</template>
<script>
	export default{
		data(){
			return {
				form: this.$inertia.form({
				    id:'',
				    file:'',                   
				}),
				url:null,
			}
		},
		props:{
			file:Object,
			errors:Object,
		},
		methods:{
			Images_onFileChanged(event){
                this.form.file = event.target.files[0];               
                this.url = this.form.file.name;
            },
            saveFile(){
            	this.form.id = this.file.id            	
            	this.form.post(this.route('save.thumbnail'))
            }
		}
	}	
</script>