<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Dashboard
      </h2>
    </template>
    <div>
      <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div
          class="
            relative
            flex flex-col
            min-w-0
            break-words
            bg-white
            w-full
            mb-6
            shadow-lg
            rounded
          "
        >
          <div class="rounded-t mb-0 px-4 py-3 border-0">
            <div class="flex flex-wrap items-center">
              <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                <h3 class="font-semibold text-base text-gray-800">
                  system Stats
                </h3>
              </div>
              <div
                class="
                  relative
                  w-full
                  px-4
                  max-w-full
                  flex-grow flex-1
                  text-right
                "
              ></div>
            </div>
          </div>
          <div class="block w-full overflow-x-auto">
            <!-- Projects table -->
            <table
              class="items-center w-full bg-transparent border-collapse"
              v-if="ready"
            >
              <tbody>
                <tr>
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
                    "
                  >
                    Users
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
                    {{ data.Users }}
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
                      <span class="mr-2">60%</span>
                      <div class="relative w-full">
                        <div
                          class="
                            overflow-hidden
                            h-2
                            text-xs
                            flex
                            rounded
                            bg-red-200
                          "
                        >
                          <div
                            style="width: 60%"
                            class="
                              shadow-none
                              flex flex-col
                              text-center
                              whitespace-nowrap
                              text-white
                              justify-center
                              bg-red-500
                            "
                          ></div>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
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
                    "
                  >
                    Music
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
                    {{ data.Music }}
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
                      <span class="mr-2">70%</span>
                      <div class="relative w-full">
                        <div
                          class="
                            overflow-hidden
                            h-2
                            text-xs
                            flex
                            rounded
                            bg-green-200
                          "
                        >
                          <div
                            style="width: 70%"
                            class="
                              shadow-none
                              flex flex-col
                              text-center
                              whitespace-nowrap
                              text-white
                              justify-center
                              bg-green-500
                            "
                          ></div>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
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
                    "
                  >
                    Documents
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
                    {{ data.Documents }}
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
                      <span class="mr-2">80%</span>
                      <div class="relative w-full">
                        <div
                          class="
                            overflow-hidden
                            h-2
                            text-xs
                            flex
                            rounded
                            bg-purple-200
                          "
                        >
                          <div
                            style="width: 80%"
                            class="
                              shadow-none
                              flex flex-col
                              text-center
                              whitespace-nowrap
                              text-white
                              justify-center
                              bg-purple-500
                            "
                          ></div>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
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
                    "
                  >
                    Videos
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
                    {{ data.Videos }}
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
                      <span class="mr-2">75%</span>
                      <div class="relative w-full">
                        <div
                          class="
                            overflow-hidden
                            h-2
                            text-xs
                            flex
                            rounded
                            bg-blue-200
                          "
                        >
                          <div
                            style="width: 75%"
                            class="
                              shadow-none
                              flex flex-col
                              text-center
                              whitespace-nowrap
                              text-white
                              justify-center
                              bg-blue-500
                            "
                          ></div>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
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
                    "
                  >
                    Images
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
                    {{ data.Images }}
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
                      <span class="mr-2">30%</span>
                      <div class="relative w-full">
                        <div
                          class="
                            overflow-hidden
                            h-2
                            text-xs
                            flex
                            rounded
                            bg-orange-200
                          "
                        >
                          <div
                            style="width: 30%"
                            class="
                              shadow-none
                              flex flex-col
                              text-center
                              whitespace-nowrap
                              text-white
                              justify-center
                              bg-green-500
                            "
                          ></div>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
export default {
  components: {
    AppLayout,
  },
  data() {
    return {
      data: {},
      ready: false,
    };
  },
  async created() {
    const res = await this.callApi("get", "/dashboard_stats");
    if (res.status == 200) {
      this.data = res.data;
      this.ready = true;
    }
  },
  props: ["stats"],
};
</script>
