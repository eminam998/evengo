<template>
  <div v-if="links.length > 3">
    <div class="flex flex-wrap mt-8">
      <Link
        v-if="links[0].url"
        class="mr-1 mb-1 px-4 py-3 text-sm leading-4 border rounded-full hover:bg-white focus:border-primary focus:text-primary"
        :class="{ 'bg-blue-300 text-blue-900': links[0].active }"
        :href="links[0].url"
      >
        <svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
          <path d="M15 18l-6-6 6-6" />
        </svg>
      </Link>
      <template v-for="(link, key) in links.slice(1, -1)" :key="key">
        <div
          v-if="link.url === null"
          class="mr-1 mb-1 px-4 py-3 text-sm leading-4 text-gray-400 border rounded-full"
          v-html="link.label"
        />
        <Link
          v-else
          class="mr-1 mb-1 px-4 py-3 text-sm leading-4 border rounded-full hover:bg-white focus:border-primary focus:text-primary"
          :class="{ 'bg-blue-300 text-blue-900': link.active }"
          :href="link.url"
          v-html="link.label"
        />
      </template>
      <Link
        v-if="links[links.length - 1].url"
        class="mr-1 mb-1 px-4 py-3 text-sm leading-4 border rounded-full hover:bg-white focus:border-primary focus:text-primary"
        :class="{ 'bg-blue-300 text-blue-900': links[links.length - 1].active }"
        :href="links[links.length - 1].url"
      >
        <svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
          <path d="M9 18l6-6-6-6" />
        </svg>
      </Link>
    </div>
  </div>
</template>

<script>
import { defineComponent } from "vue";
import { Link } from "@inertiajs/inertia-vue3";

export default defineComponent({
  components: {
    Link,
  },
  props: {
    links: Array,
  },
});
</script>
