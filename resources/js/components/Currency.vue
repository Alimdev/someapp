<template>
  <div>
    <h3>Currencies:</h3>
    <p v-if="error" style="color: red">{{ error }}</p>
    <div v-if="currencies" class="block-wrapper">
      <div v-for="(сurrency, index) in currencies" :key="index" class="block">
        <h3>{{ сurrency }}</h3>
        <p>USD/{{ index }}</p>
      </div>
    </div>
    <p v-else>loading...</p>
  </div>
</template>

<script>
import repository from "../api/repository";
export default {
  name: 'currency-index',
  data() {
    return {
      currencies: null,
      error: null,
    }
  },
  async mounted() {
    try {
      let { data } = await repository.getCurrencies('json');
      this.currencies = data.rates;
    } catch (error) {
      this.error = error;
    }
  },
};
</script>

<style scoped>
  .block-wrapper {
    width: 75%;
    margin: 0 auto;
  }
  .block {
    margin-bottom: 25px;
    text-align: left;
    border: 1px solid;
  }
</style>