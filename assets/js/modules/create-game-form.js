import $ from 'jquery';

export default function createGameForm() {

    $('#new_game_form_passwordProtected').change(function(e) {

        const usePassword = $(this).is(':checked');

        $('#password-container')[usePassword ? 'slideDown' : 'slideUp']();
    });
}