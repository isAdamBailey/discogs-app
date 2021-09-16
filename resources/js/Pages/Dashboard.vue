<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Dashboard
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
            <div class="mt-8 text-2xl">
              Welcome to this Discogs App!
            </div>

            <div class="mt-6 text-gray-500">
              At this time, you have to manually enter the discogs username to the database users table.
              Once you do, refresh the page and you'll see the releases. That's all I have for now.
            </div>
          </div>

          <table v-if="releases.releases" class="bg-white min-w-full">
            <thead>
            <tr>
              <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                Artist
              </th>
              <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                Album
              </th>
              <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                Label
              </th>
              <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                Genre
              </th>
              <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
            </tr>
            </thead>

            <tbody>
            <tr v-for="release in releases.releases">
              <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                <div class="flex items-center">
                  <div class="ml-4">
                    <div class="text-sm leading-5 font-medium text-gray-900">
                      {{ release['basic_information']['artists'][0]['name'] }}
                    </div>
                    <div class="text-sm leading-5 text-gray-500">Artist info</div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                <div class="text-sm leading-5 text-gray-900">
                  {{ release['basic_information']['title'] }}
                </div>
                <div class="text-sm leading-5 text-gray-500">Album info</div>
              </td>
              <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                <div class="text-sm leading-5 text-gray-900">
                  {{ release['basic_information']['labels'][0]['name'] }}
                </div>
                <div class="text-sm leading-5 text-gray-500">Label info</div>
              </td>
              <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                <div class="text-sm leading-5 text-gray-900">
                  {{ release['basic_information']['styles'][0] }}
                </div>
              </td>
              <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
                <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
              </td>
            </tr>
            </tbody>
          </table>

          <div v-else class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="px-4 py-8 bg-white shadow sm:rounded-lg sm:px-10">
              we dont have your discogs username, at this time you have to manually add it to the table
            </div>
          </div>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'

export default {
  components: {
    AppLayout,
  },

  props: {
    releases: Array,
    default: []
  }
}
</script>
