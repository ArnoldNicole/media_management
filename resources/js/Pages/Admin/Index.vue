<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Admin
            </h2>
        </template>
        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
              <admin-stats/>
            </div>
        </div>


    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import AdminStats from '@/Pages/Admin/Dashboard/Stats'

    export default {
        components: {
            AppLayout,   
            AdminStats       
        },
    }
</script>
