<template>
  <div>
    <NavBar></NavBar>
    <main role="main" class="container">

      <div class="row">
        <div class="col-md-6">
          <!-- trigger new game modal -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newGameModal">
            Create New Game...
          </button>

        </div>
        <div class="col-md-6 text-right">
          Last updated <strong>{{ lastUpdated | formatDate }}</strong>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-md-12">
          <GameTable></GameTable>
        </div>
      </div>


    </main><!-- /.container -->
  </div>
</template>

<script>
import NavBar from "./App/NavBar";
import GameTable from "./App/GameTable";

export default {
  components: {NavBar, GameTable},
  computed: {
    lastUpdated() {
      return this.$store.state.lastUpdated;
    }
  }
}
</script>