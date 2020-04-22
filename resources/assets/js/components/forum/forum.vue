<template>
  <v-container fluid gird-list-md>
    <v-layout row wrap>
      <v-flex xs8>
        <question v-for="question in questions" :key="question.path" :data="question"></question>
        <div class="text-center">
          <v-pagination v-model="meta.current_page" :length="meta.total" @input="changePage"></v-pagination>
        </div>
      </v-flex>
      <v-flex xs4>
        <app-sidebar></app-sidebar>
      </v-flex>
    </v-layout>
  </v-container>
</template>
<script>
import question from "./question";
import AppSidebar from "./AppSidebar";
export default {
  data() {
    return {
      questions: {},
      meta: {}
    };
  },
  components: { question, AppSidebar },

  created() {
    this.fetchQuestion();
  },
  methods: {
    fetchQuestion(page) {
      let url = page ? `api/question?page=${page}` : "api/question";
      axios
        .get(url)
        .then(res => {
          this.questions = res.data.data;
          this.meta = res.data.meta;
        })
        .catch(error => console.log(error.response.data));
    },
    changePage(page) {
      this.fetchQuestion(page);
      // axios
      //   .get(`api/question?page=${page}`)
      //   .then(res => {
      //     this.questions = res.data.data;
      //     this.meta = res.data.meta;
      //   })
      //   .catch(error => console.log(error.response.data));
    }
  }
};
</script>
    <style></style>

