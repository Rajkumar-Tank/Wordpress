jQuery(document).ready(function($) {

    function loadUsers() {
        $.post(my_ajax_obj.ajax_url, {
            action: 'load_users',
            nonce: my_ajax_obj.nonce
        }, function(response) {
            $('#user-list').html(response);
        });
    }

    loadUsers();

    $('#add-user').on('click', function() {
        let name = $('#name').val();
        let email = $('#email').val();

        $.post(my_ajax_obj.ajax_url, {
            action: 'add_user',
            nonce: my_ajax_obj.nonce,
            name: name,
            email: email
        }, function(res) {
            $('#crud-msg').html(res.message);
            $('#name, #email').val('');
            loadUsers();
        }, 'json');
    });

    // Delete User
    $(document).on('click', '.delete-user', function() {
        let id = $(this).data('id');

        $.post(my_ajax_obj.ajax_url, {
            action: 'delete_user',
            nonce: my_ajax_obj.nonce,
            id: id
        }, function(res) {
            $('#crud-msg').html(res.message);
            loadUsers();
        }, 'json');
    });

});
