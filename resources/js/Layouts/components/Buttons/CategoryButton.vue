<template>
	<div>
		<button @click="openModal"
		  class="bg-pink-500 text-white active:bg-pink-600 font-bold uppercase text-xs px-2 py-0 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
		  type="button"
		>
		  New Category
		</button>

		<new-file-modal :show="show">
			<template #title>
				Create a New Category
			</template>
			<template #content>
					<form @submit.prevent="saveCategory">
						<div class="flex justify-around my-2">
				        		<div class="flex flex-wrap w-10/12">
				        			<label class="font-bold text-green-500">Category Name</label>
				        			<input type="text" v-model="data.categoryName" class="p-2 rounded-full border shadow-md w-full" placeholder="Category Name" required>
				        			<div v-if="errors" class="mt-1 text-red-600 font-serif font-bold animate-pulse">{{ errors.categoryName }}</div>  
				        		</div>
				        	</div>

				        	<div class="flex justify-around my-2">
				        		<div class="flex flex-wrap w-10/12">
				        			<label class="font-bold text-green-500">Category Icon</label>
				        			<div v-if="errors" class="mt-1 text-red-600 font-serif font-bold animate-pulse">{{ errors.categoryIcon }}</div>	
				        		</div>
				        	</div>
				        	<div class="flex justify-around my-2">
				        		<div class="flex flex-wrap w-10/12">
				        			<button type="submit"  class="p-2 bg-pink-500 text-white  rounded-md tracking-wider cursor-pointer" required>
				        				Save Category
				        			</button>
				        		</div>
				        	</div>
					</form>
			</template>
			<template #footer>
				<button @click="show=false"
				  class="bg-pink-500 text-white active:bg-pink-600 font-bold uppercase text-xs px-2 py-0 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
				  type="button"
				>
				 Close
				</button>
			</template>
		</new-file-modal>
	
	</div>
</template>
<script>
	import NewFileModal from '@/Jetstream/DialogModal'
	// import AvatarCropper from "vue-avatar-cropper";
	export default{
		data(){
			return {
				show:false,
				message: 'Ready...',
				data:{
					categoryName:'',
					categoryIcon:this.avatarImage,
				},
				avatarImage:'Wamae',
				token:'',
			}
		},
		components:{
			NewFileModal,
			// AvatarCropper
		},
		props: ['errors'],
		methods:{
			openModal(){
				this.show = true
			},
			saveCategory() {
			     this.$inertia.post(this.route('category.create'), this.data)
			},
			handleUploading(form, xhr) {
			  this.message = "uploading...";
			},
			handleCompleted(response, form, xhr) {     
			  if(xhr.status == 200){
			    this.s('Category Image Saved')
			    this.$store.commit('setUpdateUserProfile', response)
			    this.avatarImage=response
			  //console.log(xhr)
			    this.message = "Ready..."
			  }else{
			    this.message = "Error Occured! Try Again"
			  }
			  // window.location='/profile'
			},
			created(){
				 this.token = window.Laravel.csrfToken;

			}
		}
	}
</script>