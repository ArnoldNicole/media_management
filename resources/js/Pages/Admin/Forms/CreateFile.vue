<template>
    <file-layout>        
        <template #form v-if="show">
            <div class="max-w-7xl mx-auto bg-gray-200 mb-2 py-10 sm:px-6 lg:px-8">
                <inertia-link @click="show=false" :href="route('files')">
                    <span class="py-2 px-2 float-right text-red-600 hover:bg-red-800 cursor-pointer hover:shadow shadow" title="Close Add Form">&times;</span>
                </inertia-link>
                    <form @submit.prevent="saveFile">
                        <h1 class="text-pink-700">New File</h1>
                            <div class="flex justify-around my-2">
                                    <div class="flex flex-wrap w-10/12">
                                        <label class="text-gray-500">File Name</label>
                                        <input type="text" v-model="form.filename" class="p-2 rounded-full border shadow-md w-full" placeholder="File Name" required>
                                        <div v-if="errors" class="mt-1 text-red-600 font-serif font-bold animate-pulse">{{ form.errors.filename }}</div>  
                                    </div>
                                </div>

                                <div class="flex justify-around my-2" v-if="categories">
                                <div class="flex flex-wrap w-10/12">
                                    <label class="text-gray-500">Select Category</label>
                                    <select class="p-2 rounded-full border shadow-md w-full" v-model="form.category_id">
                                        <option value="">Choose Category</option>
                                        <option :value="category.id" v-for="category in categories">{{category.categoryName}}</option>
                                    </select>
                                    <div v-if="errors" class="mt-1 text-red-600 font-serif font-bold animate-pulse">{{ form.errors.category_id }}</div> 
                                </div>
                            </div>

                            <div class="flex justify-around my-2">
                                <div class="flex flex-wrap w-10/12">
                                   <div class="flex w-full items-center justify-center bg-grey-lighter">
                                       <label class="w-64 flex flex-col items-center px-4 py-6 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-white">
                                           <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                               <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                                           </svg>
                                           <span class="mt-2 text-base leading-normal">Select a file</span>
                                           <input type='file' @change="Images_onFileChanged" class="hidden" />
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
    </file-layout>
</template>

<script>
    import FileLayout from '@/Pages/Admin/File'   
        export default {
        data(){
            return {
                form: this.$inertia.form({
                    file: '',
                    filename: '',
                    category_id: '',                   
                }),
                url:null,                
                show:true,    
                
            }
        },
        components: {
            FileLayout,
        },
        props:{
            errors: Object,
            categories:Array,
        },
        methods:{
            saveFile(){                
                this.form.post(this.route('file.create'))
            },
            Images_onFileChanged(event){
                this.form.file = event.target.files[0];               
                this.url = this.form.file.name;
            },

        }
    }
</script>
