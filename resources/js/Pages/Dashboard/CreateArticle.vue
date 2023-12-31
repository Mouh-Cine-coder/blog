<script>
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import { Head, Link, router, useForm } from '@inertiajs/vue3';
import LoadingButton from '@/Components/LoadingButton.vue';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

let id = 0;

export default {
  components: {
    Head,
    Link,
    InputLabel,
    InputError,
    TextInput,
    PrimaryButton,
    LoadingButton,
    DashboardLayout
  },
  data() {
    return {
      form: useForm({
        title: '',
        body: '',
        image: '',
        tags: [],
        category: ''
      }),
      tagValue: "",
    }
  },
  computed: {
    Computedtags() {
      return this.form.tags;
    },
    fullTags() {
      return this.form.tags.length == 4 ? true : false;
    }
  },
  methods: {
    store() {
      router.post(route("articles.store"), this.form);
    },
    addTag(e) {
      let input = e.target.value;
      let lastChar = input.charAt(input.length - 1);

      if (lastChar == ',') {
        this.$refs.tagInputField.disabled = false;
        input.split(',').filter(tag => tag != '').map(tag => {

          if (this.form.tags.length < 4) {
            this.form.tags.push({ id: id++, name: tag });
          } else {
            this.$refs.tagInputField.value = '';
          }
        });
        this.$refs.tagInputField.value = '';
      }

    },
    addTags(e) {
      let input = e.target.value;

      this.$refs.tagInputField.disabled = false;

      input.split(',').filter(tag => tag != '').map(tag => {

        if (this.form.tags.length < 4) {
          this.form.tags.push({ id: id++, name: tag });
        } else {
          this.$refs.tagInputField.value = '';
        }
      });
      this.$refs.tagInputField.value = '';

    },
    removeTag(tag) {
      this.form.tags = this.form.tags.filter((t) => t !== tag);
    }
  },
}
</script>


<template>
  <DashboardLayout>

    <Head title="create articles" />
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        <Link :href="route('articles.index')" class="text-indigo-400 hover:text-indigo-300">Articles</Link>/ Create
      </h2>
    </template>

    <section class="mt-6 max-w-4xl mx-auto sm:px-6 lg:px-8 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
      <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">Add article</h2>
      </header>

      <form @submit.prevent="store" class="mt-6 max-w-xl space-y-6">

        <!-- title input -->
        <div>
          <InputLabel for="title" value="Title" />

          <TextInput id="article_id" v-model="form.title" type="text" class="mt-1 block w-full" />

          <InputError :message="form.errors.title" class="mt-2" />
        </div>

        <!-- Article picture -->
        <div>
          <InputLabel for="picture" value="Article picture" />

          <div class="flex items-center justify-center w-full mt-1">
              <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-60 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                  <div class="flex flex-col items-center justify-center pt-5 pb-6">
                      <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                      </svg>
                      <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                      <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                  </div>
                  <input id="dropzone-file" name="dropzone-file" type="file" class="hidden" @input="form.picture = $event.target.files[0]" />
              </label>
          </div>
          

          <InputError :message="form.errors.image" class="mt-2" />
        </div>

        <!-- tags input -->
        <div>
          <InputLabel for="tags" value="Article tags" />

          <ul class="flex  gap-x-2 mt-1">
            <li class="w-fit flex  items-center gap-x-2 py-1 px-1 rounded text-gray-300 dark:bg-slate-500"
              v-for="tag in Computedtags" :key="tag.name">
              <span class="text-sm ">{{ tag.name }}</span>
              <button type="button" class="px-1 transition-colors ease-in hover:bg-red-400  rounded-full"
                @click="removeTag(tag)">×</button>
            </li>
          </ul>

          <input type="text" name="tags" @input="addTag" @keyup.enter="addTags" placeholder="Add tags"
            class="mt-3 bg-transparent dark:text-gray-300 focus:outline-transparent dark:focus:outline-transparent border-dotted border-x-0 border-t-0"
            ref="tagInputField" autocomplete="off">

          <span class="block mt-1 text-sm text-yellow-500" v-if="fullTags">
            <svg class="inline mr-1 text-yellow-500 warningSvg" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M 16 4 C 9.382813 4 4 9.382813 4 16 C 4 22.617188 9.382813 28 16 28 C 22.617188 28 28 22.617188 28 16 C 28 9.382813 22.617188 4 16 4 Z M 16 6 C 21.535156 6 26 10.464844 26 16 C 26 21.535156 21.535156 26 16 26 C 10.464844 26 6 21.535156 6 16 C 6 10.464844 10.464844 6 16 6 Z M 15 10 L 15 18 L 17 18 L 17 10 Z M 15 20 L 15 22 L 17 22 L 17 20 Z">
              </path>
            </svg>
            <small>You can enter only four tags.</small>
          </span>
        </div>

        <!-- body -->
        <div>
          <InputLabel for="body" value="Article body (Temporary for testing)" />

          <textarea id="body_id" v-model="form.body"
            class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" />

          <InputError :message="form.errors.body" class="mt-2" />
        </div>

        <progress v-if="form.progress" :value="form.progress.percentage" max="100">
          {{ form.progress.percentage }}%
        </progress>

        <!-- Submit form -->
        <div class="flex items-center gap-4">
          <PrimaryButton
            class="text-white bg-green-700 hover:bg-green-800 focus:ring-4  font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
            :disabled="form.processing">Submit article</PrimaryButton>

          <Transition enter-active-class="transition ease-in-out" enter-from-class="opacity-0"
            leave-active-class="transition ease-in-out" leave-to-class="opacity-0">
            <p v-if="form.recentlySuccessful" class="text-sm text-gray-600 dark:text-gray-400">Saved.</p>
          </Transition>
        </div>

      </form>
    </section>
  </DashboardLayout>
</template>




<style scoped>
.warningSvg {
  width: 18px;
  fill: rgb(234 179 8);
}</style>

