<template>
  <div>
    <h3>Documentation:</h3>
    <p>Получить текущий курс - {{$hostname}}api/currency</p>
    <p>Получить историю - {{$hostname}}api/history</p>
    <p>Команда для записи в историю - php artisan insert:history</p>
  </div>
</template>

<script>
export default {

};
</script>