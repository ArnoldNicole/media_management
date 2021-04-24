<template>
    <app-layout>
        <template #header class="rounded-t bg-white mb-0 px-6 py-6">
            <div class="flex justify-items-auto">
                 <h2 class="text-gray-800 text-xl font-bold px-3 mr-2">
                    Browse our wide range of files
                </h2>
            </div>
        </template>       
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <slot name="files"></slot>             
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
