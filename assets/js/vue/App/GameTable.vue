<template>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Game Name</th>
        <th>Created</th>
        <th>Status</th>
        <th>Password Protected?</th>
        <th>&nbsp;</th>
      </tr>
    </thead>

    <tbody>
      <tr v-for="game in games">
        <td>{{ game.name }}</td>
        <td>{{  game.created | formatDate }}</td>
        <td>-</td>
        <td>-</td>
        <td><button class="btn btn-primary btn-sm">Join</button></td>
      </tr>
    </tbody>
  </table>
</template>

<script>

export default {

  computed: {
    games() {
      return this.$store.state.games;
    }
  }
}
</script>