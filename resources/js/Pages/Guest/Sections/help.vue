<template>
  <app-layout>
    <template #header class="rounded-t bg-white mb-0 px-6 py-6">
      <div class="flex justify-items-auto">
        <h2 class="text-gray-800 text-xl font-bold px-3 mr-2">
          Get Help To Navigate around Our Site
        </h2>
      </div>
    </template>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
      <h1 class="text-xl font-bold px-3 mr-2 text-purple-300">How to</h1>
      <ol>
        <li
          class="text-xl font-bold px-3 mr-2 text-red-300 cursor-pointer"
          @click="toggleDownFilesHelp"
        >
          Dowload files
        </li>
        <li class="text-xl font-bold px-3 mr-2 text-red-300 cursor-pointer" @click="toggleupdateProfileHelp">
          Update Profile and change passwords
        </li>
        <li class="text-xl font-bold px-3 mr-2 text-red-300 cursor-pointer" @click="toggle2FAHelp">Enable 2FA</li>
      </ol>
      <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8" v-if="downloadFiles">
        <h1 class="text-xl font-bold px-3 mr-2 text-purple-300">
          How to Download Files
        </h1>
        <p class=" px-3 mr-2 text-gray-600">
          To download files, proceed as follows;
          <ul>
              <li>
                  Click on the <strong>Browse</strong> Menu as Shown in the image below
                  <img :src="nav" >
              </li>
              <li>
                  Click on the <strong>Get Button</strong> on the page opened as illustrated in image below
                  <img :src="getFile" >
              </li>
              </ul>
        </p>
      </div>

      <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8" v-if="updateProfile">
        <h1 class="text-xl font-bold px-3 mr-2 text-dark-800">
          How to Update Your Profile
        </h1>
        <p class=" px-3 mr-2 text-gray-600">
          To update your account details, click on the top right avatar of you, and on the drop down select profile as illustrated on fig 3 below;
          <ul>
              <li>
                  <img :src="avatar" >
                  <caption class="w-100">Fig 3</caption>
              </li>
              <li>
                  Fill in the details as required, you have options to change your email, name or profile photo.,
                  alternatively <a href="/user/profile" class="font-bold text-green-900" target="_blank">click here</a>
                  <img :src="profile" >
              </li>
              <li>
                  To change your password scroll down on the page and find the security option, from the security section you can change your password as well as log out from other rowser sessions your are logged in to
                  </li>
              </ul>
        </p>
      </div>

        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8" v-if="TwoFA">
        <h1 class="text-xl font-bold px-3 mr-2 text-dark-800">
          How to Enable Two factor Authentication
        </h1>
        <p class=" px-3 mr-2 text-gray-600">
         Two factor Authentication protects your account even when your password might be comporomised, enabling this pairs your device with your account. Always ensure that you have your device before trying to login
         
        </p>
        <p>To enable 2FA proceed as below;
            <br>
            click on the top right avatar of you, and on the drop down select profile as illustrated below;
             <ul>
              <li>
                  <img :src="avatar" >
                  <caption class="w-100">Fig 3</caption>
              </li>
              <li>
                  Scroll down to the section labelled Two Factor Authentication, illustrared below,
                  alternatively <a href="/user/profile" class="font-bold text-green-900" target="_blank">click here</a>
                  <img :src="twoFAPic" >
              </li>
              <li>
                 Follow the instructions on the page
                  </li>
              </ul>
            </p>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import navImg from "@/assets/nav.png";
import GetImage from "@/assets/get.png";
import avatarImg from "@/assets/avatar.png";
import profile from "@/assets/profile.png";
import twoFAPic from "@/assets/2FA.png";
export default {
  data() {
    return {
      downloadFiles: false,
      nav: navImg,
      getFile: GetImage,
      updateProfile: false,
      avatar: avatarImg,
      profile: profile,
      twoFAPic: twoFAPic,
      TwoFA: false,
    };
  },
  components: {
    AppLayout,
  },
  methods: {
    toggleDownFilesHelp() {
      this.downloadFiles = !this.downloadFiles;
      this.updateProfile = false;
      this.TwoFA = false;
    },
    toggleupdateProfileHelp() {
      this.updateProfile = !this.updateProfile;
      this.downloadFiles = false;
      this.TwoFA = false;
    },
    toggle2FAHelp() {
      this.TwoFA = !this.TwoFA;
      this.updateProfile = false;
      this.downloadFiles = false;
    },
  },
};
</script>
