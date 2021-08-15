<template>
  <div
    class="
      relative
      flex flex-col
      min-w-0
      break-words
      w-full
      mb-6
      shadow-lg
      rounded
    "
    :class="[color === 'light' ? 'bg-white' : 'bg-green-900 text-white']"
  >
    <div class="rounded-t bg-white mb-0 px-6 py-6">
      <div class="text-right flex justify-between">
        <h6 class="text-gray-800 text-xl font-bold">Files Database</h6>
      </div>
    </div>
    <div class="block w-full overflow-x-auto">
      <!-- Projects table -->
      <table class="items-center w-full bg-transparent border-collapse">
        <thead>
          <tr>
            <th
              class="
                px-6
                align-middle
                border border-solid
                py-3
                text-xs
                uppercase
                border-l-0 border-r-0
                whitespace-no-wrap
                font-semibold
                text-left
              "
              :class="[
                color === 'light'
                  ? 'bg-gray-100 text-gray-600 border-gray-200'
                  : 'bg-green-800 text-green-300 border-green-700',
              ]"
            >
              File Name
            </th>
            <th
              class="
                px-6
                align-middle
                border border-solid
                py-3
                text-xs
                uppercase
                border-l-0 border-r-0
                whitespace-no-wrap
                font-semibold
                text-left
              "
              :class="[
                color === 'light'
                  ? 'bg-gray-100 text-gray-600 border-gray-200'
                  : 'bg-green-800 text-green-300 border-green-700',
              ]"
            >
              Price
            </th>
            <th
              class="
                px-6
                align-middle
                border border-solid
                py-3
                text-xs
                uppercase
                border-l-0 border-r-0
                whitespace-no-wrap
                font-semibold
                text-left
              "
              :class="[
                color === 'light'
                  ? 'bg-gray-100 text-gray-600 border-gray-200'
                  : 'bg-green-800 text-green-300 border-green-700',
              ]"
            >
              Status
            </th>
            <th
              class="
                px-6
                align-middle
                border border-solid
                py-3
                text-xs
                uppercase
                border-l-0 border-r-0
                whitespace-no-wrap
                font-semibold
                text-left
              "
              :class="[
                color === 'light'
                  ? 'bg-gray-100 text-gray-600 border-gray-200'
                  : 'bg-green-800 text-green-300 border-green-700',
              ]"
            >
              Category Icon
            </th>
            <th
              class="
                px-6
                align-middle
                border border-solid
                py-3
                text-xs
                uppercase
                border-l-0 border-r-0
                whitespace-no-wrap
                font-semibold
                text-left
              "
              :class="[
                color === 'light'
                  ? 'bg-gray-100 text-gray-600 border-gray-200'
                  : 'bg-green-800 text-green-300 border-green-700',
              ]"
            >
              Action
            </th>
            <th
              class="
                px-6
                align-middle
                border border-solid
                py-3
                text-xs
                uppercase
                border-l-0 border-r-0
                whitespace-no-wrap
                font-semibold
                text-left
              "
              :class="[
                color === 'light'
                  ? 'bg-gray-100 text-gray-600 border-gray-200'
                  : 'bg-green-800 text-green-300 border-green-700',
              ]"
            ></th>
          </tr>
        </thead>
        <tbody v-if="files">
          <tr v-for="(file, f) in files" :key="file.id">
            <th
              class="
                border-t-0
                px-6
                align-middle
                border-l-0 border-r-0
                text-xs
                whitespace-no-wrap
                p-4
                text-left
                flex
                items-center
              "
            >
              <img
                :src="'/thumbnails/' + file.thumbnail"
                class="h-12 w-12 bg-white rounded-full border"
                alt="..."
              />
              <span
                class="ml-3 font-bold"
                :class="[color === 'light' ? 'text-gray-700' : 'text-white']"
              >
                {{ file.filename }}
              </span>
            </th>
            <td
              class="
                border-t-0
                px-6
                align-middle
                border-l-0 border-r-0
                text-xs
                whitespace-no-wrap
                p-4
              "
            >
              Free
            </td>
            <td
              class="
                border-t-0
                px-6
                align-middle
                border-l-0 border-r-0
                text-xs
                whitespace-no-wrap
                p-4
              "
            >
              <i class="fas fa-circle text-orange-500 mr-2"></i> Available
            </td>
            <td
              class="
                border-t-0
                px-6
                align-middle
                border-l-0 border-r-0
                text-xs
                whitespace-no-wrap
                p-4
              "
            >
              <div class="flex">
                <img
                  :src="file.category.categoryIcon"
                  :alt="file.category.categoryName"
                  class="w-10 h-10 rounded-full border-2 border-gray-100 shadow"
                />
              </div>
            </td>
            <td
              class="
                border-t-0
                px-6
                align-middle
                border-l-0 border-r-0
                text-xs
                whitespace-no-wrap
                p-4
              "
            >
              <div class="flex items-center">
                <button
                  :disabled="file.isDeleting"
                  class="
                    bg-red-500
                    text-white
                    active:bg-red-600
                    font-bold
                    uppercase
                    text-xs
                    px-2
                    py-2
                    rounded
                    shadow
                    hover:shadow-md
                    outline-none
                    focus:outline-none
                    mr-1
                    ease-linear
                    transition-all
                    duration-150
                  "
                  @click="deleteFile(file, f)"
                >
                  {{ file.isDeleting ? "Deleting..." : "Delete" }}
                </button>
              </div>
            </td>
            <td
              class="
                border-t-0
                px-6
                align-middle
                border-l-0 border-r-0
                text-xs
                whitespace-no-wrap
                p-4
                text-right
              "
            ></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>
<script>
import CategoryButton from "@/Layouts/components/Buttons/CategoryButton";
export default {
  data() {
    return {
      form: this.$inertia.form({
        id: "",
      }),
    };
  },
  components: {
    CategoryButton,
  },
  props: {
    color: {
      default: "light",
      validator: function (value) {
        // The value must match one of these strings
        return ["light", "dark"].indexOf(value) !== -1;
      },
    },
    files: Array,
  },
  methods: {
    deleteFile(file, index) {
      if (!confirm("Are you sure you want to delete " + file.filename + "?"))
        return;
      this.files[index].isDeleting = true;
      this.form.id = file.id;
      this.form.delete(this.route("file.delete"), {
        onSuccess: () => this.files.splice(index, 1),
        onError: () => this.alert("File deleting failed", index),
        onFinish: () => this.showSuccess(),
      });
    },
    alert(message, index) {
      this.files[index].isDeleting = false;
      alert(message);
    },
    showSuccess(index) {
      alert("File Deleted successfully");
      this.files.splice(index, 1);
    },
  },
};
</script>
