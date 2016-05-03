import Vue from 'vue';
import DashboardGraph from './components/DashboardGraph';

new Vue({
    el: 'body',

    components: {DashboardGraph}
});

$(document).on('click', '.confirm', function (e) {
    e.preventDefault();
    swal({
        title: "Are you sure?",
        text: "The action you are about to do might not be reversible",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, do it!",
        closeOnConfirm: false
    }, function () {
        $(this).submit();
    }.bind(this));
});