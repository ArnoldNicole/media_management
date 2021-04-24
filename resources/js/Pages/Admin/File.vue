<template>
    <app-layout>
        <template #header class="rounded-t bg-white mb-0 px-6 py-6">
            <div class="flex justify-items-auto">
                 <h2 class="text-gray-800 text-xl font-bold px-3 mr-2">
                    Files
                </h2> 
                <inertia-link v-if="!route().current('category.create')" :href="route('category.create')" :active="route().current('category.create')">
                <button
                     class="bg-pink-500 text-white active:bg-pink-600 font-bold uppercase text-xs px-2 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                     type="button"
                   >
                     New Category
                 </button>
                </inertia-link>
                <inertia-link v-if="!route().current('files.create')" :href="route('files.create')" :active="route().current('files.create')">
                  <button
                    class="bg-green-500 text-white active:bg-green-600 font-bold uppercase text-xs px-2 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                    type="button"
                  >
                    New File
                  </button>    
                  </inertia-link> 

                  <inertia-link v-if="!route().current('category.list')" :href="route('category.list')" :active="route().current('category.list')">
                  <button :active="route().current('category.list')"
                       class="bg-purple-500 text-white active:bg-purple-100 font-bold uppercase text-xs px-2 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                       type="button"
                     >
                       Categories
                   </button>
                  </inertia-link>
                  <div v-if="$page.props.flash.message">
                    <span class="text-green-600 animate-bounce">{{ $page.props.flash.message }}</span>
                  </div>
            </div>
        </template>
        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <slot name="form"></slot>             
            </div>
        </div>


    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'    
    export default {
        components: {
            AppLayout,                     
        }        
    }
</script>
