<template>
  <div
    class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded"
    :class="[color === 'light' ? 'bg-white' : 'bg-green-900 text-white']"
  >
 <div class="rounded-t bg-white mb-0 px-6 py-6">
   <div class="text-right flex justify-between">
     <h6 class="text-gray-800 text-xl font-bold">FILE CATEGORIES</h6>
    </div>
 </div>
    <div class="block w-full overflow-x-auto">
      <!-- Projects table -->
      <table class="items-center w-full bg-transparent border-collapse">
        <thead>
          <tr>
            <th
              class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-no-wrap font-semibold text-left"
              :class="[
                color === 'light'
                  ? 'bg-gray-100 text-gray-600 border-gray-200'
                  : 'bg-green-800 text-green-300 border-green-700',
              ]"
            >
              Category Name
            </th>
            <th
              class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-no-wrap font-semibold text-left"
              :class="[
                color === 'light'
                  ? 'bg-gray-100 text-gray-600 border-gray-200'
                  : 'bg-green-800 text-green-300 border-green-700',
              ]"
            >
              Created At
            </th>
            <th
              class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-no-wrap font-semibold text-left"
              :class="[
                color === 'light'
                  ? 'bg-gray-100 text-gray-600 border-gray-200'
                  : 'bg-green-800 text-green-300 border-green-700',
              ]"
            >
              Files
            </th>
            <th
              class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-no-wrap font-semibold text-left"
              :class="[
                color === 'light'
                  ? 'bg-gray-100 text-gray-600 border-gray-200'
                  : 'bg-green-800 text-green-300 border-green-700',
              ]"
            >
              Category Icon
            </th>
            <th
              class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-no-wrap font-semibold text-left"
              :class="[
                color === 'light'
                  ? 'bg-gray-100 text-gray-600 border-gray-200'
                  : 'bg-green-800 text-green-300 border-green-700',
              ]"
            >
              Action
            </th>
            <th
              class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-no-wrap font-semibold text-left"
              :class="[
                color === 'light'
                  ? 'bg-gray-100 text-gray-600 border-gray-200'
                  : 'bg-green-800 text-green-300 border-green-700',
              ]"
            ></th>
          </tr>
        </thead>
        <tbody v-if="categories">
          <tr v-for="(category, c) in categories" :key="category.id">
            <th
              class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-no-wrap p-4 text-left flex items-center"
            >           
              <span
                class="ml-3 font-bold"
                :class="[color === 'light' ? 'text-gray-700' : 'text-white']"
              >
                {{category.categoryName}}
              </span>
            </th>
            <td
              class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-no-wrap p-4"
            >
              {{category.created_at}}
            </td>
            <td
              class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-no-wrap p-4"
            ><span>{{category.count}}</span>
              <i class="fas fa-circle text-orange-500 mr-2"></i>
            </td>
            <td
              class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-no-wrap p-4"
            >
              <div class="flex">
                <img
                  :src="category.categoryIcon"
                  :alt="category.categoryName"
                  class="w-10 h-10 rounded-full border-2 border-gray-100 shadow"
                />                
              </div>
            </td>
            <td
              class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-no-wrap p-4"
            >
              <div class="flex items-center">
                <button :disabled="category.isDeleting" class="bg-red-500 text-white active:bg-red-600 font-bold uppercase text-xs px-2 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150" @click="deleteCategory(category, c)">{{category.isDeleting ? 'Deleting...' : 'Delete'}}</button>
              </div>
            </td>
            <td
              class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-no-wrap p-4 text-right"
            >
            </td>
          </tr>          
        </tbody>
      </table>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      form: this.$inertia.form({
        id:''
      }),
    };
  }, 
  props: {
    color: {
      default: "light",
      validator: function (value) {
        // The value must match one of these strings
        return ["light", "dark"].indexOf(value) !== -1;
      },
    },
    categories: Array,
  },
  methods:{
    deleteCategory(category, index){
      if (!confirm('Are you sure you want to delete '+ category.categoryName+ ' and related files too?')) return
      this.categories[index].isDeleting = true
      this.form.id = category.id
      this.form.delete(this.route('category.delete'), {        
        onError: () => this.alert('File deleting failed', index),
        onFinish: () => this.showSuccess(index)
      })      
    },
    alert(message, index){
       this.categories[index].isDeleting = false
      alert(message)
    },
    showSuccess(index){
      this.categories.splice(index, 1)
      alert('Category Deleted successfully')     
    }

  }
};
</script>
