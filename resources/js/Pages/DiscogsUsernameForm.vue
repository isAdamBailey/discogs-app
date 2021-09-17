<template>
  <jet-form-section
      @submitted="updateDiscogsUsername"
      class="mb-5"
  >
    <template #title>
      Discogs Username
    </template>

    <template #description>
      <div v-if="form.discogs_username" class="text-red-500 font-semibold">
        It appears the Discogs username we have stored isn't returning anything.
      </div>
      <div v-else>
        Enter your discogs user name here so we can pull in your releases.
      </div>
    </template>

    <template #form>
      <div class="col-span-6 sm:col-span-4">
        <jet-label for="discogs-username" value="Name" />
        <jet-input
            id="discogs-username"
            type="text"
            class="mt-1 block w-full"
            v-model="form.discogs_username"
            autocomplete="discogs_username"
        />
        <jet-input-error :message="form.errors.discogs_username" class="mt-2" />
      </div>
    </template>

    <template #actions>
      <jet-action-message :on="form.recentlySuccessful" class="mr-3">
        Saved.
      </jet-action-message>

      <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
        Save
      </jet-button>
    </template>
  </jet-form-section>
</template>

<script>
import JetButton from '@/Jetstream/Button'
import JetFormSection from '@/Jetstream/FormSection'
import JetInput from '@/Jetstream/Input'
import JetInputError from '@/Jetstream/InputError'
import JetLabel from '@/Jetstream/Label'
import JetActionMessage from '@/Jetstream/ActionMessage'

export default {
  name: "DiscogsUsernameForm",

  components: {
    JetActionMessage,
    JetButton,
    JetFormSection,
    JetInput,
    JetInputError,
    JetLabel,
  },

  props: ['user'],

  data() {
    return {
      form: this.$inertia.form({
        _method: 'PUT',
        discogs_username: this.user.discogs_username,
      }),
    }
  },

  methods: {
    updateDiscogsUsername() {
      this.form.post(route('discogs-username.store'), {
        errorBag: 'saveDiscogsUsername',
        preserveScroll: true,
      });
    },
  }
}
</script>
