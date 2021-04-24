<template>
    <file-layout>        
        <template #form v-if="show">
            <div class="max-w-7xl mx-auto bg-gray-200 mb-2 py-10 sm:px-6 lg:px-8">
                <inertia-link @click="show=false" :href="route('files')">
                    <span class="py-2 px-2 float-right text-red-600 hover:bg-red-800 cursor-pointer hover:shadow shadow" title="Close Add Form">&times;</span>
                </inertia-link>
                    <form @submit.prevent="saveCategory">
                        <div class="flex justify-around my-2">
                                <div class="flex flex-wrap w-10/12">
                                    <label class="text-gray-500">Category Name</label>
                                    <input type="text" v-model="data.categoryName" class="p-2 rounded-full border shadow-md w-full" placeholder="Category Name" required>
                                    <div v-if="errors" class="mt-1 text-red-600 font-serif font-bold animate-pulse">{{ errors.categoryName }}</div>  
                                </div>
                            </div>

                            <div class="flex justify-around my-2">
                                <div class="flex flex-wrap w-10/12">
                                    <label class="text-gray-500">Category Icon</label>
                                    <file-input placeholder-input-text="Select Category Icon" v-model="data.categoryIcon" is-image class="p-2 rounded-full border shadow-md w-full"/>
                                    <div v-if="errors" class="mt-1 text-red-600 font-serif font-bold animate-pulse">{{ errors.categoryIcon }}</div> 
                                </div>
                            </div>
                            <div class="flex justify-around my-2">
                                <div class="flex flex-wrap w-10/12">
                                    <button type="submit"  class="p-2 bg-gray-400 text-white  rounded-md tracking-wider cursor-pointer" required>
                                        Save Category
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
    import FileInput from 'vue3-simple-file-input'
    export default {
        data(){
            return {
                show:true,
                data:{
                    categoryName:'',
                    categoryIcon:'',
                }, 
            }
        },
        props:{
            errors: Object,
        },
        components: {
            FileLayout, 
            FileInput
                    
        },
        methods:{
            saveCategory(){
                this.$inertia.post(this.route('category.create'), this.data)
            }
        }
    }
</script>
