/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import 'bootstrap';
import 'bootstrap/dist/css/bootstrap.min.css';
import '../css/app.css';
import $ from 'jquery';
import Vue from 'vue'
import Vuex from 'vuex'
import App from './vue/App';
import moment from 'moment'
import createGameForm from "./modules/create-game-form";
Vue.use(Vuex)

Vue.filter('formatDate', function(value) {

    if(value !== null)
    {
        const val = moment(value).format('DD/MM/YYYY HH:mm');
        return val;
    }

    return '?';

});

const store = new Vuex.Store({
    state: {
        lastUpdated: null,
        games: [
            {
                name: "Ste's Game..",
                created: null
            }
        ]
    },
    mutations: {
        updateGameList (state, payload) {
            state.lastUpdated = new Date(),
            state.games = payload.games;
        }
    }
})

function updateGames()
{
    $.getJSON( "/game/list", function( games ) {
        store.commit('updateGameList', {games});
        setTimeout(updateGames, 2000);
    });
}

new Vue({
    el: '#app',
    render: h => h(App),
    store: store,
})

updateGames();

createGameForm();