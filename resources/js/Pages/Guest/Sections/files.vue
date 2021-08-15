<template>
  <files-layout>
    <template #files>
      <div class="container mx-auto px-4 row flex flex-row" v-if="files">
        <div
          class="lg:pt-12 pt-6 w-full md:w-4/12 text-center ml-1"
          v-for="(file, f) in files"
          :key="f"
        >
          <div
            class="
              relative
              flex flex-col
              min-w-0
              break-words
              bg-white
              w-full
              mb-8
              shadow-lg
              rounded-lg
            "
          >
            <div class="px-4 py-5 flex-auto">
              <div
                class="
                  text-white
                  p-3
                  text-center
                  inline-flex
                  items-center
                  justify-center
                  w-12
                  h-12
                  mb-5
                  shadow-lg
                  rounded-full
                  bg-red-400
                "
              >
                <img :src="'/thumbnails/' + file.thumbnail" alt="" />
              </div>
              <h6 class="text-xl font-semibold">{{ file.filename }}</h6>
              <p class="mt-2 mb-4 text-gray-600">
                {{ file.category.categoryName }}
                <br />
                <button
                  class="
                    bg-pink-500
                    text-white
                    active:bg-pink-600
                    font-bold
                    uppercase
                    text-xs
                    px-2
                    py-0
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
                  @click="downloadFile(file.id)"
                >
                  Get
                </button>
              </p>
            </div>
          </div>
        </div>
      </div>
    </template>
  </files-layout>
</template>
<script>
import FilesLayout from "@/Pages/Guest/Files";
export default {
  props: {
    files: Array,
  },
  components: {
    FilesLayout,
  },
  methods: {
    async downloadFile(file) {
      const url = await this.callApi("get", "/download/" + file);
      if (url.status == 200) {
        window.location = url.data.file;
      } else {
        alert("Error Getting file");
      }
    },
    async callApi(method, url, dataObj) {
      try {
        return await axios({
          method: method,
          url: url,
          data: dataObj,
        });
      } catch (e) {
        return e.response;
      }
    },
  },
};
</script>