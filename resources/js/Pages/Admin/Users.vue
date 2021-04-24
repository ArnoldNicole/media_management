<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Users
            </h2>
        </template>
        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <div class="flex flex-wrap">
                    <table class="w-full p-1 text-gray-700">
                            <thead>
                                <tr>
                                    <th>Photo</th>
                                    <th class="text-left text-red-500">Name</th>
                                    <th class="text-left text-red-500">Email</th>
                                    <th class="text-left text-red-500">Files</th><th></th>
                                </tr>
                            </thead>
                      <tbody>
                        <tr v-for="(user, i) in users" :key="i">
                          <td>
                              <div class="flex text-center align-middle">
                                  <img
                                    :src="user.profile_photo_url"
                                    alt="..."
                                    class="w-10 h-10 rounded-full border-2 border-gray-100 shadow"
                                  />
                              </div>
                          </td>
                          <td class="font-sans font-bold">{{user.name}}</td>
                          <td class="font-sans font-bold">{{user.email}}</td>
                          <td class="font-sans font-bold">{{user.files}}</td>
                          <td>
                           
                          </td>
                        </tr>                   
                      </tbody>
                    </table>
                </div>
            </div>
        </div>


    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    export default {
        data(){
            return {

            }
        },
        components: {
            AppLayout,          
        },
        props:{
          users:Array
        }
    }
</script>
